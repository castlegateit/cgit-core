<?php

/**
 * Email obfuscation
 */
if(get_option('obfuscate_email_addresses')) {

    function cgit_obfuscate_callback($matches) {
        return cgit_obfuscate($matches[0]);
    }

    function cgit_obfuscate_email_addresses($content) {
        $content = preg_replace_callback('/(mailto:)?[\w\.\-]+@([\w\-]+\.)+[a-zA-Z]+/', 'cgit_obfuscate_callback', $content);
        return $content;
    }

    add_filter('the_content', 'cgit_obfuscate_email_addresses', 1000);

}
