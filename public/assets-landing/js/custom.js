"use strict"; // Start of use strict

// 1. swiper slider
document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".mainswiper", {
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    on: {
      init: function () {
        animateSlide(this.slides[this.activeIndex]);
      },
      slideChangeTransitionEnd: function () {
        animateSlide(this.slides[this.activeIndex]);
      },
    },
  });

  const swiperEl = document.querySelector(".mainswiper");
  if (swiperEl) {
    swiperEl.addEventListener("mouseenter", () => {
      swiper.autoplay.stop();
    });

    swiperEl.addEventListener("mouseleave", () => {
      swiper.autoplay.start();
    });
  }

  function animateSlide(slide) {
    document.querySelectorAll(".animate-text").forEach((el) => {
      el.classList.remove("animate-active");
    });

    slide.querySelectorAll(".animate-text").forEach((el) => {
      void el.offsetWidth;
      el.classList.add("animate-active");
    });
  }
});

// service swiper

document.addEventListener("DOMContentLoaded", function () {
  var swiper = new Swiper(".serviceswiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    breakpoints: {
      1200: { slidesPerView: 4 },
      992: { slidesPerView: 3 },
      768: { slidesPerView: 2 },
      576: { slidesPerView: 1 },
      0: { slidesPerView: 1 },
    },
  });

  const swiperContainer = document.querySelector(".serviceswiper");
  if (swiperContainer) {
    swiperContainer.addEventListener("mouseenter", () => {
      swiper.autoplay.stop();
    });

    swiperContainer.addEventListener("mouseleave", () => {
      swiper.autoplay.start();
    });
  }
});

// 3. gallery fancybox activator
function GalleryFancyboxActivator() {
  var galleryFcb = $(".fancybox");
  if (galleryFcb.length) {
    galleryFcb.fancybox({
      openEffect: "elastic",
      closeEffect: "elastic",
      helpers: {
        media: {},
      },
    });
  }
}
// 4. select menu
function selectMenu() {
  if ($(".select-menu").length) {
    $(".select-menu").selectmenu();
  }
}

// Header Style and Scroll to Top
function headerStyle() {
  if ($(".main-header").length) {
    var windowpos = $(window).scrollTop();
    var siteHeader = $(".main-header");
    var scrollLink = $(".scroll-top");
    if (windowpos >= 250) {
      siteHeader.addClass("fixed-header");
      scrollLink.fadeIn(300);
    } else {
      siteHeader.removeClass("fixed-header");
      scrollLink.fadeOut(300);
    }
  }
}

headerStyle();
// dropdown menu

var mobileWidth = 991;
var navcollapse = $(".navigation li.dropdown");

$(window).on("resize", function () {
  navcollapse.children("ul").hide();
});

navcollapse.hover(function () {
  if ($(window).innerWidth() >= mobileWidth) {
    $(this).children("ul").stop(true, false, true).slideToggle(300);
    $(this).children(".megamenu").stop(true, false, true).slideToggle(300);
  }
});

//Submenu Dropdown Toggle
if ($(".navigation li.dropdown ul").length) {
  $(".navigation li.dropdown").append(
    '<div class="dropdown-btn"><span class="fa fa-angle-right"></span></div>'
  );

  //Dropdown Button
  $(".navigation li.dropdown .dropdown-btn").on("click", function () {
    $(this).prev("ul").slideToggle(500);
    $(this).prev(".megamenu").slideToggle(800);
  });

  //Disable dropdown parent link
  $(".navigation li.dropdown > a").on("click", function (e) {
    e.preventDefault();
  });
}

//Submenu Dropdown Toggle
if ($(".main-header .main-menu").length) {
  $(".main-header .main-menu .navbar-toggle").on("click", function () {
    $(this).prev().prev().next().next().children("li.dropdown").hide();
  });
}
// End Main menu

//3. testimonialswiper

document.addEventListener("DOMContentLoaded", function () {
  const testimonialSwiper = new Swiper(".testimonialswiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 1,
      },
      0: {
        slidesPerView: 1,
      },
    },
  });

  const testimonialContainer = document.querySelector(".testimonialswiper");
  if (testimonialContainer) {
    testimonialContainer.addEventListener("mouseenter", () => {
      testimonialSwiper.autoplay.stop();
    });

    testimonialContainer.addEventListener("mouseleave", () => {
      testimonialSwiper.autoplay.start();
    });
  }
});
//4. fact counter

