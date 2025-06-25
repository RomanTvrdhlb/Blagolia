import Lightpick from "lightpick";
import moment from "moment";

// Получаем язык
const rawLang = document.documentElement.lang || "en";
const currentLang = rawLang.toLowerCase().split('-')[0];

// Подключаем локаль moment
try {
    require(`moment/locale/${currentLang}`);
    moment.locale(currentLang);
} catch (e) {
    console.warn(`Moment locale for "${currentLang}" not found. Falling back to 'en'.`);
    moment.locale("en");
}

const calendarWrappers = document.querySelectorAll('[data-calendar]');

calendarWrappers.forEach((wrapper) => {
    const type = wrapper.getAttribute('data-calendar');
    const input = wrapper.querySelector('input');
    const button = wrapper.querySelector('button');

    if (!input) return;

    let picker;

    if (type === 'single') {
        picker = new Lightpick({
            field: input,
            singleDate: true,
            format: 'DD.MM.YYYY',
            lang: currentLang,
            onSelect: function () {
                input.dispatchEvent(new Event('input', { bubbles: true }));
            },
        });
    } else if (type === 'range') {
        picker = new Lightpick({
            field: input,
            singleDate: false,
            format: 'DD.MM.YYYY',
            lang: currentLang,
            onSelect: function (start, end) {
                if (start && end) {
                    input.value = `${start.format('DD.MM.YYYY')} - ${end.format('DD.MM.YYYY')}`;
                    input.dispatchEvent(new Event('input', { bubbles: true }));
                }
            },
            onClear: function () {
                input.value = '';
                input.dispatchEvent(new Event('input', { bubbles: true }));
            }
        });
    }

    button?.addEventListener("click", () => input.focus());
});
