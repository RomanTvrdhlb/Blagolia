(function () {


    tinymce.PluginManager.add('link_style_selector', function (editor) {

        editor.on('init', function() {
            const iframeBody = editor.getBody();

            if (iframeBody) {
                iframeBody.style.background = '#e5e5e5';

                iframeBody.addEventListener('click', () => {
                    console.log('Клик по редактору');
                });
            } else {
                console.warn('iframeBody недоступен');
            }
        });


        editor.addButton('link_style_selector', {
            type: 'menubutton',
            text: 'BTN Style',
            icon: 'settings',
            tooltip: 'Accept class',
            menu: [
                {
                    text: 'Yellow Button',
                    onclick: function () {
                        updateLinkClass('main-button');
                    }
                },
                {
                    text: 'Transparent Button',
                    onclick: function () {
                        updateLinkClass('main-button main-button--transparent');
                    }
                },
                {
                    text: 'White Button',
                    onclick: function () {
                        updateLinkClass('main-button main-button--white');
                    }
                }
            ]
        });

        function updateLinkClass(className) {
            const node = editor.selection.getNode();
            if (node.nodeName !== 'A') {
                alert('Выдели ссылку, чтобы применить класс.');
                return;
            }
            node.setAttribute('class', className);
        }
    });
})();
