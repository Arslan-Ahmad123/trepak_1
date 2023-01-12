
<!-- Breadcrumb -->
			<div class="breadcrumb-bar topsection">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Appointments</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Appointments</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar" translate="no">
						
							<!-- Profile Sidebar -->
							<div class="p-2 mb-3" id="filter_eng" style="cursor:pointer">Sidebar Nav<i  class="fa fa-angle-down filtericon_cpro" aria-hidden="true"></i></div>
							<div class="profile-sidebar" id="profilenav">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											@php
												if(Auth::user()->signupoption == 1){
												$engrimg = Auth::user()->pic; 
											}else{
												$engrimg = asset('engrphoto/'.Auth::user()->pic);
											}
											@endphp
											<img src="{{ $engrimg }}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>{{ Auth::user()->fname }}</h3>
											
											<div class="patient-details">
												<h5 class="mb-0">{{ getcategoryname(Auth::user()->engrcategoryid) }}</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li >
												<a href="{{ route('newengineerpanel') }}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li class="active">
												<a href="{{ route('engappointment') }}">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											<li>
												<a href="{{ route('engclient') }}">
													<i class="fas fa-user-injured"></i>
													<span>My Clients</span>
												</a>
											</li>
											{{-- <li>
												<a href="{{ route('engschedule') }}">
													<i class="fas fa-hourglass-start"></i>
													<span>Schedule Timings</span>
												</a>
											</li> --}}
											<li>
												<a href="{{ route('enginvoice') }}">
													<i class="fas fa-file-invoice"></i>
													<span>Invoices</span>
												</a>
											</li>
											<li>
												<a href="{{ route('engreviews') }}">
													<i class="fas fa-star"></i>
													<span>Reviews</span>
												</a>
											</li>
											{{-- <li>
												<a href="{{ route('engrchat') }}">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													{{-- <small class="unread-msg">23</small> --
												</a>
											</li> --}}
											<li>
												<a href="{{ route('engprofilesetting') }}">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											
											<li>
												<a href="{{ route('engr_changepassword') }}">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<form action="{{ route('engineerlogout') }}" method="post">
													@csrf
													<button type="submit" class="btn" style="border:none;color:grey" onMouseOver="this.style.color='rgb(32, 205, 218)'"
													onMouseOut="this.style.color='grey'"><i class="fas fa-sign-out-alt ml-2"></i><span class="ml-2">Logout</span></button>
												
											</form>
											</li>
										</ul>
									</nav>
								</div>
							</div>

							<div class="profile-sidebar" id="profilenavlater">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="{{ $engrimg }}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>{{ Auth::user()->fname }}</h3>
											
											<div class="patient-details">
												<h5 class="mb-0">{{ getcategoryname(Auth::user()->engrcategoryid) }}</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="{{ route('newengineerpanel') }}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li class="active">
												<a href="{{ route('engappointment') }}">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											<li>
												<a href="{{ route('engclient') }}">
													<i class="fas fa-user-injured"></i>
													<span>My Clients</span>
												</a>
											</li>
											{{-- <li>
												<a href="{{ route('engschedule') }}">
													<i class="fas fa-hourglass-start"></i>
													<span>Schedule Timings</span>
												</a>
											</li> --}}
											<li>
												<a href="{{ route('enginvoice') }}">
													<i class="fas fa-file-invoice"></i>
													<span>Invoices</span>
												</a>
											</li>
											<li>
												<a href="{{ route('engreviews') }}">
													<i class="fas fa-star"></i>
													<span>Reviews</span>
												</a>
											</li>
											{{-- <li>
												<a href="{{ route('engrchat') }}">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													{{-- <small class="unread-msg">23</small> --
												</a>
											</li> --}}
											<li>
												<a href="{{ route('engprofilesetting') }}">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											
											<li>
												<a href="{{ route('engr_changepassword') }}">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<form action="{{ route('engineerlogout') }}" method="post">
													@csrf
													<button type="submit" class="btn" style="border:none;color:grey" onMouseOver="this.style.color='rgb(32, 205, 218)'"
													onMouseOut="this.style.color='grey'"><i class="fas fa-sign-out-alt ml-2"></i><span class="ml-2">Logout</span></button>
												
											</form>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">
							<div class="appointments">
							@if(count($data) > 0)
							@foreach ($data as $datas)
							@php
							$clientdata = getuser($datas->clientid);
								if($clientdata->signupoption == 1)
								{
									$clientimg = $clientdata->pic;
								}else{
									$clientimg = asset('engrphoto/'.$clientdata->pic);
								}
							@endphp
								<!-- Appointment List -->
								<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="patient-profile.html" class="booking-doc-img">
											<img src="{{ $clientimg }}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="patient-profile.html">{{ getuser($datas->clientid)->fname }}</a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i> {{ $datas->meetingdate }}</h5>
												<h5><i class="fas fa-map-marker-alt"></i> {{ getuser($datas->clientid)->state.', '.getuser($datas->clientid)->country }}</h5>
												<h5><i class="fas fa-envelope"></i> {{ getuser($datas->clientid)->email }}</h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i> {{ getuser($datas->clientid)->mobile }}</h5>
											</div>
										</div>
									</div>
									<div class="appointment-action">
										<button onclick="showorderinfo({{ $datas->id }})" class="btn btn-sm bg-info-light mr-2">
											<i class="far fa-eye"></i> View
										</button>
										<a href="javascript:void(0);" onClick="acceptAppointment({{$datas->id}})" class="btn btn-sm bg-success-light">
											<i class="fas fa-check"></i> Accept
										</a>
										<a href="javascript:void(0);" onclick="cancelAppointment({{$datas->id}})" class="btn btn-sm bg-danger-light">
											<i class="fas fa-times"></i> Cancel
										</a>
									</div>
								</div>
								<!-- /Appointment List -->
							@endforeach
							@else
							<div class="appointment-list">
								<div class="profile-info-widget">
									<p>No Appointments Found!!</p>
								</div>
								
							</div>
							
							@endif
								{{-- <!-- Appointment List -->
								<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="patient-profile.html" class="booking-doc-img">
											<img src="{{ asset('newpanel/assets/img/patients/patient.jpg') }}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="patient-profile.html">Richard Wilson</a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i> 14 Nov 2019, 10.00 AM</h5>
												<h5><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
												<h5><i class="fas fa-envelope"></i> richard@example.com</h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i> +1 923 782 4575</h5>
											</div>
										</div>
									</div>
									<div class="appointment-action">
										<a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
											<i class="far fa-eye"></i> View
										</a>
										<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
											<i class="fas fa-check"></i> Accept
										</a>
										<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
											<i class="fas fa-times"></i> Cancel
										</a>
									</div>
								</div>
								<!-- /Appointment List --> --}}
							
								
								
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
			{{-- client modal for show info of order  --}}
			<div class="modal"  id="clientinfoorder">
				<div class="modal-dialog" role="document">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title" style="font-weight:bold;">Order Info</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>
					<div class="modal-body">
					 <div class="row">
						<div class="col-6">
							<h6 >Client Name:<span id="client_name" style="font-weight: bold;"></span> </h6>
							<h6 > Address: <span id="client_add" style="font-weight: bold;"></span></h6>
						</div>
						<div class="col-6">	
							<h6>Engineer Name:<span id="engr_name" style="font-weight: bold;"></span> </h6>
							<h6>Engineer Category:<span id="engr_category" style="font-weight: bold;"></span></h6>
							<h6>Address: <span id="engr_add" style="font-weight: bold;"></span></h6>
						</div>
						<hr style="width: 100%;height: 2px;background-color: grey">
						<div class="col-3">
						</div>
						<div class="col-5">
							<h6>Date:</h6>
							<h6>Consulting Fee:</h6>
							<h6>Booking Fee:</h6>
							<hr style="width: 100%;height: 2px;background-color: grey">
							<h6 style="font-weight: bold;">Total Fee:</h6>
						</div>
						<div class="col-4">
							<h6 id="meeting_date">22-10-5</h6>
							<h6 id="consultingfee">10</h6>
							<h6 id="bookingfee">50</h6>
							<hr style="width: 100%;height: 2px;background-color: grey">
							<h6 id="totalfee" style="font-weight: bold;">60</h6>
						</div>
					 </div>
					</div>
					
				  </div>
				</div>
			</div>
			{{-- client modal for show info of order  --}}





			@push('childscript')
			<script>
				$(document).ready(function(){
					$.ajax({
						url:'{{ url("userstatusonline") }}',
						method:'get',
						success:function(data){
							console.log(data);
						}
					});
					$(document).on("click", "#mobile_btn", function () {
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
	$("#filter_eng").click(function(){
			   $("#profilenavlater").slideToggle('slow');
			});
    $(document).on("click", "#menu_close", function () {
        $("html").removeClass("menu-opened");
        $(".sidebar-overlay").removeClass("opened");
        $("main-wrapper").removeClass("slide-nav");
    });
				});

				window.onbeforeunload = function () {
				  
				  $.ajax({
						  url:'{{ url("userstatusoffline") }}',
						  method:'get',
						  success:function(data){
							  console.log(data);
						  }
					  });
			  };

			function showorderinfo(id){
				console.log(id);
				$.ajax({
					url:'/engineer/fetchorderinfo/'+id,
					method:'get',
					success:function(data){
						$('#client_name').text(' '+data[2].fname+' '+data[2].lname);	
						$('#client_add').text(' '+data[2].city+' '+data[2].country);	
						$('#engr_name').text(' '+data[1].fname+' '+data[1].lname);	
						$('#engr_add').text(' '+data[1].city+' '+data[1].country);	
						$('#engr_category').text(' '+data[3]);	
						$('#meeting_date').text(data[0].meetingdate);	
						$('#consultingfee').text('$'+data[0].consultingfee);	
						$('#bookingfee').text('$'+data[0].bookingfee);	
						$('#totalfee').text('$'+data[0].tlprice);	
						let d = new Date(data[0].meetingdate);
						console.log(d.toLocaleDateString());
						$('#clientinfoorder').appendTo("body").modal({
								backdrop: 'static',
								keyboard: true, 
								show: true
						}); 
					}
				});
			}
			function acceptAppointment(id) {
				$.ajax({
					url:'/engineer/acceptappointment/'+id,
					method:'get',
					success:function(data){
						// console.log(data);
						location.reload();
					}
				});
			}
			function cancelAppointment(id) {
				
				$.ajax({
					url:'/engineer/cancelappointment/'+id,
					method:'get',
					success:function(data){
						// console.log(data);
						location.reload();
					}
				});
			}


			</script>
			@endpush