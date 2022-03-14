<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<?php $featuredImageUrl = get_the_post_thumbnail_url(); ?>
<div class="top-fullwidth-banner" style="background-image: url(<?php echo $featuredImageUrl; ?>);">

	<div class="page-main">

        <?php
        if ( is_singular() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
        } else {
            the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
        }
        ?>

	</div><!-- .entry-header-inner -->

</div><!-- .entry-header -->
