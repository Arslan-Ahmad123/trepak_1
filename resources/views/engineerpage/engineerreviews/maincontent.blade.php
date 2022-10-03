<style>
	.pagination > li {
		margin-top: 20px;
		padding-top: 20px;
	}
	/* .modal-backdrop {
  z-index: -1;
} */
</style>
												{{-- =============reply for message ================= --}}
												<div class="modal" tabindex="-1" id="replymodal"  data-backdrop="false">
													<div class="modal-dialog">
													  <div class="modal-content">
														<div class="modal-header">
														  <h5 class="modal-title">Reply Comment</h5>
														  
														</div>
														<div class="modal-body">
														 
														  <input type="hidden" name="row_id" id="row_id">
														  <input type="hidden" name="engr_id" id="engr_id">
														  <input type="hidden" name="client_id" id="client_id">
														  <div class="form-group">
															<label for="replymsg">Reply Comments</label>
															<input type="text" name="replymsg" id="replymsg" class="form-control">

														  </div>
														</div>
														<div class="modal-footer">
														  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="modelhide()">Close</button>
														  <button type="button" class="btn btn-primary" onclick="submitreplymsg()">Reply</button>
														</div>
													  </div>
													</div>
												  </div>
												{{-- =============reply for message ================= --}}
		<!-- Breadcrumb -->
			<div class="breadcrumb-bar topsection">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Reviews</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Reviews</h2>
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
											<li>
												<a href="{{ route('enginvoice') }}">
													<i class="fas fa-file-invoice"></i>
													<span>Invoices</span>
												</a>
											</li>
											<li class="active">
												<a href="{{ route('engreviews') }}">
													<i class="fas fa-star"></i>
													<span>Reviews</span>
												</a>
											</li>
											<li>
												<a href="{{ route('engrchat') }}">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													<small class="unread-msg">23</small>
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
												<a href="{{ route('engineerlogout') }}">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
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
											<li>
												<a href="{{ route('enginvoice') }}">
													<i class="fas fa-file-invoice"></i>
													<span>Invoices</span>
												</a>
											</li>
											<li class="active">
												<a href="{{ route('engreviews') }}">
													<i class="fas fa-star"></i>
													<span>Reviews</span>
												</a>
											</li>
											<li>
												<a href="{{ route('engrchat') }}">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													<small class="unread-msg">23</small>
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
												<a href="{{ route('engineerlogout') }}">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
						<div class="col-md-12 col-lg-8 col-xl-9">
							<div class="doc-review review-listing">
							
								<!-- Review Listing -->
								<ul class="comments-list">
								@if ($engrcmt)
									@foreach ($engrcmt as $engrcmts)
									@php
										$client = getuser($engrcmts->clientid);
									@endphp
										<!-- Comment List -->
									<li>
										<div class="comment">
											<img class="avatar rounded-circle" alt="User Image" src="{{ asset('engrphoto/'.$client->pic) }}">
											<div class="comment-body"  style="width:90%;">
												<div class="meta-data">
													<span class="comment-author">{{ $client->fname }}</span>
													<span class="comment-date">{{$engrcmts->created_at->diffForHumans()}}</span>
													{{-- <div class="review-count rating">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star"></i>
													</div> --}}
												</div>
												{{-- <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p> --}}
												<p class="comment-content" style="display: block;">
													{{ $engrcmts->comment }}
												</p>
												<div class="comment-reply">
													<a class="comment-btn" href="javascript:void(0)" onclick="showreplydiv({{ $engrcmts->engrid }},{{ $engrcmts->clientid }},{{ $engrcmts->id }})">
														<i class="fas fa-reply"></i> Reply
													</a>
												   <div class="recommend-btn">
													<span>Recommend?</span>
													<a href="#" class="like-btn">
														<i class="far fa-thumbs-up"></i> Yes
													</a>
													<a href="#" class="dislike-btn">
														<i class="far fa-thumbs-down"></i> No
													</a>
												</div>
												</div>

											</div>
										</div>
										@if($engrcmts->replies != null)
										<!-- Comment Reply -->
										<ul class="comments-reply">
										
											<!-- Comment Reply List -->
											<li>
												<div class="comment">
													<img class="avatar rounded-circle" alt="User Image" src="{{ asset('newpanel/assets/img/doctors/doctor-thumb-02.jpg') }}">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author">Darren Elder</span>
															<span class="comment-date">Reviewed 3 Days ago</span>
														</div>
														<p class="comment-content">
															Lorem ipsum dolor sit amet, consectetur adipisicing elit,
															sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
															Ut enim ad minim veniam.
															Curabitur non nulla sit amet nisl tempus
														</p>
														<div class="comment-reply">
															<a class="comment-btn" href="#">
																<i class="fas fa-reply"></i> Reply
															</a>
														</div>
													</div>
												</div>
											</li>
											<!-- /Comment Reply List -->
											
										</ul>
										<!-- /Comment Reply -->
										@endif
										
									</li>
									<!-- /Comment List -->
									@endforeach									
								@endif
								
								{{ $engrcmt->links() }}
									
							
									
								</ul>
								<!-- /Comment List -->
								
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
			function showreplydiv(engrid,clientid,rowid){
				
				$('#engr_id').val(engrid)
				$('#client_id').val(clientid)
				$('#row_id').val(rowid)
				$('#replymodal').appendTo("body").modal('show');
			}
			function modelhide(){
				$('#engr_id').val('');
				        $('#client_id').val('');
						$('#replymsg').val('');
						$('#row_id').val('');
				$('#replymodal').appendTo("body").modal('hide');
			}
			function submitreplymsg(){
				var engrid = $('#engr_id').val();
				var clientid = $('#client_id').val();
				var replymsg = $('#replymsg').val();
				var rowid = $('#row_id').val();
				$.ajax({
					url:'http://127.0.0.1:8000/engineer/replyengrcmt',
					type:'get',
					data:{engrid:engrid,clientid:clientid,replymsg:replymsg,rowid:rowid},
					success:function(data){
						if(data == 'yes'){
						$('#engr_id').val('');
				        $('#client_id').val('');
						$('#replymsg').val('');
						$('#row_id').val('');
						$('#replymodal').appendTo("body").modal('hide');
						location.reload();
					}else{

					}
						
					}
				});
			}
			</script>
			@endpush
   