window.$ = window.jQuery = require('jquery');

function menuDropdown() {
    $('.header__menu-dropdown ul').removeAttr('style');
    $('.header__menu-dropdown').off('click mouseenter mouseleave');


    if (window.matchMedia("(max-width: 767px)").matches) {
        $('.header__menu-dropdown').on('click', function () {
            $(this).siblings('.header__menu-dropdown').find('ul').slideUp(250);
            $(this).find('ul').stop().slideToggle(250);
        });


        $('body').removeClass('modal-open');
        $('.burger').removeClass('active');
        $('.header__mobile').removeClass('active');
    } else {
        $('.header__menu-dropdown').on('mouseenter mouseleave', function () {
            $(this).find('ul').stop().slideToggle(200);
        });
    }
}

var width = $(window).width();
$(window).resize(function () {
    if ($(window).width() == width) return;
    width = $(window).width();
    menuDropdown();


});

menuDropdown();