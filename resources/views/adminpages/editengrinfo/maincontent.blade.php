<style>
	.section{
		padding-top:100px !important;
	}
	.form-section{
		padding-left:15px;
		display: none;
	}
	.form-section.current{
		display: inherit;
	}
	.btn-info, .btn-success{
		margin-top:10px;
	}
	.parsley-error-list{
		margin: 2px 0 3px;
		padding: 0;
		list-style-type:none;
		color:red;
	}
</style>
	<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Engineer Form</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

				
					
					<div class="row">
						@isset($status)
						<div class="bg-danger p-2 rounded mb-2" id="msgdiv">
							<h5 class="text-light">{{ $status }} !!</h5>
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
									<h4 class="card-title">Edit Engineer Form</h4>
								</div>
								<div class="card-body">
									<x-guest-layout>    
										<!-- Validation Errors -->
									   <x-auth-validation-errors class="mb-4" :errors="$errors" />
									<form method="POST" action="{{ route('updateengrinfo') }}" enctype="multipart/form-data" class="contact-form">
										@csrf
										  <div class="form-section">
											 <!--First Name -->
										<div>
											<x-label for="fname" :value="__('First Name')" />
											<x-input id="fname" class="block mt-2 w-full" type="text" name="fname" value="{{$data->fname}}" required autofocus />
											<x-input id="id" class="block mt-2 w-full" type="hidden" name="id" value="{{$data->id}}" required autofocus  />
										</div> 
										 <!-- Last Name -->
										<div>
											<x-label for="lname" :value="__('Last Name')" />
											<x-input id="lname" class="block mt-2 w-full" type="text" name="lname" value="{{ $data->lname }}" required autofocus />
										    
										</div>
										 <!--Pic --> 
										<div>
											<x-label for="pic" style="margin-bottom:5px" :value="__('Pic')" />
											<x-input id="oldpic" class="block mt-2 w-full" type="hidden" name="oldpic" value="{{ $data->pic }}" required autofocus />
											<x-input id="pic" style="margin-bottom:10px" class="block  w-full form-control" type="file" name="pic"  autofocus />
										</div>
										 <!--Mobile --> 
										<div>
											<x-label for="mobile" style="margin-bottom:5px" :value="__('Mobile')" />
											<x-input id="mobile" style="margin-bottom:10px" class="block  w-full" type="text" name="mobile" value="{{ $data->mobile }}" required autofocus />
										</div>
										 <!--Address --> 
										<div>
											<x-label for="address" style="margin-bottom:5px" :value="__('Address')" />
											<x-input id="address" style="margin-bottom:10px" class="block  w-full" type="text" name="address" :value="old('address')" required autofocus readonly />
										</div>
										  {{-- -- Role -- --}}
										<div class="mt-4">
											<x-label for="role" :value="__('Role')" />
											<select class="block mt-1 w-full border-gray-300 rounded-md" name="role" id="role">
												
												
												<option value="enge">Engineer</option>
												                              
											</select>
										</div>

										<!-- longitude and latitude -->
										 <div>
											<x-label for="latitude" style="margin-bottom:5px;margin-top:10px" :value="__('Latitude')" />
											<x-input  style="margin-bottom:10px" class="block  w-full"  type="number" name="latitude" id="latitude" :value="old('latitude')" required autofocus step="any" />
										</div>
										 <div>
											<x-label for="longitude" style="margin-bottom:5px" :value="__('Longitude')" />
											<x-input style="margin-bottom:10px" class="block  w-full" type="number" name="longitude" id="longitude"   :value="old('longitude')" required autofocus  step="any"/>
										</div>
										{{-- <input type="text" name="longitude" id="longitude"  readonly> 
										<input type="text" name="latitude" id="latitude"  readonly> --}}
									</div>
									 
										 <div class="form-section">
											<!-- Engineer category -->
                                            <div>
                                                <x-label for="engrcategory" style="margin-bottom:5px" :value="__('Engineer Category')" />
                                                <select class="block mt-1 w-full border-gray-300 rounded-md" name="engrcategory" id="engrcategory">
                                               
                                                @php
                                                $category = App\Models\engCategory::get();
                                                @endphp
                                                @foreach ($category as $category)
                                                    <option value="{{ $category->id }}" {{ ($category->id == $data->engrcategoryid)?'selected':'' }}> {{ $category->engrcategory }}</option>
                                                @endforeach                            
                                                </select>
                                            </div>
										<!-- Education -->
										<div class="mt-1">
											<x-label for="education" style="margin-bottom:5px" :value="__('Education')" />
											<x-input id="education" style="margin-bottom:10px" class="block  w-full" type="text" id="education" name="education" value="{{ $data->education }}" required autofocus />
										</div>
										<!-- specialize -->
										<div>
											<x-label for="specialize" :value="__('Specialize Field')" />
											<x-input id="specialize" class="block mt-2 w-full" type="text" name="specialize" value="{{ $data->specialization }}" required autofocus />
										</div>                            
										<!-- Experience -->
										<div class="mt-4">
											<x-label for="experience" :value="__('Experience')" />
											<x-input id="experience" class="block mt-1 w-full" type="number" name="experience" value="{{ $data->experience }}"  required />
										</div>
									   
										<!-- current company -->
										<div class="mt-4">
											<x-label for="currentcomp" :value="__('Current Company')" />
											<x-input id="currentcomp" class="block mt-1 w-full"
												type="text"
												value="{{ $data->currentcompany }}"
												name="currentcomp" required />
										</div>

										<!-- charge par hour -->
										<div class="mt-4">
											<x-label for="chargeperhour" :value="__('Charge Per Hour')" />
											<x-input id="chargeperhour" class="block mt-1 w-full"
												type="number"
												value="{{ $data->pricerange }}"
												name="chargeperhour" required />
										</div>
									  
									</div>
									
									 <div class="form-section">
																  
										<!-- Email Address -->
										<div class="mt-4">
											<x-label for="email" :value="__('Email')" />
											<x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $data->email }}" required />
										</div>
										<!-- Password -->
										<div class="mt-4">
											<x-label for="password" :value="__('Password')" />
											<x-input id="password" class="block mt-1 w-full"
												type="password"
												name="password"
												 />
												 <x-input id="oldpassword" class="block mt-1 w-full" type="hidden"  name="oldpassword" value="{{ $data->password }}" required />
										</div>
										 <!-- Confirm Password -->
										

										 {{-- <div class="flex items-center justify-end mt-4">
											<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
													{{ __('Already registered?') }}
											</a>
											<x-button class="ml-4">
													{{ __('Register') }}
											</x-button>
										</div>  --}}
									 </div> 
										
										
										
										 <div class="form-navigation">
										<button type="button" class="previous btn bg-info float-left mt-2">Previous</button>
										<button type="button" class="next btn bg-info float-right  mt-2">Next</button>
										<button type="submit" class="btn bg-success float-right  mt-2">Update</button>
										 </div>
																		
									</form>
								</x-guest-layout>
								</div>
							</div>
						</div>
						
					
					
					</div>
					
					
				</div>			
			</div>
		
			<!-- /Page Wrapper -->
	@push('custom-scripts')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script>  
			$(function(){
				$('#address').val('Model Town Gujranwala Punjab Pakistan');
				// $('#education').val('yes');
                        const success= (position) =>{
                        latd =position.coords.latitude ;
                        lond =position.coords.longitude;
                        $('#latitude').val(latd);
                        $('#longitude').val(lond);
                        console.log(latd,lond);
                        //  alert("AAA");
                    }
                    const error= ()=>{
                        console.log("error")
                    }
                     navigator.geolocation.getCurrentPosition(success, error);
               navigator.permissions.query({name:'geolocation'}).then(function(result) {
                // Will return ['granted', 'prompt', 'denied']
                 if(result.state == 'denied'){
                    alert("Please manaully allow your location");
                 }
                  });
				var $sections = $('.form-section');

				function navigateTo(index){
					$sections.removeClass('current').eq(index).addClass('current');
					$('.form-navigation .previous').toggle(index>0);
					var atTheEnd = index >= $sections.length - 1;
					$('.form-navigation .next').toggle(!atTheEnd);
					$('.form-navigation [type=submit]').toggle(atTheEnd);
				}

				function curIndex()
				{
					return $sections.index($sections.filter('.current'));
				}

				$('.form-navigation .previous').click(function(){
					navigateTo(curIndex()-1);
				});

				$('.form-navigation .next').click(function(){
					$('.contact-form').parsley().whenValidate({
						group: 'block-' + curIndex()
					}).done(function(){
						navigateTo(curIndex()+1);
					});
				});

				$sections.each(function(index,section){
					$(section).find(':input').attr('data-parsley-group','block-'+index);
					});

					navigateTo(0);
			});
        </script>
	@endpush