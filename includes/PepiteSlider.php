<?php

class PESL_PepiteSliderModule extends DiviExtension
{

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'pesl-pepite-slider';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'pepite-slider';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	public $plugin_dir;
	public $plugin_dir_url;

	/**
	 * PESL_PepiteSlider constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct($name = 'pepite-slider', $args = array())
	{

		$this->plugin_dir     = plugin_dir_path(__FILE__);
		$this->plugin_dir_url = plugin_dir_url($this->plugin_dir);

		if (! function_exists('is_plugin_active')) {
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		// // Test ACF Pro is active
		// if (!is_plugin_active('advanced-custom-fields-pro/acf.php')) {
		// 	add_action('admin_notices', function () {
		// 		$class = 'notice notice-error';
		// 		$message = __('ACF Pro not found. Please install and activate ACF Pro.', 'pesl-pepite-slider');
		// 		printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
		// 	});
		// 	return;
		// }

		// Make the Video URL field Dynamic
		// add_filter('et_builder_get_parent_modules', function($modules){
		// 	foreach ($modules as $module_slug => $module) {
		// 		if($module_slug === 'et_pb_video' && isset($module->fields_unprocessed)){
		// 			$module->fields_unprocessed['src']['dynamic_content'] = 'url';
		// 			$module->fields_unprocessed['src_webm']['dynamic_content'] = 'url';
		// 		}
		// 	}
		// 	return $modules;
		// });

		parent::__construct($name, $args);

		add_action('wp_enqueue_scripts', function () {
			// Load css
			// wp_enqueue_style('pesl-pepite-slider', $this->plugin_dir_url . "styles/styles.css" );

		});

		add_filter('oembed_result', function ($return, $url, $v) {
			if (strstr($return, 'youtube.com')) {
				$id_and_args = explode('watch?v=', $url);
				$id = explode("&", $id_and_args[1]);

				// edit url to add options
				$return = str_replace("?feature=oembed", "?feature=oembed&controls=0&enablejsapi=1&loop=1&modestbranding=1&mute=1&rel=0&showinfo=0", $return);
				$add_id = str_replace( 'allowfullscreen>', 'allowfullscreen id="yt-'.$id[0].'">', $return );
				return $add_id;
			}
			else if (strstr($return, 'vimeo.com')) {
				// edit url to add options
				// return str_replace( $url, "$url&controls=false&loop=true&pip=false&autoplay=1&autopause=true&muted=1", $return);
				return str_replace( $url, "$url&controls=false&loop=true&autoplay=true&muted=true", $return);
			}
		}, 10, 3);

		/**
		 * Add parameters to embed
		 * @src https://foxland.fi/adding-parameters-to-wordpress-oembed/
		 * @src https://github.com/WordPress/WordPress/blob/ec417a34a7ce0d10a998b7eb6d50d7ba6291d94d/wp-includes/class-oembed.php#L553
		 */
		add_filter('oembed_fetch_url', function ($provider, $url, $args) {
			
			if( stripos($provider, "https://www.youtube.com/") !== false ) {
				$provider = add_query_arg("modestbranding", 1, $provider);
				$provider = add_query_arg("controls", 0, $provider);
				$provider = add_query_arg("rel", 0, $provider);
			}

			if( stripos($provider, "https://vimeo.com/") !== false ) {
				$provider = add_query_arg("controls", "false", $provider);
				$provider = add_query_arg("loop", "true", $provider);
				$provider = add_query_arg("pip", "false", $provider);
				// $provider = add_query_arg("autopause", "true", $provider);
				$provider = add_query_arg("autoplay", "true", $provider);
				$provider = add_query_arg("muted", "true", $provider);
				// $provider = add_query_arg("background", true, $provider);
			}

			return $provider;
		}, 10, 3);

	}

}

new PESL_PepiteSliderModule;
