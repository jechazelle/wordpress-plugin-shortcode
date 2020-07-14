(function() {
    tinymce.PluginManager.add('show_path_mce_button_show_path', function( editor, url ) {
        editor.addButton('show_path_mce_button_show_path', {
            text: '🗂',
            tooltip: 'Ajouter un chemin',
            icon: false,
            onclick: function() {
                editor.insertContent('[show-path path=""] ');
            }
        });
    });
})();
