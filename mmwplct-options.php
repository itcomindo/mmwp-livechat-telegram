<?php

/**
 * MM WP Live Chat Telegram
 */

defined('ABSPATH') or die('No script kiddies please!');


function mmwplct_plugin_menu()
{
    add_menu_page(
        'MM WP Live Chat Telegram Options', // Page title
        'MM WP Live Chat Telegram', // Menu title
        'manage_options', // Capability
        'mm-wp-live-chat-telegram', // Menu slug
        'mmwplct_options_page', // Function to display the options page
        'dashicons-admin-comments', // Icon
        99 // Position
    );
}

function mmwplct_options_page()
{
?>
    <div class="wrap">
        <h1>MM WP Live Chat Telegram Options</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('mmwplct_options_group');
            do_settings_sections('mm-wp-live-chat-telegram');
            submit_button();
            ?>
        </form>
    </div>
<?php
}

function mmwplct_register_settings()
{
    register_setting('mmwplct_options_group', 'mmwplct_telegram_id', 'sanitize_text_field');
    add_settings_section(
        'mmwplct_main_section',
        'Main Settings',
        'mmwplct_section_text',
        'mm-wp-live-chat-telegram'
    );
    add_settings_field(
        'mmwplct_telegram_id',
        'Telegram ID',
        'mmwplct_display_telegram_id_field',
        'mm-wp-live-chat-telegram',
        'mmwplct_main_section'
    );
}

function mmwplct_section_text()
{
    echo '<p>Enter your settings below:</p>';
}

function mmwplct_display_telegram_id_field()
{
    $option = get_option('mmwplct_telegram_id');
    echo "<input id='mmwplct_telegram_id' name='mmwplct_telegram_id' type='text' value='" . esc_attr($option) . "' />";
}

add_action('admin_init', 'mmwplct_register_settings');
add_action('admin_menu', 'mmwplct_plugin_menu');
