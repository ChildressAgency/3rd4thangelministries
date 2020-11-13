<?php get_header(); ?>

<?php get_template_part("template-parts/hero-slider"); ?>

<?php if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part("template-parts/content");
    endwhile;
endif;
?>

<?php
query_posts(array(
    'post_type' => 'video',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'order' => 'DESC',
));
if (have_posts()): ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php while (have_posts()) {
                the_post();
                get_template_part("template-parts/video");
            } ?>
        </div>
        <div class="row justify-content-center pb-5">
            <div class="col-12 col-md-4 text-center">
                <a class="red-button" href="#">Go to my channel</a>
            </div>
        </div>
    </div>
<?php endif;
wp_reset_query(); ?>

<?php get_template_part("template-parts/stripes"); ?>

<?php if (get_field("show_donate_video")) get_template_part("template-parts/donate"); ?>

<?php if (get_field("show_contact_form")) get_template_part("template-parts/contact"); ?>

<?php get_footer();
