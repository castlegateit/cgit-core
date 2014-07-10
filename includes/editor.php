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
 * Hide extra block level elements
 */
if(get_option('editor_hide_block_elements')) {

    function cgit_editor_hide_block_elements($init) {
        $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4';
        return $init;
    }

    add_filter('tiny_mce_before_init', 'cgit_editor_hide_block_elements');

}

/**
 * Force pasted content to be text-only
 *
 * Based on GNU-licensed code by Till Krüss (www.tillkruess.com)
 * 
 */
if (get_option('editor_plaintext_paste')) {

	function forcePasteAsPlainText( $mceInit ) {
        global $tinymce_version;

        if ( $tinymce_version[0] < 4 ) {
            $mceInit[ 'paste_text_sticky' ] = true;
            $mceInit[ 'paste_text_sticky_default' ] = true;
        } else {
            $mceInit[ 'paste_as_text' ] = true;
        }
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
