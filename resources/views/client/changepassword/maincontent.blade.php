			<!-- Breadcrumb -->
			<div class="breadcrumb-bar topsection">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
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
								if($client->signupoption == 1){
								$img = $client->pic;
								}else{
								$img = asset('engrphoto/'.$client->pic);
								}
							@endphp
							<div class="p-2 mb-3" id="filter_eng" style="cursor:pointer">Sidebar Nav<i  class="fa fa-angle-down filtericon_cpro" aria-hidden="true"></i></div>
							<div class="profile-sidebar" id="profilenav">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="{{ $img}}" alt="User Image">
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
											<li>
												<a href="{{ route('clientsearchengr') }}">
													<i class="fas fa-columns"></i>
													<span>Client Search</span>
												</a>
											</li>
											<li>
												<a href="{{ route('clientprofilesetting') }}">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li class="active">
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
											<li>
												<a href="{{ route('clientsearchengr') }}">
													<i class="fas fa-columns"></i>
													<span>Client Search</span>
												</a>
											</li>
											<li>
												<a href="{{ route('clientprofilesetting') }}">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li class="active">
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
									<div class="row">
										<div class="col-md-12 col-lg-6">
										
											<!-- Change Password Form -->
											<form>
												<div class="form-group">
													<label>Old Password</label>
													<input type="password" class="form-control">
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control">
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" class="form-control">
												</div>
												<div class="submit-section">
													<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
												</div>
											</form>
											<!-- /Change Password Form -->
											
										</div>
									</div>
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