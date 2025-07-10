/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./source/js/_components.js":
/*!**********************************!*\
  !*** ./source/js/_components.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_dinamicHeight__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/dinamicHeight */ "./source/js/components/dinamicHeight.js");
/* harmony import */ var _components_modals__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/modals */ "./source/js/components/modals.js");
/* harmony import */ var _components_form_validate__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/form-validate */ "./source/js/components/form-validate.js");
/* harmony import */ var _components_acc__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/acc */ "./source/js/components/acc.js");
/* harmony import */ var _components_post_filter__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./components/post-filter */ "./source/js/components/post-filter.js");
/* harmony import */ var _components_sliders__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./components/sliders */ "./source/js/components/sliders.js");
/* harmony import */ var _components_mobile_menu__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./components/mobile-menu */ "./source/js/components/mobile-menu.js");


// import './components/select';


// import './components/comments';


// import './components/big-calculator';

// import './components/tabs';
// import './components/calc';
// import './components/quiz';
// import './components/quiz-settings';
// import './components/anchor';
// import './components/hiddenText';
// import './components/calendar';
// import './components/toTop';
// import './components/post';
// import './components/filters';
// import './components/animations';
// import './components/tabs';
// import './components/ajaxPostTabs';
// import './components/ajaxLoadGallery';
// import './components/barba';

/***/ }),

/***/ "./source/js/_vars.js":
/*!****************************!*\
  !*** ./source/js/_vars.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  windowEl: window,
  documentEl: document,
  htmlEl: document.documentElement,
  bodyEl: document.body,
  activeClass: 'active',
  activeClassMode: 'mode',
  header: document.querySelector('header'),
  footer: document.querySelector('footer'),
  overlay: document.querySelector('[data-overlay]'),
  modals: [...document.querySelectorAll('[data-popup]')],
  modalsMode: [...document.querySelectorAll('[data-mode-modal]')],
  modalsButton: [...document.querySelectorAll("[data-btn-modal]")]
});

/***/ }),

/***/ "./source/js/components/acc.js":
/*!*************************************!*\
  !*** ./source/js/components/acc.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_scripts_acc__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../functions/scripts/acc */ "./source/js/functions/scripts/acc.js");

document.addEventListener('DOMContentLoaded', function () {
  const accordionInstance = new _functions_scripts_acc__WEBPACK_IMPORTED_MODULE_0__["default"]('[data-accordion]');

  // accordionInstance.reinit()
});

/***/ }),

/***/ "./source/js/components/dinamicHeight.js":
/*!***********************************************!*\
  !*** ./source/js/components/dinamicHeight.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _vars_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../_vars.js */ "./source/js/_vars.js");
/* harmony import */ var _functions_customFunctions_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../functions/customFunctions.js */ "./source/js/functions/customFunctions.js");


const {
  header
} = _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"];
let lastScroll = 0;
const defaultOffset = 40;
const scrollUpDelay = 600;
function stickyHeaderFunction(breakpoint) {
  let containerWidth = document.documentElement.clientWidth;
  if (header.classList.contains('static')) return;
  if (containerWidth > breakpoint) {
    const scrollPosition = () => window.pageYOffset || document.documentElement.scrollTop;
    const containHide = () => header.classList.contains('sticky');
    window.addEventListener('scroll', () => {
      const currentScroll = scrollPosition();
      if (currentScroll > lastScroll && !containHide() && currentScroll > defaultOffset) {
        (0,_functions_customFunctions_js__WEBPACK_IMPORTED_MODULE_1__.addCustomClass)(header, "sticky");
        header.classList.add("scroll-up");
        setTimeout(() => {
          header.classList.remove("scroll-up");
          header.classList.add("return-to-place");
        }, scrollUpDelay);
      }
      if (currentScroll < defaultOffset) {
        header.classList.remove("sticky", "scroll-up", "return-to-place");
      }
      lastScroll = currentScroll;
    });
  }
}
document.addEventListener("DOMContentLoaded", function () {
  if (!header.classList.contains('static')) {
    stickyHeaderFunction(320);
  }
  (0,_functions_customFunctions_js__WEBPACK_IMPORTED_MODULE_1__.elementHeight)(_vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].header, 'header-height');
});

/***/ }),

/***/ "./source/js/components/form-validate.js":
/*!***********************************************!*\
  !*** ./source/js/components/form-validate.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_customFunctions__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../functions/customFunctions */ "./source/js/functions/customFunctions.js");
/* harmony import */ var _modals__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modals */ "./source/js/components/modals.js");
/* harmony import */ var _functions_scripts_loaderInstanse__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../functions/scripts/loaderInstanse */ "./source/js/functions/scripts/loaderInstanse.js");



document.addEventListener('DOMContentLoaded', function () {
  const thanksModalID = 226;
  // const thanksModalID = ajax_params.modal_done;
  // const errorModalID = ajax_params.modal_error;
  const errorModalID = 226;
  const mask = (selector, pattern) => {
    let setCursorPosition = (pos, elem) => {
      elem.focus();
      if (elem.setSelectionRange) {
        elem.setSelectionRange(pos, pos);
      } else if (elem.createTextRange) {
        let range = elem.createTextRange();
        range.collapse(true);
        range.moveEnd('character', pos);
        range.moveStart('character', pos);
        range.select();
      }
    };
    function createMask(event) {
      let matrix = pattern,
        i = 0,
        def = matrix.replace(/\D/g, ''),
        val = this.value.replace(/\D/g, '');
      if (def.length >= val.length) {
        val = def;
      }
      this.value = matrix.replace(/./g, function (a) {
        return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? '' : a;
      });
      if (event.type === 'blur') {
        if (this.value.length == 2) {
          this.value = '';
        }
      } else {
        setCursorPosition(this.value.length, this);
      }
    }
    let inputs = document.querySelectorAll(selector);
    inputs.forEach(input => {
      input.addEventListener('input', createMask);
      input.addEventListener('focus', createMask);
      input.addEventListener('blur', createMask);
      input.setAttribute('placeholder', pattern);
    });
  };
  mask('input[type="tel"]', '+1 (___) ___ ____');
  const formWrappers = document.querySelectorAll('.wpcf7');
  console.log(formWrappers);
  for (const formWrapper of formWrappers) {
    const formSubmitBtn = formWrapper.querySelector('button[type="submit"]');
    formWrapper.setAttribute('data-loader', false);
    // function toggleLoader() {
    //     removeCustomClass(formWrapper, 'loader,loaded');
    // }

    if (formWrapper) {
      if (formSubmitBtn) {
        formSubmitBtn.addEventListener('click', function () {
          (0,_functions_customFunctions__WEBPACK_IMPORTED_MODULE_0__.removeCustomClass)(formWrapper, 'loaded');
          (0,_functions_customFunctions__WEBPACK_IMPORTED_MODULE_0__.addCustomClass)(formWrapper, 'loader');
          // formSubmitBtn.setAttribute('disabled', true);

          // loaderInstanse(formWrapper, true);
        });
      }
      console.log(formWrapper);
      formWrapper.addEventListener('wpcf7invalid', function (event) {
        setTimeout(function () {
          (0,_functions_customFunctions__WEBPACK_IMPORTED_MODULE_0__.addCustomClass)(formWrapper, 'loaded');
        }, 500);
      }, false);
      formWrapper.addEventListener('wpcf7mailfailed', function (event) {
        _modals__WEBPACK_IMPORTED_MODULE_1__.modalManagerObject.closeModal();

        // loaderInstanse(formWrapper, true);

        setTimeout(function () {
          _modals__WEBPACK_IMPORTED_MODULE_1__.modalManagerObject.openModal(`modal_${errorModalID}`);
        }, 400);
      }, false);
      formWrapper.addEventListener('wpcf7mailsent', function (event) {
        _modals__WEBPACK_IMPORTED_MODULE_1__.modalManagerObject.closeModal();
        // loaderInstanse(formWrapper, true);

        setTimeout(function () {
          _modals__WEBPACK_IMPORTED_MODULE_1__.modalManagerObject.openModal(`modal_${thanksModalID}`);
        }, 400);
      }, false);
    }
  }
});

