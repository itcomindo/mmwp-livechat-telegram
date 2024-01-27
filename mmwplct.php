<?php

/**
 * Plugin Name: MM WP Live Chat Telegram
 * Plugin URI: https://budiharyono.id/
 * Description: Live Chat Telegram
 * Version: v1.0.0
 * Author: Budi Haryono
 * Author URI: https://budiharyono.id/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') or die('No script kiddies please!');

require_once(plugin_dir_path(__FILE__) . 'mmwplct-options.php');



function mmwplct_live_chat_telegram()
{
    $mmwplct_telgram_id = get_option('mmwplct_telegram_id');
?>
    <script>
        window.intergramId = "<?php echo esc_html($mmwplct_telgram_id); ?>";
        window.intergramCustomizations = {
            titleClosed: 'Live Chat',
            titleOpen: 'Live Chat',
            introMessage: 'Pesan pertama saat chat dibuka',
            autoResponse: 'Pesan yang dikirim setelah pengguna mengirim pesan pertamanya',
            autoNoResponse: 'Pesan yang dikirim satu menit setelah pengguna mengirim pesan pertamanya ' +
                'dan tidak ada tanggapan yang diterima',

            //Bisa berupa warna yang didukung css 'red', 'rgb(255,87,34)', dll
            mainColor: "green",

            //Gunakan tombol mengambang seluler juga pada layar besar
            alwaysUseFloatingButton: false
        };
    </script>
    <script id="intergram" type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script>
<?php
}

add_action('wp_footer', 'mmwplct_live_chat_telegram');




function mmwplct_load_styles()
{
    wp_enqueue_style('mmwplct-style', plugin_dir_url(__FILE__) . 'mmwplct-style.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'mmwplct_load_styles');
