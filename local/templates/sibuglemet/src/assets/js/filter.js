window.$ = window.jQuery = require('jquery');


$('.last-news__filter-box a').on('click', function (e) {
    var cont = $(this).text();
    $(this).parent('li').siblings('li').find('a').removeClass('active');
    $(this).addClass('active');
    $(this).parents('.last-news__filter-box').find('.last-news__filter-active').text(cont);
});


$(document).on('click', '.last-news__filter-active', function (e) {

    if (!$(this).hasClass('active')) {
        $('.last-news__filter-active').removeClass('active');
        $('.last-news__filter-active').next('ul').slideUp(200);
        $(this).addClass('active');
        $(this).next('ul').slideDown(200);
    } else {
        $(this).removeClass('active');
        $(this).next('ul').slideUp(200);
    }

});


$(document).click(function (e) {
    if ($(e.target).closest('.last-news__filter-box').length) {
        return;
    }
    $('.last-news__filter-active').removeClass('active');
    $('.last-news__filter-active').next('ul').slideUp(200);
});


$(document).on('click', '.last-news__filter-media a', function (e) {
    $(this).toggleClass('active');
});
