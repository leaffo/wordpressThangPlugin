jQuery(function($) {
    "use strict";

    var SLZ = window.SLZ || {};

    SLZ.tab = function() {
        $('.sc_tabs').each( function() {
            $(this).find('.vc_tta-panel-heading').remove();
            $(this).find('.tab-content .vc_tta-panel:first').addClass('tab-pane fade in active');
            $(this).find('.tab-content .vc_tta-panel:not(:first)').addClass('tab-pane fade');
            $(this).find('.tab-content .vc_tta-panel').attr('role','tabpanel');
            $(this).find('.tab-content .vc_tta-panel').each(function(){
                var id = $(this).attr('id');
                $(this).attr('id', 'tab-' + id);
            });
        });

        // Responsive Tab ( MOBILE FIRST )
        if( $('.sc_tabs').length ) {
            $('.sc_tabs .tab-list-carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                infinite: false,
                fade: false,
                focusOnSelect: true,
                mobileFirst: true,
                asNavFor: '.sc_tabs .tab-content-carousel',
                responsive: [
                    {
                        breakpoint: 481,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: 'unslick',
                    }
                ]
            });

            $('.sc_tabs .tab-content-carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                arrows: false,
                infinite: false,
                mobileFirst: true,
                adaptiveHeight: true,
                asNavFor: '.sc_tabs .tab-list-carousel',
                responsive: [
                    {
                        breakpoint: 767,
                        settings: 'unslick',
                    }
                ]
            });
        }
        
    };

    $(document).ready(function() {
        SLZ.tab();
    });

    $(window).on('resize', function() {
    });
});