/***/ }),

/***/ "./source/js/components/mobile-menu.js":
/*!*********************************************!*\
  !*** ./source/js/components/mobile-menu.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_scripts_burger__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../functions/scripts/burger */ "./source/js/functions/scripts/burger.js");
/* harmony import */ var _functions_customFunctions__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../functions/customFunctions */ "./source/js/functions/customFunctions.js");
/* harmony import */ var _functions_disable_scroll__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../functions/disable-scroll */ "./source/js/functions/disable-scroll.js");
/* harmony import */ var _functions_enable_scroll__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../functions/enable-scroll */ "./source/js/functions/enable-scroll.js");
/* harmony import */ var _vars__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../_vars */ "./source/js/_vars.js");





document.addEventListener("DOMContentLoaded", function () {
  new _functions_scripts_burger__WEBPACK_IMPORTED_MODULE_0__["default"]({
    overlay: document.querySelector(".overlay"),
    burger: document.querySelectorAll(".burger"),
    mobileMenu: document.querySelector(".mobile"),
    header: document.querySelector(".header"),
    activeClass: "active",
    activeClassMode: "active-mode",
    additionalBlocks: [],
    onToggle: isOpen => {
      (0,_functions_customFunctions__WEBPACK_IMPORTED_MODULE_1__.elementHeight)(_vars__WEBPACK_IMPORTED_MODULE_4__["default"].header, 'header-height');
    }
  });
});

/***/ }),

/***/ "./source/js/components/modals.js":
/*!****************************************!*\
  !*** ./source/js/components/modals.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   modalManagerObject: () => (/* binding */ modalManagerObject)
/* harmony export */ });
/* harmony import */ var _functions_scripts_modals__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../functions/scripts/modals */ "./source/js/functions/scripts/modals.js");

const modalManagerObject = new _functions_scripts_modals__WEBPACK_IMPORTED_MODULE_0__["default"]({
  activeMode: 'active-mode',
  fadeInTimeout: 250,
  fadeOutTimeout: 300
});

/***/ }),

/***/ "./source/js/components/post-filter.js":
/*!*********************************************!*\
  !*** ./source/js/components/post-filter.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _functions_ajax_get_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../functions/ajax-get-data */ "./source/js/functions/ajax-get-data.js");
/* harmony import */ var _functions_scripts_loaderInstanse__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../functions/scripts/loaderInstanse */ "./source/js/functions/scripts/loaderInstanse.js");
/* harmony import */ var _functions_scripts_select__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../functions/scripts/select */ "./source/js/functions/scripts/select.js");



document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('.blog-posts');
  const categorySelect = document.querySelector('[data-category]');
  if (categorySelect) {
    new _functions_scripts_select__WEBPACK_IMPORTED_MODULE_2__["default"](categorySelect, {
      mode: 'single',
      placeholder: 'Categories',
      showRemoveButton: false,
      hideOnSelect: true,
      hideOnClear: true,
      name: 'category'
    });
  }
  if (container) {
    const searchInput = document.querySelector('.blog-search__input');
    const searchButton = document.querySelector('.blog-search__submit');
    let searchTimeout;
    const tags = document.querySelectorAll('.tag');
    const {
      ajax_url,
      once
    } = ajax_params;
    let currentPage = 1;
    const sortingSelect = new _functions_scripts_select__WEBPACK_IMPORTED_MODULE_2__["default"](document.querySelector('.custom-select[data-sort]'), {
      mode: 'single',
      showRemoveButton: false,
      hideOnSelect: true,
      hideOnClear: true,
      name: 'sort'
    });
    sortingSelect.onSelect(function () {
      currentPage = 1;
      loadPosts();
    });

    // ==== Инициализация из URL ====
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('page')) currentPage = parseInt(urlParams.get('page'));
    // if (sortingSelect) sortingSelect.setValue(urlParams.get('sort') || 'newest')
    if (searchInput) searchInput.value = urlParams.get('search') || '';
    const urlTags = (urlParams.get('tags') || '').split(',');
    tags.forEach(tag => {
      if (urlTags.includes(tag.dataset.slug)) {
        tag.classList.add('active');
      }
    });

    // ==== Helpers ====
    function getActiveTags() {
      const actives = document.querySelectorAll('.tag.active');
      return Array.from(actives).map(tag => tag.dataset.slug);
    }
    function getCurrentCategory() {
      const container = document.querySelector('[data-current-category]');
      return container ? container.dataset.currentCategory : '';
    }
    function getParams() {
      const sort = sortingSelect.getValues()[0];
      const search = searchInput?.value || '';
      const tags = getActiveTags();
      const category = getCurrentCategory();
      let order = 'DESC';
      let orderby = 'date';
      if (sort === 'oldest') order = 'ASC';
      if (sort === 'title_asc') {
        order = 'ASC';
        orderby = 'title';
      }
      if (sort === 'title_desc') {
        order = 'DESC';
        orderby = 'title';
      }
      return {
        nonce: once,
        order,
        orderby,
        search,
        tags,
        category,
        page: currentPage
      };
    }
    function updateURL() {
      const params = getParams();
      const url = new URL(window.location.href);
      url.search = '';
      if (params.tags.length) {
        url.searchParams.set('tags', params.tags.join(','));
      }
      if (params.search) {
        url.searchParams.set('search', params.search);
      }
      if (params.category) {
        url.searchParams.set('category', params.category);
      }
      const sortValue = sortingSelect.getValues()[0];
      if (sortValue && sortValue !== 'newest') {
        url.searchParams.set('sort', sortValue);
      }
      url.searchParams.set('page', params.page);
      history.pushState(null, '', url);
    }
    function loadPosts() {
      const params = getParams();
      (0,_functions_scripts_loaderInstanse__WEBPACK_IMPORTED_MODULE_1__.loaderInstanse)(container, true);
      (0,_functions_ajax_get_data__WEBPACK_IMPORTED_MODULE_0__.getAjaxData)(ajax_url, 'get_blog_posts', params, res => {
        if (res.success) {
          container.innerHTML = res.data.html;
          buildPagination(res.data.max, params.page);
          updateURL();
          setTimeout(function () {
            (0,_functions_scripts_loaderInstanse__WEBPACK_IMPORTED_MODULE_1__.loaderInstanse)(container, false);
          }, 500);
        }
      });
    }
    function buildPagination(total, current) {
      const wrapper = document.querySelector('.pagination-wrapper .pagination');
      if (!wrapper) return;
      let html = '';
      if (current > 1) {
        html += `<button class="pagination__item" data-direction="prev"><span class="icon-prev"></span> Prev</button>`;
      }
      for (let i = 1; i <= total; i++) {
        html += `<button class="pagination__item ${i === current ? 'active' : ''}" data-page="${i}">${i}</button>`;
      }
      if (current < total) {
        html += `<button class="pagination__item" data-direction="next">Next <span class="icon-next"></span></button>`;
      }
      wrapper.innerHTML = html;
    }

    // ==== Слушатель пагинации ====

    document.addEventListener('click', e => {
      if (e.target.matches('[data-page]')) {
        e.preventDefault();
        currentPage = parseInt(e.target.dataset.page);
        loadPosts();
      }
      if (e.target.matches('[data-direction="next"]')) {
        e.preventDefault();
        currentPage += 1;
        loadPosts();
      }
      if (e.target.matches('[data-direction="prev"]')) {
        e.preventDefault();
        currentPage -= 1;
        loadPosts();
      }
    });

    // ==== Обработка тегов/поиска ====

    if (searchInput) {
      searchInput.addEventListener('input', () => {
        currentPage = 1;
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
          loadPosts();
        }, 400);
      });
      searchInput.addEventListener('keydown', e => {
        if (e.key === 'Enter') {
          e.preventDefault(); // отмена сабмита формы
          clearTimeout(searchTimeout);
          loadPosts();
        }
      });

      // searchInput.addEventListener('change', () => {
      //     currentPage = 1;
      //     loadPosts();
      // });
    }
    if (searchButton) {
      searchButton.addEventListener('click', e => {
        e.preventDefault();
        currentPage = 1;
        loadPosts();
      });
    }
    tags.forEach(tag => {
      tag.addEventListener('click', e => {
        e.preventDefault();
        tag.classList.toggle('active');
        currentPage = 1;
        loadPosts();
      });
    });

    // ==== Первая загрузка ====
    const initialParams = new URLSearchParams(window.location.search);
    const hasFilters = initialParams.has('search') || initialParams.has('tags') || initialParams.has('sort') || initialParams.has('page');
    if (hasFilters) {
      loadPosts();
    }
  }
});

