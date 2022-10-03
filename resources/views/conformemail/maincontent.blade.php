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
											<h3>Conform Email</h3>
										</div>
                                        <x-guest-layout>
                                              <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <div>
                                    <form  action=""  method="POST">
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
                                            <x-label for="conformemail" :value="__('Conform Email')" />

                                            <x-input id="conformemail" class="block mt-1 w-full" type="text" name="conformemail" :value="old('conformemail')" required autofocus />
                                        </div>
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
                                             <x-button class="ml-5" formaction="{{ route('resendemail') }}">
                                                {{ __('Resend Email') }}
                                            </x-button>   
                                            <x-button class="ml-5" formaction="{{ route('conformemail') }}">
                                                {{ __('Sign in') }}
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