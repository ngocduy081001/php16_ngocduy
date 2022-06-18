// var url = window.location.pathname;
// var filename = url.substring(url.lastIndexOf("/") + 1);
// alert(filename);

// var els = document.getElementsByTagName("a[href='']");
// alert(els);
// jQuery(function ($) {
//   var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
//   $("ul li a").each(function () {
//     if (this.href === path) {
//       $(this).parent().addClass("active");
//     }
//   });
// });
jQuery(function ($) {
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
  $("ul li a").each(function () {
    if (this.href === path) {
      aObj = document.getElementById("dropDownMenu").getElementsByTagName("a");
      for (i = 0; i < aObj.length; i++) {
        if (document.location.href.indexOf(aObj[i].href) >= 0) {
          aObj[i].className = "active";
        }
      }
      //$(this).add($(this).parents("")).addClass("active");
    }
  });
});
