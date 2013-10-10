<?php

/**
 * Excerpt settings
 */

/**
 * Edit excerpt length
 */
if(get_option('excerpt_length')) {

    function cgit_edit_excerpt_length($len) {
        return get_option('excerpt_length');
    }

    add_filter('excerpt_length', 'cgit_edit_excerpt_length');

}

/**
 * Edit excerpt ellipsis
 */
if(get_option('excerpt_more')) {

    function cgit_edit_excerpt_more($more) {
        return get_option('excerpt_more');
    }

    add_filter('excerpt_more', 'cgit_edit_excerpt_more');

}
