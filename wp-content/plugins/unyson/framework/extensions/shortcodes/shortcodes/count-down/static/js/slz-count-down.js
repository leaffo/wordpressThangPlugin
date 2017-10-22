jQuery(function($){
    "use strict";

    $.slz_sc_countdown = function () {
        if( $('.slz-count-down').length > 0 ) {
            $('.slz-count-down').each(function(idx, dom ){
                var expire = $( dom ).data( 'expire' );
                var arr = expire.split(/[- :]/); 

                if( expire ) {
                    expire = new Date( arr[0], arr[1] - 1, arr[2], arr[3], arr[4], 0 ); 
                    expire = new Date( expire ).getTime(); 
                    var days    = $( dom ).find('.days span');
                    var hours   = $( dom ).find('.hours span');
                    var minutes = $( dom ).find('.minutes span');
                    var seconds = $( dom ).find('.seconds span');
                    var itv_id = window.setInterval(function () {
                        var current = new Date(); 
                        current = new Date(current).getTime(); 

                        var seconds_left = ( expire - current ) / 1000;

                        if( seconds_left <= 0 ) {
                            window.clearInterval( itv_id );
                            return;
                        }
                        var i_day = '', i_hour = '', i_sec = '', i_min = '';
                        i_day = parseInt( seconds_left / 86400 );
                        days.text( i_day >= 10 ? i_day : '0' + i_day );
                        
                        seconds_left %= 86400;
                        i_hour = parseInt( seconds_left / 3600 );
                        hours.text( i_hour >= 10 ? i_hour : '0' + i_hour );
                        
                        seconds_left %= 3600;
                        i_min = parseInt( seconds_left / 60 );
                        minutes.text( i_min >= 10 ? i_min : '0' + i_min );
                        
                        i_sec = parseInt( seconds_left % 60 );
                        seconds.text( i_sec >= 10 ? i_sec : '0' + i_sec );
                    }, 1000);
                }
            });
        }
    };

    $(document).ready(function(){
        jQuery.slz_sc_countdown();
    });
});