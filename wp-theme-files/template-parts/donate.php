<?php if (get_field("show_donate_video")): ?>
    <div class="container-fluid stripe donate">
        <div class="row">
            <div class="col-12 col-md-6 video">
                <iframe src="<?php echo get_field("donate_video", "options") ?>"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>

            <div class="col-12 col-md-6 py-2 my-4 text-left text">
                <div class="donate-title my-2">
                    <?php echo get_field("donate_title", "options") ?>
                </div>

                <div class="donate-body my-4">
                    <?php echo get_field("donate_body", "options") ?>
                </div>

                <a href="<?php echo get_field("donation_link", "options") ?>" class="red-button">Donate Today</a>
            </div>

        </div>
    </div>
<?php endif;
