<?php

/**
 * Welcome message settings
 */

/**
 * Edit welcome message
 */
if ( get_option('welcome_message') ) {

    function replace_welcome_message( $wp_admin_bar ) {
        $account    = $wp_admin_bar->get_node('my-account');
        $salutation = get_option('welcome_message');
        $title      = str_replace( 'Howdy,', $salutation, $account->title );
        $wp_admin_bar->add_node(
            array(
                'id' => 'my-account',
                'title' => $title,
            )
        );
    }

    add_filter( 'admin_bar_menu', 'replace_welcome_message', 25 );

}
