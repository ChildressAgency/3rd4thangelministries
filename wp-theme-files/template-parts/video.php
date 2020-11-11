<?php
$url = get_field("video");
preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $url, $match);
$video_id = $match[1];
$thumb_url = "https://i.ytimg.com/vi/$video_id/hqdefault.jpg";
?>

<a class="col-12 col-md-6 col-lg-4 text-center p-3 p-lg-5 stripe-item loadmore-item"
   target="_blank" href="<?php echo $url; ?>">
    <img class="img-fluid" src="<?php echo $thumb_url; ?>"
         alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>"/>
</a>
