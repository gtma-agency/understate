<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once('vendor/autoload.php');

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/custom-media-taxonomy.php',			// Add Custom Taxnomies for Media Library
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

$block_inc_dir = "blocks";

$blocks = array(
	'/tabs.php',        // all utility tabs
	'/hero.php',        // add a hero at the top of the page
	'/columns.php',     // add a columns block
	'/filterable-gallery.php', // add a filterable gallery
);

foreach ( $blocks as $file ) {
	require_once get_theme_file_path( $block_inc_dir . $file );
}

use StoutLogic\AcfBuilder\FieldsBuilder;

$sections = new FieldsBuilder('sections');
$sections
    ->addFlexibleContent('sections')
		->addLayout($hero)
		->addLayout($columns)
		->addLayout($filterableGallery)
    ->setLocation('page_template', '==', 'default');

add_action('acf/init', function() use ($sections) {
	acf_add_local_field_group($sections->build());
 });