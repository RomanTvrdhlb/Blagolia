import intlTelInput from "intl-tel-input";
import {
  addCustomClass,
  removeCustomClass,
} from "../functions/customFunctions";
import { modalManagerObject } from "./modals";
import { loaderInstanse } from "../functions/scripts/loaderInstanse";

document.addEventListener("DOMContentLoaded", function () {
  const thanksModalID = ajax_params.modalSuccessId;
  const errorModalID = ajax_params.modalErrorId;
  const formWrappers = document.querySelectorAll(".wpcf7");

  const applyMask = (input, dialCode, iso2) => {
    let maskTemplate;

    if (iso2 === "ua") {
      maskTemplate = "+38 (0__) ___ ____";
    } else {
      maskTemplate = `${dialCode} (___) ___ ____`;
    }

    const createMask = (event) => {
      let matrix = maskTemplate;
      let i = 0;
      const def = matrix.replace(/\D/g, "");
      let val = input.value.replace(/\D/g, "");

      if (def.length >= val.length) {
        val = def;
      }

      input.value = matrix.replace(/./g, (a) => {
        return /[_\d]/.test(a) && i < val.length
          ? val.charAt(i++)
          : i >= val.length
          ? ""
          : a;
      });

      if (event.type === "blur") {
        if (input.value.length <= dialCode.length + 2) {
          input.value = "";
        }
      } else {
        setCursorPosition(input.value.length, input);
      }
    };

    const setCursorPosition = (pos, elem) => {
      elem.focus();
      if (elem.setSelectionRange) {
        elem.setSelectionRange(pos, pos);
      } else if (elem.createTextRange) {
        const range = elem.createTextRange();
        range.collapse(true);
        range.moveEnd("character", pos);
        range.moveStart("character", pos);
        range.select();
      }
    };

    input.removeEventListener("input", createMask);
    input.removeEventListener("focus", createMask);
    input.removeEventListener("blur", createMask);

    input.addEventListener("input", createMask);
    input.addEventListener("focus", createMask);
    input.addEventListener("blur", createMask);

    input.setAttribute("placeholder", maskTemplate);
  };

  formWrappers &&
    formWrappers.forEach(function (form) {
      const phoneInputs = form.querySelectorAll('input[type="tel"]');
      console.log(phoneInputs);
      phoneInputs.forEach(function (input) {
        const iti = intlTelInput(input, {
          initialCountry: "ua",
          separateDialCode: true,
          preferredCountries: ["ua", "pl", "de"],
          utilsScript:
            "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
        });

        const dialCodeEl = input
          .closest(".iti")
          .querySelector(".iti__selected-dial-code");
        if (dialCodeEl) dialCodeEl.style.display = "none";

        const selectedCountry = iti.getSelectedCountryData();
        const newDialCode = "+" + selectedCountry.dialCode;
        const iso2 = selectedCountry.iso2;

        applyMask(input, newDialCode, iso2);

        input.addEventListener("countrychange", function () {
          const selectedCountry = iti.getSelectedCountryData();
          const initialDialCode = "+" + selectedCountry.dialCode;
          const iso2 = selectedCountry.iso2;

          applyMask(input, initialDialCode, iso2);
        });
      });
    });

  for (const formWrapper of formWrappers) {
    const formSubmitBtn = formWrapper.querySelector('button[type="submit"]');
    formWrapper.setAttribute("data-loader", false);

    if (formWrapper) {
      if (formSubmitBtn) {
        formSubmitBtn.addEventListener("click", function () {
          removeCustomClass(formWrapper, "loaded");
          addCustomClass(formWrapper, "loader");
        });
      }

      formWrapper.addEventListener(
        "wpcf7invalid",
        function (event) {
          setTimeout(function () {
            addCustomClass(formWrapper, "loaded");
          }, 500);
        },
        false
      );

      formWrapper.addEventListener(
        "wpcf7mailfailed",
        function (event) {
          modalManagerObject.closeModal();

          setTimeout(function () {
            modalManagerObject.openModal(`modal_${errorModalID}`);
            console.log("failded");
          }, 400);
        },
        false
      );

      formWrapper.addEventListener(
        "wpcf7mailsent",
        function (event) {
          modalManagerObject.closeModal();

          setTimeout(function () {
            modalManagerObject.openModal(`modal_${thanksModalID}`);
            console.log("send");
          }, 400);
        },
        false
      );
    }
  }
});
