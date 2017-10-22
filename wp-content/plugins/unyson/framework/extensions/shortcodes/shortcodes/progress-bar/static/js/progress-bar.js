jQuery(function($) {
    "use strict";

    var SLZ = window.SLZ || {};

    function isOnView(ele) {
        var vTop = $(window).scrollTop();
        var vBot = vTop + $(window).height();

        var eTop = $(ele).offset().top;
        var eBot = eTop + $(ele).height();

        return ( (eBot <= vBot) && ( eTop >= vTop ) );
    }

    SLZ.slz_progressbar_1 = function() {

        if ($('.slz-progress-bar-01').length) {
            $(".progress-bar").each(function() {
                var proBar = $(this);

                proBar.width(0 + "%");
                proBar.parent().parent().find('.percent').text("0");

                var isAnimated = false;

                var intervalId = setInterval(function() {
                    if( isOnView(proBar) && !isAnimated) {
                        var unit = proBar.attr('data-unit');
                        var each_bar_width = proBar.attr('aria-valuenow');

                        proBar.animate({
                            width: each_bar_width + unit
                        });
                        
                        proBar.parent().parent().find('.percent').attr('data-to', each_bar_width);
                        proBar.parent().parent().find('.percent').countTo({
                            onUpdate: function(value) {
                                $(this).append(unit);
                            }
                        });

                        isAnimated = true;

                        clearInterval(intervalId);
                    }
                }, 300);

            });
        }

    };



    SLZ.slz_progressbar_2 = function() {

        if($('.slz-progress-bar-02').length) {
            $('.slz-progress-bar-02'). each(function(index, el) {
                var proBar2 = $(this);
                var isAnimated = false;

                var block_class = $(this).find('.progress-circle').attr('data-block-class');
                var circle_options = $(this).find('.progress-circle').data('plugin-options');
                var circle = document.getElementById('circle-' + block_class);
                var unit = $(this).attr('data-unit');
                if (circle) {
                    var c = circle.getContext('2d');
                    var posX = circle.width / 2,
                        posY = circle.height / 2,
                        fps = 5,
                        procent = 0,
                        oneProcent = 360 / 100,
                        circle_percent = $(this).find('.progress-circle').attr('data-percent'),
                        result = oneProcent * circle_percent;

                    var deegres = 0;
                    var intervalId = setInterval(function(){
                        if( isOnView(proBar2) && !isAnimated ) {
                            var acrInterval = setInterval(function() {
                                deegres += 1;
                                c.clearRect(0, 0, circle.width, circle.height);

                                c.beginPath();
                                c.arc(posX, posY, 70, (Math.PI / 180) * 270, (Math.PI / 180) * (270 + 360));
                                c.strokeStyle = circle_options.trackColor;
                                c.lineWidth = circle_options.lineWidthCircle;
                                c.stroke();

                                c.beginPath();
                                c.strokeStyle = circle_options.barColor;
                                c.lineWidth = circle_options.lineWidth;
                                c.arc(posX, posY, 70, (Math.PI / 180) * 270, (Math.PI / 180) * (270 + deegres));
                                c.stroke();

                                $(this).find('.percent').html((deegres / oneProcent).toFixed(0) + '%');
                                if (deegres >= result) {
                                    clearInterval(acrInterval);
                                    $('.'+block_class + ' span.percent').html( circle_percent + unit );
                                }
                            }, fps);

                            isAnimated = true;

                            clearInterval(intervalId);
                        }
                    }, 300);
                }
            });
        }

    };

    $(document).ready(function() {
        SLZ.slz_progressbar_1();
        SLZ.slz_progressbar_2();
    });

});