/***/ }),

/***/ "./source/js/components/sliders.js":
/*!*****************************************!*\
  !*** ./source/js/components/sliders.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var swiper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! swiper */ "./node_modules/swiper/swiper.mjs");
/* harmony import */ var swiper_modules__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! swiper/modules */ "./node_modules/swiper/modules/index.mjs");


document.addEventListener("DOMContentLoaded", function () {
  const mainSwiperBreakPoint = window.matchMedia("(min-width: 1024px)");
  const reviewSwiperBreakPoint = window.matchMedia("(min-width: 1240px)");
  const productSlider = document.querySelector(".products-slider");
  const mainSwiperContainers = document.querySelectorAll(".main-slider .swiper-container");
  const reviewSwiperContainers = document.querySelectorAll(".review-slider .swiper-container");
  const mainSwiperInstances = new Map();
  const reviewSwiperInstances = new Map();
  function initOrDestroyMainSwipers() {
    mainSwiperContainers.forEach(container => {
      const mainSlider = container.closest(".main-slider");
      const type = mainSlider?.dataset.slider;
      const paginationEl = mainSlider?.querySelector(".slider-pagination");
      const isActive = mainSwiperInstances.has(container);
      if (mainSwiperBreakPoint.matches) {
        if (isActive) {
          mainSwiperInstances.get(container).destroy(true, true);
          mainSwiperInstances.delete(container);
        }
      } else {
        if (!isActive) {
          const swiper = new swiper__WEBPACK_IMPORTED_MODULE_0__["default"](container, {
            modules: [swiper_modules__WEBPACK_IMPORTED_MODULE_1__.Pagination],
            spaceBetween: 16,
            loop: false,
            breakpoints: {
              0: {
                slidesPerView: 1
              },
              531: {
                slidesPerView: type === "auto" ? "auto" : 1
              }
            },
            pagination: {
              el: paginationEl,
              clickable: true
            }
          });
          mainSwiperInstances.set(container, swiper);
        }
      }
    });
  }
  function initOrDestroyReviewSwipers() {
    reviewSwiperContainers.forEach(container => {
      const reviewSlider = container.closest(".review-slider");
      const paginationEl = reviewSlider?.querySelector(".slider-pagination");
      const isActive = reviewSwiperInstances.has(container);
      if (reviewSwiperBreakPoint.matches) {
        if (isActive) {
          reviewSwiperInstances.get(container).destroy(true, true);
          reviewSwiperInstances.delete(container);
        }
      } else {
        if (!isActive) {
          const swiper = new swiper__WEBPACK_IMPORTED_MODULE_0__["default"](container, {
            modules: [swiper_modules__WEBPACK_IMPORTED_MODULE_1__.Pagination],
            spaceBetween: 16,
            loop: false,
            slidesPerView: "auto",
            breakpoints: {
              0: {
                slidesPerView: 1
              },
              531: {
                slidesPerView: "auto"
              }
            },
            pagination: {
              el: paginationEl,
              clickable: true
            }
          });
          reviewSwiperInstances.set(container, swiper);
        }
      }
    });
  }
  if (productSlider) {
    const container = productSlider.querySelector(".swiper-container");
    const contorls = document.querySelector('.product-controls');
    const prevBtn = contorls.querySelector(".slider-btn.prev");
    const nextBtn = contorls.querySelector(".slider-btn.next");
    const swiper = new swiper__WEBPACK_IMPORTED_MODULE_0__["default"](container, {
      modules: [swiper_modules__WEBPACK_IMPORTED_MODULE_1__.Navigation],
      spaceBetween: 16,
      loop: false,
      navigation: {
        nextEl: nextBtn,
        prevEl: prevBtn
      },
      breakpoints: {
        0: {
          slidesPerView: 1
        },
        650: {
          slidesPerView: 2
        },
        1100: {
          slidesPerView: 3
        }
      }
    });
  }
  mainSwiperBreakPoint.addEventListener("change", initOrDestroyMainSwipers);
  reviewSwiperBreakPoint.addEventListener("change", initOrDestroyReviewSwipers);
  initOrDestroyMainSwipers();
  initOrDestroyReviewSwipers();
});

/***/ }),

/***/ "./source/js/functions/ajax-get-data.js":
/*!**********************************************!*\
  !*** ./source/js/functions/ajax-get-data.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   getAjaxData: () => (/* binding */ getAjaxData)
