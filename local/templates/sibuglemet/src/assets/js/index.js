// import '../styles/styles.css'
import '../styles/main.scss'

window.$ = window.jQuery = require('jquery');

import Inputmask from "inputmask";
import Swiper from 'swiper';

require("@fancyapps/fancybox");

import './sidebarSticky.js';
import './filesToUpload.js';
import './menuDropdown.js';
import './filter.js';


// setTimeout(function(){
// document.body.classList.add('active');
// }, 100);

document.querySelectorAll('input[type="tel"]').forEach(el => {
    Inputmask({"mask": "+7 (999) 999-9999"}).mask(el);
});

var mainBanner = new Swiper('.main-slider .swiper-container', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 15,
    speed: 600,
    // autoHeight: true,
    // autoplay: {
    //     delay: 3000
    // },
    // navigation: {
    //     nextEl: '.certificates-slider__slider .certificates-slider__slider-next',
    //     prevEl: '.certificates-slider__slider .certificates-slider__slider-prev',
    // },
    // pagination: {
    //     el: '.main__slider .swiper-pagination',
    //     type: 'bullets',
    //     clickable: true,
    // },
    // breakpoints: {
    //     1199: {
    //         spaceBetween: 24,
    //         slidesPerView: 4,
    //     },
    //     989: {
    //         spaceBetween: 24,
    //         slidesPerView: 3,
    //     },
    //     767: {
    //         spaceBetween: 24,
    //         slidesPerView: 2,
    //     },
    //     575: {
    //         spaceBetween: 24,
    //         slidesPerView: 1,
    //     }
    // },
});


$('.footer__up').click(function () {
    $("html, body").stop().animate({scrollTop: 0}, 800);
});


$('.header__menu-dropdown>a').click(function (e) {
    e.preventDefault();
});


$('.burger').click(function () {
    $('body').toggleClass('modal-open');
    $(this).toggleClass('active');
    $('.header__mobile').toggleClass('active');
});

var initialTimeout;

$(window).resize(function () {
    if (window.matchMedia("(max-width: 767px)").matches) {
        $('.header__mobile').css('transition', 'none');

        clearTimeout(initialTimeout);

        initialTimeout = setTimeout(function () {
            $('.header__mobile').removeAttr('style');
        }, 100);
    }
});


const anchors = document.querySelectorAll('a[href*="#"]');

for (let anchor of anchors) {

    if (anchor.classList.contains('anchor')) {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            console.log(anchor);

            let blockID = anchor.getAttribute('href');
            blockID = blockID.substring(blockID.lastIndexOf("#"));

            document.querySelector('' + blockID).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
        })
    }
}


$("img[title]").each(function () {
    $(this).after($('<span class="img-desc">').html($(this).attr('title')));
});