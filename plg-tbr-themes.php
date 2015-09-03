<?php

/**
 * ThemeButler Themes
 *
 * Simple plugin to add the Themes post type, meta and relevant
 * taxonomies.
 *
 * @package   TBRT
 * @author    Chris Rault <chris@themebutler.com>
 * @license   GPL-2.0+
 * @link      https://github.com/ThemeButler/plg-tbr-themes/
 * @copyright 2015 Chris Rault
 *
 * @wordpress-plugin
 * Plugin Name:       ThemeButler Themes
 * Plugin URI:        https://github.com/ThemeButler/plg-tbr-themes/
 * Description:       Simple plugin to add the Themes post type, meta and relevant taxonomies.
 * Version:           1.0.0
 * Author:            Chris Rault
 * Author URI:        http://www.themebutler.com
 * Text Domain:       tbrt-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/ThemeButler/plg-tbr-themes/
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
} // end if


// Register taxonomies
require_once( plugin_dir_path( __FILE__ ) . 'taxonomy.php' );


// Register portfolio post type
add_action( 'init', 'tbr_theme_post_type' );

function tbr_theme_post_type() {

    $args = array(
      'public' => true,
      'supports' => array( 'title', 'excerpt', 'thumbnail' ),
      'menu_icon' => 'dashicons-align-left',
      'label'  => 'Themes',
      'rewrite' => array(
        'with_front'=> true
      )
    );
    register_post_type( 'themes', $args );

}


// Register portfolio meta
add_action( 'admin_init', 'tbr_theme_post_meta' );

function tbr_theme_post_meta() {

  $fields = array(
    array(
      'id' => 'version',
      'label' => 'Version',
      'type' => 'text',
      'default' => ''
    ),
    array(
      'id' => 'release_date',
      'label' => 'Release date',
      'type' => 'text',
      'default' => ''
    ),
    array(
      'id' => 'release_notes',
      'label' => 'Release notes',
      'type' => 'textarea',
      'default' => ''
    )
  );
  beans_register_post_meta( $fields, array( 'themes' ), 'beans', array( 'title' => 'Theme Info' ) );

}


// Register partners meta
add_action( 'admin_init', 'tbr_designers_meta' );

function tbr_designers_meta() {

  $option = array(
    array(
      'id' => 'designer_url',
      'label' => 'Website',
      'type' => 'text',
      'default' => ''
    ),
    array(
      'id' => 'designer_location',
      'label' => 'Location',
      'type' => 'text',
      'default' => ''
    ),
    array(
      'id' => 'designer_image',
      'label' => 'Photo',
      'type' => 'image',
      'default' => '',
      'multiple' => false
    )
  );

  beans_register_term_meta( $option, array( 'designers' ), 'beans' );

}