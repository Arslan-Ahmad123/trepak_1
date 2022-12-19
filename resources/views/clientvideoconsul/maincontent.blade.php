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

							
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Video Appoinment</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Un Conformed</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#engr_reply-appointments" data-toggle="tab">Engineer Reply</a>
											</li>
											<li class="nav-item">
												<a class="nav-link " href="#client_reply-appointments" data-toggle="tab">You Reply</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#today-appointments" data-toggle="tab">Conformed</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- unconformed Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Client Name</th>
																		<th>Engineer Name</th>
																		<th>Appt Date</th>
																		<th>Appt Time</th>
																		{{-- <th>Purpose</th>
																		<th>Type</th> --}}
																		{{-- <th class="text-center">Reply</th> --}}
																		{{-- <th></th> --}}
																	</tr>
																</thead>
																<tbody>
																	@if(count($res_un_c) > 0)
																	@foreach ($res_un_c as $up_client)
																	
																	@php
																
																	$clientup  = getuser($up_client->user_id);
																	$engineerup  = getuser($up_client->engr_id);
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
																				<a href="#">{{ $clientup->fname }} <span>#PT0006</span></a>
																			</h2>
																		</td>
																		<td>{{ $engineerup->fname }}</td>
																		<td>{{ $up_client->client_date }}</td>
																		
																		<td >{{ \Carbon\Carbon::createFromFormat('H:i',$up_client->client_time)->format('h:i A') }}</td>
																		{{-- <td class="center"><button class="btn btn-sm {{ $up_client->engr_reply != "" ?'btn-danger' :'btn-info' }}" onclick="showreplymodal({{ $up_client->id }},{{ $up_client->user_id }})">{{ $up_client->engr_reply != "" ?'Already Reply' :'Reply' }}</button></td> --}}
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
																		<td colspan="4" class="text-center">{{ 'No Upcomming Appointments!!' }}</td>
																	</tr>
																	
																	@endif
																	
																	
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
											
											<!-- Your Reply -->
											<div class="tab-pane" id="engr_reply-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Client Name</th>
																		<th>Client</th>
																		<th>Engineer</th>
																		{{-- <th>Purpose</th>
																		<th>Type</th> --}}
																		<th class="text-center">Reply</th>
																		{{-- <th></th> --}}
																	</tr>
																</thead>
																<tbody>
																	@if(count($engr_reply) > 0)
																	@foreach ($engr_reply as $up_client)
																	
																	@php
																
																	$clientup  = getuser($up_client->user_id);
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
																				<a href="#">{{ $clientup->fname }} <span>#PT0006</span></a>
																			</h2>
																		</td>
																		<td>{{ $up_client->client_date }} - {{ \Carbon\Carbon::createFromFormat('H:i',$up_client->client_time)->format('h:i A') }}</td>
																		@php
																			$engr_rly = explode(',',$up_client->engr_reply);
																			
																		@endphp
																		<td >{{ $engr_rly[0] }} - {{ \Carbon\Carbon::createFromFormat('H:i',$engr_rly[1])->format('h:i A') }}</td>
																		<td class="center"><button class="btn btn-sm btn-info"  onclick="showreplymodal({{ $up_client->id }},{{ $up_client->engr_id }})">Reply</button></td>
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
																		<td colspan="4" class="text-center">{{ 'No Upcomming Appointments!!' }}</td>
																	</tr>
																	
																	@endif
																	
																	
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Your Reply -->

											<!-- Client Reply -->
											<div class="tab-pane " id="client_reply-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Client Name</th>
																		<th>Appt Date</th>
																		<th>Appt Time</th>
																		{{-- <th>Purpose</th>
																		<th>Type</th> --}}
																		<th class="text-center">Reply</th>
																		{{-- <th></th> --}}
																	</tr>
																</thead>
																<tbody>
																	@if(count($client_reply) > 0)
																	@foreach ($client_reply as $up_client)
																	
																	@php
																
																	$clientup  = getuser($up_client->user_id);
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
																				<a href="#">{{ $clientup->fname }} <span>#PT0006</span></a>
																			</h2>
																		</td>
																		<td>{{ $up_client->client_date }}</td>
																		
																		<td >{{ \Carbon\Carbon::createFromFormat('H:i',$up_client->client_time)->format('h:i A') }}</td>
																		<td class="center"><button class="btn btn-sm {{ $up_client->engr_reply != "" ?'btn-danger' :'btn-info' }}" onclick="showreplymodal({{ $up_client->id }},{{ $up_client->engr_id }})">{{ $up_client->engr_reply != "" ?'Already Reply' :'Reply' }}</button></td>
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
																		<td colspan="4" class="text-center">{{ 'No Upcomming Appointments!!' }}</td>
																	</tr>
																	
																	@endif
																	
																	
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Client Reply -->

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
																		<th>Appt Time</th>
																		<th class="text-center">Client No</th>
																		{{-- <th></th> --}}
																	</tr>
																</thead>
																<tbody>
																	@if(count($res_c) > 0)
																	@foreach($res_c as $t_client)
																	@php
																	$clientt  = getuser($t_client->user_id);
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
																				<a href="#">{{ $clientt->fname }} <span>#PT0006</span></a>
																			</h2>
																		</td>
																		<td>{{ $t_client->client_date }}</td>
																		
																		<td >{{\Carbon\Carbon::createFromFormat('H:i',$t_client->client_time)->format('h:i A')}}</td>
																		<td class="center">{{ $t_client->client_phone}}</td>
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
			{{-- ======================guideline====================== --}}
			<div class="modal" tabindex="-1" role="dialog" id="replymodalengr">
				<div class="modal-dialog" role="document">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title">Engineer Reply</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>
					<form action="{{ route('clientreplyvideo') }}" method="post">
					@csrf
					<div class="modal-body">
						
					<label for="video_response">Select Option</label>
					  <select name="video_response" id="video_response" class="form-control" onchange="videoresponse()">
						<option value="done">OK</option>
						<option value="ch_plan">Change Plan</option>
					  </select>
					  <input type="hidden" id="engineer_video_id" name="engineer_video_id" >
					  <input type="hidden" id="client_video_id" name="client_video_id" value="{{ Auth::user()->id }}">
					  <input type="hidden" id="db_row_id" name="db_row_id">
					<div id="ch_plan_id" style="display:none">
						<div class="form-group">
							<label for="engrtime">Time</label>
							<input type="time" id="engrtime" name="engrtime"  class="form-control" min="08:00:00" max="20:00:00">
						</div>
						<div class="form-group">
							<label for="engrdate">Date</label>
							<input type="date" id="engrdate" name="engrdate"  class="form-control" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
						</div>
					</div>
					</div>
					<div class="modal-footer">
					  <button type="submit" class="btn btn-primary">Save changes</button>
					  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
				  </div>
				</div>
			  </div>
{{-- ======================guideline====================== --}}	
			<!-- /Page Content -->
			@push('childscript')
			<script>
				$("#filter_eng").click(function(){
			   $("#profilenavlater").slideToggle('slow');
			});
			
			function showreplymodal(rowid,clientid){
				console.log(rowid);
				console.log(clientid);
				$('#engineer_video_id').val(clientid);
				$('#db_row_id').val(rowid);
				$('#replymodalengr').appendTo("body").modal('show');
			}
			function videoresponse(){
				var plan_val = $('#video_response').val();
				if(plan_val == 'done'){
					$('#ch_plan_id').hide('slow');
				}else{
					$('#ch_plan_id').show('slow');
				}
			}
			</script>
			@endpush