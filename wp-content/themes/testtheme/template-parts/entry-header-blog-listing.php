<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<?php
$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')), 'full');
$featuredImageUrl = $img[0];
?>
<div class="top-fullwidth-banner" style="background-image: url(<?php echo $featuredImageUrl; ?>);">

	<div class="page-main">

		<h1 class="entry-title"><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>

	</div><!-- .entry-header-inner -->

</div><!-- .entry-header -->
