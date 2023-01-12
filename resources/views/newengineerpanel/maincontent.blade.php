			<!-- Breadcrumb -->
			<div class="breadcrumb-bar topsection">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
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
											<li class="active">
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
											<li>
												<a href="{{ route('engclient') }}">
													<i class="fas fa-user-injured"></i>
													<span>My Clients</span>
												</a>
											</li>
											<li>
												<a href="{{ route('engrvideoconsult') }}">
													<i class="fas fa-user-injured"></i>
													<span>Video Consultant</span>
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
											<li>
												<a href="{{ route('engrchat') }}">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													{{-- <small class="unread-msg">23</small> --}}
												</a>
											</li>
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
												{{-- <a href="{{ route('engineerlogout') }}">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a> --}}
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
											<li class="active">
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
											<li>
												<a href="{{ route('engclient') }}">
													<i class="fas fa-user-injured"></i>
													<span>My Clients</span>
												</a>
											</li>
											<li>
												<a href="{{ route('engrvideoconsult') }}">
													<i class="fas fa-user-injured"></i>
													<span>Video Consultant</span>
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
											<li>
												<a href="{{ route('engrchat') }}">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													{{-- <small class="unread-msg">23</small> --}}
												</a>
											</li>
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
												{{-- <a href="{{ route('engineerlogout') }}">
													
													<span>Logout</span>
												</a> --}}
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-6">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="{{ asset('newpanel/assets/img/icon-01.png') }}" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Clients</h6>
															<h3>{{ (count($data) > 0)?count($data):'0' }}</h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-6">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" data-percent="65">
																<img src="{{ asset('newpanel/assets/img/icon-02.png') }}" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Today Client</h6>
															<h3>{{ (count($todayclient) > 0 )?count($todayclient):'0' }}</h3>
															<p class="text-muted">{{ Carbon\Carbon::today()->toDateString() }}</p>
														</div>
													</div>
												</div>
												
												{{-- <div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="{{ asset('newpanel/assets/img/icon-03.png') }}" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Appoinments</h6>
															<h3>85</h3>
															<p class="text-muted">06, Apr 2019</p>
														</div>
													</div>
												</div> --}}
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Client Appoinment</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Client Name</th>
																		<th>Appt Date</th>
																		{{-- <th>Purpose</th>
																		<th>Type</th> --}}
																		<th class="text-center">Paid Amount</th>
																		{{-- <th></th> --}}
																	</tr>
																</thead>
																<tbody>
																	@if(count($upcomclient) > 0)
																	@foreach ($upcomclient as $up_client)
																	@php
																	$clientup  = getuser($up_client->clientid);
																		if($clientup->signupoption == 1){
																			$upclientimg = $clientup->pic;
																		}else{
																			$upclientimg = asset('engrphoto/'.$clientup->pic);
																		}
																	@endphp
																	
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$upclientimg }}" alt="User Image"></a>
																				<a href="#">{{ getuser($up_client->clientid)->fname }} <span>#PT0006</span></a>
																			</h2>
																		</td>
																		<td>{{ $up_client->meetingdate }}</td>
																		
																		<td class="text-center">{{'$'.$up_client->tlprice }}</td>
																		{{-- <td class="text-right">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td> --}}
																	</tr>
																	@endforeach
																	@else
																	<tr>
																		<td colspan="3" class="text-center">{{ 'No Upcomming Appointments!!' }}</td>
																	</tr>
																	
																	@endif
																	
																	
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
									   
											<!-- Today Appointment Tab -->
											<div class="tab-pane" id="today-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Client Name</th>
																		<th>Appt Date</th>
																		
																		<th class="text-center">Paid Amount</th>
																		{{-- <th></th> --}}
																	</tr>
																</thead>
																<tbody>
																	@if(count($todayclient) > 0)
																	@foreach($todayclient as $t_client)
																	@php
																	$clientt  = getuser($t_client->clientid);
																		if($clientt->signupoption == 1){
																			$tclientimg = $clientt->pic;
																		}else{
																			$tclientimg = asset('engrphoto/'.$clientt->pic);
																		}
																	@endphp
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{ $tclientimg }}" alt="User Image"></a>
																				<a href="#">{{ getuser($t_client->clientid)->fname }} <span>#PT0006</span></a>
																			</h2>
																		</td>
																		<td>{{ $t_client->meetingdate }}</td>
																		
																		<td class="text-center">{{'$'.$t_client->tlprice }}</td>
																		{{-- <td class="text-right">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td> --}}
																	</tr>
																	@endforeach
																	@else
																	<tr>
																		<td colspan="3" class="text-center">{{ 'No Upcomming Appointments!!' }}</td>
																	</tr>
																	@endif
																</tbody>
															</table>		
														</div>	
													</div>	
												</div>	
											</div>
											<!-- /Today Appointment Tab -->
											
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>	
			{{-- {{ Route::current()->getName() }}	 --}}
			<!-- /Page Content -->
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

				});
				$("#filter_eng").click(function(){
			   $("#profilenavlater").slideToggle('slow');
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
			</script>
			@endpush