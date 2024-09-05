<?php
/*
Plugin Name: Pepite Slider
Plugin URI:  https://github.com/5AMsan/divi-pepite-slider
Description: Petite collective slider
Version:     1.0.0
Author:      5AMsan
Author URI:  https://github.com/5AMsan
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: pesl-pepite-slider
Domain Path: /languages

Pepite Slider is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Pepite Slider is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Pepite Slider. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'pesl_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function pesl_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/PepiteSlider.php';
}
add_action( 'divi_extensions_init', 'pesl_initialize_extension' );
endif;
