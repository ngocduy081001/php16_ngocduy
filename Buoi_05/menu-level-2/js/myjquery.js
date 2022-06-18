jQuery(function ($) {
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
  $(" li a").each(function () {
    if (this.href === path) {
      $(this).add($(this).parents().parents()).addClass("active");
    }
  });
});
