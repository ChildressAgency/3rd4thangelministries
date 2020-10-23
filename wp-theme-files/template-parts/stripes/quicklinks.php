<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 text-center">
            <div class="post-title">
                <h1><?php echo $args["title"] ?></h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($args["links"] as $link): ?>
            <div class="col-12 col-md-6 col-lg-4 text-center p-3 p-lg-5 stripe-item">
                <a href="<?php echo $link["link"]["url"] ?>">
                    <?php echo $link["link"]["title"] ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
