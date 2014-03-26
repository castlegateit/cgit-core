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
            'wp_more'
        );
        $new_controls = array_diff($controls, $old_controls);
        return $new_controls;
    }

    add_filter('mce_buttons', 'cgit_hide_editor_controls');
    add_filter('mce_buttons_2', 'cgit_hide_editor_controls');

}


/**
 * Force pasted content to be text-only
 *
 * Based on GNU-licensed code by Till Krüss (www.tillkruess.com)
 * 
 */
if (get_option('editor_plaintext_paste')) {
    
	function forcePasteAsPlainText( $mceInit ) {
		$mceInit[ 'paste_text_sticky' ] = true;
		$mceInit[ 'paste_text_sticky_default' ] = true;
		return $mceInit;
	}
    
	function loadPasteInTeeny( $plugins ) {
		$plugins[] = 'paste';
		return $plugins;
	}

	function removePasteAsPlainTextButton( $buttons ) {
		if( ( $key = array_search( 'pastetext', $buttons ) ) !== false ) {
			unset( $buttons[ $key ] );
		}
		return $buttons;
	}
    
    add_filter( 'tiny_mce_before_init', 'forcePasteAsPlainText' );
    add_filter( 'teeny_mce_before_init', 'forcePasteAsPlainText' );
    add_filter( 'teeny_mce_plugins', 'loadPasteInTeeny' );
    add_filter( 'mce_buttons_2', 'removePasteAsPlainTextButton' );
    add_filter( 'mce_buttons', 'removePasteAsPlainTextButton' );
}