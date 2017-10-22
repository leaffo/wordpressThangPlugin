
jQuery(function($) {
    "use strict";

    var SLZ = window.SLZ || {};

    /*=======================================
    =             MAIN FUNCTION             =
    =======================================*/
    SLZ.instagram_slider = function(){
        if($(".slz-carousel-photos .slz-carousel").length){
            $(".slz-carousel-photos .slz-carousel").each(function() {
                var carousel_item = $(this).attr('data-slidesToShow');
                if( carousel_item == '' ){
                    carousel_item = 4;
                }
                if (carousel_item == 1) {
                    $(this).slick({
                        slidesToShow: carousel_item,
                        dots: true,
                        arrows: false,
                    });
                }
                if (carousel_item == 2) {
                    $(this).slick({
                        slidesToShow: carousel_item,
                        dots: true,
                        arrows: false,
                        responsive: [{
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }]
                    });
                }
                if (carousel_item == 3) {
                    $(this).slick({
                        slidesToShow: carousel_item,
                        dots: true,
                        arrows: false,
                        responsive: [{
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                            }
                        }, {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }]
                    });
                }
                if (carousel_item >= 4) {
                    $(this).slick({
                        slidesToShow: carousel_item,
                        dots: true,
                        arrows: false,
                        responsive: [{
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            }
                        }, {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                            }
                        }, {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }]
                    });
                }
            });

            $('.slz-carousel-photos .slz-carousel .item').each(function(){
                $(this).find('.block-image').hoverdir({
                    hoverDelay: 20,
                });
                $(this).find('.thumb').hoverdir({
                    hoverDelay: 20,
                });
            });
        }

        if($(".slz-instagram").length){
            $('.slz-instagram .item').each(function(){
                $(this).find('.thumb').hoverdir({
                    hoverDelay: 20,
                });
            });
        }
    }


    /*======================================
    =            INIT FUNCTIONS            =
    ======================================*/

    $(document).ready(function() {
        SLZ.instagram_slider();
    });

    /*=====  End of INIT FUNCTIONS  ======*/

});
