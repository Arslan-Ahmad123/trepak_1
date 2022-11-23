<style>
	#footer {
   transform: translateY(25px);
}
</style>
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
						<!-- /Complaint Cell-->
						<div class="modal fade" id="complaint_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
							  <div class="modal-content">
								<div class="modal-header">
								  <h5 class="modal-title" style="font-size: 18px;    font-weight: 600;" id="exampleModalLabel">Complaint Cell</h5>
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								</div>
								<div class="modal-body">
								  <form>
									<div class="form-group">
									  <label for="recipient-name" class="col-form-label">Token No:</label>
									  <input type="text" class="form-control" id="recipient-name" value='CT_0001' readonly>
									</div>
									<div class="form-group">
									  <label for="message-text" class="col-form-label">Engineer Name:</label>
									  <input  class="form-control" id="engineerName" name="engineerName" readonly>
									  <input type="hidden" id="engineerId" name="engineerId">
									</div>
									<div class="form-group">
										<label for="message-text" class="col-form-label">Engineer Category:</label>
										<input class="form-control" id="engrCategoryname" name="engrCategoryname" readonly>
									  </div>
									<div class="form-group">
										<label for="message-text" class="col-form-label">Complaint:</label>
										<textarea class="form-control" id="complaintText" name="complaintText" placeholder="Please enter your complaint"></textarea>
									</div>
									<div class="form-group">
										<label for="message-text" class="col-form-label">Date:</label>
										<input type="date"    class="form-control" value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>"  id="complaintDate" name="complaintDate">
									</div>
								 
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								  <button type="button" class="btn btn-info">Send Complaint</button>
								</div>
							</form>
							  </div>
							</div>
						  </div>
						<!-- / Complaint Cell -->
						
						<div class="col-md-12 col-lg-8 col-xl-9">
														<div class="row">
								@if(count($data) > 0)
							
								@foreach ($data as $datas)

								@php
							$clientdata = getuser($datas->engrid);
							
								if($clientdata->signupoption == 1)
								{
									$clientimg = $clientdata->pic;
								}else{
									$clientimg = asset('engrphoto/'.$clientdata->pic);
								}
							@endphp
								<div class="col-md-4 col-sm-6 col-10 mx-auto">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="{{ $clientimg }}" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3><a href="#">{{ $clientdata->fname }}</a></h3>
														
														<div class="patient-details">
															<h5><b>Engineer Category :</b>{{ getcategoryname($clientdata->engrcategoryid) }}</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{ $clientdata->city.', '.$clientdata->country }}</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>{{ $clientdata->mobile }}</span></li>
													<li>Email <span>{{ $clientdata->email  }}</span></li>
													<button class="btn btn-danger p-2 mt-1 w-md-50 w-sm-75 w-100" onclick="showComplaintM({{ $clientdata->id }},'{{$clientdata->fname}}','{{ getcategoryname($clientdata->engrcategoryid) }}')">Complaint</button>
												</ul>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								@else
								<div class="col-lg-4 col-md-6 col-sm-4 col-12">
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
					function showComplaintM(id,name,categoryName){
						$('#engineerId').val(id);
						$('#engineerName').val(name);
						$('#engrCategoryname').val(categoryName);
						$('#complaint_modal').appendTo("body").modal('show');
					}
				</script>
			  @endpush