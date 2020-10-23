<?php get_header(); ?>

<?php get_template_part("template-parts/hero-slider"); ?>

<?php if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part("template-parts/content");
    endwhile;
endif;
?>

<?php get_template_part("template-parts/stripes"); ?>

<?php if (get_field("show_donate_video")) get_template_part("template-parts/donate"); ?>

<?php if (get_field("show_contact_form")) get_template_part("template-parts/contact"); ?>

<?php get_footer();
