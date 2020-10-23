<div class="container post">
    <?php if (get_field("show_page_title")): ?>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                <div class="post-title">
                    <h1><?php the_title() ?></h1>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <?php if (has_post_thumbnail()): ?>
                <img class="img-fluid float-md-right featured-image" alt="<?php the_title() ?>"
                     src="<?php echo get_the_post_thumbnail_url($post, "large") ?>"/>
            <?php endif; ?>

            <?php the_content(); ?>
        </div>
    </div>
</div>
