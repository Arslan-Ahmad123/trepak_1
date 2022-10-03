<div class="content topsection" style="min-height: 175px;" >
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
                        <div class="chat-users-list">
                            <div class="chat-scroll">
                                <a href="javascript:void(0);" onclick="showchatdiv(3)" class="media">
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
                                </a>
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
                                <ul class="list-unstyled">
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
                                        <div class="avatar">
                                            <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image" class="avatar-img rounded-circle">
                                        </div>
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
                                                            <img src="assets/img/img-02.jpg" alt="Attachment">
                                                            <div class="chat-attach-caption">placeholder.jpg</div>
                                                            <a href="#" class="chat-attach-download">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                        </div>
                                                        <div class="chat-attachment">
                                                            <img src="assets/img/img-03.jpg" alt="Attachment">
                                                            <div class="chat-attach-caption">placeholder.jpg</div>
                                                            <a href="#" class="chat-attach-download">
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
                            <div class="input-group">
                               
                                <input type="text" class="input-msg-send form-control" placeholder="Type something">
                                <div class="input-group-append">
                                    <button type="button" class="btn msg-send-btn"><i class="fab fa-telegram-plane"></i></button>
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

@push('childscript')
    <script>
        $(document).ready(function(){
            
        });
        function showchatdiv(id){
                $('#starterview').hide();
                $('.chatdiv').show();
                $('.chatdiv').attr('id','chatboxdiv'+id);
            }
    </script>
@endpush