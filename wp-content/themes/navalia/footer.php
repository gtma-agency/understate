<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- Footer -->
<footer class="wrapper" id="wrapper-footer-full" role="contentinfo">
    <div class="footer-top pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-xs-12 col-sm-6 col-md-3 col-lg-2">
                    <?php dynamic_sidebar( 'footerlogo' ); ?>
                </div>
                <div class="mb-4 col-xs-12 col-sm-6 col-md-3 offset-lg-1 col-lg-3">
                    <?php dynamic_sidebar( 'footercontent' ); ?>
                </div>
                <div class="mb-4 col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <?php dynamic_sidebar( 'socialmedia' ); ?>
                </div>
                <div class="mb-4 col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <?php dynamic_sidebar( 'footermenu' ); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-5 pb-5">
        <div class="container text-center">
            <?php dynamic_sidebar( 'footerbottom' ); ?>       
        </div>
    </div>
</footer>
<!--// Footer -->

<?php wp_footer(); ?>
<script>
    jQuery("#navbarNavDropdown a:not(.dropdown-toggle)").click(function() {
    jQuery("#navbarNavDropdown").collapse("hide");
    });
  </script>
</body>

</html>

