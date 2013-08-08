<?php

/**
 * Register plugin settings
 */
function cgit_register_settings() {

    // Toolbar
    register_setting('cgit_core', 'hide_toolbar');

    // Interface
    register_setting('cgit_core', 'hide_posts');
    register_setting('cgit_core', 'hide_media');
    register_setting('cgit_core', 'hide_links');
    register_setting('cgit_core', 'hide_pages');
    register_setting('cgit_core', 'hide_comments');
    register_setting('cgit_core', 'hide_categories');
    register_setting('cgit_core', 'hide_tags');

    // Editor
    register_setting('cgit_core', 'editor_hide_media');
    register_setting('cgit_core', 'editor_hide_controls');

    // Image attributes
    register_setting('cgit_core', 'remove_image_titles');
    register_setting('cgit_core', 'remove_image_dimensions');

    // Email obfuscation
    register_setting('cgit_core', 'obfuscate_email_addresses');

    // Excerpts
    register_setting('cgit_core', 'excerpt_length');
    register_setting('cgit_core', 'excerpt_more');

    // Notifications
    register_setting('cgit_core', 'hide_update_notifications');

    // Welcome message
    register_setting('cgit_core', 'welcome_message');

}

/**
 * Add plugin menu page
 */
add_action('admin_menu', 'cgit_add_settings_page');

function cgit_add_settings_page() {

    // Add page
    add_menu_page(
        'Core Settings',
        'Core Settings',
        'manage_options',
        'cgit-core',
        'cgit_render_settings_page'
    );

    // Register settings
    add_action('admin_init', 'cgit_register_settings');

}

/**
 * Render settings page content
 */
function cgit_render_settings_page() {

?>

<div class="wrap">

    <h2>WordPress Core Settings</h2>

    <form action="options.php" method="post">

        <?php settings_fields('cgit_core'); ?>

        <h3>Interface</h3>

        <table class="form-table">

            <tr>
                <th>
                    Toolbar
                </th>
                <td>
                    <label>
                        <input type="checkbox" name="hide_toolbar" value="1"<?php echo get_option('hide_toolbar') ? ' checked="checked"' : ''; ?> />
                        Hide toolbar for all users when viewing the site
                    </label>
                </td>
            </tr>

            <tr>
                <th rowspan="5">
                    Hide main menus
                </th>
                <td>
                    <label>
                        <input type="checkbox" name="hide_posts" value="1"<?php echo get_option('hide_posts') ? ' checked="checked"' : ''; ?> />
                        Posts
                    </label>
                </td>
            </tr>

            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="hide_media" value="1"<?php echo get_option('hide_media') ? ' checked="checked"' : ''; ?> />
                        Media
                    </label>
                </td>
            </tr>

            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="hide_links" value="1"<?php echo get_option('hide_links') ? ' checked="checked"' : ''; ?> />
                        Links
                    </label>
                </td>
            </tr>

            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="hide_pages" value="1"<?php echo get_option('hide_pages') ? ' checked="checked"' : ''; ?> />
                        Pages
                    </label>
                </td>
            </tr>

            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="hide_comments" value="1"<?php echo get_option('hide_comments') ? ' checked="checked"' : ''; ?> />
                        Comments
                    </label>
                </td>
            </tr>

            <tr>
                <th rowspan="2">
                    Hide taxonomy menus
                </th>
                <td>
                    <label>
                        <input type="checkbox" name="hide_categories" value="1"<?php echo get_option('hide_categories') ? ' checked="checked"' : ''; ?> />
                        Categories
                    </label>
                </td>
            </tr>

            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="hide_tags" value="1"<?php echo get_option('hide_tags') ? ' checked="checked"' : ''; ?> />
                        Tags
                    </label>
                </td>
            </tr>

        </table>

        <h3>Editor</h3>

        <table class="form-table">

            <tr>
                <th rowspan="2">
                    Hide editor controls
                </th>
                <td>
                    <label>
                        <input type="checkbox" name="editor_hide_media" value="1"<?php echo get_option('editor_hide_media') ? ' checked="checked"' : ''; ?> />
                        Media button
                    </label>
                </td>
            </tr>

            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="editor_hide_controls" value="1"<?php echo get_option('editor_hide_controls') ? ' checked="checked"' : ''; ?> />
                        Presentational markup controls
                    </label>
                </td>
            </tr>

        </table>

        <h3>Images</h3>

        <table class="form-table">

            <tr>
                <th rowspan="2">
                    Remove image attributes
                </th>
                <td>
                    <label>
                        <input type="checkbox" name="remove_image_titles" value="1"<?php echo get_option('remove_image_titles') ? ' checked="checked"' : ''; ?> />
                        Titles
                    </label>
                </td>
            </tr>

            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="remove_image_dimensions" value="1"<?php echo get_option('remove_image_dimensions') ? ' checked="checked"' : ''; ?> />
                        Dimensions
                    </label>
                </td>
            </tr>

        </table>

        <h3>Spam protection</h3>

        <table class="form-table">

            <tr>
                <th>
                    Obfuscate content
                </th>
                <td>
                    <label>
                        <input type="checkbox" name="obfuscate_email_addresses" value="1"<?php echo get_option('obfuscate_email_addresses') ? ' checked="checked"' : ''; ?> />
                        Email addresses
                    </label>
                </td>
            </tr>

        </table>

        <h3>Excerpts</h3>

        <table class="form-table">

            <tr>
                <th>
                    <label for="excerpt_length">Excerpt length</label>
                </th>
                <td>
                    <input type="text" name="excerpt_length" id="excerpt_length" value="<?php echo get_option('excerpt_length'); ?>" />
                </td>
            </tr>

            <tr>
                <th>
                    <label for="excerpt_more">Excerpt ellipsis</label>
                </th>
                <td>
                    <input type="text" name="excerpt_more" id="excerpt_more" value="<?php echo htmlspecialchars(get_option('excerpt_more')); ?>" />
                </td>
            </tr>

        </table>

        <h3>Notifications</h3>

        <table class="form-table">

            <tr>
                <th>
                    Hide notifications for non-admin users
                </th>
                <td>
                    <label>
                        <input type="checkbox" name="hide_update_notifications" value="1"<?php echo get_option('hide_update_notifications') ? ' checked="checked"' : ''; ?> />
                        Update notifications
                    </label>
                </td>
            </tr>

        </table>

        <h3>Welcome message</h3>

        <table class="form-table">

            <tr>
                <th>
                    <label for="welcome_message">Salutation (default "Howdy,")</label>
                </th>
                <td>
                    <input type="text" name="welcome_message" id="welcome_message" value="<?php echo htmlspecialchars(get_option('welcome_message')); ?>" />
                </td>
            </tr>

        </table>

        <?php submit_button(); ?>

    </form>

</div>

<?php

}
