(function () {
    tinymce.PluginManager.add('frame_selector', function (editor) {

        function createCaptionHtml(text) {
            const safeText = tinymce.DOM.encode(text);
            return `<div class="caption"><span>${safeText}</span></div>`;
        }

        function openCaptionDialog(existingCaption = null) {
            const existingText = existingCaption
                ? (existingCaption.querySelector('span')?.textContent.trim() || existingCaption.textContent.trim())
                : '';

            const dialogApi = editor.windowManager.open({
                title: existingCaption ? 'Edit Caption' : 'Insert Caption',
                body: [
                    {
                        type: 'textbox',
                        name: 'caption_text',
                        label: 'Caption Text:',
                        multiline: true,
                        minWidth: 300,
                        minHeight: 100,
                        value: existingText
                    }
                ],
                buttons: [
                    { text: 'Cancel', onclick: 'close' },
                    existingCaption ? {
                        text: 'Delete',
                        onclick: function () {
                            existingCaption.remove();
                            dialogApi.close();
                        }
                    } : null,
                    {
                        text: existingCaption ? 'Update' : 'Insert',
                        classes: 'widget btn-primary',
                        onclick: function () {
                            dialogApi.submit();
                        }
                    }
                ].filter(Boolean),
                onsubmit: function (e) {
                    const captionText = e.data.caption_text.trim();
                    if (!captionText) return;

                    if (existingCaption) {
                        existingCaption.innerHTML = `<span>${tinymce.DOM.encode(captionText)}</span>`;
                    } else {
                        const captionHtml = createCaptionHtml(captionText);
                        editor.insertContent(captionHtml);
                    }
                }
            });
        }

        editor.addButton('frame_selector', {
            text: 'Map Caption',
            icon: false,
            onclick: function () {
                openCaptionDialog();
            }
        });

        editor.on('click', function (e) {
            const node = e.target;
            if (!node || node.nodeType !== 1) return;

            const caption = node.closest('.caption');
            if (caption) {
                try {
                    editor.selection.select(caption);
                } catch (err) {
                    console.warn('Selection failed:', err);
                }

                openCaptionDialog(caption);
                e.preventDefault();
                e.stopPropagation();
            }
        });

    });
})();
