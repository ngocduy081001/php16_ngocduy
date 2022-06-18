jQuery(function ($) {
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
  $("ul li a").each(function () {
    if (this.href === path) {
      if ($(this).parents("li").parents("li").parents("li")) {
        $(this)
          .add($(this).parents("li").parents("li").parents("li"))
          .addClass("active");
        // $(this).add($(this).parents("li")).addClass("active");
        // $(this).add($(this).parents("li").parents("li")).addClass("active");
      }
    }
  });
});
