<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper p-0" id="page-wrapper">

    <div class="" id="content" tabindex="-1">

        <div class="row">

            <!-- Do the left sidebar check -->
            <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

            <main class="site-main" id="main">

                <?php
                while ( have_posts() ) {
                    the_post();
                    if( have_rows('sections') ):
                        while ( have_rows('sections') ) : the_row();
                            get_template_part( 'block-templates/block', get_row_layout() );
                        endwhile;
                    else :
                        // Do something...
                    endif;
                }
                ?>

            </main><!-- #main -->

            <!-- Do the right sidebar check -->
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();