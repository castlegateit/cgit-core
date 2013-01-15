<?php

/*

Plugin Name: Castlegate IT Core Plugin
Plugin URI: http://github.com/castlegateit/cgit-core
Description: Castlegate IT Core is a WordPress plugin that makes it easy to tweak the admin interface and HTML output of any WordPress site.
Castlegate IT Core is a WordPress plugin that makes it easy to tweak the admin
Version: 1.0
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

Copyright (c) 2012 Castlegate IT

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

*/

/**
 * Settings and definitions
 */
define('CGIT_CORE_PATH', plugin_dir_path(__FILE__));

/**
 * Admin interface
 */
include CGIT_CORE_PATH . 'options.php';

/**
 * Core plugin functions
 */
include CGIT_CORE_PATH . 'includes/interface.php';
include CGIT_CORE_PATH . 'includes/editor.php';
include CGIT_CORE_PATH . 'includes/image-attributes.php';
include CGIT_CORE_PATH . 'includes/spam-protection.php';
include CGIT_CORE_PATH . 'includes/excerpt.php';
