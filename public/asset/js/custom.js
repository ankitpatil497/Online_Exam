$(document).on('submit','.database_operation',function(){
    var url=$(this).attr('action');
    var data=$(this).serialize();

    $.post(url,data,function(res){
        var res=$.parseJSON(res);
        if(res.status=='true'){
            alert(res.msg);
            window.location.href=res.reload;
        }
    })
    return false;
});
