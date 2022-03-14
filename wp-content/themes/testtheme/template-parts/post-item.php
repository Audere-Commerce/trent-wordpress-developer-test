<div class="post-list-item" id="post-<?php the_ID(); ?>">
    <div class="post-inner">
        <a href="<?php echo get_permalink(); ?>" class="image">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
        </a>
        <div class="content">
            <?php the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
            <div class="post-date"><?php echo get_the_date('l dS F Y'); ?></div>
            <?php the_excerpt(); ?>
        </div>
    </div>
</div><!-- .post -->
