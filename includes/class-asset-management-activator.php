<?php

/**
 * Fired during plugin activation
 *
 * @link       http://yupscode.com/
 * @since      1.0.0
 *
 * @package    Asset_Management
 * @subpackage Asset_Management/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Asset_Management
 * @subpackage Asset_Management/includes
 * @author     Damian Kudosz <damiankudosz1990@gmail.com>
 */
class Asset_Management_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		
		create_db_table();
		
	}

}

function create_db_table() {
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE `am_saved_scripts` (
		script_num int,
		script_id var_char(255)
	) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}
