# Castlegate IT Core Plugin

Castlegate IT Core is a WordPress plugin that makes it easy to tweak the admin
interface and HTML output of any WordPress site.

## Features

### Options

*   Hide the admin toolbar
*   Hide menu items in the Dashboard for non-admin users
*   Hide presentational markup controls
*   Hide media upload/insert controls
*   Hide update notifications for non-admin users
*   Remove `title`, `width`, and `height` attributes from images
*   Obfuscate email addresses
*   Change excerpt length and ellipsis
*   Change the welcome message
*   Force all TinyMCE pasting to be plaintext

### Functions

The Core plugin also defines a few useful functions that can be used anywhere
in your WordPress theme.

*   `cgit_obfuscate($str)` returns an obfuscated version of `$str` for use
    with email addresses.
*   `cgit_obfuscate_link($str, $text)` returns a complete `mailto:` link to
    the email address `$str`. You can use `$text` to set the text of the link;
    otherwise it defaults to `$str` (also obfuscated).

## Installation

Copy the plugin directory into the `wp-content/plugins` directory in the
WordPress directory. Then go to the Plugins screen and click Activate Plugin.
See the [WordPress documentation](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation)
for more details. 

## License

Released under the [MIT License](http://www.opensource.org/licenses/MIT). See
[LICENSE](LICENSE) for details.
