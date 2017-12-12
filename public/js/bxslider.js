$(document).ready(function() {
    $('.bxslider.header-slider').bxSlider({
        auto: true,
        pause: 5000,
        mode: 'fade',
        speed: 2000,
        onSliderLoad: function(currentIndex) {
            $('.bx-viewport').keepRatio({
                ratio: 1600/500,
            });
            $('.bx-viewport img').centerImage({
                stretchOutside: true,
            });
        },
    });
    $('.bxslider.uuid-header-slider').bxSlider({
        auto: true,
        pause: 5000,
        mode: 'fade',
        speed: 2000,
        pager: false,
        onSliderLoad: function(currentIndex) {
            $('.bx-viewport').keepRatio({
                ratio: 1600/400,
            });
            $('.bx-viewport img').centerImage({
                stretchOutside: true,
            });
        },
    });
});