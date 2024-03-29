<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<footer class="page-footer">

    <div class="page-main">

        <?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

    </div><!-- .section-inner -->

</footer><!-- #site-footer -->

<?php wp_footer(); ?>
</body>
</html>
