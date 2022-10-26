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
                                    <h2>Select Role</h2>

                                    {{-- {{ url()->previous() }} --}}

                                </div>
                                <x-guest-layout>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <div>
                                        <form action="{{ route('submit_role') }}" method="POST">
                                            @csrf
                                            <input type="radio" value="user" id="select_role_user"
                                                name="select_role" onchange="rolevalue('user')" checked> <label
                                                for="select_role_user">&nbsp;&nbsp;As Client</label>
                                            <br>
                                            <input type="radio" value="enge" id="select_role_enge"
                                                name="select_role" onchange="rolevalue('enge')"> <label
                                                for="select_role_enge">&nbsp;&nbsp;As Engineer</label>
                                            <br>
                                            <div>
                                                <select class="form-control " style="display:none"
                                                    name="select_engr_category" id="select_engr_category">

                                                </select>
                                            </div>
                                            <input type="hidden" name="lon" id="lon">
                                            <input type="hidden" name="lat" id="lat">
                                            <input type="hidden" name="city" id="city">
                                            <input type="hidden" name="state" id="state">
                                            <input type="hidden" name="country" id="country">
                                            <input type="hidden" name="shortcountry" id="shortcountry">
                                            <input type="hidden" name="address" id="address">
                                            <input type="hidden" name="locality" id="locality">
                                            <button class="btn btn-info w-100" id="submit_role">Submit</button>
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

    <div id="show_location_msg"
        style="background-color:rgb(48 49 50);position: absolute; top: 13%; right: 5px; z-index:9999; max-width: 300px;display:none;
    width: 300px;box-shadow:3px 5px 3px black">
        <div class="toast-header" style="background-color:black">

            <strong class="mr-auto" style="color:white">Trepak Engineer Portal</strong>

            <button onclick="closelocationmsg()" class="ml-2 mb-1 close">
                <span aria-hidden="true" style="color:white;font-size:17px">x</span>
            </button>
        </div>
        <div class="toast-body">
            <img src="{{ asset('error_location/locationmsg.png') }}" alt="" width="100%"
                style=" height: 100px;">
            <div class="mt-2">

            </div>
        </div>
    </div>

    {{-- =========toast message for location ==================  --}}
    <!-- /Page Content -->
    @push('customjscode')
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDefv55aRSdLiSHe-SgrGrrjp3QWlQspt4&v=weekly&channel=2&libraries=geometry,places"
            async></script>
        <script>
            function initMap() {
                const geocoder = new google.maps.Geocoder();
                geocodeLatLng(geocoder);
            }

            function geocodeLatLng(geocoder) {

                const latlng = {
                    lat: parseFloat($('#lat').val()),
                    lng: parseFloat($('#lon').val()),
                };

                geocoder
                    .geocode({
                        location: latlng
                    })
                    .then((response) => {
                        if (response.results[0]) {




                            $('#address').val(response.results[0].formatted_address)
                            for (var i = 0; i < response.results[0].address_components.length; i++) {
                                if (response.results[0].address_components[i].types[0] == "locality") {
                                    //this is the object you are looking for City
                                    city = response.results[0].address_components[i];

                                    $('#locality').val(city.long_name)
                                }
                                if (response.results[0].address_components[i].types[0] == "administrative_area_level_1") {
                                    //this is the object you are looking for State
                                    region = response.results[0].address_components[i];

                                    $('#state').val(region.long_name);
                                }
                                if (response.results[0].address_components[i].types[0] == "administrative_area_level_2") {
                                    //this is the object you are looking for State
                                    region2 = response.results[0].address_components[i];

                                    $('#city').val(region2.long_name);
                                }
                                if (response.results[0].address_components[i].types[0] == "country") {
                                    //this is the object you are looking for
                                    country = response.results[0].address_components[i];

                                    $('#country').val(country.long_name);
                                    $('#shortcountry').val(country.short_name.toLowerCase());
                                }
                            }

                        } else {
                            window.alert("No results found");
                        }
                    })

            }


            const success = (position) => {
                custom_lat = position.coords.latitude;
                custom_lon = position.coords.longitude;

                $('#lat').val(custom_lat);
                $('#lon').val(custom_lon);
                initMap();


            }
            const error = () => {
                $('#show_location_msg').show();
                // var element = $('.toast')[0];
                // var myToast = new bootstrap.Toast(element, {
                //     autohide: false
                // });
                // myToast.show();
                document.querySelector('#submit_role').disabled = true;
                $('#lat').val('');
                $('#lon').val('');

            }

            function geo_location() {
                navigator.geolocation.getCurrentPosition(success, error);
                navigator.permissions.query({
                    name: 'geolocation'
                }).then(function(result) {
                    if (result.state == 'denied') {
                        document.querySelector('#submit_role').disabled = true;

                    }
                });
            }

            function closelocationmsg() {
                $('#show_location_msg').hide();
            }
            setInterval(() => {
                navigator.geolocation.getCurrentPosition(success, error);
                navigator.permissions.query({
                    name: 'geolocation'
                }).then(function(result) {

                    if (result.state == 'denied') {
                        document.querySelector('#submit_role').disabled = true;
                        console.log("Not give you permission")

                    }
                    if (result.state == 'granted') {
                        document.querySelector('#submit_role').disabled = false;
                    }
                });
            }, 5000);
            $(document).ready(function() {

                if (navigator.geolocation) {
                    geo_location();
                } else {
                    alert('Browser not compatible with location permission');
                }


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

                                $('#select_engr_category').html(option);
                                $('#select_engr_category').show('slow');
                            }


                        }
                    });
                } else {
                    $('#select_engr_category').hide('slow');
                }
            }
        </script>
    @endpush
