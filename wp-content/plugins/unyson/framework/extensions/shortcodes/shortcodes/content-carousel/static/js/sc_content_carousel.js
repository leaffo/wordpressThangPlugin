/**
 * Created by Dell on 10/19/2017.
 */

jQuery(function($){
    var slz_content_carousel = function () {
        $('.banner-wrapper').each(function () {
            $(this).slick(
                {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 1000,
                }
            );
        });
    };
    slz_content_carousel();





});

