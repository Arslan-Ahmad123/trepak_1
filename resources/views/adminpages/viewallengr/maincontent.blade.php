	
	<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">View All Engineer</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-md-12 d-flex">
						
							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Engineer List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0 mt-1" id="registerengineer">
											<thead>
												<tr>
													<th>Engineer Name</th>
													<th>Pic</th>
													
													<th>Engineer Type</th>
													
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@php 
												$allengr = App\Models\User::where('role','enge')->get();
												
												@endphp
												@if( count($allengr) > 0)
											  @foreach ($allengr as $res)
												<tr>
													<td>
														<h6 class="table-avatar">
															{{ ucfirst($res->fname) }}
														</h6>
													</td>
													
													<td><img class="rounded" src={{ asset('engrphoto/'.$res->pic) }} width="70px" heigth="70px"></td>
													
													<td>
														<h6 class="table-avatar">
															{{ ucfirst(getcategoryname($res->engrcategoryid)) }}
														</h6>
													</td>
													
													<td>
														<h6 class="table-avatar">
															{{ ($res->status == 1)? 'Approved':'Un Approved'  }}
														</h6>
													</td>
													<td>
														<form method="post">
															@csrf
														<button class="btn btn-primary p-1" formaction="{{ route('editengrinfo',['id'=>$res->id]) }}" >Edit</button>
														<button class="btn btn-danger p-1 ml-2" formaction="{{ route('deleteengr',['id'=>$res->id]) }}">Delete</button>
														</form>
													</td>
												</tr>
											  @endforeach
											  @else
											  No Record Found 
											  @endif
											</tbody>
										</table>
									</div>
								</div>
							</div>

							{{-- ============modal for update the category==================== --}}
							<div id="engicate_modal" class="modal" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit Engineer Category</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form id="edit_categoryform" enctype="multipart/form-data">
										 <div class="form-group">
											<label for="pic">Category Pic</label>
											<img class="ml-5 rounded" src="" alt="Image" id="imgview" width="200px" height="200px">
											<input  type="file" class="form-control mt-2" id="pic"  name="pic"  placeholder="Select Image">
											
										</div>
										<div class="form-group">
											<label for="category_name">Category Name</label>
											<input type="text" class="form-control" id="category_name" name="category_name" aria-describedby="emailHelp" placeholder="Enter Category name">
											<input type="hidden" class="form-control" id="category_id" name="category_id"  placeholder="Enter Category name">
											<input type="hidden" class="form-control" id="old_pic" name="old_pic"  >
											
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" onclick="update_category()" class="btn btn-primary">Update</button>
								</div>
								</div>
							</div>
							</div>

							{{-- ============modal for update the category==================== --}}
							<!-- /Recent Orders -->
							
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

			function editcategory(id){
				// window.your_route = "{{ route('fetch_categorydata',['id'=>"id"]) }}";
			var url = "{{ route('fetch_categorydata', ":id") }}";
                url = url.replace(':id', id);	
            // $.ajaxSetup({
            //     headers:{
            //         'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
            //     }
            // });
				
				$.ajax({
					url:url,
					method:'get',
					contentType: false,
                    processData: false,
					
					success:function(data){
						var datas =JSON.parse(data);
						console.log(datas);
						$('#category_id').val(datas.id);
						$('#category_name').val(datas.engrcategory);
						$('#old_pic').val(datas.engrcategorylogo);
						var picname = datas.engrcategorylogo;
						// var pic = {{ asset('categorylogo/') }};
						$('#imgview').attr('src','http://127.0.0.1:8000/categorylogo/'+picname);
						
					}
				});
				$('#engicate_modal').modal('show');
			}
			function delcategory(id){
				$.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
                }
            });
				$.ajax({
				url:'deletedata_category/'+id,
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
		// 	function changeimg() {
        //    var tgt = event.target || window.event.srcElement,
        //     files = tgt.files;
		// 	console.log(files);
			
		// 	// // FileReader support
		// 	if (FileReader && files && files.length) {
		// 	    var fr = new FileReader();
		// 	    fr.onload = function () {
		// 			// console.log(fr.result);
		// 	        document.getElementById(imgview).src = fr.result;
		// 	    }
			
		// 	    fr.readAsDataURL(files[0]);
		// 	}
		$('#pic').change( function(event) {
			// console.log(event.target.files[0]);
			var url= $('#pic').val();
			var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
			if(ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"){
				$("#imgview").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
			}else{
				var url= $('#pic').val("");
			}
        });
			
		function update_category(){
			// var ajaxURL = '{{ route("updatedata_category") }}';
			//  var base_url = '{{ URL::to("/") }}';
			$.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
                }
            });
			var formdata = new FormData($('#edit_categoryform')[0]);
			$.ajax({
				url:'updatedata_category',
				type:'post',
				data:formdata,
				processData: false,
                contentType: false,
				success:function(data){
					console.log(data);
					$('#engicate_modal').modal('hide');
					location.reload();
					
				}
			});
		}
			// // Not supported
			// else {
			//     // fallback -- perhaps submit the input to an iframe and temporarily store
			//     // them on the server until the user's session ends.
			// }
            // }
			</script>
			<style>
			#registerengineer_wrapper{
				margin-top:10px;
			}
		    </style>
			@endpush