/* harmony export */ });
/**
 * @param {string} url - URL запроса (обычно window.ajaxurl или ajax_object.ajax_url)
 * @param {string} action - AJAX action name
 * @param {Object} params - Объект с параметрами запроса
 * @param {Function} callback - Колбэк на успешный ответ
 * @param {Function} [onError] - Колбэк на ошибку
 */
function getAjaxData(url, action) {
  let params = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
  let callback = arguments.length > 3 ? arguments[3] : undefined;
  let onError = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : null;
  const xhr = new XMLHttpRequest();
  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 400) {
      try {
        const response = JSON.parse(xhr.responseText);
        callback && callback(response);
      } catch (e) {
        console.error('Ошибка парсинга JSON:', e);
        if (typeof onError === 'function') onError(e);
      }
    } else {
      console.error('Ошибка ответа сервера');
      if (typeof onError === 'function') onError(xhr);
    }
  };
  xhr.onerror = function () {
    console.error('Ошибка соединения с сервером');
    if (typeof onError === 'function') onError(xhr);
  };
  const query = new URLSearchParams({
    action,
    ...params
  }).toString();
  xhr.send(query);
}

/***/ }),

/***/ "./source/js/functions/customFunctions.js":
/*!************************************************!*\
  !*** ./source/js/functions/customFunctions.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   addClassInArray: () => (/* binding */ addClassInArray),
/* harmony export */   addCustomClass: () => (/* binding */ addCustomClass),
/* harmony export */   addMultiListener: () => (/* binding */ addMultiListener),
/* harmony export */   animateInit: () => (/* binding */ animateInit),
/* harmony export */   elementHeight: () => (/* binding */ elementHeight),
/* harmony export */   elementWidth: () => (/* binding */ elementWidth),
/* harmony export */   even: () => (/* binding */ even),
/* harmony export */   fadeIn: () => (/* binding */ fadeIn),
/* harmony export */   fadeOut: () => (/* binding */ fadeOut),
/* harmony export */   initParallaxEffect: () => (/* binding */ initParallaxEffect),
/* harmony export */   removeClassInArray: () => (/* binding */ removeClassInArray),
/* harmony export */   removeCustomClass: () => (/* binding */ removeCustomClass),
/* harmony export */   scrollToElement: () => (/* binding */ scrollToElement),
/* harmony export */   scrollToSection: () => (/* binding */ scrollToSection),
/* harmony export */   stickyHeader: () => (/* binding */ stickyHeader),
/* harmony export */   toggleClassInArray: () => (/* binding */ toggleClassInArray),
/* harmony export */   toggleCustomClass: () => (/* binding */ toggleCustomClass)
/* harmony export */ });
const fadeIn = (el, timeout, display) => {
  el.style.opacity = 0;
  el.style.display = display || 'flex';
  el.style.transition = `all ${timeout}ms`;
  setTimeout(() => {
    el.style.opacity = 1;
  }, 10);
};
// ----------------------------------------------------
const fadeOut = (el, timeout) => {
  el.style.opacity = 1;
  el.style.transition = `all ${timeout}ms ease`;
  el.style.opacity = 0;
  setTimeout(() => {
    el.style.display = 'none';
  }, timeout);
};

// ----------------------------------------------------
function addMultiListener(element, eventNames, listener) {
  var events = eventNames.split(' ');
  for (var i = 0, iLen = events.length; i < iLen; i++) {
    element.addEventListener(events[i], listener, false);
  }
}

// ----------------------------------------------------
const even = n => !(n % 2);
// ----------------------------------------------------
const removeCustomClass = function (item) {
  let customClass = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'active';
  const classes = customClass.split(',').map(cls => cls.trim());
  classes.forEach(className => {
    item.classList.remove(className);
  });
};

// ----------------------------------------------------
const toggleCustomClass = function (item) {
  let customClasses = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'active';
  const classes = customClasses.split(',').map(cls => cls.trim());
  classes.forEach(className => {
    item.classList.toggle(className);
  });
};

// ----------------------------------------------------
const addCustomClass = function (item) {
  let customClass = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'active';
  const classes = customClass.split(',').map(cls => cls.trim());
  classes.forEach(className => {
    item.classList.add(className);
  });
};

// ----------------------------------------------------
const removeClassInArray = function (arr) {
  let customClass = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'active';
  const classes = customClass.split(',').map(cls => cls.trim());
  arr.forEach(item => {
    classes.forEach(className => {
      item.classList.remove(className);
    });
  });
};

// ----------------------------------------------------
const addClassInArray = function (arr) {
  let customClass = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'active';
  const classes = customClass.split(',').map(cls => cls.trim());
  arr.forEach(item => {
    classes.forEach(className => {
      item.classList.add(className);
    });
  });
};

// ----------------------------------------------------
const toggleClassInArray = function (arr) {
  let customClass = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'active';
  const classes = customClass.split(',').map(cls => cls.trim());
  arr.forEach(item => {
    classes.forEach(className => {
      item.classList.toggle(className);
    });
  });
};

//-----------------------------------------------------

const elementHeight = (el, variableName) => {
  // el -- сам елемент (но не коллекция)
  // variableName -- строка, имя создаваемой переменной
  if (el) {
    function initListener() {
      const elementHeight = el.offsetHeight;
      document.querySelector(':root').style.setProperty(`--${variableName}`, `${elementHeight}px`);
    }
    window.addEventListener('DOMContentLoaded', initListener);
    window.addEventListener('resize', initListener);
  }
};
const elementWidth = (el, variableName) => {
  // el -- сам элемент (но не коллекция)
  // variableName -- строка, имя создаваемой переменной
  if (el) {
    function initListener() {
      const elementWidth = el.offsetWidth;
      document.querySelector(':root').style.setProperty(`--${variableName}`, `${elementWidth}px`);
    }
    window.addEventListener('DOMContentLoaded', initListener);
    window.addEventListener('resize', initListener);
  }
};

//-----------------------------------------------------

