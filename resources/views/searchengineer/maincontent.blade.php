	
<style>
	.alink {
	  display: inline-block;
	  text-align: center;
	  cursor: pointer;
	}
	input[type="text"],
	button {
	  padding: 4px 8px;
	  border: 0;
	  outline: 0;
	}
	button {
	  background-color: transparent;
	  cursor: pointer;
	}
	button:hover i {
	  color: #79c7c5;
	  transform: scale(1.2);
	}
	
	/* container */
	.customchatbox {
	  width: 450px;
	  height: 70vh;
	  position: fixed;
	  bottom: 2%;
	  right: 2%;
	  /* transform: translate(-50%, -50%); */
	  z-index: 1;
	  border-radius: 10px;
	  background-color: #f9fbff;
	  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
	  overflow: hidden;
	}
	
	/* chat_box */
	.chat_box {
	  display: flex;
	  flex-direction: column;
	  height: 100%;
	}
	.chat_box > * {
	  padding: 8px;
	}
	
	/* head */
	.head {
	  display: flex;
	  align-items: center;
	}
	.head .user {
	  display: flex;
	  align-items: center;
	  flex-grow: 1;
	}
	.head .user .avatar {
	  margin-right: 8px;
	}
	.head .user .avatar img {
	  display: block;
	  border-radius: 50%;
	}
	.head .bar_tool {
	  display: flex;
	}
	.head .bar_tool i {
	  padding: 5px;
	  width: 30px;
	  height: 30px;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	}
	
	/* body */
	.chatbody {
	  flex-grow: 1;
	  background-color: #eee;
	}
	.chatbody .bubble {
	  display: inline-block;
	  padding: 10px;
	  margin-bottom: 5px;
	  border-radius: 15px;
	}
	.chatbody .bubble p {
	  color: #f9fbff;
	  font-size: 14px;
	  text-align: left;
	  line-height: 0.6;
	}
	.chatbody .incoming {
	  text-align: left;
	}
	.chatbody .incoming .bubble {
	  background-color: #b2b2b2;
	}
	.chatbody .outgoing {
	  text-align: right;
	}
	.chatbody .outgoing .bubble {
	  background-color: #79c7c5;
	}
	
	/* foot */
	.foot {
	  display: flex;
	}
	.foot .msg {
	  flex-grow: 1;
	}
	

	@media screen and (max-width:520px){
	
	  .customchatbox {
	  width: 315px;
	  height: 70vh;
	}
	}
		.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}
