<style>
    .activebtnchat {
        background-image: linear-gradient(to bottom right, rgb(217 210 210), rgb(34 34 33));
    }
    .footer{
        position: sticky;
        top: 0%;
        margin-top: 170px;
    }
    @media only screen and (max-width: 992px) {
        .footer{   
        margin-top: 170px;
    } 
    }
    @media only screen and (max-width: 400px) {
        #text_bact_btn_list{
            display:none;
        }

    }
</style>
<div class="content topsection" style="min-height: 175px;">
    <input type="hidden" id="con-forpage" value="reciverid{{ Auth::user()->id }}">
    <input type="hidden" id="userloginid" value="{{ Auth::user()->id }}">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="chat-window" id="chat_window_div">

                    <!-- Chat Left -->
                    <div class="chat-cont-left">
                        <div class="chat-header"
                            style="
                        background-color: darkseagreen;
                        border-radius: 10px;">
                            <span class="text-align:left">Chats</span>

                        </div>
                        {{-- <form class="chat-search">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <i class="fas fa-search"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form> --}}
                        <div class="row mt-2" style="margin-left:0px !important;margin-right:0px !important;">
                            <div class="col-6 py-2 activebtnchat individualgroupchat0" 
                                onclick="changeactivestatus(0)" >
                                <a href="javascript:void(0)" class="px-5 py-1"
                                    style="    background-color: #edf9f9;
                                border-radius: 11px;">
                                    Chats
                                </a>
                            </div>
                            <div class="col-6 py-2 individualgroupchat1" 
                                onclick="changeactivestatus(1)">
                                <a href="javascript:void(0)" class="px-5 py-1"
                                    style="    background-color: #edf9f9;
                                border-radius: 11px;">
                                    Group
                                </a>

                            </div>
                        </div>
                        <div class="chat-users-list">
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
                        <div class="chat-header"  style="
                        background-color: darkseagreen;
                        border-radius: 10px;">
                           
                            <a id="back_user_list" class="back-user-list">
                                <i class="material-icons">{{ AUth::user()->fname . ' ' . AUth::user()->lname }}</i>
                            </a>
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar avatar-online">
                                        <img src="{{ Auth::user()->pic }}" alt="User Image"
                                            class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="user-name">{{ AUth::user()->fname . ' ' . AUth::user()->lname }}</div>
                                    <div class="user-status">online</div>
                                </div>
                            </div>
                            <i onclick="backfriendlist()" class="fa fa-arrow-left" aria-hidden="true"  id="back_btn_chatoption"><span class="ml-2" id="text_bact_btn_list">Back</span></i>

                        </div>
                        
                        <div>

                            <input type="text" id="forconditiondiv" value="for_con" hidden>

                            <div class="bg-primary p-2" id="starterview">
                                Welcome to Treapak
                            </div>
                            <div id="chatid{{ Auth::user()->id }}" class="chatmain_div set_height_div">
                                <div id="chatbody{{ Auth::user()->id }}">
                                    <div class="chatdiv" style="display:none;">
                                        <div class="chat-body">
                                            <div class="chat-scroll chat_scroll_one"
                                                style="height:450px;overflow:auto;background-color: #342c04c7;
                            border-radius: 10px;">
                                                <ul class="list-unstyled messageboxdiv">

                                                    <li class="media sent">
                                                        <div class="media-body">
                                                            <div class="msg-box">
                                                                <div>
                                                                    <p>Hello. What can I do for you?</p>
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
                                                    </li>
                                                    <li class="media received">

                                                        <div class="media-body">
                                                            <div class="msg-box">
                                                                <div>
                                                                    <p>I'm just looking around.</p>
                                                                    <p>Will you tell me something about yourself?</p>
                                                                    <ul class="chat-msg-info">
                                                                        <li>
                                                                            <div class="chat-time">
                                                                                <span>8:35 AM</span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="msg-box">
                                                                <div>
                                                                    <p>Are you there? That time!</p>
                                                                    <ul class="chat-msg-info">
                                                                        <li>
                                                                            <div class="chat-time">
                                                                                <span>8:40 AM</span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="msg-box">
                                                                <div>
                                                                    <div class="chat-msg-attachments">
                                                                        <div class="chat-attachment">
                                                                            <img src="assets/img/img-02.jpg"
                                                                                alt="Attachment">
                                                                            <div class="chat-attach-caption">
                                                                                placeholder.jpg</div>
                                                                            <a href="#"
                                                                                class="chat-attach-download">
                                                                                <i class="fas fa-download"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="chat-attachment">
                                                                            <img src="assets/img/img-03.jpg"
                                                                                alt="Attachment">
                                                                            <div class="chat-attach-caption">
                                                                                placeholder.jpg</div>
                                                                            <a href="#"
                                                                                class="chat-attach-download">
                                                                                <i class="fas fa-download"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="chat-msg-info">
                                                                        <li>
                                                                            <div class="chat-time">
                                                                                <span>8:41 AM</span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>
                                        <div class="chat-footer">
                                            <div id="input_group" style="position: relative">


                                            </div>
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
<input type="text" id="reciverid" value="{{ Auth::user()->id }}" hidden>
@push('childscript')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            addcontent();

        });
        if(window.innerHeight > 715){
                var footer_class =  document.getElementById('footer').classList;
                footer_class.remove('footer_lp');
                footer_class.add('footer_pc');
            }else{
                var footer_class =  document.getElementById('footer').classList;
                footer_class.remove('footer_pc');
                footer_class.add('footer_lp');
            }
        function addcontent() {

            $('#show_engr_group').html("");
            $.ajax({
                url: 'getchatuser',
                type: 'get',
                success: function(data) {
                    console.log(004);
                    $('.messageboxdiv').html('');
                    $('.input_group').html('');
                    $.each(data, function(res, value) {
                        if (value.role == 'admin') {
                            var item =
                                ` <a href='javascript:void(0);'  onclick='showchatdiv(${value.id},"solo")' class='media'>` +
                                "<div class='media-img-wrap'>" +
                                "<div class='avatar avatar-away'>" +
                                "<img src='" + value.user_img +
                                "' alt='User Image' class='avatar-img rounded-circle'>" +
                                "</div>" +
                                "</div>" +
                                "<div class='media-body'>" +
                                "<div>" +
                                "<div class='user-name'>" + value.fname + "</div>" +
                                "<div class='user-last-chat'>Admin</div>" +
                                "</div>" +
                                "<div>" +
                                "<div class='last-chat-time block'>2 min</div>" +
                                "<div class='badge badge-success badge-pill'>15</div>" +
                                "</div>" +
                                "</div>" +
                                "</a>";
                           
                            $('#show_engr_group').append(item);
                        } else {
                            var item =
                                ` <a href='javascript:void(0);'  onclick='showchatdiv(${value.id},"solo")' class='media'>` +
                                "<div class='media-img-wrap'>" +
                                "<div class='avatar avatar-away'>" +
                                "<img src='" + value.user_img +
                                "' alt='User Image' class='avatar-img rounded-circle'>" +
                                "</div>" +
                                "</div>" +
                                "<div class='media-body'>" +
                                "<div>" +
                                "<div class='user-name'>" + value.fname + "</div>" +
                                "<div class='user-last-chat'>Client</div>" +
                                "</div>" +
                                "<div>" +
                                "<div class='last-chat-time block'>2 min</div>" +
                                "<div class='badge badge-success badge-pill'>15</div>" +
                                "</div>" +
                                "</div>" +
                                "</a>";
                           
                            $('#show_engr_group').append(item);
                        }

                    });
                }
            });

        }

        function showchatdiv(id, userstatus) {
            $('.messageboxdiv').html('');
            $('.input_group').html('');
            if (userstatus == 'solo') {
                var engrid = $('#userloginid').val();
                $('#starterview').hide('slow');
                $('.chatmain_div').show('slow');
                $('.chatdiv').show();
                $('.chatdiv').attr('id', 'chatbody' + id);
                $('.list-unstyled').attr('id', 'chatbox' + id);
                $('#storegroupid').val(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ URL::to('engrfetchmessage') }}',
                    type: 'post',
                    data: {
                        clientid: id,
                        engrid: engrid
                    },
                    success: function(data) {
                        console.log(001);
                        var mess = data.data;
                        $.each(mess, function(res, value) {

                            if (value.senderid == engrid) {
                                var msg = `<li class="media sent">
                                        <div class="media-body">
                                            <div class="msg-box">
                                                <div>
                                                    <p>${value.message}</p>
                                                    <ul class="chat-msg-info">
                                                        <li>
                                                            <div class="chat-time">
                                                                <span>${value.created_at}</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>`;
                                $('.messageboxdiv').append(msg);
                            } else {
                                var msg = `<li class="media received">
                                       
                                       <div class="media-body">
                                           <div class="msg-box">
                                               <div>
                                                   <p>${value.message}</p>
                                                  
                                                   <ul class="chat-msg-info">
                                                       <li>
                                                           <div class="chat-time">
                                                               <span>${value.created_at}</span>
                                                           </div>
                                                       </li>
                                                   </ul>
                                               </div>
                                           </div>
                                         </div>  
                                         
                                   </li>`;
                                $('.messageboxdiv').append(msg);
                            }
                            var sendmess_btn = ` <input type="text" name="senderid" id="senderid"  value="{{ Auth::check() ? Auth::user()->id : '' }}" hidden/>
                                <input type="text" name="reciverid" id="reciverid"  value="${id}" hidden/ >
                                <input type="text" class="input-msg-send form-control" name="message" id="message" placeholder="Type a message...">
                                <div >
                                    <button type="submit" id="submitmsg" style="position:absolute;right:2%;top:20%"><i class="fab fa-telegram-plane" ></i></button>
                                </div>`;
                            $('#input_group').html(sendmess_btn);
                        });
                        scrollToBottom();

                    }
                });

            } else {
                console.log(id);
                $('#starterview').hide();
                $('.chatdiv').show();
                var engrid = $('#userloginid').val();
                $('.chatdiv').attr('id', 'groupchatboxdiv' + engrid);
                $('.list-unstyled').attr('id', 'groupchatbox' + id);
                $('#storegroupid').val(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ URL::to('engrfetchmessagegroup') }}',
                    type: 'post',
                    data: {
                        engr_id: id
                    },
                    success: function(data) {
                        console.log(002);
                        console.log(data);
                        $.each(data, function(res, value) {

                            if (value.senderid == engrid) {
                                var msg = `<li class="media sent">
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
                            } else {
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
                            var sendmess_btn = `<input type="hidden" id="storegroupid" value="${id}">
                            <input type="text" name="sendermessageid" id="sendermessageid"  value="{{ Auth::check() ? Auth::user()->id : '' }}" hidden/>
                               
                                <input type="text" class="input-msg-send form-control" name="groupmessage" id="groupmessage" placeholder="Type a message...">
                                <div >
                                    <button type="submit" onclick="sendgroupmessage()" style="position:absolute;top:20%;right:2%"><i class="fab fa-telegram-plane"></i></button>
                                </div>`;
                            $('#input_group').html(sendmess_btn);
                        });


                    }
                });
            }

        }


        function getgroup() {
            $('.chatmain_div').hide('slow');
            $('#starterview').show('slow');
            $.ajax({
                url: "{{ URL::route('getallgroupengr') }}",
                type: 'get',
                success: function(data) {
                    $('#show_engr_group').html('');

                    console.log(003);
                    if (data.countgroup > 0) {
                        $('#show_engr_group').html('');
                        $.each(data.group, function(res, value) {
                            var item =
                                ` <a href='javascript:void(0);' data-status='group' onclick='showchatdiv(${value.id},"group")' class='media'>` +
                                "<div class='media-img-wrap'>" +
                                "<div class='avatar avatar-away'>" +
                                "<img src='http://127.0.0.1:8000/image/civiallogocrop.png') }}' alt='User Image' class='avatar-img rounded-circle'>" +
                                "</div>" +
                                "</div>" +
                                "<div class='media-body'>" +
                                "<div>" +
                                "<div class='user-name'>" + value.groupname + "</div>" +
                                "<div class='user-last-chat'>Client</div>" +
                                "</div>" +
                                "<div>" +
                                "<div class='last-chat-time block'>2 min</div>" +
                                "<div class='badge badge-success badge-pill'>15</div>" +
                                "</div>" +
                                "</div>" +
                                "</a>";

                            $('#show_engr_group').append(item);
                        });
                    } else {

                        $('#show_engr_group').append(
                            "<span class='mt-5'> No Group Created Yet!!</span>");
                    }

                }
            });
        }

        function changeactivestatus(id) {

            $('.individualgroupchat' + id).addClass("activebtnchat");
            if (id == 1) {
                ids = 0;
            } else {
                ids = 1;
            }
            $('.individualgroupchat' + ids).removeClass("activebtnchat");
            if (id == 1) {
                // var item = " <a href='javascript:void(0);' onclick='showchatdiv(3)' class='media'>"+
                //                         "<div class='media-img-wrap'>"+
                //                             "<div class='avatar avatar-away'>"+
                //                                 "<img src='{{ asset('engrphoto/' . Auth::user()->pic) }}' alt='User Image' class='avatar-img rounded-circle'>"+
                //                             "</div>"+
                //                         "</div>"+
                //                         "<div class='media-body'>"+
                //                             "<div>"+
                //                                 "<div class='user-name'>{{ Auth::user()->fname . ' ' . Auth::user()->lname }}</div>"+
                //                                 "<div class='user-last-chat'>Group</div>"+
                //                             "</div>"+
                //                             "<div>"+
                //                                 "<div class='last-chat-time block'>2 min</div>"+
                //                                 "<div class='badge badge-success badge-pill'>15</div>"+
                //                             "</div>"+
                //                         "</div>"+
                //                     "</a>";
                //                     $('#show_engr_group').html("");
                //                     $('#show_engr_group').append(item);
                getgroup();
                console.log('group');
                $('#storegroupid').val('');
            } else {
                addcontent();
                $('#storegroupid').val('');
                console.log('onechat');
            }

        }

        function scrollToBottom() {
           
            const messages = document.getElementsByClassName('chat_scroll_one')[0];
            messages.scrollTop = messages.scrollHeight;
        }
        function backfriendlist(){
            $('#chat_window_div').removeClass('chat-slide');
        }
    </script>
@endpush