const stickyHeader = function (block, duration, delay, type) {
  let offset = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 0;
  let scrollThreshold = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 40;
  let lastScrollTop = 0;
  let accumulatedScroll = 0;
  block.style.transition = `all ${duration}ms ${type}`;
  const updateHeaderPosition = () => {
    const currentScroll = window.pageYOffset;
    if (currentScroll > block.offsetHeight + offset) {
      if (currentScroll > lastScrollTop) {
        block.style.top = `-${block.offsetHeight}px`;
        block.style.transitionDelay = '0ms';
        accumulatedScroll = 0;
      } else {
        accumulatedScroll += lastScrollTop - currentScroll;
        if (accumulatedScroll >= scrollThreshold) {
          block.style.top = '0';
          block.style.transitionDelay = `${delay}ms`;
          accumulatedScroll = 0;
        }
      }
    } else {
      block.style.top = '0';
      block.style.transitionDelay = '0ms';
    }
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
  };
  const debounce = (func, wait) => {
    let timeout;
    return function executedFunction() {
      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  };
  const debouncedUpdateHeader = debounce(updateHeaderPosition, 10);
  window.addEventListener('scroll', debouncedUpdateHeader);
};
const scrollToSection = (sectionSelector, action) => {
  const section = document.querySelector(sectionSelector);
  window.addEventListener('scroll', () => {
    if (!section) return;
    const rect = section.getBoundingClientRect();
    if (rect.top <= window.innerHeight && rect.bottom >= 0) {
      action();
    }
  });
};

// ----------------------------------------------------
const initParallaxEffect = containerSelector => {
  const container = document.querySelector(containerSelector);
  if (!container) {
    return;
  }
  const image = container.querySelector('img');
  if (!image) {
    return;
  }
  document.addEventListener('mousemove', function (e) {
    const x = e.clientX - container.offsetLeft;
    const y = e.clientY - container.offsetTop;
    const width = container.offsetWidth;
    const height = container.offsetHeight;
    const moveY = (x - width / 2) / width * 20;
    const moveX = (y - height / 2) / height * 22;
    image.style.transform = `translate(${moveX}px, ${moveY}px)`;
  });
};
// ----------------------------------------------------
const animateInit = (array, initClass, timing) => {
  let currentIndex = 0;
  document.querySelector(':root').style.setProperty(`--${initClass}`, `${timing}ms`);
  const animateListItem = () => {
    array.forEach(item => item.classList.remove(initClass));
    array[currentIndex].classList.add(initClass);
    currentIndex = (currentIndex + 1) % array.length;
    setTimeout(animateListItem, timing);
  };
  animateListItem();
};
// ----------------------------------------------------
const scrollToElement = (element, direction) => {
  if (element) {
    const position = element.getBoundingClientRect();
    if (direction === 'up') {
      window.scrollTo({
        top: position.top + window.scrollY - element.offsetHeight,
        behavior: 'smooth'
      });
    } else if (direction === 'down') {
      window.scrollTo({
        top: position.bottom + window.scrollY,
        behavior: 'smooth'
      });
    }
  }
};
// ----------------------------------------------------

/***/ }),

/***/ "./source/js/functions/disable-scroll.js":
/*!***********************************************!*\
  !*** ./source/js/functions/disable-scroll.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   disableScroll: () => (/* binding */ disableScroll)
/* harmony export */ });
/* harmony import */ var _vars_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../_vars.js */ "./source/js/_vars.js");

const disableScroll = () => {
  const fixBlocks = document?.querySelectorAll('.fixed-block');
  const pagePosition = window.scrollY;
  const paddingOffset = `${window.innerWidth - _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].bodyEl.offsetWidth}px`;
  _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].htmlEl.style.scrollBehavior = 'none';
  fixBlocks.forEach(el => {
    el.style.paddingRight = paddingOffset;
  });
  _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].bodyEl.style.paddingRight = paddingOffset;
  _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].bodyEl.classList.add('dis-scroll');
  _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].bodyEl.dataset.position = pagePosition;
  _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].bodyEl.style.top = `-${pagePosition}px`;
};

/***/ }),

/***/ "./source/js/functions/enable-scroll.js":
/*!**********************************************!*\
  !*** ./source/js/functions/enable-scroll.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   enableScroll: () => (/* binding */ enableScroll)
/* harmony export */ });
/* harmony import */ var _vars_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../_vars.js */ "./source/js/_vars.js");

const enableScroll = () => {
  const fixBlocks = document?.querySelectorAll('.fixed-block');
  const body = document.body;
  const pagePosition = parseInt(_vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].bodyEl.dataset.position, 10);
  fixBlocks.forEach(el => {
    el.style.paddingRight = '0px';
  });
  _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].bodyEl.style.paddingRight = '0px';
  _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].bodyEl.style.top = 'auto';
  _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].bodyEl.classList.remove('dis-scroll');
  if (pagePosition) {
    window.scroll({
      top: pagePosition,
      left: 0
    });
  }
  _vars_js__WEBPACK_IMPORTED_MODULE_0__["default"].bodyEl.removeAttribute('data-position');
};

/***/ }),

/***/ "./source/js/functions/scripts/acc.js":
/*!********************************************!*\
  !*** ./source/js/functions/scripts/acc.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class Accordion {
  constructor(selector) {
    let options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
    if (!window.accordionInstances) {
      window.accordionInstances = new Map();
    }
    if (window.accordionInstances.has(selector)) {
      return window.accordionInstances.get(selector);
    }
    this.selector = selector;
    this.options = {
      btnAttribute: 'data-id',
      contentAttribute: 'data-content',
      activeClass: 'active',
      ...options
    };
    this.openStates = new Map();
    this.handlers = new WeakMap();
    this.accordions = [];
    window.accordionInstances.set(selector, this);
    this.init();
    return this;
  }
  init() {
    const elements = document.querySelectorAll(this.selector);
    if (!elements.length) return;
    this.accordions = Array.from(elements).map(element => {
      const accordion = {
        element,
        buttons: element.querySelectorAll(`[${this.options.btnAttribute}]`),
        isSingle: element.dataset.single === 'true',
        breakpoint: element.dataset.breakpoint ? parseInt(element.dataset.breakpoint) : null
      };
      const savedStates = this.openStates.get(element);
      if (savedStates && savedStates.size > 0) {
        savedStates.forEach(contentId => {
          const content = element.querySelector(`[${this.options.contentAttribute}="${contentId}"]`);
          const button = element.querySelector(`[${this.options.btnAttribute}="${contentId}"]`);
          if (content && button) {
            this.openSection(content, button);
          }
        });
      } else {
        this.setDefaultOpen(accordion);
      }
      return accordion;
    });
    this.setupEventListeners();
  }
  setupEventListeners() {
    this.accordions.forEach(accordion => {
      accordion.buttons.forEach(button => {
        const oldHandler = this.handlers.get(button);
        if (oldHandler) {
          button.removeEventListener('click', oldHandler);
        }
        const handler = e => this.handleClick(e, accordion);
        this.handlers.set(button, handler);
        button.addEventListener('click', handler);
      });
    });
  }
  handleClick(e, accordion) {
    e.preventDefault();
    const button = e.currentTarget;
    const contentId = button.getAttribute(this.options.btnAttribute);
    const content = accordion.element.querySelector(`[${this.options.contentAttribute}="${contentId}"]`);
    if (!content) return;
    const isOpen = content.classList.contains(this.options.activeClass);
    let openSections = this.openStates.get(accordion.element);
    if (!openSections) {
      openSections = new Set();
      this.openStates.set(accordion.element, openSections);
    }
    if (isOpen) {
      this.closeSection(content, button);
      openSections.delete(contentId);
    } else {
      if (accordion.isSingle && (!accordion.breakpoint || window.innerWidth <= accordion.breakpoint)) {
        const openContent = accordion.element.querySelector(`.${this.options.activeClass}[${this.options.contentAttribute}]`);
        if (openContent) {
          const openButton = accordion.element.querySelector(`[${this.options.btnAttribute}="${openContent.getAttribute(this.options.contentAttribute)}"]`);
          this.closeSection(openContent, openButton);
          openSections.clear();
        }
      }
      this.openSection(content, button);
      openSections.add(contentId);
    }
  }
  openSection(content, button) {
    requestAnimationFrame(() => {
      content.style.maxHeight = `${content.scrollHeight}px`;
      content.classList.add(this.options.activeClass);
      button.classList.add(this.options.activeClass);
      button.parentNode.classList.add(this.options.activeClass);
    });
  }
  closeSection(content, button) {
    content.style.maxHeight = '0';
    content.classList.remove(this.options.activeClass);
    button.classList.remove(this.options.activeClass);
    button.parentNode.classList.remove(this.options.activeClass);
  }
  setDefaultOpen(accordion) {
    const defaultId = accordion.element.dataset.default;
    if (!defaultId) return;
    const content = accordion.element.querySelector(`[${this.options.contentAttribute}="${defaultId}"]`);
    const button = accordion.element.querySelector(`[${this.options.btnAttribute}="${defaultId}"]`);
    if (content && button) {
      this.openSection(content, button);
      let openSections = this.openStates.get(accordion.element);
      if (!openSections) {
        openSections = new Set();
        this.openStates.set(accordion.element, openSections);
      }
      openSections.add(defaultId);
    }
  }
  reinit() {
    const currentStates = new Map(this.openStates);
    this.accordions.forEach(accordion => {
      accordion.buttons.forEach(button => {
        const handler = this.handlers.get(button);
        if (handler) {
          button.removeEventListener('click', handler);
          this.handlers.delete(button);
        }
      });
    });
    this.accordions = [];
    this.init();
    currentStates.forEach((openSections, element) => {
      openSections.forEach(contentId => {
        const content = element.querySelector(`[${this.options.contentAttribute}="${contentId}"]`);
        const button = element.querySelector(`[${this.options.btnAttribute}="${contentId}"]`);
        if (content && button) {
          this.openSection(content, button);
        }
      });
    });
  }
  destroy() {
    this.accordions.forEach(accordion => {
      accordion.buttons.forEach(button => {
        const handler = this.handlers.get(button);
        if (handler) {
          button.removeEventListener('click', handler);
          this.handlers.delete(button);
        }
      });
    });
    this.openStates.clear();
    this.accordions = [];
    window.accordionInstances.delete(this.selector);
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Accordion);

/***/ }),

