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
                                          <input type="radio" value="user" id="select_role_user" name="select_role"  onchange="rolevalue('user')"><label for="select_role_user">As Client</label>
                                          <input type="radio" value="enge" id="select_role_enge" name="select_role"   onchange="rolevalue('enge')"><label for="select_role_user">As Engineer</label>
                                          <div>
                                            <select class="form-control " style="display:none" name="select_engr_category"
                                                id="select_engr_category">
                            
                                            </select>
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
   
 
    {{-- =========toast message for location ==================  --}}

    <div style="position: absolute; top: 0; right: 0;z-index:9999;max-width: 50%;
    width: 50%;">
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
