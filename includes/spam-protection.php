<?php

/**
 * Email obfuscation
 */
if(get_option('obfuscate_email_addresses')) {

    function cgit_obfuscate($str) {
        $output = '';
        $forbidden = array('@', '.', ':');
        for($i = 0; $i < strlen($str); $i++) {
            $obfuscate = in_array($str[$i], $forbidden) ? 1 : rand(0, 1);
            if($obfuscate) {
                $output .= '&#' . ord($str[$i]) . ';';
            } else {
                $output .= $str[$i];
            }
        }
        return $output;
    }

    function cgit_obfuscate_link($str, $text = false) {
        $protocol = obfuscate('mailto:');
        $address = obfuscate($str);
        $output = '<a href="' . $protocol . $address . '">';
        if($text) {
            $output .= $text;
        } else {
            $output .= $address;
        }
        $output .= '</a>';
        return $output;
    }

    function cgit_obfuscate_callback($matches) {
        return cgit_obfuscate($matches[0]);
    }

    function cgit_obfuscate_email_addresses($content) {
        $content = preg_replace_callback('/(mailto:)?[\w\.\-]+@([\w\-]+\.)+[a-zA-Z]+/', 'cgit_obfuscate_callback', $content);
        return $content;
    }

    add_filter('the_content', 'cgit_obfuscate_email_addresses', 1000);

}
