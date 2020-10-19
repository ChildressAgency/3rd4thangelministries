<?php
$images = get_field("hero_images");
if ($images):
    ?>

    <div class="container-fluid hero-slider p-0">
        <div class="row">
            <div class="col">

                <div id="heroSlider" class="carousel slide" data-ride="carousel"
                     data-interval="<?php echo get_field("slider_speed", "options") ?>">
                    <ol class="carousel-indicators">
                        <?php foreach ($images as $index => $image) : ?>
                            <li data-target="#heroSlider" data-slide-to="<?php echo $index ?>"
                                class="<?php echo $index == 0 ? "active" : "" ?>"></li>
                        <?php endforeach; ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach ($images as $index => $image) : ?>
                            <div class="carousel-item <?php echo $index == 0 ? "active" : "" ?>">
                                <img class="d-block w-100" src="<?php echo esc_url($image) ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php endif;
