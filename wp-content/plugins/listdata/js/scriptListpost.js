jQuery(function($){


    function loadpost(){
    var postid=123;
    $.ajax({
    url:ajaxobject.ajax_url,
        type:'post',
    data: {
        action: 'my_ajax',
        id : postid
    },success:function(data){
            $('#thangtest').html(data);
    }
});
}


    loadpost();
    //aa();
    $('#ajax').on('click',function(){
       loadpost();
    });
    $('#empty').on('click',function(){
        $('#thangtest').find('table').remove();
    });

    $('body').on('click','.delItem',function(){
        var id=$(this).parents('tr').data('id');

        $.ajax({
            url:ajaxobject.ajax_url,
            type:'post',
            data:{
                action:'ajaxdel',
                id: id
            },
            success:function(data){
                //alert('del'+data+' ok');
                loadpost();
            }
        }) ;
    });
    $('body').on('click','.updateItem',function(){
        var obj=$(this).parents('tr');
        //id Post

        var id=obj.data('id');
        var contentUpdate=obj.find('textarea').val();
        alert(contentUpdate);
        $.ajax({
            url:ajaxobject.ajax_url,
            type:'post',
            data:{
                action:'ajaxUpdate',
                id:id,
                content:contentUpdate
            },
            success:function(data){
                loadpost();
            }
        });
        $('body').on('click','.insertItem',function(){

        });





    });

    $('#insertAjax').on('click',function(){
       alert('s');
    });





});
/**
 * Created by Dell on 10/11/2017.
 */
