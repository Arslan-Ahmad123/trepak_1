{{-- <style>
	.modal-backdrop {
    z-index: -1;
}
</style> --}}
<!-- Breadcrumb -->
			<div class="breadcrumb-bar topsection">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Client Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Client Dashboard</h2>
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
											<img src="{{ $img }}" alt="User Image">
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
											<li class="active">
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
											<img src="{{ $img }}" alt="User Image">
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
											<li class="active">
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
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_medical_records" data-toggle="tab"><span class="med-records">Pending</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_billing" data-toggle="tab">Completed</a>
											</li>
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Engineer</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<th>Engineer Status</th>
																	<th>Client Status</th>
																	<th>Action</th>
																</tr>
															</thead>
															<tbody>
																@foreach ($order as $orders)
																
																<tr>
																	@php
																		$engrinfo = getuser($orders->engrid);
																		if($engrinfo->signupoption == 1){
																			$engrimg = $engrinfo->pic;
																		}else{
																			$engrimg = asset('engrphoto/'.$engrinfo->pic);
																		}
																	@endphp
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">

																				<img class="avatar-img rounded-circle" src="{{ $engrimg }}" alt="User Image">
																			</a>


																			<a href="doctor-profile.html"> {{ getuser($orders->engrid)->fname }} <span> {{ getcategoryname(getuser($orders->engrid)->engrcategoryid)  }}</span></a>
																		</h2>
																	</td>
																	<td>{{ $orders->meetingdate }}</td>
																	<td>{{ $orders->tlprice }}</td>
																	<td><span class="badge badge-pill bg-{{($orders->engrstatus == 0)?'light':'success'  }}">{{ ($orders->engrstatus == 0)?'Pending':'Conform' }}</span></td>
																	<td><span class="badge badge-pill bg-{{($orders->clientstatus == 0)?'light':'success'  }}">{{ ($orders->clientstatus == 0)?'Un Completed':'Completed' }}</span></td>
																	
																	<td class="text-right">
																		<div class="table-action">
																			
																			<button onclick="showorderinfo({{ $orders->id }})" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</button>
																		</div>
																	</td>
																</tr>
																@endforeach
																
																
																
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										
											
										<!-- Pending -->
										<div id="pat_medical_records" class="tab-pane fade">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Engineer</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<th>Engineer Status</th>
																	<th>Client Status</th>
																	<th>Action</th>
																</tr>
															</thead>
															<tbody>
																@foreach ($order as $orders)
																@if ($orders->clientstatus == 0)
																	
																
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="{{$engrimg }}" alt="User Image">
																			</a>


																			<a href="doctor-profile.html"> {{ getuser($orders->engrid)->fname }} <span> {{ getcategoryname(getuser($orders->engrid)->engrcategoryid)  }}</span></a>
																		</h2>
																	</td>
																	<td>{{ $orders->meetingdate }}</td>
																	<td>{{ $orders->tlprice }}</td>
																	<td><span class="badge badge-pill bg-{{($orders->engrstatus == 0)?'light':'success'  }}">{{ ($orders->engrstatus == 0)?'Pending':'Conform' }}</span></td>
																	<td><span class="badge badge-pill bg-{{($orders->clientstatus == 0)?'light':'success'  }}">{{ ($orders->clientstatus == 0)?'Pending':'Completed' }}</span></td>
																	
																	<td class="text-right">
																		<div class="table-action">
																			
																			<button onclick="showorderinfo({{ $orders->id }})" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</button>
																		</div>
																	</td>
																</tr>
																@endif
																@endforeach
																
																
																
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- Pending -->
										
										<!-- Completed -->
										<div id="pat_billing" class="tab-pane fade">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Engineer</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<th>Client Status</th>
																	<th>Action</th>
																</tr>
															</thead>
															<tbody>
																@foreach ($order as $orders)
																@if ($orders->clientstatus == 1)
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="{{ $engrimg }}" alt="User Image">
																			</a>


																			<a href="doctor-profile.html"> {{ getuser($orders->engrid)->fname }} <span> {{ getcategoryname(getuser($orders->engrid)->engrcategoryid)  }}</span></a>
																		</h2>
																	</td>
																	<td>{{ $orders->meetingdate }}</td>
																	<td>{{ $orders->tlprice }}</td>
																	
																	<td><span class="badge badge-pill bg-{{($orders->clientstatus == 0)?'light':'success'  }}">{{ ($orders->clientstatus == 0)?'Un Completed':'Completed' }}</span></td>
																	
																	<td class="text-right">
																		<div class="table-action">
																			
																			<button onclick="showorderinfo({{ $orders->id }})" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</button>
																		</div>
																	</td>
																</tr>
																@else
																
																@endif
																@endforeach
																
																
																
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- Completed -->
										
									</div>
									<!-- Tab Content -->
									
								</div>
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
					$("#filter_eng").click(function(){
                   $("#profilenavlater").slideToggle('slow');
                });
						function showorderinfo(id){
							$.ajax({
								url:'/user/fetchorderinfo/'+id,
								method:'get',
								success:function(data){
									console.log(data);
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
					
				</script>
			  @endpush