function factCounter() {
  if ($(".fact-counter").length) {
    $(".fact-counter .counter-column").each(function () {
      var $t = $(this),
        n = $t.find(".count-text").attr("data-stop"),
        r = parseInt($t.find(".count-text").attr("data-speed"), 10);

      if (!$t.hasClass("counted")) {
        $t.addClass("counted");
        $({ countNum: 0 }).animate(
          { countNum: n },
          {
            duration: r,
            easing: "swing",
            step: function () {
              $t.find(".count-text").text(Math.floor(this.countNum));
            },
            complete: function () {
              $t.find(".count-text").text(this.countNum);
            },
          }
        );
      }
    });
  }
}

$(document).ready(function () {
  if ($(".fact-counter").length) {
    $(".fact-counter").waypoint(
      function () {
        factCounter();
      },
      {
        offset: "80%",
        triggerOnce: true,
      }
    );
  }
});

// 9. gallery
function fleetGallery() {
  if ($(".mixit-gallery").length) {
    $(".mixit-gallery").mixItUp();
  }
}

//LightBox / Fancybox
if ($(".lightbox-image").length) {
  $(".lightbox-image").fancybox({
    openEffect: "fade",
    closeEffect: "fade",
    helpers: {
      media: {},
    },
  });
}

// 10. typed plugin
function typed() {
  if ($(".typed").length) {
    $(".typed").typed({
      stringsElement: $(".typed-strings"),
      typeSpeed: 200,
      backDelay: 1500,
      loop: true,
      contentType: "html", // or text
      // defaults to false for infinite loop
      loopCount: false,
      callback: function () {
        null;
      },
      resetCallback: function () {
        newTyped();
      },
    });
  }
}

// 14. single featured hover
function singleFeaturedHover() {
  if ($(".single-our-feature").length) {
    $(".single-our-feature").hover(
      function () {
        var bgHover = $(this).data("hover-background");
        $(this).css({
          "background-image": "url(" + bgHover + ")",
        });
      },
      function () {
        $(this).css({
          "background-image": "",
        });
      }
    );
  }
}

// 20. Responsive Video
function respnsiveVideo() {
  if ($(".responsive-video-box").length) {
    $(".responsive-video-box").fitVids();
  }
}

//21 Price Ranger
function priceFilter() {
  if ($(".price-ranger").length) {
    $(".price-ranger #slider-range").slider({
      range: true,
      min: 10,
      max: 200,
      values: [11, 99],
      slide: function (event, ui) {
        $(".price-ranger .ranger-min-max-block .min").val("$" + ui.values[0]);
        $(".price-ranger .ranger-min-max-block .max").val("$" + ui.values[1]);
      },
    });
    $(".price-ranger .ranger-min-max-block .min").val(
      "$" + $(".price-ranger #slider-range").slider("values", 0)
    );
    $(".price-ranger .ranger-min-max-block .max").val(
      "$" + $(".price-ranger #slider-range").slider("values", 1)
    );
  }
}

// 22. Cart Touch Spin
function cartTouchSpin() {
  if ($(".quantity-spinner").length) {
    $("input.quantity-spinner").TouchSpin({
      verticalbuttons: true,
    });
  }
}

// 23. Video Fancybox
function videoFancybox() {
  if ($("a.video-fancybox").length) {
    $("a.video-fancybox").click(function () {
      $.fancybox({
        padding: 0,
        autoScale: false,
        transitionIn: "none",
        transitionOut: "none",
        title: this.title,
        width: 680,
        height: 495,
        href: this.href.replace(new RegExp("watch\\?v=", "i"), "v/"),
        type: "swf",
        openEffect: "elastic",
        closeEffect: "elastic",
        helpers: {
          media: {},
        },
        swf: {
          wmode: "transparent",
          allowfullscreen: "true",
        },
      });

      return false;
    });
  }
}

// 27. Select menu
function selectDropdown() {
  if ($(".selectmenu").length) {
    $(".selectmenu").selectmenu();

    var changeSelectMenu = function (event, item) {
      $(this).trigger("change", item);
    };
    $(".selectmenu").selectmenu({ change: changeSelectMenu });
  }
}

