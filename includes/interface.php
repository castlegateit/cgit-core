<?php

/**
 * Interface settings
 */

/**
 * Hide menu items
 */
function cgit_hide_menu_items() {

    if (!current_user_can('manage_options')) {

        if(get_option('hide_posts'))        remove_menu_page('edit.php'); // Posts
        if(get_option('hide_media'))        remove_menu_page('upload.php'); // Media
        if(get_option('hide_links'))        remove_menu_page('link-manager.php'); // Links
        if(get_option('hide_pages'))        remove_menu_page('edit.php?post_type=page'); // Pages
        if(get_option('hide_comments'))     remove_menu_page('edit-comments.php'); // Comments

        if(get_option('hide_categories'))   remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category'); // Posts | Categories
        if(get_option('hide_tags'))         remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // Posts | Tags

        if(get_option('hide_profile'))      remove_menu_page('profile.php'); // Profile
        if(get_option('hide_tools'))        remove_menu_page('tools.php'); // Tools

    }

}

add_action('admin_menu', 'cgit_hide_menu_items');
