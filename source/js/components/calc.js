import RangeSlider from "../functions/scripts/range";

document.addEventListener('DOMContentLoaded', function () {
    const FIXED_LOAN_TERM_YEARS = 25;

    const range = document.querySelector(".range");

    if (range) {
        const rangeEl = range.querySelector('.range input[type="range"]');
        const valueEl = range.querySelector(".range__value input");
        const symbol = range.dataset.symbol || "$";
        const background = "var(--range-bg)";

        new RangeSlider(rangeEl, valueEl, symbol, background);
    }

    const rangeInput = document.querySelector('.section-range__coll input[type="range"]');
    const thumbLabel = document.querySelector('.range__thumb-label');
    const rows = document.querySelectorAll('.calc-table__row');

    function formatMoney(value) {
        return `$${Math.round(value).toLocaleString('en-US')} <i>/mo</i>`;
    }

    function calculatePayment(principal, annualRate, years) {
        const r = (annualRate / 100) / 12;
        const n = years * 12;

        if (n === 0) return 0;
        if (r === 0) return principal / n;

        return principal * (r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);
    }

    function updateTable(principal) {
        rows.forEach(row => {
            const rateEl = row.querySelector('[data-rates]');
            const paymentCell = row.querySelector('[data-payments]');

            if (!rateEl || !paymentCell) return;

            const rate = parseFloat(rateEl.dataset.rates || 0);
            if (isNaN(rate)) return;

            const payment = calculatePayment(principal, rate, FIXED_LOAN_TERM_YEARS);
            paymentCell.innerHTML = formatMoney(payment);
            paymentCell.dataset.payments = payment.toFixed(2);
        });
    }

    function updateThumbLabel(val) {
        if (!thumbLabel) return;
        const formatted = `$ ${Number(val).toLocaleString('en-US')}`;
        thumbLabel.innerHTML = formatted.replace(/ /g, '&nbsp;');
    }

    if (rangeInput) {
        const handleUpdate = () => {
            const val = parseInt(rangeInput.value, 10);
            updateThumbLabel(val);
            updateTable(val);
        };

        rangeInput.addEventListener('input', handleUpdate);
        handleUpdate(); // первичный вызов
    }
});
