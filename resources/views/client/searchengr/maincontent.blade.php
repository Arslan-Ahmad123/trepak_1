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
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">2245 Engineer Found</h2>
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
										<option value="{{ $res->id }}" >{{ $res->engrcategory }}</option>
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
								<div class="p-2 mb-3" id="filter_eng" style="cursor:pointer">Sidebar Nav<i  class="fa fa-angle-down filtericon_cpro" aria-hidden="true"></i></div>
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
											<option value="{{ $res->id }}" >{{ $res->engrcategory }}</option>
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
						@if($engr)
						@foreach ($engr as $engrs)
						<!-- Doctor Widget -->
<div class="card">
    @php
		if($engrs->signupoption == 1){
		$img = $engrs->pic;
		}else{
		$img = asset('engrphoto/'.$engrs->pic);
		}
	@endphp
	<div class="doctor-widget searchcard">
		<div class="doc-info-left">
			<div class="doctor-img">
				<a href="#">
					<img src="{{$img }}"  alt="Engr Image" style="width: 100%;height: 100px;" >
				</a>
			</div>
			<div class="doc-info-cont">
				<h4 class="doc-name"><a href="#">{{ $engrs->fname }}</a></h4>
				<p class="doc-speciality">{{ getcategoryname($engrs->engrcategoryid) }}</p>
				{{-- <div id="specilizationfield">
					<h5 class="doc-department" style="text-align: left;color: #757575;"><img src="{{ asset('newpanel/assets/img/specialities/specialities-05.png') }}"  alt="Speciality">AUTO CAD</h5>
				</div> --}}
				<div id="client_engr_chat_box">
					<h5 class="doc-department" style="text-align: left;"><a href="javascript:void(0)" style="font-size: 14px;color: #757575;" ><i class="far fa-comment"></i> Chat</a></h5>
				</div>
				{{-- <div class="rating">
					<i class="fas fa-star filled"></i>
					<i class="fas fa-star filled"></i>
					<i class="fas fa-star filled"></i>
					<i class="fas fa-star filled"></i>
					<i class="fas fa-star"></i>
					<span class="d-inline-block average-rating">(17)</span>
				</div> --}}
				<div class="clinic-details">
					<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $engrs->city.' '.$engrs->state.', '.$engrs->country }}</p>
					{{-- <ul class="clinic-gallery">
						<li>
							<a href="{{ asset('newpanel/assets/img/features/feature-01.jpg') }}" data-fancybox="gallery">
								<img src="{{ asset('newpanel/assets/img/features/feature-01.jpg') }}" alt="Feature">
							</a>
						</li>
						<li>
							<a href="{{ asset('newpanel/assets/img/features/feature-02.jpg') }}" data-fancybox="gallery">
								<img  src="{{ asset('newpanel/assets/img/features/feature-02.jpg') }}" alt="Feature">
							</a>
						</li>
						<li>
							<a href="{{ asset('newpanel/assets/img/features/feature-03.jpg') }}" data-fancybox="gallery">
								<img src="{{ asset('newpanel/assets/img/features/feature-03.jpg') }}" alt="Feature">
							</a>
						</li>
						<li>
							<a href="{{ asset('newpanel/assets/img/features/feature-04.jpg') }}" data-fancybox="gallery">
								<img src="{{ asset('newpanel/assets/img/features/feature-04.jpg') }}" alt="Feature">
							</a>
						</li>
					</ul> --}}
				</div>
				{{-- <div class="clinic-services">
					<span>3D Graph</span>
					<span>Artitect</span>
				</div> --}}
				<div id="showhideactionbtn" class="mt-3">
					<form method="post">
						@csrf
						<input type="text" name="userid" value="{{ $engrs->id }}" hidden>
						<button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('viewprofileeng') }}"><i class="fa fa-eye" aria-hidden="true"></i>Profile</button>
						<button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('booking') }}"><i class="fa fa-check" aria-hidden="true"></i>Booked</button>
					</form>
					{{-- <div class="clinic-booking">
						<a class="view-pro-btn" href="{{ route('viewprofileeng',['id'=>$engrs->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i>profile</a>
						<a class="apt-btn" href="{{ route('booking',['id'=>$engrs->id]) }}"><i class="fa fa-check" aria-hidden="true"></i>Booked</a>
					</div> --}}
				</div>
				
			</div>
		</div>
		<div class="doc-info-right">
			<div class="clini-infos">
				<ul>
					<li><i class="far fa-thumbs-up"></i> 98%</li>
					<li><a href="javascript:void(0)" ><i class="far fa-comment"></i> Chat</a></li>
					{{-- <li><i class="fas fa-map-marker-alt"></i> Florida, USA</li> --}}
					{{-- <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li> --}}
				</ul>
			</div>
			<div class="clinic-booking">
				<form method="post">
					@csrf
					<input type="text" name="userid" value="{{ $engrs->id }}" hidden>
					<button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('viewprofileeng') }}"><i class="fa fa-eye" aria-hidden="true"></i>Profile</button>
					<button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('booking') }}"><i class="fa fa-check" aria-hidden="true"></i>Booked</button>
				</form>
				{{-- <a class="view-pro-btn" href="{{ route('viewprofileeng',['id'=>$engrs->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i>profile</a>
				<a class="apt-btn" href="{{ route('booking',['id'=>$engrs->id]) }}"><i class="fa fa-check" aria-hidden="true"></i>Booked</a> --}}
			</div>
		</div>
	</div>

