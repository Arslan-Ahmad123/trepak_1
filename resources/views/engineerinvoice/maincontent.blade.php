			<!-- Breadcrumb -->
			<div class="breadcrumb-bar topsection">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoices</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Invoices</h2>
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
											<img src="{{ asset('engrphoto/'.Auth::user()->pic) }}" alt="User Image">
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
											<li class="active">
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
											</li>
										</ul>
									</nav>
								</div>
							</div>

							<div class="profile-sidebar" id="profilenavlater">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="{{ asset('engrphoto/'.Auth::user()->pic) }}" alt="User Image">
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
											{{-- <li>
												<a href="{{ route('engschedule') }}">
													<i class="fas fa-hourglass-start"></i>
													<span>Schedule Timings</span>
												</a>
											</li> --}}
											<li class="active">
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
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
						<div class="col-md-12 col-lg-8 col-xl-9">
							<div class="card card-table">
								<div class="card-body">
								
									<!-- Invoice Table -->
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Sr No</th>
													<th>Client</th>
													<th>Amount</th>
													<th>Paid On</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												@if(count($data) > 0)
												@php
												$index = 1;
												@endphp
												@foreach ($data as $datas)
												<tr>
													<td>
														<a href="#">{{ $index++ }}</a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="patient-profile.html" class="avatar avatar-sm mr-2">
																<img class="avatar-img rounded-circle" src="{{ asset('engrphoto/'.getuser($datas->clientid)->pic) }}" alt="User Image">
															</a>

															<a href="#">{{getuser($datas->clientid)->fname  }} </a>
														</h2>
													</td>
													<td>{{ '$'.$datas->tlprice }}</td>
													<td>{{ $datas->meetingdate }}</td>
													<td class="text-right">
														<div class="table-action">
															<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td>
												</tr>
												@endforeach
												@else
												@endif
												
												
											</tbody>
										</table>
									</div>
									<!-- /Invoice Table -->
									
								</div>
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
   