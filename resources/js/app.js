import './bootstrap';
function scrollToBottom() {
    const messages = document.getElementsByClassName('chatbody')[0];
    messages.scrollTop = messages.scrollHeight;
 }
 function scrollToBottoms() {
   
   const messages = document.getElementsByClassName('chat_scroll_one')[0];
   messages.scrollTop = messages.scrollHeight;
}
function timeSince(date) {

    var seconds = Math.floor((new Date() - date) / 1000);
  
    var interval = seconds / 31536000;
  
    if (interval > 1) {
      return Math.floor(interval) + " years";
    }
    interval = seconds / 2592000;
    if (interval > 1) {
      return Math.floor(interval) + " months";
    }
    interval = seconds / 86400;
    if (interval > 1) {
      return Math.floor(interval) + " days";
    }
    interval = seconds / 3600;
    if (interval > 1) {
      return Math.floor(interval) + " hours";
    }
    interval = seconds / 60;
    if (interval > 1) {
      return Math.floor(interval) + " minutes";
    }
    return Math.floor(seconds) + " seconds";
  }
 const d = new Date();
 var differhuman = timeSince(d);
var hour = d.getHours();
var minute = d.getMinutes();
hour = (hour % 12) || 12;
var suffix = hour >= 12 ? "PM":"AM";
var monthname = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
var month = d.getMonth();
var year = d.getFullYear();
var date = d.getDate();

