$(document).ready(function() {

    // fixed header code
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 2) {
            $("header").addClass("header__fixed");
        } else {
            $("header").removeClass("header__fixed");
        }
    });

    // wow animation code
    wow = new WOW({
        animateClass: 'animated',
        offset: 100,
        callback: function(box) {
            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
    });
    wow.init();

    //Award section slider code
    $('.award').owlCarousel({
        items: 1,
        animateOut: 'fadeOut',
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
    });

    //what we are section slider code
    $('.agency__slider ').owlCarousel({
        items: 1,
        animateOut: 'fadeOut',
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true
    });
    $(function() {
        $("#accordion").accordion();
    });
});

