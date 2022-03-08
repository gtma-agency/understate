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
    '/custom-media-taxonomy.php',           // Add Custom Taxnomies for Media Library
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
    '/tabs.php',                // all utility tabs
    '/hero.php',                // add a hero at the top of the page
    '/columns.php',             // add a columns block
    '/filterableGallery.php',   // add a filterable gallery
    '/imageText.php',           // add image and text columns
    '/section.php',             // add section
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
        ->addLayout($imageText)
        ->addLayout($section)
    ->setLocation('page_template', '==', 'default');

add_action('acf/init', function() use ($sections) {
    acf_add_local_field_group($sections->build());
 });

 // ACF Theme Options
 if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme General Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme CTA Header Settings',
        'menu_title'    => 'CTA Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
    
}

 // Require the composer autoload for getting conflict-free access to enqueue
require_once __DIR__ . '/vendor/autoload.php';
// Instantiate the Enque Class to load the compiled assets
global $enq;
$enq = new \WPackio\Enqueue( 'navaliaTheme', 'dist', '1.0.0', 'theme', __FILE__ );
//Scrips for the frontend
function enqueScripts(){
    global $enq;
    $res = $enq->enqueue( 'theme', 'main', ['jquery'] );
    //get the handle to localize scripts if necessary (to pass data directly from WP to frontend)
    $entry_point = array_pop( $res['js'] );
    wp_localize_script( $entry_point['handle'], 'MyGlobal', ['a'=>4711] );
}
//Scripts for the block editor
function blockScripts(){
    global $enq;
    $res = $enq->enqueue( 'theme', 'editor',[] );
}
//Scripts and Styles for the Backend 
function adminScripts(){
    global $enq;
    $res = $enq->enqueue( 'theme', 'admin',[] );
}
add_action( 'wp_enqueue_scripts','enqueScripts' );
// add_action( 'admin_enqueue_scripts','adminScripts' );
// add_action( 'enqueue_block_editor_assets','blockScripts' );