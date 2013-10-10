<?php

/**
 * Edit image attributes
 */

/**
 * Remove image titles
 */
if(get_option('remove_image_titles')) {

    function cgit_remove_image_titles($content) {
        $content = preg_replace('/(<img[^>]+)title="[^"]*"([^>]*>)/', '$1$2', $content);
        $content = preg_replace('/ {2,}/', ' ', $content);
        return $content;
    }

    add_filter('the_content',               'cgit_remove_image_titles', 1000);
    add_filter('post_thumbnail_html',       'cgit_remove_image_titles', 1000);
    add_filter('wp_get_attachment_image',   'cgit_remove_image_titles', 1000);

}

/**
 * Remove image dimensions
 */
if(get_option('remove_image_dimensions')) {

    function cgit_remove_image_dimensions($content) {
        $content = preg_replace('/(<img[^>]+)width="[^"]*"([^>]*>)/', '$1$2', $content);
        $content = preg_replace('/(<img[^>]+)height="[^"]*"([^>]*>)/', '$1$2', $content);
        $content = preg_replace('/ {2,}/', ' ', $content);
        return $content;
    }

    add_filter('the_content',               'cgit_remove_image_dimensions', 1000);
    add_filter('post_thumbnail_html',       'cgit_remove_image_dimensions', 1000);
    add_filter('wp_get_attachment_image',   'cgit_remove_image_dimensions', 1000);

}
