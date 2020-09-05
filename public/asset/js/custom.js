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

$(document).on('click','.category_status',function(){
    var data=$(this).attr('data-id');
    $.get('/admin/status_category/'+data,function(res){
        alert("Status changed Successfully");
    })
});

$(document).on('click','.exam_status',function(){
    var data=$(this).attr('data-id');
    $.get('/admin/status_exam/'+data,function(res){
        alert("Status changed Successfully");
    })
});


$(document).on('click','.student_status',function(){
    var data=$(this).attr('data-id');
    $.get('/admin/status_student/'+data,function(res){
        alert("Status changed Successfully");
    })
});