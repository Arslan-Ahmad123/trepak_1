			<div class="breadcrumb-bar topsection">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
					
						<!-- Profile Sidebar -->
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
							@php
								$client = Auth::user();
							@endphp
							<div class="p-2 mb-3" id="filter_eng" style="cursor:pointer">Sidebar Nav<i  class="fa fa-angle-down filtericon_cpro" aria-hidden="true"></i></div>
							<div class="profile-sidebar" id="profilenav">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="{{ asset('engrphoto/'.$client->pic) }}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>{{ $client->fname }}</h3>
											<div class="patient-details">
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ $client->city.', '.$client->country }}</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li >
												<a href="{{ route('clientprofile') }}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											
											{{-- <li>
												<a href="{{ route('clientchat') }}">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													<small class="unread-msg">23</small>
												</a>
											</li> --}}
											<li >
												<a href="{{ route('clientsearchengr') }}">
													<i class="fas fa-columns"></i>
													<span>Client Search</span>
												</a>
											</li>
											<li class="active">
												<a href="{{ route('clientprofilesetting') }}">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="{{ route('clientchangepassword') }}">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<form action="{{ route('logout') }}" method="post">
													@csrf
													<button class="btn border-none text-secondary ml-2">
														<i class="fas fa-sign-out-alt"></i>
													    <span>Logout</span>
													</button>
												</form>
											</li>
										</ul>
									</nav>
								</div>

							</div>

							{{-- ============later nav bar profile======================== --}}
							<div class="profile-sidebar" id="profilenavlater">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="{{ asset('engrphoto/'.$client->pic) }}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>{{ $client->fname }}</h3>
											<div class="patient-details">
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ $client->city.', '.$client->country }}</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li >
												<a href="{{ route('clientprofile') }}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											
											{{-- <li>
												<a href="{{ route('clientchat') }}">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													<small class="unread-msg">23</small>
												</a>
											</li> --}}
											<li >
												<a href="{{ route('clientsearchengr') }}">
													<i class="fas fa-columns"></i>
													<span>Client Search</span>
												</a>
											</li>
											<li class="active">
												<a href="{{ route('clientprofilesetting') }}">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="{{ route('clientchangepassword') }}">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<form action="{{ route('logout') }}" method="post">
													@csrf
													<button class="btn border-none text-secondary ml-2">
														<i class="fas fa-sign-out-alt"></i>
													    <span>Logout</span>
													</button>
												</form>
											</li>
										</ul>
									</nav>
								</div>

							</div>
							{{-- ============later nav bar profile======================== --}}
						</div>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-12 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
									<form>
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="{{ asset('engrphoto/'.$client->pic) }}" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" class="upload">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" value="{{ $client->fname }}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control" value="{{ $client->lname }}">
												</div>
											</div>
											{{-- <div class="col-12 col-md-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="cal-icon">
														<input type="text" class="form-control datetimepicker" value="24-07-1983">
													</div>
												</div>
											</div> --}}
											{{-- <div class="col-12 col-md-6">
												<div class="form-group">
													<label>Blood Group</label>
													<select class="form-control select">
														<option>A-</option>
														<option>A+</option>
														<option>B-</option>
														<option>B+</option>
														<option>AB-</option>
														<option>AB+</option>
														<option>O-</option>
														<option>O+</option>
													</select>
												</div>
											</div> --}}
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" class="form-control" value="{{ $client->email }}" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" value="{{ $client->mobile }}" class="form-control">
												</div>
											</div>
											
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control" value="{{ $client->city }}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>State</label>
													<input type="text" class="form-control" value="{{ $client->state }}">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
												<label>Address</label>
													<input type="text" readonly class="form-control" value="{{ $client->city.' '.$client->state.', '.$client->country }}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control" value="{{ $client->country }}">
												</div>
											</div>
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
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