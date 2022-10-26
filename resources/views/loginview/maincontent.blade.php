<style>
    @media only screen and (max-width: 575.98px) {
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

    #or,
    .fb-hint {
        color: #6d6e70;
    }

    #or:before {
        position: absolute;
        width: 42%;
        height: 2px;
        top: 24px;
        background-color: #e1e4e6;
        content: "";
        left: 0;
    }

    #or:after {
        position: absolute;
        width: 42%;
        height: 2px;
        top: 24px;
        background-color: #e1e4e6;
        content: "";
        right: 0;
    }

    .btn-primary {
        border: none !important;
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
                        {{-- @isset(session()->get('path') != '')
                                   {{ session()->all() }}
                               @endisset --}}
                        {{-- {{ session()->get('path') }} --}}
                        <div class="row align-items-center justify-content-center">

                            <!--<div class="col-md-7 col-lg-6 login-left">-->
                            <!--	<img src="{{ asset('newpanel/assets/img/login-banner.jpg') }}" class="img-fluid" alt="Doccure Login">	-->
                            <!--</div>-->
                            <div class="col-md-12 col-lg-6 login-right"
                                style="box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 50%); margin-bottom: 100px;margin-top: 40px;
">
                                <div class="login-header" style="text-align:center;font-size:25px;font-weight:500">
                                    <h2>Login Form</h2>
                              
                                    {{-- {{ url()->previous() }} --}}

                                </div>
                                <x-guest-layout>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <div>
                                        <form action="{{ route('login') }}" method="POST">
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
                                            {{-- @if (session()->has('viewprofileeng'))
                                              {{'session value'. session()->get('viewprofileeng') }}
                                              @else
                                              {{ 'No Route Found' }}
                                              @endif --}}

                                            <!-- Email Address -->
                                            <div>
                                                <x-label for="email" :value="__('Email')" />

                                                <x-input id="email" class="block mt-1 w-full" type="email"
                                                    name="email" :value="old('email')" required autofocus />
                                            </div>
                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-label for="password" :value="__('Password')" />

                                                <x-input id="password" class="block mt-1 w-full" type="password"
                                                    name="password" required autocomplete="current-password" />
                                            </div>
                                            <!-- Remember Me -->
                                            <div class="block mt-4">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox"
                                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                        name="remember">
                                                    <span
                                                        class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
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
                                                <button style="background-color: #15558d !important;color:white;"
                                                    type="submit" id="login_btn" formaction="{{ route('login') }}"
                                                    class="btn bg-success btn-block  mt-2">Login</button>
                                            </div>
                                        </form>


                                </x-guest-layout>
                            </div>
                            <div id="or">

                                or

                            </div>
                            <div class="fb-hint center" style="text-align:center;color: #000000;">Login with Facebook &
                                Google</div>
                            <div class="fb-hint center" style="text-align:center;padding:25px">
                                <a class="btn btn-primary" style="background-color: rgba(24, 119, 242);color:white"
                                href="{{ route('loginfacebook') }}" role="button" id="facebookbtn"><i
                                        class="fab fa-facebook me-4"></i>&nbsp;&nbsp;Facebook</a>
                                <!--<a class="btn btn-primary" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter me-2"></i>Twitter</a>-->
                                <a class="btn btn-primary" style="background-color: #dd4b39; color:white"
                                    role="button" id="googlebtn" href="{{ route('logingoogle') }}"><i
                                        class="fab fa-google"></i>&nbsp;&nbsp;Google</a>
                            </div>

                        </div>
                    </div>
                    <!-- /Login Tab Content -->

                </div>
            </div>

        </div>

    </div>
   
    <div id="social_login_div"
        style="display:none;position: fixed;top:50%;left:50%;width:275px;height:350;background-color:#2e2f30;box-shadow:3px 5px 5px #b2c8df;border-radius:3px;box-sizing:border-box;transform:translate(-50%,-50%)">
        <div style="padding:10px">
            <input type="hidden" id="socialbtn_press">
            <h6 style="font-weight: 500;color:white" class="mb-2">Select Your Role</h6>
            <input type="radio" name="select_role" id="role_user" value="user" checked
                onchange="rolevalue('user')"><label for="role_user" class="ml-2"
                style="font-size: 15px;color:white">As Client</label><br>
            <input type="radio" name="select_role" value="enge" id="role_engr" onchange="rolevalue('enge')"><label
                for="role_engr" class="ml-2" style="font-size: 15px;color:white">As Engineer</label>
            <div>
                <select class="form-control " style="display:none" name="select_engr_category"
                    id="select_engr_category">

                </select>
            </div>
            <br>
            <button class="btn btn-info mb-1 w-100" style="float: right" onclick="socialbtnaction()">OK</button>
        </div>
    </div>
   
    {{-- =========toast message for location ==================  --}}

    <div class="toast " style="position: absolute; top: 0; right: 0;z-index:9999;max-width: 50%;
    width: 50%;display:none">
        <div class="toast-header">

            <strong class="mr-auto">Trepak Engineer Portal</strong>

            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <img src="{{ asset('error_location/chromelocation.png') }}" alt="" width="100%"
                height="100px">
            <div class="mt-2">
                CLick on location icon in url bar and allow to access your current location.<br>
                After gave permission then refresh your page.
            </div>
        </div>
    </div>

    {{-- =========toast message for location ==================  --}}
    <!-- /Page Content -->
    @push('customjscode')
        <script>
            const success = (position) => {
                custom_lat = position.coords.latitude;
                custom_lon = position.coords.longitude;
            }
            const error = () => {

                var element = $('.toast')[0];
                var myToast = new bootstrap.Toast(element, {
                    autohide: false
                });
                myToast.show();
                document.querySelector('#login_btn').disabled = true;
                $('#googlebtn').removeAttr('onclick');
                $('#facebookbtn').removeAttr('onclick');
            }

            function geo_location() {
                navigator.geolocation.getCurrentPosition(success, error);
                navigator.permissions.query({
                    name: 'geolocation'
                }).then(function(result) {
                    if (result.state == 'denied') {
                        document.querySelector('#login_btn').disabled = true;
                        $('#googlebtn').removeAttr('onclick');
                        $('#facebookbtn').removeAttr('onclick');
                    }
                });
            }

            $(document).ready(function() {
                // console.warn('Arfan:'+);
                // if (navigator.geolocation) {
                //     geo_location();
                // } else {
                //     alert('Browser not compatible with location permission');
                // }
               
              
            });

            function socialbtn(press_btn) {
                if(press_btn == 'facebook'){
                    alert('facebook')
                    $.ajax({
                        url:'/loginfacebook',
                        type:'get',
                        success:function(data){
                            console.log(data);
                        }
                    });
                }else{
                    alert('google')
                   
                    $.ajax({
                      type:'get',
                      url:'/api/logingoogle',
                       
                        success:function(data){
                            console.log(data);
                        }
                    });
                }
                // (press_btn == 'facebook') ? $('#socialbtn_press').val(press_btn): $('#socialbtn_press').val(press_btn);
                // $('#social_login_div').show('slow');
            }

            function rolevalue(role) {
                if (role == 'enge') {
                    $.ajax({
                        url: 'fetchallcategoryengr',
                        type: 'get',
                        async: false,
                        success: function(data) {

                            if (data.length > 0) {
                                let option = '';
                                $.each(data, function(i, v) {
                                    option += `<option value='${v.id}'>${v.engrcategory}</option>`;
                                });
                                console.log(option);
                                $('#select_engr_category').html(option);
                                $('#select_engr_category').show('slow');
                            }


                        }
                    });
                } else {
                    $('#select_engr_category').hide('slow');
                }
            }

            function socialbtnaction() {
                let btn_val = $('#socialbtn_press').val();
                let role_val = $("input[name='select_role']:checked").val();
                let category_val = $("#select_engr_category").val();
                $.ajax({     
                    url: 'sessionforrole',
                    type: 'post',
                    data:{role_val:role_val,role_category:category_val,"_token":"{{ csrf_token() }}"},
                    success: function(data) {   
                      console.log(data);     
                    }
                });
                if (btn_val == 'google') {
                    // alert($("input[name='select_role']:checked").val());
                    // navigator.permissions.query({
                    //     name: 'geolocation'
                    // }).then(function(result) {

                    //     if (result.state == 'denied') {
                    //         window.scrollTo({ top: 0, behavior: 'smooth' });
                    //         var element = $('.toast')[0];
                    //         var myToast = new bootstrap.Toast(element, {
                    //             autohide: false
                    //         });
                    //         myToast.show();
                    //         $('#social_login_div').hide('slow');
                    //         document.querySelector('#login_btn').disabled = true;
                    //         $('#googlebtn').removeAttr('onclick');
                    //         $('#facebookbtn').removeAttr('onclick');
                    //     }
                    //     if (result.state == 'granted') {

                    //     }
                    // });
                    window.location = "{{ url('/logingoogle') }}";

                } else {


                    window.location = "{{ url('/loginfacebook') }}";
                }
            }
        </script>
    @endpush
