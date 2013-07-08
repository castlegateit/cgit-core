<?php

/**
 * Notification settings
 */

/**
 * Hide notifications
 */
function cgit_hide_notifications() {
    if (!current_user_can('manage_options')) {
        remove_action('admin_notices', 'update_nag', 3);
    }
}

if (get_option('hide_update_notifications')) {
    add_action('admin_menu', 'cgit_hide_notifications');
}