/***/ "./source/js/functions/scripts/burger.js":
/*!***********************************************!*\
  !*** ./source/js/functions/scripts/burger.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _disable_scroll_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../disable-scroll.js */ "./source/js/functions/disable-scroll.js");
/* harmony import */ var _enable_scroll__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../enable-scroll */ "./source/js/functions/enable-scroll.js");
/* harmony import */ var _customFunctions__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../customFunctions */ "./source/js/functions/customFunctions.js");



class MobileMenu {
  constructor(_ref) {
    let {
      overlay,
      burger,
      mobileMenu,
      header,
      activeClass,
      activeClassMode,
      additionalBlocks = [],
      onToggle = null
    } = _ref;
    this.overlay = overlay;
    this.burger = burger;
    this.mobileMenu = mobileMenu;
    this.header = header;
    this.activeClass = activeClass;
    this.activeClassMode = activeClassMode;
    this.additionalBlocks = additionalBlocks;
    this.onToggle = onToggle; // <- добавляем
    this.init();
  }
  toggleMenu(element, trigger) {
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.toggleCustomClass)(element, this.activeClass);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.toggleClassInArray)(trigger, this.activeClass);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.toggleCustomClass)(this.overlay, this.activeClass);
    if (element.classList.contains(this.activeClass)) {
      (0,_disable_scroll_js__WEBPACK_IMPORTED_MODULE_0__.disableScroll)();
      (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.addCustomClass)(this.header, "open-menu");
    } else {
      (0,_enable_scroll__WEBPACK_IMPORTED_MODULE_1__.enableScroll)();
      (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeCustomClass)(this.header, "open-menu");
    }
    if (typeof this.onToggle === 'function') {
      this.onToggle(element.classList.contains(this.activeClass));
    }
  }
  hideMenu(element, trigger) {
    (0,_enable_scroll__WEBPACK_IMPORTED_MODULE_1__.enableScroll)();
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeCustomClass)(element, this.activeClass);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeClassInArray)(trigger, this.activeClass);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeCustomClass)(this.overlay, this.activeClass);
    if (element.classList.contains(this.activeClass)) {
      (0,_disable_scroll_js__WEBPACK_IMPORTED_MODULE_0__.disableScroll)();
      (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.addCustomClass)(this.header, "open-menu");
    } else {
      (0,_enable_scroll__WEBPACK_IMPORTED_MODULE_1__.enableScroll)();
      (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeCustomClass)(this.header, "open-menu");
    }
  }
  init() {
    this.burger.forEach(btn => {
      btn.addEventListener("click", e => {
        e.preventDefault();
        this.toggleMenu(this.mobileMenu, this.burger);
      });
    });
    if (this.overlay) {
      this.overlay.addEventListener("click", e => {
        if (e.target.classList.contains("overlay")) {
          this.hideMenu(this.mobileMenu, this.burger);
        }
      });
    }
    this.mobileMenu.querySelectorAll("a").forEach(item => {
      item.addEventListener("click", () => {
        this.hideMenu(this.mobileMenu, this.burger);
      });
    });
    document.querySelectorAll("[data-modal]").forEach(item => {
      item.addEventListener("click", () => {
        this.hideMenu(this.mobileMenu, this.burger);
        (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.addCustomClass)(this.overlay, 'active-mode');
      });
    });
    this.additionalBlocks.forEach(_ref2 => {
      let {
        trigger,
        target
      } = _ref2;
      if (trigger && target) {
        trigger.addEventListener("click", e => {
          e.stopPropagation();
          this.toggleMenu(target, trigger);
        });
        document.addEventListener("click", e => {
          if (!target.contains(e.target) && !trigger.contains(e.target)) {
            trigger.classList.remove(this.activeClass);
            target.classList.remove(this.activeClass);
          }
        });
      }
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MobileMenu);

/***/ }),

/***/ "./source/js/functions/scripts/loaderInstanse.js":
/*!*******************************************************!*\
  !*** ./source/js/functions/scripts/loaderInstanse.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   loaderInstanse: () => (/* binding */ loaderInstanse)
/* harmony export */ });
const loaderInstanse = function (loader) {
  let flag = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  loader.setAttribute('data-loader', flag);
};

/***/ }),

/***/ "./source/js/functions/scripts/modals.js":
/*!***********************************************!*\
  !*** ./source/js/functions/scripts/modals.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _disable_scroll__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../disable-scroll */ "./source/js/functions/disable-scroll.js");
/* harmony import */ var _enable_scroll__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../enable-scroll */ "./source/js/functions/enable-scroll.js");
/* harmony import */ var _customFunctions__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../customFunctions */ "./source/js/functions/customFunctions.js");



