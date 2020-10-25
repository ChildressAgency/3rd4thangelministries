(function () {
  const {ajaxurl} = wp_params; // global object from server side

  jQuery(document).ready(function ($) {
    $(".loadmore-button").click(function (e) {
      e.preventDefault();
      const trigger = $(e.target);
      const container = trigger.closest(".loadmore-container");
      const offset = container.find(".loadmore-item").length;
      trigger.text("Loading");

      let post_type = container.data("posttype") || "post";

      console.log(`loading ${post_type}s`);

      $.ajax({
        url: ajaxurl,
        type: "post",
        data: {
          action: "get_posts",
          post_type,
          offset,
          order: "DESC",
          count: 3
        },
        success: data => {
          trigger.text("Load More");
          if (!data || !data.length) return;
          container.find(".loadmore-item").last().after(data);
          setTimeout(() => container.find(".loadmore-item").addClass("show"), 100);
        },
        error: () => {
          trigger.text("Load More");
        },
      });
    });
  });

})();