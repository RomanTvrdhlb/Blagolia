import CustomSelect from "../functions/scripts/select";

document.addEventListener('DOMContentLoaded', () => {
    const selects = document.querySelectorAll('.default-select');

    selects.forEach(function (select) {

        const isMultiple = select.classList.contains('multiple');

        const customSelect = new CustomSelect(select, {
            mode: isMultiple ? 'multiple' : 'single',
            placeholder: 'Select option',
            name: select.getAttribute('data-name') || '',
            hideOnSelect: !isMultiple,
            hideOnClear: isMultiple,
            showRemoveButton: isMultiple
        });

        select.CustomSelectInstance = customSelect;

        if (select.getAttribute('data-additional')) {

            customSelect.onSelect((value) =>  {
                document.querySelector(`[data-target='${select.getAttribute('data-additional')}']`).innerHTML = value
            });
        }
    });
});
