<?php get_header(); ?>

<?php get_template_part("template-parts/hero-slider"); ?>

<?php get_template_part("template-parts/content"); ?>

<?php
$books = new WP_Query(array(
    'post_type' => 'book',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'order' => 'DESC',
));
if ($books->have_posts()): ?>
    <div class="container">
        <div class="row">
            <?php while ($books->have_posts()): $books->the_post(); ?>
                <a class="col-12 col-md-6 col-lg-4 text-center p-3 p-lg-5 stripe-item"
                   href="<?php the_permalink() ?>">
                    <img class="img-fluid"
                         src="<?php echo get_the_post_thumbnail_url(null, "full") ?>"
                         alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>"/>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_query(); ?>

    <div class="container post">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                <div class="post-title">
                    <h1><?php the_title() ?></h1>
                </div>
            </div>
        </div>
    </div>

<?php
$dvds = new WP_Query(array(
    'post_type' => 'dvd',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'order' => 'DESC',
));
if ($dvds->have_posts()): ?>
    <div class="container">
        <div class="row">
            <?php while ($dvds->have_posts()): $dvds->the_post(); ?>
                <a class="col-12 col-md-6 col-lg-4 text-center p-3 p-lg-5 stripe-item"
                   href="<?php the_permalink() ?>">
                    <img class="img-fluid"
                         src="<?php echo get_the_post_thumbnail_url(null, "full") ?>"
                         alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>"/>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_query(); ?>

<?php get_template_part("template-parts/stripes"); ?>

<?php get_template_part("template-parts/donate"); ?>

<?php get_template_part("template-parts/contact"); ?>

<?php get_footer();
