<?php
if (get_field("stripes")):
    foreach (get_field("stripes") as $stripe) : ?>
        <div class="container stripe <?php echo $stripe["style"] ?>">
            <?php get_template_part("template-parts/stripes/{$stripe["style"]}", null, $stripe); ?>
        </div>
    <?php
    endforeach;
endif;
?>
