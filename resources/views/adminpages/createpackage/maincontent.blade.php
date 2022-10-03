	
	<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Package Form</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

				
					
					<div class="row">
						@isset($msg)
						<div class="bg-danger p-2 rounded mb-2" id="msgdiv">
							<h5 class="text-light">{{ $msg }} !!</h5>
						</div>
						<script>
							setTimeout(() => {
								$('#msgdiv').hide();
							}, 2000);
						</script>
						@endisset
						<div class="col-xl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Package Form</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('savepackage') }}" method="post" >
										@csrf
										<div class="form-group row">
											<label class="col-lg-3 col-form-label" style="font-weight:bold">Package Name</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="packagename"  placeholder="Enter Package Name">
												 @error('packagename')
                                        <div class="alert alert-danger" id="pkgname_div">This Field is Required.</div>
                                        <script>
                                        setTimeout(() => {
                                            $('#pkgname_div').hide();
                                        }, 3000);
                                        </script>
                                        @enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label" style="font-weight:bold">Package Type</label>
											<div class="col-lg-9">
												<select name="packagetype" class="form-control">
													<option value="">Please Select Package</option>
													<option value="starter">Starter</option>
													<option value="professional">Professional</option>
													<option value="business">Business</option>
													<option value="enterprize">Enterprise</option>
												</select>
												
												 @error('packagetype')
                                        <div class="alert alert-danger" id="pkgtype_div">This Field is Required.</div>
                                        <script>
                                        setTimeout(() => {
                                            $('#pkgtype_div').hide();
                                        }, 3000);
                                        </script>
                                        @enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label" style="font-weight:bold">Package Price</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="packageprice" placeholder="Enter Package Price">
												 @error('packageprice')
                                        <div class="alert alert-danger" id="pkgprice_div">This Field is Required.</div>
                                        <script>
                                        setTimeout(() => {
                                            $('#pkgprice_div').hide();
                                        }, 3000);
                                        </script>
                                        @enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label" style="font-weight:bold">Package Duration</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="packageduration" placeholder="Enter Package Duration">
												 @error('packageduration')
                                        <div class="alert alert-danger" id="pkgdur_div">{{ $message }}</div>
                                        <script>
                                        setTimeout(() => {
                                            $('#pkgdur_div').hide();
                                        }, 3000);
                                        </script>
                                        @enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label" style="font-weight:bold">Package Specification</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="packagespecification"  placeholder="Enter Package Specification">
												 @error('packagespecification')
                                        <div class="alert alert-danger" id="pkgspec_div">{{ $message }}</div>
                                        <script>
                                        setTimeout(() => {
                                            $('#pkgspec_div').hide();
                                        }, 3000);
                                        </script>
                                        @enderror
											</div>
										</div>
										
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						
					
					
					</div>
					
					
				</div>			
			</div>
		
			<!-- /Page Wrapper -->
			@push('custom-scripts')
			<script>
			$(document).ready(function(){
				$('#registerengineer').DataTable();
			});
			</script>
			<style>
			#registerengineer_wrapper{
				margin-top:10px;
			}
		</style>
			@endpush