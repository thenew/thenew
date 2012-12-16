<?php
/*
Plugin Name: resize-on-upload
Version: 1.0.1
Plugin URI: http://blog.yeticode.co.uk/resize-on-upload
Description: Provides the ability to set a maximum width or height an uploaded image can be, if the image is larger then it is resized.
Author: John Tindell
Author URI: http://blog.yeticode.co.uk/
*/
if ( ! class_exists( 'ROU_Admin' ) ) {

	class ROU_Admin{
		public function check_image_size($array){
			if(eregi("image",$array['type'])){
				// the content type says its an image so lets run with it
				$path_to_file = $array['file'];
				// check the width and height against the maximum allowed
				$image_size = getimagesize($path_to_file);
				// if they are greater then scale the image down
				$options = get_option('ROU_Options',"");

				// ok actually check the size of the image and not just 
				// ignore it like....
				if($image_size[0] >  $options['rou_max_width'] || $image_size[1] > $options['rou_max_height']){
					$new_path = image_resize( $path_to_file, $options['rou_max_width'], $options['rou_max_height'] );
					// wp-include/media.php/image_resize()
					// DEBUG dump the array info in the options
					update_option('ROU_attach_id',$new_path);
					unlink($path_to_file);
					rename($new_path,$path_to_file);
				}
				// save image
			}
			return $array;
		} // end check_image_size

		public function add_config_page() {
			global $wpdb;
			if ( function_exists('add_options_page') ) {
				add_options_page('Resize-on-Upload Configuration', 'Resize-on-Upload', 9, basename(__FILE__), array('ROU_Admin','config_page'));
			}
		} // end add_PA_config_page()


		function config_page() {

			if ( isset($_POST['submit']) ) {
				// check that the user can edit the settings
				if (!current_user_can('manage_options')) die(__('You cannot edit the Piwik Analytics options.'));

				if(isset($_POST['rou_max_width'])){
					$options['rou_max_width'] = intval($_POST['rou_max_width']);
				}
				if(isset($_POST['rou_max_height'])){
					$options['rou_max_height'] = intval($_POST['rou_max_height']);
				}
				update_option('ROU_Options',$options);
				echo "<div class='updated fade-ff0000'><p><strong>Your settings have been saved..</p></div>";
			}
			$options  = get_option('ROU_Options',"");

			?>
				<div id="poststuff" class="metabox-holder has-right-sidebar">
					<h2>Resize-on-Upload Options</h2>
					<form method="post">
						<div class="postbox">
							<h3 class="hndle"><span>Sizes</span></h3>
							<p>
								These are the maximum width and height that an uploaded image can be, if an uploaded image is larger than these then
								it will be scaled to the maximum value.
							</p>
							<div class="inside">
								<ul>
									<li>
										<label>	
											Max Width: <input name="rou_max_width" type="text" value="<?php echo $options['rou_max_width']; ?>"/>
										</label>
									</li>
									<li>
										<label>	
											Max Height: <input name="rou_max_height" type="text" value="<?php echo $options['rou_max_height']; ?>"/>
										</label>
									</li>
									<li>
										<input type="submit" name="submit" value="Save" />
									</li>
								</ul>
							</div>						
						</div>
					</form>
				</div>
			<?php
		} // end config_page()

	} // END ROU_Admin
}
// setup the options
$options  = get_option('ROU_Options',"");

// options are blank so lets set the defaults
if ($options == "") {
	$options['rou_max_width'] = 1200;
	$options['rou_max_height'] = 800;
	update_option('ROU_Options',$options);
}

add_action('wp_handle_upload', array('ROU_Admin','check_image_size'));
// adds the menu item to the admin interface
add_action('admin_menu', array('ROU_Admin','add_config_page'));

