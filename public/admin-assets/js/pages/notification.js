function deleteNotifcationFromPage(notificationId){
    $.ajax({
        url:'/notifications/remove',
        type:'post',
        data:{'notification_id':notificationId},
        headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        success:function(response){
        console.log(response);
        }
    });
}