class ModalManager {
  constructor(_ref) {
    let {
      activeMode = '',
      fadeInTimeout,
      fadeOutTimeout
    } = _ref;
    this.overlay = document.querySelector('[data-overlay]');
    this.modalsButton = document.querySelectorAll("[data-btn-modal], a[href^='/modal_']");
    this.innerButtonModal = document.querySelectorAll("[data-btn-inner]");
    this.modals = document.querySelectorAll('[data-popup]');
    this.activeClass = 'active';
    this.activeMode = activeMode;
    this.mobileMenu = document.querySelector('.mobile');
    this.burger = document.querySelectorAll('.burger');
    this.innerButton = null;
    this.timeIn = fadeInTimeout;
    this.timeOut = fadeOutTimeout;
    if (this.overlay) {
      this.bindEvents();
      this.checkURLModal(); // Проверяем и открываем модалку, если есть в URL
    } else {
      console.error('Overlay element not found!');
    }
  }
  bindEvents() {
    this.overlay.addEventListener("click", e => this.overlayClickHandler(e));
    this.modalsButton.forEach(btn => {
      btn.addEventListener("click", e => {
        e.preventDefault();
        if (btn.tagName === 'A' && btn.getAttribute('href').startsWith('/modal_')) {
          const modalID = this.extractModalIDFromHref(btn.getAttribute('href'));
          if (modalID) {
            this.openModal('modal_' + modalID);
            this.removeModalFromURL(); // Удаляем /modal_... из URL
          }
        } else if (btn.hasAttribute("data-btn-modal")) {
          this.buttonClickHandler(e, "data-btn-modal");
          this.removeModalFromURL();
        }
      });
    });
    this.innerButtonModal.forEach(btn => {
      btn.addEventListener("click", e => this.innerButtonClickHandler(e));
    });
  }
  checkURLModal() {
    const modalID = this.extractModalIDFromHref(window.location.href);
    if (modalID) {
      this.openModal('modal_' + modalID);
      this.removeModalFromURL();
    }
  }
  removeModalFromURL() {
    const url = window.location.origin + window.location.pathname;
    history.replaceState({}, '', url);
  }
  extractModalIDFromHref(href) {
    const match = href.match(/\/?modal_(\d+)/);
    return match ? match[1] : null;
  }
  closeModal() {
    if (!this.overlay) return;
    this.activeMode && (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeCustomClass)(this.overlay, this.activeMode);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeCustomClass)(this.overlay, this.activeClass);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeClassInArray)(this.modals, this.activeClass);
    this.modals.forEach(modal => (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.fadeOut)(modal, this.timeOut));
    (0,_enable_scroll__WEBPACK_IMPORTED_MODULE_1__.enableScroll)();
  }
  buttonClickHandler(e, buttonAttribute) {
    e.preventDefault();
    const attributeValue = this.findAttribute(e.target, buttonAttribute);
    if (!attributeValue) return;
    this.openModal(attributeValue);
    this.removeModalFromURL();
  }
  openModal(attributeValue) {
    if (!this.overlay) return;
    const modal = this.overlay.querySelector(`[data-popup="${attributeValue}"]`);
    if (!modal) return;
    this.mobileMenu && (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeCustomClass)(this.mobileMenu, this.activeClass);
    this.burger && (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeClassInArray)(this.burger, this.activeClass);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeClassInArray)(this.modals, this.activeClass);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.addCustomClass)(this.overlay, this.activeClass);
    this.activeMode && (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.addCustomClass)(this.overlay, this.activeMode);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.addCustomClass)(modal, this.activeClass);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.fadeIn)(modal, this.timeIn, 'flex');
    (0,_disable_scroll__WEBPACK_IMPORTED_MODULE_0__.disableScroll)();
    this.innerButton = modal.querySelector('.close');
  }
  overlayClickHandler(e) {
    if (e.target === this.overlay || e.target === this.innerButton) {
      this.closeModal();
    }
  }
  innerButtonClickHandler(e) {
    e.preventDefault();
    (0,_enable_scroll__WEBPACK_IMPORTED_MODULE_1__.enableScroll)();
    const prevId = this.findAttribute(e.target.closest('[data-popup]'), 'data-popup');
    if (!prevId) return;
    const currentModalId = e.target.getAttribute("data-btn-inner");
    const currentModal = this.overlay.querySelector(`[data-popup="${currentModalId}"]`);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.removeClassInArray)(this.modals, this.activeClass);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.addCustomClass)(this.overlay, this.activeClass);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.fadeOut)(document.querySelector(`[data-popup="${prevId}"]`), 0);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.fadeIn)(currentModal, this.timeIn);
    (0,_customFunctions__WEBPACK_IMPORTED_MODULE_2__.addCustomClass)(currentModal, this.activeClass);
    (0,_disable_scroll__WEBPACK_IMPORTED_MODULE_0__.disableScroll)();
    this.innerButton = currentModal.querySelector('.close');
    this.removeModalFromURL();
  }
  findAttribute(element, attributeName) {
    let target = element;
    while (target && target !== document) {
      if (target.hasAttribute(attributeName)) {
        return target.getAttribute(attributeName);
      }
      target = target.parentNode;
    }
    return null;
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ModalManager);

/***/ }),

