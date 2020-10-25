<?php

function ajax_get_posts()
{
    query_posts(array(
        'post_type' => $_POST['post_type'],
        'post_status' => 'publish',
        'posts_per_page' => $_POST['count'],
        'offset' => $_POST['offset'],
        'order' => $_POST['order'] || 'DESC',
        'tax_query' => $_POST['tax_query']
    ));
    while (have_posts()) {
        the_post();
        get_template_part("template-parts/{$_POST["post_type"]}");
    }
    exit();
}

add_action('wp_ajax_get_posts', 'ajax_get_posts');
add_action('wp_ajax_nopriv_get_posts', 'ajax_get_posts');
