jQuery(function($){
    "use strict";

    $.slz_update_products = function() {
    	// ajax update products when update woocommerce 3.0.0
        $( '.slz-upd-products-db' ).on( 'click', function() {
            var result = window.confirm( 'It is strongly recommended that you backup your database before proceeding. Are you sure you wish to run the updater now?');
            if( result ){
                var parent = $(this).parent();
                $(this).parent().append('<i class="fa fa-spinner fa-spin"></i>');
                $.ajax({
                    'type'  : 'POST',
                    'url'   : ajaxurl,
                    'data'  : { 'action' : 'slz_slz_core', 'module' : ['update', 'ajax_update_products'] },
                    success : function( response ) {
                        $('.fa-spinner', parent).remove();
                        window.location.reload( true );
                    }
                });
            }
        });
    };

    $(document).ready(function(){
        jQuery.slz_update_products();
    });
});