.linksstyle{
	position:relative;
	left:30%;
}
	</style>
	
	<!-- Breadcrumb -->
			<div class="breadcrumb-bar topsection">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h4 class="breadcrumb-title">{{ $tlengr }} matches found for : {{ $cate_name->engrcategory }} In Lahore</h2>
						</div>
						{{-- <div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter" id="filter_start">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
								
								<div class="filter-widget">
									
										<input type="text" class="form-control " placeholder="Select City">
											
								</div>
								<div class="slidecontainer">
									<h4>Price Range</h4>
								<input type="range" min="500" max="5000" value="500" step="500" class="slider" id="myRange">
							      <p>Value: <span id="demo"></span></p>	
							     </div>
								<div class="filter-widget">
									<h4>Select Specialist</h4>
									<select id="engrcategory" class="form-control">
										@php
										 $res =  getallcategory();
										@endphp
										@foreach($res as $res)
										<option value="{{ $res->id }}" {{ ($res->id == $category_id)?'selected':'' }} >{{ $res->engrcategory }}</option>
										@endforeach
									  </select>
								</div>
									<div class="btn-search">
										<button type="button" class="btn btn-block">Search</button>
									</div>	
								</div>
							</div>
							<!-- /Search Filter -->

								<!-- Search show Filter -->
								<div class="p-2 mb-3" id="filter_eng" style="cursor:pointer">Filter<i  class="fa fa-angle-down filtericon_cpro" aria-hidden="true"></i></div>
								<div class="card search-filter" id="filter_later">
									<div class="card-header">
										<h4 class="card-title mb-0">Search Filter</h4>
									</div>
									<div class="card-body">
									
									<div class="filter-widget">
										
											<input type="text" class="form-control " placeholder="Select City">
												
									</div>
									<div class="slidecontainer">
										<h4>Price Range</h4>
									<input type="range" min="500" max="5000" value="500" step="500" class="slider" id="myRange">
									  <p>Value: <span id="demo"></span></p>	
									 </div>
									<div class="filter-widget">
										<h4>Select Specialist</h4>
										<select id="engrcategory" class="form-control" >
											@php
											 $res =  getallcategory();
											@endphp
											@foreach($res as $res)
											<option value="{{ $res->id }}" {{ ($res->id == $category_id)?'selected':'' }} >{{ $res->engrcategory }}</option>
											@endforeach
										  </select>
									</div>
										<div class="btn-search">
											<button type="button" class="btn btn-block">Search</button>
										</div>	
									</div>
								</div>
								<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">
							@include('searchengineer.searchengrpage')	
							{!! $engr->links() !!}
						</div>
					
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
			{{-- ==========================chat box ========================	 --}}
			<div class="container customchatbox" >
				<div class="chat_box">
				  <div class="head">
					<div class="user">
					  <div class="avatar">
						<img src="{{(Auth::check())? asset('engrphoto/'.Auth::user()->pic):'' }}" id="picofreciver"/>
					  </div>
					  <div class="name" id="nameofreciver">{{ (Auth::check())?Auth::user()->fname:'Test'}}</div>
					</div>
					<ul class="bar_tool">
					  <li><span class="alink"><a href="javascript:void(0)" onclick="closeclientchatbox()"><i class="fa fa-times" aria-hidden="true"></i></a></span></li>
					</ul>
				  </div>
				  <div class="chatbody" id="chatbody{{getuseronline()}}">
					<div class="chatboxdiv">
					<div class="incoming">
					
					  <div class="bubble">
						<p>Hey, Father's Day is coming up..</p>
					  </div>
					  <div class="bubble">
						<p>What are you getting.. Oh, oops sorry dude.</p>
					  </div>
					</div>
					<div class="outgoing">
					  <div class="bubble lower">
						<p>Nah, it's cool.</p>
					  </div>
					  <div class="bubble">
						<p>Well you should get your Dad a cologne. Here smell it. Oh wait! ...</p>
					  </div>
					</div>
				</div>
				  </div>
				  <div class="foot" style="position:relative">
					<form method='post' action="#">
						@csrf
						<input type="text" name="message" id="message" class="msg" placeholder="Type a message..." />
						<input type="text" name="senderid" id="senderid"  value="{{ (Auth::check())?Auth::user()->id:''}}" hidden/>
						<input type="text" name="reciverid" id="reciverid"  hidden/>
						<button type="submit" id="submitmsg" style="position: absolute;right:2%;"><i class="fas fa-paper-plane"></i></button>
					</form>
				  </div>
				</div>
			  </div>
			  {{-- ==========================chat box ========================	 --}}
			<!-- /Page Content -->
   
			<!-- Footer -->

			@push('childscript')
			<script src="{{ asset('js/app.js') }}"></script>
			<script>
				$(document).ready(function(){
					if (jQuery(window).width() > 767) {
						if (jQuery(".theiaStickySidebar").length > 0) {
							jQuery(".theiaStickySidebar").theiaStickySidebar({
								// Settings
								additionalMarginTop: 20,
							});
						}
					}
					// $("#engrcategory").select2();
				
				// 	$(document).on(click,'.page-link',function(e){
				// 	e.preventDefault();
				// 	var pathname = $(this).attr("href");
				// 	console.log(pathname);
                //     // var id_cat =pathname.substr(-1,1);
				// 	// $.ajaxSetup({
				// 	// 	headers: {
				// 	// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				// 	// 	}
				// 	// });
				// 	// $.ajax({
				// 	// 	url:'/searchspecificcategory/'+id_cat,
				// 	// 	method:'post',
				// 	// 	data:{id:id_cat},
				// 	// 	success:function(data){
				// 	// 		console.log(data);
				// 	// 	}
				// 	// });
				
				// });
				$('.customchatbox').hide();
				});
				
				var slider = document.getElementById("myRange");
				var output = document.getElementById("demo");
				output.innerHTML = slider.value; // Display the default slider value

				// Update the current slider value (each time you drag the slider handle)
				slider.oninput = function() {
				output.innerHTML = this.value;
				}
				$("#filter_eng").click(function(){
                   $("#filter_later").slideToggle('slow');
                });
				$(document).on("click", "#mobile_btn", function () {
					console.log("Arfan");
					$(".main-wrapper").toggleClass("slide-nav");
					$(".sidebar-overlay").toggleClass("opened");
					$("html").addClass("menu-opened");
					return false;
				});
				 $(document).on("click", ".sidebar-overlay", function () {
        $("html").removeClass("menu-opened");
        $(this).removeClass("opened");
        $("main-wrapper").removeClass("slide-nav");
    });

    $(document).on("click", "#menu_close", function () {
        $("html").removeClass("menu-opened");
        $(".sidebar-overlay").removeClass("opened");
        $("main-wrapper").removeClass("slide-nav");
    });
	function clientchat_box(engrid,clientid){
					
		$('.customchatbox').hide('slow');
					var clientid ='{{ (Auth::check())?Auth::user()->id:"not login" }}';
					if(clientid == "not login"){
						let urlpage = '{{url()->full() }}';
						
						var subpage ="";
						
						if(urlpage.lastIndexOf('=') == -1){
							
							var pathparameter = urlpage.slice(urlpage.lastIndexOf('/')+1,urlpage.length);
						}else{
							var pathparameter = urlpage.slice(urlpage.lastIndexOf('/')+1,urlpage.lastIndexOf('?'));
							var subpage = urlpage.slice(urlpage.lastIndexOf('=')+1,urlpage.length);
						}
						
						let remainurl = urlpage.slice(0,urlpage.lastIndexOf('/'));
						let routename = remainurl.slice(remainurl.lastIndexOf('/')+1 ,remainurl.length);
						
						console.log('subpage: '+ subpage);
						console.log('categoryid: '+pathparameter);
						console.log('pageroute: '+routename);
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});
						$.ajax({
							url:'{{ URL::to("sessionsearchengineer") }}',
							type:'post',
							data:{pathparameter:pathparameter,routename:routename,subpage:subpage},
							success:function(data){
								if(data == 'yes'){
									window.location.href = "{{ URL::to('login') }}";
								}
							}
						});
						
					}else{
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});
					$.ajax({
						url:"{{ URL::to('onegetchatmsg') }}",
						method:'post',
						data:{senderid:clientid,reciverid:engrid},
						success:function(data){
							console.log(data);
							$('.customchatbox').show('slow');
					        $('.customchatbox').attr('id','clientengr'+engrid+clientid);
					        $('.chatboxdiv').attr('id','chatbox'+engrid);
					        $('#reciverid').val(engrid);
							const innerDiv = document
							.getElementById('chatbody'+clientid)
							.querySelector('#chatbox'+engrid);
							if(innerDiv != null){
								$('#chatbox'+engrid).html('');
								$.each(data,function(res,value){
									if(value.senderid == clientid){
										var app_s ="<div class='outgoing'>"+
								    "<div class='bubble'>"+
								      "<p>"+value.message+"</p>"+
								    "</div>"+
								  "</div>";
									}else{
										var app_s ="<div class='incoming'>"+
								    "<div class='bubble'>"+
								      "<p>"+value.message+"</p>"+
								    "</div>"+
								  "</div>";
									}
									
								   
								    $('#chatbox'+engrid).append(app_s);
								});
								   
								}else{
								    alert("Not reciver online");
								}
							
						}
					});
					}
					
					

				}
				function closeclientchatbox(){
					$('.customchatbox').hide('slow');
				}
			</script>
			@endpush