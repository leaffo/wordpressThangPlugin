jQuery(function($){
    "use strict";

    $.slz_faq_feedback = function () {
        $('.faq-feedback button').click(function () {
            var btn = $(this); btn.addClass('active');
            btn.closest('.faq-feedback').find('button').attr('disabled',true);
            console.log()

            var faqid = btn.data('faqid');
            var value = btn.data('value');
            var data = {
                faqid:faqid,
                value:value
            };

            $.fn.Form.ajax(['faq', 'ajax_faq_feedback'], [data], function(res) {
                if( res.success ) {
                    var block = btn.closest('.faq-feedback').find('.block-info').html( res.html );
                } else {
                    btn.removeClass('active');
                    btn.closest('.faq-feedback').find('button').removeAttr('disabled');
                    alert('Error: Please feedback again!');
                }
            });
        });
    };

    $(document).ready(function(){
        jQuery.slz_faq_feedback();
    });
});