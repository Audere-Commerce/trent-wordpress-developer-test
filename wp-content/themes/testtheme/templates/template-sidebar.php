<?php
/**
 * Template Name: Page with Sidebar
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content">

    <?php
    if ( have_posts() ) {

        while ( have_posts() ) {
            the_post();

            get_template_part( 'template-parts/content-sidebar' );
        }
    }

    ?>

</main><!-- #site-content -->

<?php get_footer(); ?>
