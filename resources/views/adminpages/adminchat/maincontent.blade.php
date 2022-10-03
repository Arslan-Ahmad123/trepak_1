<style>
    .activebtnchat{
        background-image: linear-gradient(to bottom right, rgb(217 210 210), rgb(34 34 33));
    }
    </style>
<!-- Page Wrapper -->
    <div class="page-wrapper">
			
        <div class="content container-fluid">
<div class="content" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="chat-window">
                
                    <!-- Chat Left -->
                    <div class="chat-cont-left">
                        <div class="chat-header">
                            <span>Chats</span>
                           
                        </div>
                        <form class="chat-search">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <i class="fas fa-search"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                        <div class="row" style="box-sizing: border-box;">
                            <div class="col-5 p-2 ml-3 activebtnchat individualgroupchat0" style="text-align: center"  onclick="changeactivestatus(0)" >
                                <a href="javascript:void(0)" class="px-5 py-1" style="background-color: #edf9f9;border-radius: 11px;">
                                    Chats
                                </a>
                            </div>
                            <div class="col-6 p-2 individualgroupchat1" style="text-align: center" onclick="changeactivestatus(1)" >
                                <a href="javascript:void(0)" class="px-5 py-1" style="background-color: #edf9f9;border-radius: 11px;">
                                    Group
                                </a>   
                            </div>
                        </div>
                        <div class="chat-users-list" >
                            <div class="chat-scroll" id="show_engr_group">
                                {{-- <a href="javascript:void(0);" onclick="showchatdiv(3)" class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-away">
                                            <img src="{{ asset('engrphoto/'.Auth::user()->pic) }}" alt="User Image" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="user-name">{{ Auth::user()->fname.' '.Auth::user()->lname }}</div>
                                            <div class="user-last-chat">Hey, How are you?</div>
                                        </div>
                                        <div>
                                            <div class="last-chat-time block">2 min</div>
                                            <div class="badge badge-success badge-pill">15</div>
                                        </div>
                                    </div>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /Chat Left -->
                
                    <!-- Chat Right -->
                    <div class="chat-cont-right">
                        <div class="chat-header">
                            <a id="back_user_list"  class="back-user-list">
                                <i class="material-icons">{{ AUth::user()->fname.' '.AUth::user()->lname }}</i>
                            </a>
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('engrphoto/'.Auth::user()->pic) }}" alt="User Image" class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="user-name">{{ AUth::user()->fname.' '.AUth::user()->lname }}</div>
                                    <div class="user-status">online</div>
                                </div>
                            </div>
                           
                        </div>
                        <div>
                            <div class="bg-primary p-2" id="starterview">
                                Welcome to Treapak
                            </div>
                            <div id="chatid{{ Auth::user()->id }}">
                            <div class="chatdiv"  style="display:none;">
                            <div class="chat-body">
                            <div class="chat-scroll">
                                <ul class="list-unstyled messageboxdiv">
                                    <li class="media sent">
                                        <div class="media-body">
                                            <div class="msg-box">
                                                <div>
                                                    <p>Hello. What can I do for you?</p>
                                                    <ul class="chat-msg-info">
                                                        <li>
                                                            <div class="chat-time">
                                                                <span>You 8:30 AM</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media received">
                                      
                                        <div class="media-body">
                                            <div class="msg-box">
                                                <div>
                                                    <ul class="chat-msg-info">
                                                        <li>
                                                            <div class="chat-time">
                                                                <span style="color:black;font-size:13px">Arfan &nbsp;&nbsp;&nbsp;</span><span> 8:35 AM</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <p>I'm just looking around.</p>
                                                    <p>Will you tell me something about yourself?</p>
                                                   
                                                </div>
                                            </div>
                                    </li>
                                 
                                    
                                </ul>
                            </div>
                            </div> 
                         <div class="chat-footer">
                            <div class="input_group">
                               
                            </div>
                        </div>
                                </div>
                            </div>
                           
                        </div>
                        
                     
                    </div>
                    <!-- /Chat Right -->
                    
                </div>
            </div>
        </div>
        <!-- /Row -->

    </div>

</div>
  </div>			
    </div>

    <!-- /Page Wrapper -->