var c_date = hour + ":" + minute +' '+ suffix  ;
$(document).ready(function(){
    $(document).on('click', '#submitmsg', function(e){ 
    

        e.preventDefault();
           var clientid ='{{ (Auth::check())?Auth::user()->id:"not login" }}';
        console.log(clientid);
                            if(clientid == "not login"){
                                
                                window.location.href = "{{ URL::to('login') }}"
                            }else{
                                var senderid = $('#senderid').val();
                                var reciverid = $('#reciverid').val(); 
                                var message = $('#message').val(); 
                                if(senderid=="" || reciverid=="" || message==""){
                                    console.warn(senderid);
                                    console.warn(reciverid);
                                    console.warn(message);
                                    alert("Please Fill All input fields");
                                    return false;
                                }else{
                                 var token_res = $('#token_res').val();
                                //  console.log(token_res);
                               
                                $.ajax({
                                    url:'http://127.0.0.1:8000/send_message',
                                    method:'post',
                                  
                                    data:{senderid:senderid,message:message,reciverid:reciverid, "_token": token_res,},
                                    success:function(data){
                                        
                                        const innerDiv = document
                                        .getElementById('chatbody'+senderid)
                                        .querySelector('#chatbox'+reciverid);
                                        if(innerDiv != null){
                                            
                                        //     var app_s ="<div class='outgoing'>"+
                                         //     "<div class='bubble'>"+
                                        //       "<p>"+message+"</p>"+
                                        //     "</div>"+
                                        //   "</div>";
                                           
                                        //     $('#chatbox'+reciverid).append(app_s);
                                        //     $('#message').val('');
                                        // }else{
                                        //     alert("Not reciver online");
                                        // }
                                        $.ajax({
                                            url: "http://127.0.0.1:8000/fetchrole",
                                        type:'post',
                                        data:{id:senderid},
                                        success:function(data){
                                            console.log(data);
                                            if(data == 'user'){
                                                var ele_today_chat = document.getElementById('today_msg');
                                                if(ele_today_chat != null){
                                                   
                                                }else{
                                                    
                                                    let date_div = `<div id="today_msg" style="text-align: center;margin: 0px auto;width: 30%;background-color: #a6afa6;padding: 4px 0px;border-radius: 4px;font-size: 14px;font-weight: bold;"><span>Today</span></div>`;
                                               
                                                $('#chatbox' + reciverid).append(date_div);
                                                }
                                                
                                                var app_s ="<div class='outgoing'>"+
                                                "<span  style='font-size:12px;'>"+c_date+"</span>"+"<br>"+
                                                "<div class='bubble'>"+
                                                  "<p>"+message+"</p>"+
                                                "</div>"+
                                              "</div>";
                                               
                                                $('#chatbox'+reciverid).append(app_s);
                                                scrollToBottom();
                                             }else{
                                                var app_s = `<li class="media sent">
                                                               
                                                <div class="media-body">
                                                    <div class="msg-box">
                                                        <div>
                                                            <p>${message}</p>
                                                           
                                                            <ul class="chat-msg-info">
                                                                <li>
                                                                    <div class="chat-time">
                                                                        <span  style="font-size:12px;">${c_date}</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                  </div>  
                                                  
                                            </li>`;
                                            $('#chatbox'+reciverid).append(app_s);
                                            console.log('new message add');
                                            scrollToBottoms();
                                            
                                             }
                                        }
                                         });
                                        }
                                        $('#message').val('');
                                       
                                       
                                    }
                                });
                            }
        
        
                        }
        });
        window.Echo.private('onechat').listen('oneChatevent',(e)=>{
            console.log('asaskas dadash doadasd d adiodoijwoie oiejqwesdasd');
            console.warn('reciver_id' + e.reciverid);
            console.warn('sender_id' + e.senderid);
            console.warn('sender_id' + e.sendmes);
            const innerDiv = document
            .getElementById('chatbody'+e.reciverid)
            .querySelector('#chatbox'+e.senderid);
            if(innerDiv != null){
               console.log('user is active now');
                $.ajax({
                    url: "http://127.0.0.1:8000/fetchrole",
                type:'post',
                data:{id:e.reciverid},
                success:function(data){
                    console.log(data);
                    if(data == 'user'){
                        var app_s ="<div class='incoming'>"+
                        "<span  style='font-size:12px;'>"+c_date+"</span>"+"<br>"+
                        "<div class='bubble'>"+
                          "<p>"+e.sendmes+"</p>"+
                        "</div>"+
                      "</div>";
                       
                        $('#chatbox'+e.senderid).append(app_s);
                        scrollToBottom();
                     }else{
                        var app_s = `<li class="media received">
                                       
                        <div class="media-body">
                            <div class="msg-box">
                                <div>
                                    <p>${e.sendmes}</p>
                                   
                                    <ul class="chat-msg-info">
                                        <li>
                                            <div class="chat-time">
                                                <span style="font-size:13px;">${c_date}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                          </div>  
                          
                    </li>`;
                    $('#chatbox'+e.senderid).append(app_s);
                    scrollToBottoms();
                     }
                }
                 });
                
               
                
            }else {
                console.log('no found div');
            }
            // $.ajax({
            //     url:'fetchspec',
            //     type:'post',
            //     data:{id:e.authid},
            //     success:function(data){
            //         console.log(e.authid);
            //         const innerdiv = document
            //         .getElementById('maindiv'+e.id)
            //         .querySelector('#chatbox'+e.authid);
            //        console.log(innerdiv);
            //         if(innerdiv != null){
            //             // innerDiv.append("<p>user id"+sendid+" reciverid "+id+" message : "+message+"</p>");
            //             // innerDiv.append("<p>user id"+data.user_id+" reciverid "+data.reciver+" message"+data.message+"</p>");
            //             innerdiv.append ("user id"+data.user_id+" reciverid "+data.reciver+" message"+data.message);
                       
            //         }else{
            //             alert("Arfan");
            //         }
                   
            //         console.log(data);
            //         // console.log(e.id);
            //     }
            // })		
        });
// window.Echo.channel('Chat').listen('Message',(e)=>{
//     $('#chatbox').append('<p>'+e.user+'" "'+ e.message+' </p>');
//     $('#message').val('');
// });
// var id = $('#id').val();

// window.Echo.private('chat').listen('Message',(e)=>{
//     // console.warn('reciver_id' + e.id);
//     // console.warn('sender_id' + e.authid);
//     $.ajax({
//         url:'fetchspec',
//         type:'post',
//         data:{id:e.authid},
//         success:function(data){
//             console.log(e.authid);
//             const innerdiv = document
//             .getElementById('maindiv'+e.id)
//             .querySelector('#chatbox'+e.authid);
//            console.log(innerdiv);
//             if(innerdiv != null){
//                 // innerDiv.append("<p>user id"+sendid+" reciverid "+id+" message : "+message+"</p>");
//                 // innerDiv.append("<p>user id"+data.user_id+" reciverid "+data.reciver+" message"+data.message+"</p>");
//                 innerdiv.append ("user id"+data.user_id+" reciverid "+data.reciver+" message"+data.message);
               
//             }else{
//                 alert("Arfan");
//             }
           
//             console.log(data);
           
//         }
//     });
    
//  });
window.sendgroupmessage = function() {
    console.log('codeiswork');
    var groupid = $("#storegroupid").val();
    console.log(groupid)
    if(groupid != ""){
        console.log('groupid: '.groupid);
    //     $.ajax({
    //         url: "http://127.0.0.1:8000/set_session_groupid",
    //         type:'get',
    //         data: { groupid: groupid },
    //         success:function(data){
    //             console.log('create session' +data);
    //         }
    //    }); 
       var sendmessage =  $('#groupmessage').val();
       $.ajax({
        url: "http://127.0.0.1:8000/storemessage",
        type:'get',
        data: {groupid: groupid, message:sendmessage },
        success:function(data){
            
            var sender_id = $('#sendermessageid').val();
           
            const innerDiv = document
            .getElementById('chatid'+sender_id)
            .querySelector('#groupchatbox'+groupid);
            if(innerDiv != null){
                // var append_mess =  `<li class='media sent'><div class='media-body'><div class='msg-box'><div><ul class='chat-msg-info><li><div class='chat-time'><p>${sendmessage}</p><span>You 8:30 AM</span></div></li></ul></div></div></div></li>`;
                // console.log(append_mess);
                // $('#groupchatbox'+groupid).append(append_mess);
                $('#groupmessage').val('');
                // $('#groupchatbox').val('');
            }
        }
       });  
    }
    
}
window.Echo.private('groupmessage').listen('groupChatevent',(e)=>{
   
   
    const innerDiv = document.querySelector('#groupchatbox'+e.groupid);
    if(innerDiv != null){
        console.warn('message' + e.message);
        console.warn('sender_id' + e.senderid);
        var append_mess =  `<li class='media received'><div class='media-body'><div class='msg-box'><div><ul class='chat-msg-info><li><div class='chat-time'><p>${e.message}</p><span>8:30 AM</span></div></li></ul></div></div></div></li>`;
        $('#groupchatbox'+e.groupid).append(append_mess);
    }else{}
//     $.ajax({
//         url: "http://127.0.0.1:8000/del_session_groupid",
//         type:'get',
//         success:function(data){
//             console.log('delete session '+ data);
//         }
//    }); 
    // $.ajax({
    //     url:'fetchspec',
    //     type:'post',
    //     data:{id:e.authid},
    //     success:function(data){
    //         console.log(e.authid);
    //         const innerdiv = document
    //         .getElementById('maindiv'+e.id)
    //         .querySelector('#chatbox'+e.authid);
    //        console.log(innerdiv);
    //         if(innerdiv != null){
    //             // innerDiv.append("<p>user id"+sendid+" reciverid "+id+" message : "+message+"</p>");
    //             // innerDiv.append("<p>user id"+data.user_id+" reciverid "+data.reciver+" message"+data.message+"</p>");
    //             innerdiv.append ("user id"+data.user_id+" reciverid "+data.reciver+" message"+data.message);
               
    //         }else{
    //             alert("Arfan");
    //         }
           
    //         console.log(data);
    //         // console.log(e.id);
    //     }
    // })		
});




   

});
