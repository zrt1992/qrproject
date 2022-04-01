$(function() {

    "use strict";

    $('.chat-left-inner > .chatonline, .chat-rbox').perfectScrollbar();

    var cht = function() {
        var topOffset = 450;
        var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        $(".chat-list").css("height", (height) + "px");
    };
    $(window).ready(cht);
    $(window).on("resize", cht);

    // this is for the left-aside-fix in content area with scroll
    var chtin = function() {
        var topOffset = 270;
        var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        $(".chat-left-inner").css("height", (height) + "px");
    };
    $(window).ready(chtin);
    $(window).on("resize", chtin);

    $(".open-panel").on("click", function() {
        $(".chat-left-aside").toggleClass("open-pnl");
        $(".open-panel i").toggleClass("ti-angle-left");
    });

    var input = document.getElementById("chatMessage");
    input.addEventListener("keyup", function(event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("paperPlane").click();
        }
    });
});

// get all messages of selected conversations
function getAllConversationMessages(id){
        $('li a').removeClass('active');
        var conversation_id = $.trim($("#userConversationId"+id).val());
        var userId = $.trim($("#userId"+id).val());
        $('#selectedConversation').val(id);
        $("#selectedUserId").val(userId);
        $.ajax({
            url:'/chats/get/messages/list',
            type:'post',
            data:{'conversation_id':conversation_id,'user_id' : userId},
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success:function(response){
                    // console.log(response.html);
                    $("#chatRbox").html(response.html);
                    $('#converstion'+id+ ' a').addClass('active');
                    $("#messageCount"+id).text('');
                    $('.chat-rbox').animate({scrollTop: 0});
                    $('.chat-rbox').animate({scrollTop: $('.chat-rbox')[0].scrollHeight});
                }
        });
}
// send message in the selected conversation
function sendMessage(){
        var conversation_id = $('#selectedConversation').val();
        var userId = $('#selectedUserId').val();
        var message = $.trim($("#chatMessage").val());
        if(message != ""){
            $.ajax({
                url:'/chats/get/single/message/list',
                type:'post',
                data:{'message':message,'conversation_id' : conversation_id,"receiver_id" : userId},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    console.log(response.html);
                    $("#chatRbox").append(response.html);
                    $('.chat-rbox').animate({scrollTop: 9999});
                }
       });
        $("#chatMessage").val('');
    }
}

// check if current notification chat is active append message to screen.
function checkIfCoversationSelectedAppendMessage(id,name,image,message,date,time){
    // console.log('my id is => '+id);
    var data = $('.conversation.active').attr('data-id');
    // console.log(data);
    if(data == id){
        var html = '<li><div class="chat-img"><img src="'+image+'" alt="user" class="img-circle"/></div><div class="chat-content"><h5>'+name+'</h5><div class="box bg-light-info">'+message+'</div><div class="chat-time">'+date+' '+time+'</div></div></li>';
        $("#chatRbox").append(html);
    }   
}

// check which conversation got message remove its li and apend it on top.
function checkConversationAndApendItOnTop(id){
    $("#converstion"+id).prependTo($(".chatonline").show('slow'));
    var currentValue = parseInt($("#messageCount"+id).text(),10);
    var total = 0;
    if(isNaN(currentValue)){
        total = 0 + 1;
    }else{
        total = currentValue + 1;
    }
    $("#messageCount"+id).text(total);
}

// when click on notification first prepend user to top then fetch all messages
function NotificationMessageAppendToTopAndSelect(id)
{
    $("#converstion"+id).prependTo($(".chatonline").show('slow'));
    getAllConversationMessages(id);
}