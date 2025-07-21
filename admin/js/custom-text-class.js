(function () {
    tinymce.PluginManager.add('link_text_selector', function (editor) {

        editor.on('init', function() {
            const iframeBody = editor.getBody();

            if (iframeBody) {
                iframeBody.style.background = '#e5e5e5';
            }
        });

        editor.addButton('link_text_selector', {
            type: 'menubutton',
            text: 'Typograpy',
            icon: 'settings',
            tooltip: 'Add custom style to <P>',
            menu: [
                {
                    text: 'h1',
                    onclick: function () {
                        updateLinkClass('h1');
                    }
                },
                {
                    text: 'h2',
                    onclick: function () {
                        updateLinkClass('h2');
                    }
                },
                {
                    text: 'h3',
                    onclick: function () {
                        updateLinkClass('h3');
                    }
                },
                {
                    text: 'h4',
                    onclick: function () {
                        updateLinkClass('h4');
                    }
                },
                {
                    text: 'pretitle',
                    onclick: function () {
                        updateLinkClass('pretitle');
                    }
                },
            ]
        });

        function updateLinkClass(className) {
            const node = editor.selection.getNode();

            console.log(node)

            // if (node.nodeName !== 'p') {
            //     alert('not p');
            //     return;
            // }

            node.setAttribute('class', className);
        }
    });
})();
