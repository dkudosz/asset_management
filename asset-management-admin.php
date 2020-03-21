<?php
/*** Create Admin page ***/
add_action( 'admin_menu', 'am_admin_menu' );
function am_admin_menu() {
	add_menu_page(
		__( 'Asset Management', 'asset-management' ),
		__( 'Asset Management', 'asset-management' ),
		'manage_options',
		'asset-management',
		'am_admin_page_contents',
		'dashicons-schedule',
		50
	);
}
/*** END Create Admin page ***/

/*** Plugin Contants ***/
function am_admin_page_contents() {
	global $wpdb;

	$user = $wpdb->get_results( "SELECT * FROM am_saved_scripts" );
	
	foreach ($user as $row){ ?>
		<tr>
			<th><label for="script_num"><?php _e("script_num"); ?></label></th>
			<td>
				<input type="text" name="script_num" id="script_num" value="<?php echo $row->script_num ?>" class="regular-text" /><br />
			</td>
		</tr>
	<?php } ?>
	
		<h1>
			<?php esc_html_e( 'Asset Management', 'my-plugin-textdomain' ); ?>
		</h1>
		<p>This plugin allowes you to add already existing scripts that you want to block or allow to run on specific pages.</p>
		<p>Blocking unused scripts on spcific pages greatly improved performance scores.</p>
		
		<form class="am_script_form" method="post">
			<input type="text" name="scripts[]" value="" placeholder="SCRIPT ID" />
			<?php echo list_pages(); ?>
			
			
			<button class="remove" id="remove_script">REMOVE</button>
			<br>
			<button class="add" id="add_script">ADD</button>
			<br>
			<input type="submit" name="submit" value="SAVE" />
		</form>
	<?php
}
/*** END Plugin Contants ***/

/*** List of pages ***/
function list_pages() {
	ob_start();
	
	?>
	<select name="pages"> 
		<option value=""><?php echo esc_attr( __( 'Select page' ) ); ?></option> 
		<?php 
		$pages = get_pages(); 
		foreach ( $pages as $page ) {
			$option = '<option value="'.$page->ID.'">';
			$option .= $page->post_title;
			$option .= '</option>';
				echo $option;
		}
		?>
	</select>
	
	<?php
	return ob_get_clean();
}
/*** END List of pages ***/

/*** Insert into database ***/
if($_POST) {
	$scripts = $_POST['scripts'];
	
	foreach($scripts as $script) {
		
	}
	
	echo '<pre>';
	print_r($scripts);
	echo '</pre>';

}
/*** END Insert into database ***/