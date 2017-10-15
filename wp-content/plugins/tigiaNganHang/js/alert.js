jQuery(function($){
    var tr = jQuery('#table').find('tr');
    tr.on('click', function () {
        /*$(this).find('td').each(function(index){

         });*/
        alert(jQuery(this).text());
    });
});






