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

new Swiper('.main-slider .swiper-container', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 15,
    speed: 600,
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


$('a[href*="tel"]').each(function(){
    $(this).attr('href', 'tel:'+$(this).text().replace(/\s/g, ''));
});

