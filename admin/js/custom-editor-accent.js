(function () {
    tinymce.PluginManager.add('editor_acccent', function (editor) {

        function createRateHtml(rate, subtitle, layout) {
            const rateEncoded = tinymce.DOM.encode(rate);
            const subtitleEncoded = tinymce.DOM.encode(subtitle);
            const layoutClass = layout === 'row' ? 'row' : 'column';

            return `  
                <div class="rate-highlight ${layoutClass}">
                    <span class="rate-highlight__value">${rateEncoded}</span>
                    <span class="rate-highlight__text">${subtitleEncoded}</span>
                </div>  
            `;
        }

        function openRateDialog(existingBlock = null) {
            const existingRate = existingBlock?.querySelector('.rate-highlight__value')?.textContent.trim() || '';
            const existingText = existingBlock?.querySelector('.rate-highlight__text')?.textContent.trim() || '';
            const existingClass = existingBlock?.classList.contains('rate-highlight--row') ? 'row' : 'column';

            const dialogApi = editor.windowManager.open({
                title: existingBlock ? 'Edit Accent' : 'Insert Accent',
                body: [
                    {
                        type: 'textbox',
                        name: 'rate',
                        label: 'Accent value',
                        value: existingRate,
                        minWidth: 300
                    },
                    {
                        type: 'textbox',
                        name: 'text',
                        label: 'Accent text',
                        value: existingText,
                        minWidth: 300
                    },
                    {
                        type: 'listbox',
                        name: 'layout',
                        label: 'Layout',
                        values: [
                            { text: 'Column', value: 'column' },
                            { text: 'Row', value: 'row' }
                        ],
                        value: existingClass
                    }
                ],
                buttons: [
                    { text: 'Cancel', onclick: 'close' },
                    existingBlock ? {
                        text: 'Delete',
                        onclick: function () {
                            existingBlock.remove();
                            dialogApi.close();
                        }
                    } : null,
                    {
                        text: existingBlock ? 'Update' : 'Insert',
                        classes: 'widget btn-primary',
                        onclick: function () {
                            dialogApi.submit();
                        }
                    }
                ].filter(Boolean),
                onsubmit: function (e) {
                    const rate = e.data.rate.trim();
                    const subtitle = e.data.text.trim();
                    const layout = e.data.layout || 'column';
                    if (!rate || !subtitle) return;

                    const html = createRateHtml(rate, subtitle, layout);

                    if (existingBlock) {
                        existingBlock.outerHTML = html;
                    } else {
                        editor.insertContent(html);
                    }
                }
            });
        }




        editor.addButton('editor_acccent', {
            text: ' Accent value',
            icon: 'table',
            onclick: function () {
                openRateDialog();
            }
        });

        editor.on('click', function (e) {
            const node = e.target;
            if (!node || node.nodeType !== 1) return;

            const wrapper = node.closest('.rate-highlight');
            if (wrapper) {
                editor.selection.select(wrapper);
                openRateDialog(wrapper);
                e.preventDefault();
                e.stopPropagation();
            }
        });

    });
})();
