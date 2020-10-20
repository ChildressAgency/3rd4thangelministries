<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo get_bloginfo('name');
        if (get_bloginfo('description')): echo ' | ' . get_bloginfo('description'); endif; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="container-fluid text-center p-1 top-donate">
    <a href="<?php echo get_field("facebook", "options") ?>">Donate Today. <b>Click Here</b></a>
</div>

<div id="navbar-container">
    <div class="container">
        <nav class="col navbar navbar-expand-md navbar-dark p-0">
            <?php wp_nav_menu(array(
                'theme_location' => 'header-nav',
                'depth' => 2,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'header-navbar',
                'menu_class' => 'nav navbar-nav flex-column flex-md-row align-items-between',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker(),
            )); ?>
        </nav>
    </div>
</div>