</div>
<!-- /Doctor Widget -->
						@endforeach
						<div class="load-more text-center">
							{{$engr->links() }}	
						</div>
						@else
						@endif
							<!-- Doctor Widget -->
							{{-- <div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="doctor-profile.html">
													<img src="{{ asset('newpanel/assets/img/doctors/doctor-thumb-01.jpg') }}" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="doctor-profile.html">Ruby Perrin</a></h4>
												<p class="doc-speciality">Software Engineer</p>
												<h5 class="doc-department"><img src="{{ asset('newpanel/assets/img/specialities/specialities-05.png') }}" class="img-fluid" alt="Speciality">Dentist</h5>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">(17)</span>
												</div>
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Florida, USA</p>
													<ul class="clinic-gallery">
														<li>
															<a href="{{ asset('newpanel/assets/img/features/feature-01.jpg') }}" data-fancybox="gallery">
																<img src="{{ asset('newpanel/assets/img/features/feature-01.jpg') }}" alt="Feature">
															</a>
														</li>
														<li>
															<a href="{{ asset('newpanel/assets/img/features/feature-02.jpg') }}" data-fancybox="gallery">
																<img  src="{{ asset('newpanel/assets/img/features/feature-02.jpg') }}" alt="Feature">
															</a>
														</li>
														<li>
															<a href="{{ asset('newpanel/assets/img/features/feature-03.jpg') }}" data-fancybox="gallery">
																<img src="{{ asset('newpanel/assets/img/features/feature-03.jpg') }}" alt="Feature">
															</a>
														</li>
														<li>
															<a href="{{ asset('newpanel/assets/img/features/feature-04.jpg') }}" data-fancybox="gallery">
																<img src="{{ asset('newpanel/assets/img/features/feature-04.jpg') }}" alt="Feature">
															</a>
														</li>
													</ul>
												</div>
												<div class="clinic-services">
													<span>Software</span>
													<span>Programer</span>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clini-infos">
												<ul>
													<li><i class="far fa-thumbs-up"></i> 98%</li>
													<li><i class="far fa-comment"></i> 17 Feedback</li>
													<li><i class="fas fa-map-marker-alt"></i> Florida, USA</li>
													<li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
												</ul>
											</div>
											<div class="clinic-booking">
												<a class="view-pro-btn" href="{{ route('viewprofileeng',['id'=>]) }}">View Profile</a>
												<a class="apt-btn" href="{{ route('booking') }}">Book Appointment</a>
											</div>
										</div>
									</div>
								</div>
							</div> --}}
							<!-- /Doctor Widget -->



						

								
						</div>
					</div>

				</div>

			</div>	
			{{-- ==========================chat box ========================	 --}}
			<div class="container customchatbox" style="display:none">
				<div class="chat_box">
				  <div class="head">
					<div class="user">
					  <div class="avatar">
						<img src="https://picsum.photos/g/40/40" />
					  </div>
					  <div class="name">Kai Cheng</div>
					</div>
					<ul class="bar_tool">
					  <li><span class="alink"><a href="javascript:void(0)" onclick="closeclientchatbox()"><i class="fa fa-times" aria-hidden="true"></i></a></span></li>
					</ul>
				  </div>
				  <div class="chatbody" id="chatbody{{getuseronline()}}">
					<div class="chatboxdiv" >
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
				  <div class="foot">
					{{-- <input type="text" class="msg" placeholder="Type a message..." />
					<button type="submit"><i class="fas fa-paper-plane"></i></button> --}}
					<form method='post' action="#">
						@csrf
						<input type="text" name="message" id="message" class="msg" placeholder="Type a message..." />
						<input type="text" name="senderid" id="senderid"  value="{{ (Auth::check())?Auth::user()->id:''}}" hidden/>
						<input type="text" name="reciverid" id="reciverid"  hidden/>
						<button type="submit" id="submitmsg"><i class="fas fa-paper-plane"></i></button>
					</form>
				  </div>
				</div>
			  </div>
			  {{-- ==========================chat box ========================	 --}}
			<!-- /Page Content -->
			@push('childscript')
			<script src="{{ asset('js/app.js') }}"></script>
			<script>
				$(document).ready(function(){
					$("#filter_eng").click(function(){
                   $("#filter_later").slideToggle('slow');
                });
				$('.customchatbox').hide();

				});
				function clientchat_box(engrid,clientid){
					
					$('.customchatbox').hide('slow');
					var clientid ='{{ (Auth::check())?Auth::user()->id:"not login" }}';
					if(clientid == "not login"){
						window.location.href = "{{ URL::to('login') }}";
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