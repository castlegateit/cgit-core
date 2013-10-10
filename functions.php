<?php

/**
 * Obfuscate string
 */
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

/**
 * Generate obfuscated email link
 */
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