// 31. Tabs Box
function tabbox() {
  if ($(".tabs-box").length) {
    //Tabs
    $(".tabs-box .tab-buttons .tab-btn").click(function (e) {
      e.preventDefault();
      var target = $($(this).attr("data-tab"));

      target
        .parents(".tabs-box")
        .find(".tab-buttons")
        .find(".tab-btn")
        .removeClass("active-btn");
      $(this).addClass("active-btn");
      target.parents(".tabs-box").find(".tabs-content").find(".tab").fadeOut(0);
      target
        .parents(".tabs-box")
        .find(".tabs-content")
        .find(".tab")
        .removeClass("active-tab");
      $(target).fadeIn(300);
      $(target).addClass("active-tab");
    });
  }
}
// 32. imgbxslider
function imgbxslider() {
  if ($(".img-slide-box").length) {
    $(".img-slide-box").bxSlider({
      adaptiveHeight: true,
      auto: true,
      controls: false,
      maxSlides: 1,
      minSlides: 1,
      moveSlides: 1,
      pause: 5000,
      speed: 700,
    });
  }
}
// Prealoder
function handlePreloader() {
  if ($(".preloader").length) {
    $(".preloader").delay(200).fadeOut(500);
  }
}
// Scroll to top
function scrollToTop() {
  if ($(".scroll-top").length) {
    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
      if ($(this).scrollTop() > 200) {
        $(".scroll-top").fadeIn();
      } else {
        $(".scroll-top").fadeOut();
      }
    });

    //Click event to scroll to top
    $(".scroll-top").click(function () {
      $("html, body").animate({ scrollTop: 0 }, 1500);
      return false;
    });
  }
}

function singleProduct() {
  $(".flexslider").flexslider({
    animation: "slide",
    controlNav: "thumbnails",
  });
}

function thmLightBox() {
  if ($(".img-popup").length) {
    var groups = {};
    $(".img-popup").each(function () {
      var id = parseInt($(this).attr("data-group"), 10);

      if (!groups[id]) {
        groups[id] = [];
      }

      groups[id].push(this);
    });

    $.each(groups, function () {
      $(this).magnificPopup({
        type: "image",
        closeOnContentClick: true,
        closeBtnInside: false,
        gallery: { enabled: true },
      });
    });
  }
}
function galleryMasonaryLayout() {
  if ($(".masonary-layout").length) {
    $(".masonary-layout").isotope({
      layoutMode: "masonry",
    });
  }

  if ($(".post-filter").length) {
    $(".post-filter li")
      .children("span")
      .click(function () {
        var Self = $(this);
        var selector = Self.parent().attr("data-filter");
        $(".post-filter li").children("span").parent().removeClass("active");
        Self.parent().addClass("active");

        $(".filter-layout").isotope({
          filter: selector,
          animationOptions: {
            duration: 500,
            easing: "linear",
            queue: false,
          },
        });
        return false;
      });
  }

  if ($(".post-filter.has-dynamic-filter-counter").length) {
    // var allItem = $('.single-filter-item').length;

    var activeFilterItem = $(".post-filter.has-dynamic-filter-counter").find(
      "li"
    );

    activeFilterItem.each(function () {
      var filterElement = $(this).data("filter");
      console.log(filterElement);
      var count = $(".gallery-content").find(filterElement).length;

      $(this)
        .children("span")
        .append('<span class="count"><b>' + count + "</b></span>");
    });
  }
}

if ($(".accordion-box").length) {
  $(".accordion-box .acc-btn").click(function () {
    if ($(this).hasClass("active") !== true) {
      $(".accordion-box .acc-btn").removeClass("active");
    }

    if ($(this).next(".acc-content").is(":visible")) {
      $(this).removeClass("active");
      $(this).next(".acc-content").slideUp(500);
    } else {
      $(this).addClass("active");
      $(".accordion-box .acc-content").slideUp(500);
      $(this).next(".acc-content").slideDown(500);
    }
  });
}

// Elements Animation
if ($(".wow").length) {
  var wow = new WOW({
    boxClass: "wow", // animated element css class (default is wow)
    animateClass: "animated", // animation css class (default is animated)
    offset: 0, // distance to the element when triggering the animation (default is 0)
    mobile: true, // trigger animations on mobile devices (default is true)
    live: true, // act on asynchronously loaded content (default is true)
  });
  wow.init();
}

// instance of fuction while Document ready event
jQuery(document).ready(function () {
  (function ($) {
    selectMenu();
    fleetGallery();
    GalleryFancyboxActivator();
    typed();
    singleFeaturedHover();
    respnsiveVideo();
    priceFilter();
    cartTouchSpin();
    videoFancybox();
    selectDropdown();
    tabbox();
    imgbxslider();
    handlePreloader();
    scrollToTop();
    singleProduct();
    thmLightBox();
    galleryMasonaryLayout();
  })(jQuery);
});

// instance of fuction while Window Load event
jQuery(window).on("load", function () {
  (function ($) {
    galleryMasonaryLayout();
  })(jQuery);
});

// instance of fuction while Window Scroll event
jQuery(window).scroll(function () {
  (function ($) {
    factCounter();
    headerStyle();
  })(jQuery);
});
