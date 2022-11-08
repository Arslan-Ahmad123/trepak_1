<style>
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
											<h3>Login Form</h3>
										</div>
                                        <x-guest-layout>
                                              <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <div>
                                    <form  action="
                                    @if(Auth::check())
                                    @if(Auth::user()->role == 'enge')
                                     {{ route('conformemailenge') }}
                                     @elseif(Auth::user()->role == 'user')
                                      {{ route('conformemailuser') }}
                                      @else
                                      #
                                    @endif
                                    @endif
                                   "   method="POST">
                                        @csrf
                                                                
                                                                        <!-- Email Address -->
                                        <div>
                                            <x-label for="conformemail" :value="__('Code')" />

                                            <x-input id="conformemail" class="block mt-1 w-full " type="number"  name="conformemail" :value="old('conformemail')" required autofocus />
                                        </div>
                                                                        <!-- Password -->
                                        
                                        
                                        <div class="flex items-center justify-end ">
                                           
                                            <x-button class="mt-3">
                                                {{ __('Conform') }}
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