<?php

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
        wp_enqueue_script('jquery');
    }
}

add_action('wp_enqueue_scripts', 'cai_scripts');
function cai_scripts()
{
    wp_register_script(
        'bootstrap-popper',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
        array('jquery'),
        '',
        true
    );

    wp_register_script(
        'bootstrap-scripts',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
        array('jquery', 'bootstrap-popper'),
        '',
        true
    );

    wp_register_script(
        'cai-scripts',
        get_stylesheet_directory_uri() . '/js/custom-scripts.min.js',
        array('jquery', 'bootstrap-scripts'),
        '',
        true
    );

    wp_localize_script('cai-scripts', 'wp_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
    ));

    wp_enqueue_script('bootstrap-popper');
    wp_enqueue_script('bootstrap-scripts');
    wp_enqueue_script('cai-scripts');
}

add_filter('script_loader_tag', 'cai_add_script_meta', 10, 2);
function cai_add_script_meta($tag, $handle)
{
    switch ($handle) {
        case 'jquery':
            $tag = str_replace('></script>', ' integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>', $tag);
            break;

        case 'bootstrap-popper':
            $tag = str_replace('></script>', ' integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>', $tag);
            break;

        case 'bootstrap-scripts':
            $tag = str_replace('></script>', ' integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>', $tag);
            break;
    }

    return $tag;
}

add_action('wp_enqueue_scripts', 'cai_styles');
function cai_styles()
{
    wp_register_style(
        'google-fonts',
        'https://fonts.googleapis.com/css?family=Maitree:400,700|Nunito+Sans:400,600,700|Nunito:700'
    );

    wp_register_style(
        'fontawesome',
        'https://use.fontawesome.com/releases/v5.6.3/css/all.css'
    );

    wp_register_style(
        'cai-css',
        get_stylesheet_directory_uri() . '/style.css'
    );

    wp_enqueue_style('google-fonts');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('cai-css');
}

add_filter('style_loader_tag', 'cai_add_css_meta', 10, 2);
function cai_add_css_meta($link, $handle)
{
    switch ($handle) {
        case 'fontawesome':
            $link = str_replace('/>', ' integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">', $link);
            break;
    }

    return $link;
}

add_action('after_setup_theme', 'cai_setup');
function cai_setup()
{
    add_theme_support('post-thumbnails');
    //set_post_thumbnail_size(320, 320);

    register_nav_menus(array(
        'header-nav' => 'Header Navigation'
    ));

    load_theme_textdomain('cai', get_stylesheet_directory_uri() . '/languages');
}

add_action('init', 'cai_create_post_types');
function cai_create_post_types()
{
    register_post_type("book", array(
        "public" => true,
        "menu_icon" => "dashicons-book",
        "labels" => array(
            "name" => "Book",
            "singular" => "Book",
            'search_items' => 'Search Books',
            'all_items' => 'All Books',
            'edit_item' => 'Edit Book',
            'update_item' => 'Update Book',
            'add_new_item' => 'Add New Book',
            'menu_name' => 'Books',
        ),
        'supports' => array('title', 'editor', 'thumbnail')
    ));
    register_post_type("dvd", array(
        "public" => true,
        "menu_icon" => "dashicons-format-video",
        "labels" => array(
            "name" => "DVD",
            "singular" => "DVD",
            'search_items' => 'Search DVDs',
            'all_items' => 'All DVDs',
            'edit_item' => 'Edit DVD',
            'update_item' => 'Update DVD',
            'add_new_item' => 'Add New DVD',
            'menu_name' => 'DVDs',
        ),
        'supports' => array('title', 'editor', 'thumbnail')
    ));
    register_post_type("video", array(
        "public" => true,
        "menu_icon" => "dashicons-youtube",
        "labels" => array(
            "name" => "Video",
            "singular" => "Video",
            'search_items' => 'Search Videos',
            'all_items' => 'All Videos',
            'edit_item' => 'Edit Video',
            'update_item' => 'Update Video',
            'add_new_item' => 'Add New Video',
            'menu_name' => 'Videos',
        ),
        'supports' => array('title')
    ));
    flush_rewrite_rules();
}

require_once dirname(__FILE__) . '/includes/class-wp-bootstrap-navwalker.php';
require_once dirname(__FILE__) . '/includes/loadmore.php';

add_action('acf/init', 'cai_add_custom_fields');
function cai_add_custom_fields()
{
    acf_add_options_page("Theme Settings");

    require_once dirname(__FILE__) . '/includes/custom-fields.php';
}