/***/ "./source/js/functions/scripts/select.js":
/*!***********************************************!*\
  !*** ./source/js/functions/scripts/select.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class CustomSelect {
  constructor(element) {
    let config = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
    this.container = element;
    if (!this.container) throw new Error(`Контейнер с селектором "${element}" не найден`);
    this.selectField = this.container.querySelector('.select-field');
    this.optionsContainer = this.container.querySelector('.options-container');
    this.selectedOptionsContainer = this.container.querySelector('.selected-options');
    this.selectedValuesContainer = this.container.querySelector('.selected-values');
    if (!this.selectField || !this.optionsContainer || !this.selectedOptionsContainer) {
      throw new Error('Не найдены все необходимые элементы селекта');
    }
    this.config = {
      mode: config.mode || 'multiple',
      showRemoveButton: config.showRemoveButton !== false,
      placeholder: config.placeholder || 'Выберите элемент',
      onSelect: config.onSelect || null,
      onRemove: config.onRemove || null,
      hideOnSelect: config.hideOnSelect || false,
      hideOnClear: config.hideOnClear || false,
      name: config.name || 'custom-select-value'
    };
    this.selectedValues = new Set();
    this.suppressEvents = false;
    this.isInitialized = false;
    this.hiddenInput = document.createElement('input');
    this.hiddenInput.type = 'hidden';
    this.hiddenInput.name = this.config.name;
    this.container.insertAdjacentElement('afterbegin', this.hiddenInput);
    this.init();
  }
  onSelect(callback) {
    this.config.onSelect = callback;
  }
  onRemove(callback) {
    this.config.onRemove = callback;
  }
  init() {
    this.selectField.addEventListener('click', () => this.toggleDropdown());
    document.addEventListener('click', e => {
      if (!this.selectField.contains(e.target) && !this.optionsContainer.contains(e.target)) {
        this.closeDropdown();
      }
    });
    const placeholder = this.selectedOptionsContainer.querySelector('.placeholder');
    if (placeholder) placeholder.textContent = this.config.placeholder;
    this.initOptions();
    const initiallyActive = this.optionsContainer.querySelectorAll('.option.active:not(.disabled)');
    this.suppressEvents = true;
    initiallyActive.forEach(option => {
      const value = option.dataset.value;
      if (value) this.setValue(value);
    });
    this.suppressEvents = false;
    if (initiallyActive.length > 0) {
      this.container.classList.add('selected');
    }
    this.isInitialized = true;
  }
  initOptions() {
    const options = this.optionsContainer.querySelectorAll('.option');
    options.forEach(option => {
      option.addEventListener('click', () => {
        if (option.classList.contains('disabled')) return;
        const value = option.dataset.value;
        if (this.selectedValues.has(value)) {
          this.removeValue(value);
          option.classList.remove('active');
        } else {
          if (this.config.mode === 'single' && this.selectedValues.size > 0) {
            const previousValue = Array.from(this.selectedValues)[0];
            this.removeValue(previousValue);
            const previousOption = this.optionsContainer.querySelector(`.option[data-value="${previousValue}"]`);
            if (previousOption) previousOption.classList.remove('active');
          }
          this.addValue(value);
          option.classList.add('active');
          if (this.config.onSelect && this.isInitialized) this.config.onSelect(value);
          if (this.config.mode === 'single' && this.config.hideOnSelect) {
            this.closeDropdown();
          }
        }
      });
    });
  }
  toggleDropdown() {
    this.selectField.classList.toggle('active');
    this.optionsContainer.classList.toggle('active');
  }
  closeDropdown() {
    this.selectField.classList.remove('active');
    this.optionsContainer.classList.remove('active');
  }
  addValue(value) {
    if (this.selectedValues.has(value)) return;
    const option = this.optionsContainer.querySelector(`.option[data-value="${value}"]`);
    if (!option || option.classList.contains('disabled')) return;
    this.selectedValues.add(value);
    const icon = option.querySelector('i.sprite')?.cloneNode(true);
    const text = option.querySelector('.option-text')?.textContent || value;
    const selectedOption = document.createElement('div');
    selectedOption.className = 'selected-option';
    selectedOption.dataset.value = value;
    const content = document.createElement('span');
    content.classList.add('option-label');
    content.textContent = text;
    selectedOption.appendChild(icon || document.createElement('span'));
    selectedOption.appendChild(content);
    if (this.config.showRemoveButton) {
      const removeBtn = document.createElement('span');
      removeBtn.className = 'remove-btn';
      removeBtn.dataset.value = value;
      removeBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 12">
                    <path fill="currentColor" d="M.2.2a1 1 0 0 1 1.1 0L6 5 10.7.2a.8.8 0 0 1 1 1.1L7.2 6l4.7 4.7a.8.8 0 1 1-1.1 1L6 7.2l-4.7 4.7a.8.8 0 1 1-1-1.1L4.8 6 .2 1.3a.8.8 0 0 1 0-1Z"/>
                </svg>`;
      removeBtn.addEventListener('click', e => {
        e.stopPropagation();
        this.removeValue(value);
      });
      selectedOption.appendChild(removeBtn);
    }
    const placeholder = this.selectedOptionsContainer.querySelector('.placeholder');
    if (placeholder) placeholder.remove();
    this.selectedOptionsContainer.appendChild(selectedOption);
    this.updateSelectedValuesDisplay();
    this.updateHiddenInput();
    this.container.classList.add('selected');
  }
  removeValue(value) {
    this.selectedValues.delete(value);
    const selectedOption = this.selectedOptionsContainer.querySelector(`.selected-option[data-value="${value}"]`);
    if (selectedOption) selectedOption.remove();
    const option = this.optionsContainer.querySelector(`.option[data-value="${value}"]`);
    if (option && !option.classList.contains('disabled')) {
      option.classList.remove('active');
    }
    if (this.config.onRemove && !this.suppressEvents) this.config.onRemove(value);
    if (this.selectedValues.size === 0) {
      const placeholder = document.createElement('span');
      placeholder.className = 'placeholder';
      placeholder.textContent = this.config.placeholder;
      this.selectedOptionsContainer.appendChild(placeholder);
      this.container.classList.remove('selected');
      if (this.config.hideOnClear) {
        this.closeDropdown();
      }
    }
    this.updateSelectedValuesDisplay();
    this.updateHiddenInput();
  }
  updateSelectedValuesDisplay() {
    if (!this.selectedValuesContainer) return;
    this.selectedValuesContainer.innerHTML = '';
    if (this.selectedValues.size === 0) {
      const emptyMessage = document.createElement('p');
      emptyMessage.textContent = 'Нет выбранных элементов';
      this.selectedValuesContainer.appendChild(emptyMessage);
      return;
    }
    this.selectedValues.forEach(value => {
      const option = this.optionsContainer.querySelector(`.option[data-value="${value}"]`);
      if (!option) return;
      const icon = option.querySelector('i.sprite')?.cloneNode(true);
      const text = option.querySelector('.option-text')?.textContent || value;
      const item = document.createElement('div');
      item.className = 'selected-value-item';
      const label = document.createElement('span');
      label.textContent = text;
      item.appendChild(icon || document.createElement('span'));
      item.appendChild(label);
      this.selectedValuesContainer.appendChild(item);
    });
  }
  updateHiddenInput() {
    const values = Array.from(this.selectedValues);
    this.hiddenInput.value = this.config.mode === 'multiple' ? values.join('|') : values[0] || '';
  }
  setValue(value) {
    if (this.config.mode === 'single') this.clear();
    const option = this.optionsContainer.querySelector(`.option[data-value="${value}"]`);
    if (option && !option.classList.contains('disabled')) {
      this.addValue(value);
      option.classList.add('active');
      if (this.config.onSelect && this.isInitialized) this.config.onSelect(value);
      this.updateHiddenInput();
    }
  }
  setValues(values) {
    if (!Array.isArray(values)) return;
    if (this.config.mode === 'single') {
      this.setValue(values[0]);
    } else {
      values.forEach(value => {
        const option = this.optionsContainer.querySelector(`.option[data-value="${value}"]`);
        if (option && !option.classList.contains('disabled')) {
          this.addValue(value);
          option.classList.add('active');
          if (this.config.onSelect && this.isInitialized) this.config.onSelect(value);
        }
      });
      this.updateHiddenInput();
    }
  }
  clear() {
    this.selectedValues.forEach(value => this.removeValue(value));
    this.updateHiddenInput();
  }
  getValues() {
    return Array.from(this.selectedValues);
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CustomSelect);

/***/ }),

/***/ "./source/js/main.js":
/*!***************************!*\
  !*** ./source/js/main.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_components.js */ "./source/js/_components.js");


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"main": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkgulp_project"] = self["webpackChunkgulp_project"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["vendors"], () => (__webpack_require__("./source/js/main.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=main.bundle.js.map