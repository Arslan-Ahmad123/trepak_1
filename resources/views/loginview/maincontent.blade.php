<style>
    @media only screen and (max-width: 575.98px){
    .navbrand_logo {
        position: relative;
        left: 25%;
    }
    }    
    </style>
<!-- Main Wrapper -->
<div class="main-wrapper">
<!-- Page Content -->
			<div class="content topsection">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
                               {{-- @isset(session()->get('path') != "")
                                   {{ session()->all() }}
                               @endisset --}}
                               {{-- {{ session()->get('path') }} --}}
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="{{ asset('newpanel/assets/img/login-banner.jpg') }}" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login Form</h3>
                                            @php
                                               
                                            @endphp  
                                            {{-- {{ url()->previous() }} --}}
                                           
										</div>
                                        <x-guest-layout>
                                              <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <div>
                                    <form  action="{{ route('login') }}"  method="POST">
                                        @csrf
                                         {{-- @php
                                           
                                            $previousroute =  url()->previous();
                                            if($previousroute == 'http://127.0.0.1:8000/booking'){

                                            }else{
                                                if(session()->has('viewprofileeng')){
                                                    session()->forget('viewprofileeng');
                                                    session()->forget('path');
                                                    session()->forget('engrid');
                                                    session()->forget('date');
                                                }
                                            }
                                         @endphp --}}
                                              {{-- @if(session()->has('viewprofileeng'))
                                              {{'session value'. session()->get('viewprofileeng') }}
                                              @else
                                              {{ 'No Route Found' }}
                                              @endif --}}
                                                               
                                                                        <!-- Email Address -->
                                        <div>
                                            <x-label for="email" :value="__('Email')" />

                                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                        </div>
                                                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-label for="password" :value="__('Password')" />

                                            <x-input id="password" class="block mt-1 w-full"
                                                            type="password"
                                                            name="password"
                                                            required autocomplete="current-password" />
                                        </div>
                                                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center justify-end ">
                                            {{-- @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif --}}
                                            <a class=" ml-3  btn-dark" style="font-size:14px;border-radius:6px;padding: 6px 21px;background-color:rgb(55, 65, 81)" href="{{ route('user_regis') }}">
                                                {{ __('SIGN UP') }}
                                            </a>
                                            <x-button class="ml-5" formaction="{{ route('login') }}">
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