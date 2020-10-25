<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo get_bloginfo('name');
        if (get_bloginfo('description')): echo ' | ' . get_bloginfo('description'); endif; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="container-fluid text-center p-1 top-donate">
    <a href="<?php echo get_field("donation_link", "options") ?>">Donate Today. <b>Click Here</b></a>
</div>

<div id="navbar-container">
    <div class="container align-content-center">
        <nav class="col navbar navbar-expand-md navbar-dark p-0 justify-content-center">
            <?php if (get_field("site_logo", "options")): ?>
                <a class="navbar-brand" href="#">
                    <img src="<?php echo get_field("site_logo", "options") ?>" alt="Logo"/>
                </a>
            <?php endif; ?>

            <?php wp_nav_menu(array(
                'theme_location' => 'header-nav',
                'depth' => 2,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse flex-grow-0',
                'container_id' => 'header-navbar',
                'menu_class' => 'nav navbar-nav flex-column flex-md-row align-items-between',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker(),
            )); ?>
        </nav>
    </div>
</div>
