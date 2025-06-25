import html2pdf from 'html2pdf.js';
import {fadeIn, fadeOut} from "../functions/customFunctions";

document.addEventListener('DOMContentLoaded', function () {
    const calculateBtn = document.getElementById('m-calculator');
    if (!calculateBtn) return;

    const homePriceInput = document.getElementById('homePrice');
    const downPaymentAmountInput = document.getElementById('downPaymentAmount');
    const mortgageTermSelect = document.querySelector('[name="mortgage_type"]');
    const paymentFrequencySelect = document.querySelector('[name="payment_frequency"]');
    const amortizationPeriodSelect = document.querySelector('[name="amortizationPeriod"]');

    const errorMessageDiv = document.getElementById('error-message');
    const periodicPaymentResult = document.getElementById('periodicPaymentResult');
    const mortgageInsuranceResult = document.getElementById('mortgageInsuranceResult');
    const totalMortgageResult = document.getElementById('totalMortgageResult');
    const interestPaidOverTermResult = document.getElementById('interestPaidOverTermResult');
    const principalPaidOverTermResult = document.getElementById('principalPaidOverTermResult');
    const balanceAtEndTermResult = document.getElementById('balanceAtEndTermResult');
    const amortizationReducedResult = document.getElementById('amortizationReducedResult');
    const amortizationTableBody = document.getElementById('amortizationTableBody');
    const pdfContainer = document.getElementById('pdf-container');

    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('blur', () => {
            const min = parseFloat(input.min);
            const max = parseFloat(input.max);
            let value = parseFloat(input.value);

            if (isNaN(value)) return;

            if (!isNaN(min) && value < min) input.value = min;
            if (!isNaN(max) && value > max) input.value = max;
        });

        input.addEventListener('keydown', e => {

            if (
                [46, 8, 9, 27, 13, 110, 190].includes(e.keyCode) ||
                // Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
                (e.ctrlKey && [65, 67, 86, 88].includes(e.keyCode)) ||
                // стрелки
                (e.keyCode >= 35 && e.keyCode <= 39)
            ) {
                return;
            }

            // Если не цифра
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
                (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });



    const formatCurrency = value =>
        parseFloat(value).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        });

    const show_error = message => {
        errorMessageDiv.textContent = message;
        errorMessageDiv.classList.remove('hidden');

        setTimeout(function () {

            clear_error();

        }, 5000)
    };
    const clear_error = () => {
        [homePriceInput, downPaymentAmountInput, mortgageTermSelect].forEach(el => el.classList.remove('error'));
        errorMessageDiv.classList.add('hidden')
    };

    calculateBtn.addEventListener('click', calculateMortgage);

    function calculateMortgage() {
        fadeOut(pdfContainer, 0)
        clear_error();

        const homePrice = parseFloat(homePriceInput.value) || 0;
        const downPaymentAmount = parseFloat(downPaymentAmountInput.value) || 0;
        const annualInterestRate = (parseFloat(mortgageTermSelect.value) || 0) / 100;
        const amortizationYears = parseInt(amortizationPeriodSelect.value);
        const termYears = parseFloat(mortgageTermSelect.value);
        const paymentFrequency = paymentFrequencySelect.value;

        // if (homePrice <= 0 || downPaymentAmount < 0 || annualInterestRate < 0 || homePrice <= downPaymentAmount) {
        //     show_error("Please enter valid inputs. Home price must be greater than down payment.");
        //     return;
        // }

        let hasError = false;

        if (homePrice <= 0) {
            homePriceInput.classList.add('error');
            hasError = true;
        }

        if (downPaymentAmount < 0) {
            downPaymentAmountInput.classList.add('error');
            hasError = true;
        }

        if (annualInterestRate < 0) {
            mortgageTermSelect.classList.add('error');
            hasError = true;
        }

        if (homePrice <= downPaymentAmount) {
            homePriceInput.classList.add('error');
            downPaymentAmountInput.classList.add('error');
            hasError = true;
        }

        if (hasError) {
            show_error("Please enter valid inputs. Home price must be greater than down payment.");
            return;
        }


        let loanAmountBeforeInsurance = homePrice - downPaymentAmount;
        let downPaymentPercent = (downPaymentAmount / homePrice) * 100;
        let mortgageInsurancePremium = 0;

        if (downPaymentPercent < 20) {
            if (downPaymentPercent >= 5 && downPaymentPercent < 10) mortgageInsurancePremium = loanAmountBeforeInsurance * 0.04;
            else if (downPaymentPercent >= 10 && downPaymentPercent < 15) mortgageInsurancePremium = loanAmountBeforeInsurance * 0.031;
            else if (downPaymentPercent >= 15 && downPaymentPercent < 20) mortgageInsurancePremium = loanAmountBeforeInsurance * 0.028;
        }
        const totalMortgagePrincipal = loanAmountBeforeInsurance + mortgageInsurancePremium;

        let paymentsPerYear;
        const basePaymentsPerYearForAccel = 12;
        switch (paymentFrequency) {
            case 'monthly':
                paymentsPerYear = 12;
                break;
            case 'semi-monthly':
                paymentsPerYear = 24;
                break;
            case 'bi-weekly':
                paymentsPerYear = 26;
                break;
            case 'bi-weekly-accelerated':
                paymentsPerYear = 26;
                break;
            case 'weekly':
                paymentsPerYear = 52;
                break;
            case 'weekly-accelerated':
                paymentsPerYear = 52;
                break;
        }


        const periodicInterestRateForPmtCalc = annualInterestRate / (paymentFrequency.includes('accelerated') ? basePaymentsPerYearForAccel : paymentsPerYear);
        const totalNumberOfPaymentsForAmortization = amortizationYears * (paymentFrequency.includes('accelerated') ? basePaymentsPerYearForAccel : paymentsPerYear);

        let monthlyPaymentForAccel;
        if (annualInterestRate > 0) {
            const pmtNumerator = totalMortgagePrincipal * periodicInterestRateForPmtCalc * Math.pow(1 + periodicInterestRateForPmtCalc, totalNumberOfPaymentsForAmortization);
            const pmtDenominator = Math.pow(1 + periodicInterestRateForPmtCalc, totalNumberOfPaymentsForAmortization) - 1;
            monthlyPaymentForAccel = pmtNumerator / pmtDenominator;
        } else {
            monthlyPaymentForAccel = totalMortgagePrincipal / totalNumberOfPaymentsForAmortization;
        }

        let periodicPayment;
        if (paymentFrequency === 'bi-weekly-accelerated') periodicPayment = monthlyPaymentForAccel / 2;
        else if (paymentFrequency === 'weekly-accelerated') periodicPayment = monthlyPaymentForAccel / 4;
        else {
            const ppr = annualInterestRate / paymentsPerYear;
            const tnp = amortizationYears * paymentsPerYear;
            const num = totalMortgagePrincipal * ppr * Math.pow(1 + ppr, tnp);
            const den = Math.pow(1 + ppr, tnp) - 1;
            periodicPayment = annualInterestRate > 0 ? num / den : totalMortgagePrincipal / tnp;
        }

        const amortizationSchedule = [];
        let remainingBalance = totalMortgagePrincipal;
        let totalInterestPaidForTerm = 0;
        let totalPrincipalPaidForTerm = 0;
        const periodicInterestRate = annualInterestRate / paymentsPerYear;
        const numberOfPaymentsInTerm = Math.round(termYears * paymentsPerYear);


        for (let i = 1; i <= numberOfPaymentsInTerm && remainingBalance > 0.01; i++) {
            const interestForPeriod = remainingBalance * periodicInterestRate;
            let principalForPeriod = periodicPayment - interestForPeriod;
            if (remainingBalance < periodicPayment) {
                principalForPeriod = remainingBalance;
                periodicPayment = principalForPeriod + interestForPeriod;
            }
            remainingBalance -= principalForPeriod;

            totalInterestPaidForTerm += interestForPeriod;
            totalPrincipalPaidForTerm += principalForPeriod;

            amortizationSchedule.push({
                paymentNumber: i,
                paymentAmount: periodicPayment,
                interestPaid: interestForPeriod,
                principalPaid: principalForPeriod,
                remainingBalance: remainingBalance < 0 ? 0 : remainingBalance,
            });
        }

        let amortizationReducedByMonthsText = "N/A";
        if (paymentFrequency.includes('accelerated')) {
            const actualNumPaymentsToZero = -Math.log(1 - (totalMortgagePrincipal * periodicInterestRate) / periodicPayment) / Math.log(1 + periodicInterestRate);
            if (isFinite(actualNumPaymentsToZero) && actualNumPaymentsToZero > 0) {
                const reductionInMonths = amortizationYears * 12 - (actualNumPaymentsToZero / paymentsPerYear) * 12;
                if (reductionInMonths > 0.1) amortizationReducedByMonthsText = `${reductionInMonths.toFixed(1)} Months`;
            }
        }

        periodicPaymentResult.textContent = `$${formatCurrency(periodicPayment)}`;
        mortgageInsuranceResult.textContent = `$${formatCurrency(mortgageInsurancePremium)}`;
        totalMortgageResult.textContent = `$${formatCurrency(totalMortgagePrincipal)}`;
        interestPaidOverTermResult.textContent = `$${formatCurrency(totalInterestPaidForTerm)}`;
        principalPaidOverTermResult.textContent = `$${formatCurrency(totalPrincipalPaidForTerm)}`;
        balanceAtEndTermResult.textContent = `$${formatCurrency(remainingBalance)}`;
        amortizationReducedResult.textContent = amortizationReducedByMonthsText;

        // Populate amortization table
        amortizationTableBody.innerHTML = '';
        let currentYear = 1;
        let paymentsInYear = [];


        amortizationSchedule.forEach((p, index) => {
            paymentsInYear.push(p);
            const isLastInYear = ((index + 1) % paymentsPerYear === 0);
            const isLastOverall = (index + 1) === amortizationSchedule.length;

            if (isLastInYear || isLastOverall) {


                const yearInterest = paymentsInYear.reduce((acc, curr) => acc + curr.interestPaid, 0);
                const yearPrincipal = paymentsInYear.reduce((acc, curr) => acc + curr.principalPaid, 0);
                const yearTotalPaid = yearInterest + yearPrincipal;
                const endOfYearBalance = paymentsInYear[paymentsInYear.length - 1].remainingBalance;

                const summaryRow = amortizationTableBody.insertRow();
                summaryRow.innerHTML = `
						<td colspan="4" style="padding:6px; border:1px solid #ccc; background:#eee; font-weight:bold;">
							Year ${currentYear}: Total Paid $${formatCurrency(yearTotalPaid)}
							&nbsp;|&nbsp; Interest: $${formatCurrency(yearInterest)}
							&nbsp;|&nbsp; Principal: $${formatCurrency(yearPrincipal)}
							&nbsp;|&nbsp; Balance: $${formatCurrency(endOfYearBalance)}
						</td>`;

                paymentsInYear.forEach(payment => {
                    const row = amortizationTableBody.insertRow();
                    row.innerHTML = `
							<td style="padding:6px; border:1px solid #ccc;">Payment ${payment.paymentNumber} – $${formatCurrency(payment.paymentAmount)}</td>
							<td style="padding:6px; border:1px solid #ccc;">$${formatCurrency(payment.interestPaid)}</td>
							<td style="padding:6px; border:1px solid #ccc;">$${formatCurrency(payment.principalPaid)}</td>
							<td style="padding:6px; border:1px solid #ccc;">$${formatCurrency(payment.remainingBalance)}</td>
						`;
                });


                if ((index + 1) % 30 === 0) {

                    const spacer = document.createElement('tr');
                    spacer.innerHTML = `<td colspan="4" style="page-break-after: always;"></td>`;
                    amortizationTableBody.appendChild(spacer);
                }

                paymentsInYear = [];
                currentYear++;
            }

        });


        setTimeout(function () {
            fadeIn(pdfContainer, '300', 'flex')
        }, 50)
    }

    document.getElementById('save-pdf').addEventListener('click', () => {
        const element = document.querySelector('#pdf-container');


        const opt = {
            margin: [0.5, 0.5, 0.5, 0.5], // top, left, bottom, right (в inch — 0.5 = ~12.7мм)
            filename: 'document.pdf',
            image: {type: 'jpeg', quality: 0.98},
            html2canvas: {
                scale: 2,
                useCORS: true,
                allowTaint: false
            },
            jsPDF: {unit: 'in', format: 'a4', orientation: 'portrait'}
        };

        html2pdf().set(opt).from(element).toPdf().get('pdf').then(function (pdf) {
            const blob = pdf.output('blob');
            const url = URL.createObjectURL(blob);
            window.open(url, '_blank');
        });
    });
});
