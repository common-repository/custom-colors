<?php
/**
 * Plugin Name: Custom Colors
 * Plugin URI: http://www.seosthemes.com
 * Contributors: seosbg
 * Author: seosbg
 * Description: Custom Colors WordPress plugin allows you to change all basic colors in your theme.
 * Version: 1.13
 * License: GPL2
 */

add_action('admin_menu', 'custom_colors_menu');
function custom_colors_menu() {
    add_menu_page('Custom Colors', 'Custom Colors', 'administrator', 'seos-change-color-settings', 'change_colors_settings_page', plugins_url('custom-colors/images/icon.png')
    );

    add_action('admin_init', 'register_change_color_settings');
}

add_action('admin_enqueue_scripts', 'load_seoscolors_admin_scripts');
function load_seoscolors_admin_scripts(){

    wp_enqueue_script('jquery');
	wp_enqueue_style( 'farbtastic' );
    wp_enqueue_script( 'farbtastic' );
}

function register_change_color_settings() {
    register_setting('seos-change-color-settings', 'seos_change_site_title_color');
    register_setting('seos-change-color-settings', 'seos_change_color_header_background');
    register_setting('seos-change-color-settings', 'seos_change_color_navigation_background');
    register_setting('seos-change-color-settings', 'seos_change_color_body_background');
    register_setting('seos-change-color-settings', 'seos_change_color_main_background');
    register_setting('seos-change-color-settings', 'seos_change_color_sidebar_background');
    register_setting('seos-change-color-settings', 'seos_change_color_footer_background');
    register_setting('seos-change-color-settings', 'seos_change_color_label_background');
    register_setting('seos-change-color-settings', 'seos_change_color_form_background');
    register_setting('seos-change-color-settings', 'seos_change_color_input_background');
    register_setting('seos-change-color-settings', 'seos_change_color_h_color');
    register_setting('seos-change-color-settings', 'seos_change_color_strong_color');

}


