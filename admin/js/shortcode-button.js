
(function () {
    tinymce.PluginManager.add('shortcode_button', function (editor) {

        console.log(editor);

        editor.addButton('shortcode_button', {
            tooltip: 'Add shortcode',
            image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAADNSURBVHgB3VTBDcIwDDRt+MMEMAYSA/DgywYwCQvxYwHYAEaBR9VCcaJDCiY25gknnerYl0scpSH6J9RZHDRRZQhkbsbsmRfm3aFP4pwSO+aNuXXqU7I1BA12NhWGrWXYKy0EUQ/avIp0dPgOmAvEZ4w7ckBrNRocUNtg7JmnF7La+Jt5WmFEvsUSrDOMiO2tEB/pvV0TpV1EgxPySyobulsOIj8s1D4ayos9QdwYG3i52PIM5f+4hnhPOoI3GRe7wnDu0Ksv0BO1Ev84HqfKTmynoliVAAAAAElFTkSuQmCC',
            onclick: function () {
                const forms = ajax_params.shortcodes;

                if (!forms || !forms.length) {
                    alert("Shortcodes not found!");
                    return;
                }

                editor.windowManager.open({
                    title: 'Select Shortcode',
                    body: [
                        {
                            type: 'listbox',
                            name: 'custom_shortcode',
                            label: 'Shortcode',
                            values: forms
                        }
                    ],
                    onsubmit: function (e) {
                        const shortcode = e.data.custom_shortcode;
                        if (shortcode) {
                            editor.insertContent('[' + shortcode + ']');
                        }
                    }
                });
            }
        });



    });
})();
