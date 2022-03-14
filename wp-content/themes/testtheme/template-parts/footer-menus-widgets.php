<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$has_footer_menu = has_nav_menu( 'footer' );
$has_social_menu = has_nav_menu( 'social' );

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );

$companyDetails = get_option('audere_test_plugin_options');

// Only output the container if there are elements to display.
if ( $has_footer_menu || $has_social_menu || $has_sidebar_1 || $has_sidebar_2 ) {
	?>

	<div class="footer-content">
        <div class="col company-blurb">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
        <div class="col company-address">
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
        </div>
        <div class="col company-contact">
            <h2><?php echo __('Contact us:'); ?></h2>
            <a href="tel:<?php echo $companyDetails['telephone']; ?>">Tel: <?php echo $companyDetails['telephone']; ?></a>
            <a href="mailto:<?php echo $companyDetails['email']; ?>">Email: <?php echo $companyDetails['email']; ?></a>
        </div>
        <div class="col company-social">
            <ul class="social-menu footer-social reset-list-style fill-children-current-color">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'social',
                        'container'       => '',
                        'container_class' => '',
                        'items_wrap'      => '%3$s',
                        'menu_id'         => '',
                        'menu_class'      => '',
                        'depth'           => 1,
                        'link_before'     => '<span>',
                        'link_after'      => '</span>',
                        'fallback_cb'     => '',
                    )
                );
                ?>

            </ul><!-- .footer-social -->
        </div>
	</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>
