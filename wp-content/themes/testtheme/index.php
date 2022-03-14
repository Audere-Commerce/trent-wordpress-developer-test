<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<?php get_template_part( 'template-parts/entry-header-blog-listing' ); ?>

<div class="page-main page-main-content has-sidebar">
    <div class="content-left">
        <main id="site-content">
            <?php

            $archive_title    = '';
            $archive_subtitle = '';

            if ( is_search() ) {
                global $wp_query;

                $archive_title = sprintf(
                    '%1$s %2$s',
                    '<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
                    '&ldquo;' . get_search_query() . '&rdquo;'
                );

                if ( $wp_query->found_posts ) {
                    $archive_subtitle = sprintf(
                    /* translators: %s: Number of search results. */
                        _n(
                            'We found %s result for your search.',
                            'We found %s results for your search.',
                            $wp_query->found_posts,
                            'twentytwenty'
                        ),
                        number_format_i18n( $wp_query->found_posts )
                    );
                } else {
                    $archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
                }
            } elseif ( is_archive() && ! have_posts() ) {
                $archive_title = __( 'Nothing Found', 'twentytwenty' );
            } elseif ( ! is_home() ) {
                $archive_title    = get_the_archive_title();
                $archive_subtitle = get_the_archive_description();
            }

            if ( $archive_title || $archive_subtitle ) {
                ?>

                <header class="archive-header has-text-align-center header-footer-group">

                    <div class="archive-header-inner section-inner medium">

                        <?php if ( $archive_title ) { ?>
                            <h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
                        <?php } ?>

                        <?php if ( $archive_subtitle ) { ?>
                            <div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
                        <?php } ?>

                    </div><!-- .archive-header-inner -->

                </header><!-- .archive-header -->

                <?php
            }

            if ( have_posts() ) {

                echo '<div class="post-list">';

                while ( have_posts() ) {

                    the_post();

                    get_template_part( 'template-parts/post-item', get_post_type() );

                }

                echo '</div>';

            } elseif ( is_search() ) {
                ?>

                <div class="no-search-results-form section-inner thin">

                    <?php
                    get_search_form(
                        array(
                            'aria_label' => __( 'search again', 'twentytwenty' ),
                        )
                    );
                    ?>

                </div><!-- .no-search-results -->

                <?php
            }
            ?>

            <?php get_template_part( 'template-parts/pagination' ); ?>

        </main><!-- #site-content -->
    </div>
    <div class="sidebar">
        <ul class="sidebar-nav">
            <?php wp_nav_menu(
                array(
                    'container'  => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'expanded',
                )
            ); ?>
        </ul>
    </div>
</div>

<?php
get_footer();