@push('custom-scripts')
<script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            addcontent();
            
        });
        

        // =============this function is user for show fetch message from database in div===================
        function showchatdiv(id,status){
            if(status == 'solo'){
                // $('#starterview').hide();
                // $('.chatdiv').show();
                // $('.all_message').attr('id','chatboxdiv'+id);
                // $('#storegroupid').val(id);
                $('#starterview').hide();
                var adminid ={{ AUth::user()->id }};
                $('.chatdiv').show();
                $('.chatdiv').attr('id','chatbody'+adminid);
                $('.messageboxdiv').attr('id','chatbox'+id);
                $('#storegroupid').val(id);
               
                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                $.ajax({
                    url:'{{ URL::to("engrfetchmessage") }}',
                    type:'post',
                    data:{clientid:adminid,engrid:id},
                    success:function(data){
                        $('.messageboxdiv').html('');
                     console.log(data.data);
                        var mess =data.data;
                        $.each(mess,function(res,value){

                            if(value.senderid == adminid){
                                   var msg =  `<li class="media sent">
                                        <div class="media-body">
                                            <div class="msg-box">
                                                <div>
                                                    <p>${value.message}</p>
                                                    <ul class="chat-msg-info">
                                                        <li>
                                                            <div class="chat-time">
                                                                <span>8:30 AM</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>`;
                                    $('.messageboxdiv').append(msg);
                            }else{
                                var msg = `<li class="media received">
                                       
                                       <div class="media-body">
                                           <div class="msg-box">
                                               <div>
                                                   <p>${value.message}</p>
                                                  
                                                   <ul class="chat-msg-info">
                                                       <li>
                                                           <div class="chat-time">
                                                               <span>8:35 AM</span>
                                                           </div>
                                                       </li>
                                                   </ul>
                                               </div>
                                           </div>
                                         </div>  
                                         
                                   </li>`;
                                   $('.messageboxdiv').append(msg);
                            }
                            var sendmess_btn = ` <input type="text" name="senderid" id="senderid"  value="{{ (Auth::check())?Auth::user()->id:''}}" hidden/>
                                <input type="text" name="reciverid" id="reciverid"  value="${id}" hidden/ >
                                <input type="text" class="input-msg-send form-control" name="message" id="message" placeholder="Type a message...">
                                <div >
                                    <button type="submit" id="submitmsg"><i class="fab fa-telegram-plane" ></i></button>
                                </div>`;
                            $('.input_group').html(sendmess_btn);
                        });
                        
                    }
                });

            }else{
                // $('#starterview').hide();
                // $('.chatdiv').show();
                // $('.messageboxdiv').attr('id','chatboxdiv'+id);
                // $('#storegroupid').val(id);
                // =================
               
           
           $('#starterview').hide();
           $('.chatdiv').show();
           var adminid = {{ AUth::user()->id }};
           $('.chatdiv').attr('id','groupchatboxdiv'+adminid);
           $('.messageboxdiv').attr('id','groupchatbox'+id);
           $('#storegroupid').val(id);
           $.ajaxSetup({
                               headers: {
                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                               }
                           });
           $.ajax({
               url:'{{ URL::to("engrfetchmessagegroup") }}',
               type:'post',
               data:{engr_id:id},
               success:function(data){
                $('.messageboxdiv').html('');
                   console.log(data);
                   $.each(data,function(res,value){

                       if(value.senderid == adminid){
                              var msg =  `<li class="media sent">
                                   <div class="media-body">
                                       <div class="msg-box">
                                           <div>
                                               <p>${value.message}</p>
                                               <ul class="chat-msg-info">
                                                   <li>
                                                       <div class="chat-time">
                                                           <span>8:30 AM</span>
                                                       </div>
                                                   </li>
                                               </ul>
                                           </div>
                                       </div>
                                   </div>
                               </li>`;
                               $('.messageboxdiv').append(msg);
                       }else{
                           var msg = `<li class="media received">
                                  
                                  <div class="media-body">
                                      <div class="msg-box">
                                          <div>
                                              <p>${value.message}</p>
                                             
                                              <ul class="chat-msg-info">
                                                  <li>
                                                      <div class="chat-time">
                                                          <span>8:35 AM</span>
                                                      </div>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                    </div>  
                                    
                              </li>`;
                              $('.messageboxdiv').append(msg);
                       }
                       var sendmess_btn = `<input type="text" id="storegroupid" value="${id}">
                               <input type="text" id="sendermessageid" value="{{ Auth::user()->id }}">
                              
                                <input type="text" class="input-msg-send form-control" id="groupmessage" placeholder="Type something">
                                <div class="input-group-append">
                                    <button type="button" class="btn msg-send-btn" onclick="sendgroupmessage()"><i class="fab fa-telegram-plane">Test</i></button>
                                </div>`;
                       $('.input_group').html(sendmess_btn);
                   
                   });
                   
               }
           });
      
        
            }
          
        }
        // =============this function is user for show fetch message from database in div===================

        // =========this function is use the fetch all group name lists from database===========
            function getgroup(){
            $.ajax({
                url:"{{ URL::route('getallgroup') }}",
                type:'get',
                success:function(data){
                
                    if(data.countgroup > 0){
                        $('#show_engr_group').html('');
                        $.each(data.group,function(res,value){
                            console.log(value);
                            console.log(res);
                        var item = `<a href='javascript:void(0);' onclick='showchatdiv(${value.id},"group")' class='media'>`+
                                    "<div class='media-img-wrap'>"+
                                        "<div class='avatar avatar-away'>"+
                                            "<img src='http://127.0.0.1:8000/image/civiallogocrop.png') }}' alt='User Image' class='avatar-img rounded-circle'>"+
                                        "</div>"+
                                    "</div>"+
                                    "<div class='media-body'>"+
                                        "<div>"+
                                            "<div class='user-name'>"+value.groupname+"</div>"+
                                            "<div class='user-last-chat'>Client</div>"+
                                        "</div>"+
                                        "<div>"+
                                            "<div class='last-chat-time block'>2 min</div>"+
                                            "<div class='badge badge-success badge-pill'>15</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</a>";
                             
                                $('#show_engr_group').append(item);
                    });
                    }else{
                        $('#show_engr_group').append("No Group Created Yet!!");
                    }
                   
                }
            });
        }
         // =========this function is use the fetch all group name lists from database===========

        //  ======this function fetch  all engr  from database========
        function addcontent(){
            $('#show_engr_group').html("");
            $.ajax({
                url:'getchatuseradmin',
                type:'get',
                success:function(data){
                    $('.messageboxdiv').html('');
                    console.log(data.length);
                    if(data.length > 0){
                    $.each(data,function(res,value){
                        var item = ` <a href='javascript:void(0);'  onclick='showchatdiv(${value.id},"solo")' class='media'>`+
                                    "<div class='media-img-wrap'>"+
                                        "<div class='avatar avatar-away'>"+
                                            "<img src='http://127.0.0.1:8000/engrphoto/"+value.pic+"') }}' alt='User Image' class='avatar-img rounded-circle'>"+
                                        "</div>"+
                                    "</div>"+
                                    "<div class='media-body'>"+
                                        "<div>"+
                                            "<div class='user-name'>"+value.fname+"</div>"+
                                            "<div class='user-last-chat'>Client</div>"+
                                        "</div>"+
                                        "<div>"+
                                            "<div class='last-chat-time block'>2 min</div>"+
                                            "<div class='badge badge-success badge-pill'>15</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</a>";
                              
                                $('#show_engr_group').append(item);
                    });
                }else{
                    var item =`<p>No Record Found!!</p>`
                    $('#show_engr_group').append(item);
                }
                }
            });
           
        }
         //  ======this function fetch  all engr  from database========

        //  =====this function is use for change the above tag or toggle between solo and group======
        function changeactivestatus(id){

             $('.individualgroupchat'+id).addClass("activebtnchat");
            if(id == 1){
                ids = 0;
            }else{
                ids=1;
            }
            $('.individualgroupchat'+ids).removeClass("activebtnchat");
           if(id== 1){
            getgroup();
            console.log(1);
            $('.messageboxdiv').html('');
            $('.chatdiv').hide('');
            $('#starterview').show('');
            $('#storegroupid').val('');  
           }else{
            
            addcontent();
            console.log(0);
            $('.messageboxdiv').html('');
            $('.chatdiv').hide('');
            $('#starterview').show('');
            $('#storegroupid').val('');    
                               
           }

        }
         // Chat

    var chatAppTarget = $(".chat-window");
    (function () {
        if ($(window).width() > 991) chatAppTarget.removeClass("chat-slide");

        $(document).on(
            "click",
            ".chat-window .chat-users-list a.media",
            function () {
                if ($(window).width() <= 991) {
                    chatAppTarget.addClass("chat-slide");
                }
                return false;
            }
        );
        $(document).on("click", "#back_user_list", function () {
            if ($(window).width() <= 991) {
                chatAppTarget.removeClass("chat-slide");
            }
            return false;
        });
    })();

         //  =====this function is use for change the above tag or toggle between solo and group======
    </script>
@endpush