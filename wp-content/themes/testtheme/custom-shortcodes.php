<?php

/**
 * WP shortcode for returning FAQ posts
 * @param $attributes
 * @return string
 */
function get_faq_posts($attributes) {
    $args = array(
        'post_type' => 'faq',
        'publish_status' => 'published',
        'posts_per_page' => '100'
    );

    if ($attributes['ids']) {
        $postIds = explode(',', $attributes['ids']);

        if (!empty($postIds)) {
            $args['post__in'] = $postIds;
        }
    }

    $query = new WP_Query($args);

    if($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();

            $result .= '<div class="faq-item">';
            $result .= '<div class="question">' . get_the_title() . '</div>';
            $result .= '<div class="answer">' . get_the_content() . '</div>';
            $result .= '</div>';
        }

        $colSize = $attributes['colsize'] ? : 1;
        $result = '<div class="faq-list col-' . $colSize . '">' . $result . '</div>';

        wp_reset_postdata();
    }

    return $result;
}

add_shortcode('faq_posts', 'get_faq_posts');