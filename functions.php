<?php
/**
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    CCC
 * @version    1.0.0
 * @author     Marty Helmick
 * @copyright  Copyright (c) 2014, Diocese of Charlotte
 * @link       https://github.com/DioceseOfCharlotte/ccc-child
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Add the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'ccc_theme_setup' );

/**
 * Setup function.  All child themes should run their setup within this function.  The idea is to add/remove 
 * filters and actions after the parent theme has been set up.  This function provides you that opportunity.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function ccc_theme_setup() {

	/* Add a custom background to overwrite the defaults. */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)
	);

	/* Add a custom header to overwrite the defaults. */
	add_theme_support( 
		'custom-header', 
		array(
			'default-text-color' => 'FFFFFF',
			'default-image'      => '',
			'random-default'     => false,
		)
	);

	/* Filter to add custom default backgrounds (supported by the framework). */
	add_filter( 'hybrid_default_backgrounds', 'ccc_default_backgrounds' );

	/* Add a custom default color for the "primary" color option. */
	add_filter( 'theme_mod_color_primary', 'ccc_color_primary' );
}

/**
 * Registers custom default backgrounds.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $backgrounds
 * @return array
 */
function ccc_default_backgrounds( $backgrounds ) {

	$new_backgrounds = array(
		'gray-square' => array(
			'url'           => '%2$s/images/backgrounds/gray-square.png',
			'thumbnail_url' => '%2$s/images/backgrounds/gray-square-thumb.png',
		),
		'blue-square' => array(
			'url'           => '%2$s/images/backgrounds/blue-square.png',
			'thumbnail_url' => '%2$s/images/backgrounds/blue-square-thumb.png',
		),
	);

	return array_merge( $new_backgrounds, $backgrounds );
}

/**
 * Add a default custom color for the theme's "primary" color option.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $hex
 * @return string
 */
function ccc_color_primary( $hex ) {
	return $hex ? $hex : '760a2e';
}
