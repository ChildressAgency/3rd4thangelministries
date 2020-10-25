<?php get_header(); ?>

<?php get_template_part("template-parts/hero-slider"); ?>

<?php get_template_part("template-parts/content"); ?>

<?php
query_posts(array(
    'post_type' => 'book',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'order' => 'DESC',
));
if (have_posts()): ?>
    <div class="container loadmore-container" data-posttype="book">
        <div class="row justify-content-center">
            <?php while (have_posts()) {
                the_post();
                get_template_part("template-parts/book");
            } ?>
        </div>
        <div class="row justify-content-center pb-5">
            <div class="col-12 col-md-4 text-center">
                <a class="red-button loadmore-button" href="#">Load More</a>
            </div>
        </div>
    </div>
<?php endif;
wp_reset_query(); ?>

    <div class="container post">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                <div class="post-title">
                    <h1></h1>
                </div>
            </div>
        </div>
    </div>

<?php
query_posts(array(
    'post_type' => 'dvd',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'order' => 'DESC',
));
if (have_posts()): ?>
    <div class="container loadmore-container pb-5" data-posttype="dvd">
        <div class="row justify-content-center">
            <?php while (have_posts()) {
                the_post();
                get_template_part("template-parts/dvd");
            } ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <a class="red-button loadmore-button" href="#">Load More</a>
            </div>
        </div>
    </div>
<?php endif;
wp_reset_query(); ?>

<?php get_template_part("template-parts/stripes"); ?>

<?php get_template_part("template-parts/donate"); ?>

<?php get_template_part("template-parts/contact"); ?>

<?php get_footer();
