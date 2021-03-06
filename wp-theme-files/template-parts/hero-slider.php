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
                                <div class="image" style="background-image: url('<?php echo esc_url($image) ?>')"></div>
                                <div class="carousel-caption justify-content-center row">
                                    <div class="col-12 col-md-10 col-lg-8 text-right">
                                        <h1>The 3rd &amp; 4th</h1>
                                        <h1>Angels</h1>
                                        <h1>Ministries</h1>
                                        <p>
                                            <a href="<?php echo get_field("youtube_link", "options") ?>"
                                               class="red-button">Watch Messages</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php else: ?>
    <div class="my-5"></div>
<?php endif;
