<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://gitlab.com/arturromaorocha
 * @since             1.0.0
 * @package           Tabchat
 *
 * @wordpress-plugin
 * Plugin Name:       Tabchat
 * Plugin URI:        https://tabchat.com.br/
 * Description:       Integração de widget com Tabchat. 
 * Plugin de integração com tabchat
 * Version:           1.0.0
 * Author:            Artur Romão Rocha
 * Author URI:        https://gitlab.com/arturromaorocha
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tabchat
 * Domain Path:       /languages
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
 
define( 'TABCHAT_WIDGET_PATH', plugin_dir_path( __FILE__ ) );
define( 'TABCHAT_WIDGET_URL', plugins_url('/', __FILE__ ) );
define( 'TABCHAT_WIDGET__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( "TABCHAT_WIDGET_LICENSE", true );
 
require_once('inc/TABCHAT_WIDGET_-init.php');

new tabchatwidget_main();

?>