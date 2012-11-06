$(function () {
    // Greyscale effectd
    $('.greyscale').hide().fadeIn(100);

    // Hover
    $('div.portfolio_list div.portfolio_item a').hoverZoom({ overlayColor: '#561c4f', zoom: 0 });
});

$(window).load(function () {
    $('.greyscale').greyScale({
        fadeTime:50
    });
});