function change_colors_settings_page() {
?>

    <div class="wrap custom-colors">
		<h1><?php _e('Custom Colors', 'custom-colors'); ?></h1>
        <form action="options.php" method="post" role="form" name="change-colors-form">
		
			<?php settings_fields( 'seos-change-color-settings' ); ?>
			<?php do_settings_sections( 'seos-change-color-settings' ); ?>
		
			<div>
				<a target="_blank" href="https://seosthemes.com/custom-colors/">
					<div class="btn s-red">
						 <?php _e('Buy', 'custom-colors'); echo ' <img class="ss-logo" src="' . plugins_url( 'images/logo.png' , __FILE__ ) . '" alt="logo" />';  _e(' Premium', 'custom-colors'); ?>
					</div>
				</a>
			</div>			
			<?php for ($i = 1; $i < 15; $i++) { ?>
				<script>
					jQuery(document).ready(function($) {
						$('#colorpicker<?php echo $i; ?>').hide();
						$('#colorpicker<?php echo $i; ?>').farbtastic('#color<?php echo $i; ?>');

						$('#color<?php echo $i; ?>').click(function() {
							$('#colorpicker<?php echo $i; ?>').fadeIn();
						});

						$(document).mousedown(function() {
							$('#colorpicker<?php echo $i; ?>').each(function() {
								var display = $(this).css('display');
								if ( display == 'block' )
									$(this).fadeOut();
							});
						});
					});
				</script>
			<?php } ?>
			
			<!-- ------------------- Site Title Color ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Site Title Color', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_site_title_color" id="color1" value="<?php if (esc_html(get_option( 'seos_change_site_title_color'))) : echo esc_html(get_option( 'seos_change_site_title_color')); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker1"></div>
				</div>
			</div>
											
			<!-- ------------------- Header Background Color ------------------ -->
								
			<div class="form-group">
				<label><?php _e('Header Background Color', 'custom-colors'); ?></label>
				<?php get_option( 'seos_change_color_header_background' ); ?>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_header_background" id="color2" value="<?php if (esc_html(get_option( 'seos_change_color_header_background' ))) : echo esc_html(get_option( 'seos_change_color_header_background' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker2"></div>
				</div>
			</div>
											
			<!-- ------------------- Navigation Background Color ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Navigation Background Color', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_navigation_background" id="color3" value="<?php if (esc_html(get_option( 'seos_change_color_navigation_background' ))) : echo esc_html(get_option( 'seos_change_color_navigation_background' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker3"></div>
				</div>
			</div>							
								
			<!-- ------------------- Body Background Color ------------------ -->

			<div class="form-group">
				<label><?php _e('Body Background Color', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_body_background" id="color4" value="<?php if (esc_html(get_option( 'seos_change_color_body_background' ))) : echo esc_html(get_option( 'seos_change_color_body_background' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker4"></div>
				</div>
			</div>
			
			<!-- ------------------- Main Background Color ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Main Background Color', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_main_background" id="color5" value="<?php if (esc_html(get_option( 'seos_change_color_main_background' ))) : echo esc_html(get_option( 'seos_change_color_main_background' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker5"></div>
				</div>
			</div>
			
			<!-- ------------------- Sidebar Background Color ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Sidebar Background Color', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_sidebar_background" id="color6" value="<?php if (esc_html(get_option( 'seos_change_color_sidebar_background' ))) : echo esc_html(get_option( 'seos_change_color_sidebar_background' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker6"></div>
				</div>
			</div>								
								
			<!-- ------------------- Footer Background Color ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Footer Background Color', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_footer_background" id="color7" value="<?php if (esc_html(get_option( 'seos_change_color_footer_background' ))) : echo esc_html(get_option( 'seos_change_color_footer_background' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker7"></div>
				</div>
			</div>
			
			<!-- ------------------- Label Color ------------------ -->
								
			<div class="form-group">
				<label><?php _e('Label Color', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_label_background" id="color8" value="<?php if (esc_html(get_option( 'seos_change_color_label_background' ))) : echo esc_html(get_option( 'seos_change_color_label_background' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker8"></div>
				</div>
			</div>							
								
			<!-- ------------------- Form Background Color ------------------ -->
								
			<div class="form-group">
				<label><?php _e('Form Background Color', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_form_background" id="color9" value="<?php if (esc_html(get_option( 'seos_change_color_form_background' ))) : echo esc_html(get_option( 'seos_change_color_form_background' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker9"></div>
				</div>
			</div>								
								
			<!-- ------------------- Inputs Background Color ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Input Background Color', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_input_background" id="color10" value="<?php if (esc_html(get_option( 'seos_change_color_input_background' ))) : echo esc_html(get_option( 'seos_change_color_input_background' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker10"></div>
				</div>
			</div>
			
			<!-- ------------------- H Element Color ------------------ -->

			<div class="form-group">
				<label><?php _e('H1, H2, H3, H4 , H5, H6 ', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_h_color" id="color11" value="<?php if (esc_html(get_option( 'seos_change_color_h_color' ))) : echo esc_html(get_option( 'seos_change_color_h_color' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker11"></div>
				</div>
			</div>		
			

			<!-- ------------------- Stroung Element Color  ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Strong Element Color', 'custom-colors'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="seos_change_color_strong_color" id="color12" value="<?php if (esc_html(get_option( 'seos_change_color_strong_color' ))) : echo esc_html(get_option( 'seos_change_color_strong_color' )); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker12"></div>
				</div>
			</div>
			
			<!-- ------------------- Em Color  ------------------ -->
			<!-- ------------------- Paragraph Color  ------------------ -->
			<!-- ------------------- Span Color  ------------------ -->
			<!-- ------------------- Article Color ------------------ -->
			<!-- ------------------- Sticky Background ------------------ -->
			<!-- ------------------- Time Color ------------------ -->
``		<div class="cc-clr"></div>
		<div style="margin-top: 190px;"><?php submit_button(); ?></div>
			
		</form>	
	</div>
	
	<?php } 
	
	function custom_colors_language_load() {
	  load_plugin_textdomain('custom_colors_language_load', FALSE, basename(dirname(__FILE__)) . '/languages');
	}
	add_action('init', 'custom_colors_language_load');
	
	/************************** CSS Code ****************************/

	function custom_color_button_options_css() { ?>
			<style type="text/css">
			
				<?php if(esc_html(get_option('seos_change_site_title_color'))) : ?> .site-title a, .site-title, .logo a, .Logo a, #logo a, #site-title a, #logo h1, #logo, header .site-title, header h1, .site-name a,
				#site-name a, #site-name, .site-name { color: <?php echo esc_html(get_option('seos_change_site_title_color')); ?> !important;} <?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_header_background' ))) : ?> header { background: <?php echo esc_html(get_option( 'seos_change_color_header_background' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_navigation_background' ))) : ?> nav { background: <?php echo esc_html(get_option( 'seos_change_color_navigation_background' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_body_background' ))) : ?> body { background: <?php echo esc_html(get_option( 'seos_change_color_body_background' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_main_background' ))) : ?> main { background: <?php echo esc_html(get_option( 'seos_change_color_main_background' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_sidebar_background' ))) : ?> #secondary, aside, #sidebar, .sidebar { background: <?php echo esc_html(get_option( 'seos_change_color_sidebar_background' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_footer_background' ))) : ?> footer, #footer, .footer { background: <?php echo esc_html(get_option( 'seos_change_color_footer_background' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_label_background' ))) : ?> label { color: <?php echo esc_html(get_option( 'seos_change_color_label_background' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_form_background' ))) : ?> form { background: <?php echo esc_html(get_option( 'seos_change_color_form_background' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_input_background' ))) : ?> input { background: <?php echo esc_html(get_option( 'seos_change_color_input_background' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_h_color' ))) : ?> h1, h2, h3, h4, h5, h6 { color: <?php echo esc_html(get_option( 'seos_change_color_h_color' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'seos_change_color_strong_color' ))) : ?> strong { color: <?php echo esc_html(get_option( 'seos_change_color_strong_color' )); ?> !important;}<?php endif; ?>
			</style>
		<?php
		}

	add_action('wp_head', 'custom_color_button_options_css'); 
	
	function admin_custom_color_button_options_css() { ?>	
			<style type="text/css">
				.custom-colors {
					width: 100%;
					display: block;
					clear: both;
				}
				
				.custom-colors label {
					font-weight: bold;
				}
				
				.cc-clr {
					display: block;
					clear: both;
					content: "";
				}
				
				.custom-colors .form-group  {
					margin-top: 15px;
					float: left;
					width: 200px;
					height: 50px;
					display:block;
				}
				
				 .custom-colors .form-group input {
					border-radius: 4px;
					padding: 10px;
				}
				
			</style>
	<?php } add_action('admin_head', 'admin_custom_color_button_options_css'); 