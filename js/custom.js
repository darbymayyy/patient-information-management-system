(function ($) {

  "use strict";

  // HERO SLIDER
  $(".hero-slider").owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 6500,
    smartSpeed: 700,
    animateOut: "fadeOut",
    dots: true,
    nav: true,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ]
  });

  // SUBTILE SCROLL-REVEAL ANIMATIONS
  new WOW({ mobile: false }).init();

  // CLOSE THE MOBILE MENU AFTER TAPPING A LINK
  $("#main-nav a").on("click", function () {
    $("#main-nav").collapse("hide");
  });

})(jQuery);
