<style>
    @media only screen and (min-width: 992px) {
		#footer{
			    position: static;
                bottom: 0%;
                transform: translateY(12px);
                width: 100%;
		}
		.topsection{
		margin-top:0px;
			box-sizing:border-box;
			padding-top:120px;
			padding-bottom:15px;
		}
	}
    @media only screen and (max-width: 575.98px) {
     .navbrand_logo {
        position: relative;
        left: 25vw;
        }
    }
</style>
<!-- Page Content -->
			<div class="content topsection">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="{{ asset('newpanel/assets/img/login-banner.jpg') }}" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Engineer Documentation</h3>
										</div>
                                        <x-guest-layout>
                                              <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <div>
                                    <form  action=""  method="POST" enctype="multipart/form-data">
                                        @csrf
                                                                
                                                                        <!-- Email Address -->
                                        
                                                                        {{-- <!-- Password -->
                                        <div class="my-4">
                                            <x-label for="conformemail" :value="__('Conform Email')" />

                                            <x-input id="conformemail" class="block mt-1 w-full form-controller"
                                                            type="conformemail"
                                                            name="conformemail"
                                                            required autocomplete="current-password" />
                                        </div> --}}

                                         <div class="my-4">
                                            <x-label for="engr_cv" :value="__('CV Upload')" style="color:black;font-weight: bold;"/>

                                            <x-input id="engr_cv" class="block mt-1 w-full" type="file"  accept="application/pdf" name="engr_cv" :value="old('engr_cv')" required autofocus />
                                        </div>
                                        <div class="mt-4">
                                            <x-label for="workplace" :value="__('Job Workplace Type')"  style="color:black;font-weight: bold;"/>
                                            <select class="block mt-1 w-full border-gray-300 rounded-md" name="workplace"
                                                id="workplace" required>
                                                    <option value="">Job Work Place</option>
                                                    <option value="onsite">On Site</option>
                                                    <option value="remote">Remote</option>
                                            </select>
                                        </div>
                                        <div class="mt-4">
                                            <x-label for="jobtype" :value="__('Job  Type')"  style="color:black;font-weight: bold;"/>
                                            <select class="block mt-1 w-full border-gray-300 rounded-md" name="jobtype"
                                                id="jobtype" required>
                                                    <option value="">Select Job Type</option>
                                                    <option value="full">Full Time</option>
                                                    <option value="part">Part Time</option>
                                                    <option value="contract">Contrat Base</option>
                                            </select>
                                        </div>
                                        <div class="my-4">
                                            <x-label for="description" :value="__('About')"  style="color:black;font-weight: bold;"/>
                                            <textarea placeholder="Write Here About Your Self!! " class="block mt-1 w-full border-gray-300 rounded-md" name="description" id="description" cols="30" rows="4"></textarea>
                                            {{-- <x-input id="conformemail" class="block mt-1 w-full form-controller"
                                                            type="conformemail"
                                                            name="conformemail"
                                                            required autocomplete="current-password" /> --}}
                                        </div> 
                                        {{-- <div class="my-4">
                                            <x-label for="engr_ed" :value="__('Education')" />

                                            <x-input id="engr_ed" class="block mt-1 w-full" type="text" name="engr_ed" :value="old('engr_ed')" required autofocus />
                                        </div> --}}
                                                                        <!-- Remember Me -->
                                        {{-- <div class="block mt-4">
                                            <label for="resen" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div> --}}

                                        <div class="flex items-center justify-end ">
                                            {{-- @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif --}}
                                               
                                            <x-button class="ml-5" formaction="{{ route('engrdocsmentation') }}">
                                                {{ __('Submit') }}
                                            </x-button>
                                        </div>
										</form>
                                       

                                        </x-guest-layout>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->