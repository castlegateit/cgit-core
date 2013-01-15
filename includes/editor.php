<?php

/**
 * Editor settings
 */

/**
 * Hide media upload/insert control
 */
if(get_option('editor_hide_media')) {

    function cgit_hide_media() {
        remove_action('media_buttons', 'media_buttons');
    }

    add_action('admin_head', 'cgit_hide_media');

}

/**
 * Hide editor controls
 *
 * Can also add controls by adding to this array. See
 * http://www.tinymce.com/wiki.php/Buttons/controls for a complete list of
 * buttons.
 */
if(get_option('editor_hide_controls')) {

    function cgit_hide_editor_controls($controls) {
        $old_controls = array(
            'forecolor',
            'indent',
            'justifycenter',
            'justifyfull',
            'justifyleft',
            'justifyright',
            'outdent',
            'strikethrough',
            'underline',
        );
        $new_controls = array_diff($controls, $old_controls);
        return $new_controls;
    }

    add_filter('mce_buttons', 'cgit_hide_editor_controls');
    add_filter('mce_buttons_2', 'cgit_hide_editor_controls');

}
