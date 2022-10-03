	
	<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">View Package</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

				
					
					<div class="row">
						
						<div class="col-xl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">View Package</h4>
								</div>
								<div class="card-body">
									<section class="section section-doctor">
				<div class="container ">
				   <div class="row">
					
						
							
							@php 
							$package = App\Models\packageInfo::get();
							$countrecord = count($package);	
							@endphp
							@if($countrecord > 0)
							@foreach($package as $res)
							<!-- Doctor Widget -->
							<div class="col-lg-4 col-sm-6 col-11 mx-auto mx-sm-0 my-2" style="position:relative">
								<div class="profile-widget">
									
									<div class="pro-content bg-info py-5 px-2">
										<h3 class="title">
											<a href="doctor-profile.html">{{ $res->packagename }}</a> 
											
										</h3>
										
										<ul class="available-info" style="list-style: none">
											<li>
												<i class='fa fa-registered'></i> {{ $res->packagetype}}
											</li>
											<li>
												<i class="far fa-clock"></i> {{ $res->packageduration}}
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> {{ $res->packageprice .'$'}} 
												
											</li>
										</ul>
										
									</div>
								</div>
								<div style="position: absolute;bottom:0; left:30%" class="mb-2">
									<button class="btn btn-success" onclick="editpackage({{$res->id }})">Edit</button>
									<button class="btn btn-danger" onclick="deletepackage({{$res->id }})">Delete</button>
								</div>
							</div>
								<!-- /Doctor Widget -->
							@endforeach
							@else
							No Record Found
							@endif
				</div>
			</section>
								</div>
							</div>
						</div>
						
					
					
					</div>

					
				</div>			
			</div>
						
		{{-- ============modal for update the category==================== --}}
							<div id="package_modal" class="modal" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit package</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form id="edit_packageform" >
										 
										<div class="form-group">
											<label for="packagename">Package Name</label>
											<input type="text" class="form-control" id="packagename" name="packagename"  placeholder="Enter Package Name" required>
											<input type="hidden" class="form-control" id="package_id" name="package_id">	
										</div>
										<div class="form-group">
											<label for="packagetype">Package Type</label>
											<select name="packagetype" id="packagetype" class="form-control" required>
											
											</select>		
										</div>
										<div class="form-group">
											<label for="category_name">Package Price</label>
											<input type="text" class="form-control" id="packageprice" name="packageprice"  placeholder="Enter Package Price" required>		
										</div>
										<div class="form-group">
											<label for="category_name">Package Specification</label>
											<input type="text" class="form-control" id="packagespecification" name="packagespecification"  placeholder="Enter Package Specification" required>		
										</div>
										<div class="form-group">
											<label for="category_name">Package Duration</label>
											<input type="text" class="form-control" id="packageduration" name="packageduration"  placeholder="Enter Package Duration" required>		
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" onclick="update_package()" class="btn btn-primary">Update</button>
								</div>
								</div>
							</div>
							</div>

							{{-- ============modal for update the category==================== --}}
			<!-- /Page Wrapper -->
			@push('custom-scripts')
			<script>
			function editpackage(id){
				
				var url = "{{ route('fetch_packagedata', ":id") }}";
                url = url.replace(':id', id);
				$.ajax({
					url:url,
					method:'get',
					contentType: false,
                    processData: false,
					
					success:function(data){
						
						// console.log(data.packagetype=="business"?"selected":"");
						// console.log(data.packagetype=="business"?"selected":"");
						$('#package_id').val(data.id);
						$('#packagename').val(data.packagename);
						$chekbok='';
						$chekbok = '<option value="starter" ';
						$chekbok += data.packagetype=="starter"?"selected":"";
						$chekbok += '>Starter</option>';
						$chekbok += '<option value="business" ';
						$chekbok += data.packagetype=="business"?"selected":"";
						$chekbok += '>Business</option>';
						$chekbok += '<option value="enterprize" ';
						$chekbok += data.packagetype=="enterprize"?"selected":"";
						$chekbok += '>Enterprise</option>';
						$chekbok += '<option value="professional" ';
						$chekbok += data.packagetype=="professional"?"selected":"";
						$chekbok += '>Professional</option>';
						// console.log($chekbok);
						$('#packagetype').html($chekbok);
						$('#packageprice').val(data.packageprice);
						$('#packagespecification').val(data.packagespecification);
						$('#packageduration').val(data.packageduration);
						
						
						
						
					}
				});
				
				$('#package_modal').modal('show');
				
			}
			function update_package(){
				$.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
                }
            });
			var formdata = new FormData($('#edit_packageform')[0]);
				$.ajax({
				url:'updatedata_package',
				type:'post',
				data:formdata,
				processData: false,
                contentType: false,
				success:function(data){
					
					$('#package_modal').modal('hide');
					location.reload();
					
				}
			});
			}
			function deletepackage(id){
				$.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
                }
            });
				$.ajax({
				url:'deletedata_package/'+id,
				type:'delete',
				success:function(data){
					if(data == 'yes'){
						 location.reload();
					}else{
						alert("Some thing wrong!!");
					}
					
				}
			});
			}
			</script>
			
			@endpush