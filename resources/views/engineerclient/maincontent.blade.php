			<!-- Breadcrumb -->
			<div class="breadcrumb-bar topsection">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">My Clients</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">My Clients</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
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
										<img src="{{$engrimg}}" alt="User Image">
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
										<li>
											<a href="{{ route('engappointment') }}">
												<i class="fas fa-calendar-check"></i>
												<span>Appointments</span>
											</a>
										</li>
										<li class="active">
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
										<li >
											<a href="{{ route('newengineerpanel') }}">
												<i class="fas fa-columns"></i>
												<span>Dashboard</span>
											</a>
										</li>
										<li>
											<a href="{{ route('engappointment') }}">
												<i class="fas fa-calendar-check"></i>
												<span>Appointments</span>
											</a>
										</li>
										<li class="active">
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
						
							<div class="row row-grid">
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
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="{{ $clientimg }}" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3><a href="#">{{ getuser($datas->clientid)->fname }}</a></h3>
														
														<div class="patient-details">
															<h5><b>Client ID :</b> P0016</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{ getuser($datas->clientid)->state.', '.getuser($datas->clientid)->state }}</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>{{ getuser($datas->clientid)->mobile }}</span></li>
													<li>Email <span>{{ getuser($datas->clientid)->email  }}</span></li>
													
												</ul>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								@else
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
													<p>No Clients Found!!</p>
										</div>
									</div>
								</div>
								
								@endif
								
								
							</div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
			@push('childscript')
			<script>
				$("#filter_eng").click(function(){
			   $("#profilenavlater").slideToggle('slow');
			});
			</script>
			@endpush