<style>
    @media only screen and (max-width: 575.98px){
    .navbrand_logo {
        position: relative;
        left: 25%;
    }
    }
    #or {
    position: relative;
    width: 100%;
    height: 50px;
    line-height: 50px;
    text-align: center;
    font-size: 20px;
    margin: 2px 0;
}
#or, .fb-hint {
    color: #6d6e70;
}
#or:before {
    position: absolute;
    width: 42%;
    height: 2px;
    top: 24px;
    background-color: #e1e4e6;
    content: "";
    left:0;
}
#or:after {
    position: absolute;
    width: 42%;
    height: 2px;
    top: 24px;
    background-color: #e1e4e6;
    content: "";
    right:0;
}
.btn-primary{
    border:none!important;
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
								  
									<!--<div class="col-md-7 col-lg-6 login-left">-->
									<!--	<img src="{{ asset('newpanel/assets/img/login-banner.jpg') }}" class="img-fluid" alt="Doccure Login">	-->
									<!--</div>-->
									<div class="col-md-12 col-lg-6 login-right" style="box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 50%); margin-bottom: 100px;margin-top: 40px;
">
										<div class="login-header" style="text-align:center;font-size:25px;font-weight:500">
											<h2>Login Form</h2>
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
                                            <!--<a class=" ml-3  btn-dark" style="font-size:14px;border-radius:6px;padding: 6px 21px;background-color: #252728;" href="{{ route('user_regis') }}">-->
                                            <!--    {{ __('SIGN UP') }}-->
                                            <!--</a>-->
                                            <!--<x-button style="background-color: #252728;font-size:14px !important;margin-left:20px !important;padding: 8px 18px !important;border-radius: 6px !important;" class="ml-5" formaction="{{ route('login') }}">-->
                                                
                                            <!--    {{ __('Sign in') }}-->
                                            <!--</x-button>-->
                                            <button style="background-color: #15558d !important;color:white;" type="submit" formaction="{{ route('login') }}" class="btn bg-success btn-block  mt-2" >Login</button>
                                        </div>
										</form>
                                       

                                        </x-guest-layout>
									</div>
									  <div id="or">
								       
								        or
								       
								    </div>
								    <div class="fb-hint center" style="text-align:center;color: #000000;">Login with Facebook & Google</div>
								    <div class="fb-hint center" style="text-align:center;padding:25px">
								    <a class="btn btn-primary" style="background-color: rgba(24, 119, 242);" href="{{ url('/loginfacebook') }}" role="button"><i class="fab fa-facebook me-4"></i>&nbsp;&nbsp;Facebook</a>
							  <!--<a class="btn btn-primary" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter me-2"></i>Twitter</a>-->
							  <a class="btn btn-primary" style="background-color: #dd4b39;" href="{{ url('/logingoogle') }}" role="button"><i class="fab fa-google"></i>&nbsp;&nbsp;Google</a>
							  </div>

								</div>
							</div>
							<!-- /Login Tab Content -->
				
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->