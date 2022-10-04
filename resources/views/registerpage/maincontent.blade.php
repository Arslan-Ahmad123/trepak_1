<link rel="stylesheet" href="{{ asset('inteltelphone/css/intlTelInput.min.css') }}">
<style>
    @media only screen and (max-width: 575.98px) {
        .navbrand_logo {
            position: relative;
            left: 25%;
        }
    }
</style>
<!-- Page Content -->
<div class="content topsection">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Register Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        @php
                            $currentURL = Route::current()->getName();
                        @endphp
                        @if ($currentURL == 'user_register')
                            <input type="text" name="cityname" value="{{ $city_name }}" hidden>
                            <input type="text" name="engtype" value="{{ $eng_type }}" hidden>
                        @endif
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="{{ asset('newpanel/assets/img/login-banner.jpg') }}" class="img-fluid"
                                alt="Doccure Register">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                @if ($currentURL == 'user_register' || $currentURL == 'user_regis')
                                    <h3>User Register</h3>
                                @else
                                    <h3>Engineer Register</h3>
                                @endif

                            </div>
                            <x-guest-layout>
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <!-- Register Form -->
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                                    class="contact-form">
                                    @csrf
                                    <div class="form-section">
                                        <!--First Name -->
                                        <div>
                                            <x-label for="fname" :value="__('First Name')" />
                                            <x-input id="fname" class="block mt-2 w-full" type="text"
                                                name="fname" :value="old('fname')" required autofocus />
                                        </div>
                                        <!-- Last Name -->
                                        <div>
                                            <x-label for="lname" :value="__('Last Name')" />
                                            <x-input id="lname" class="block mt-2 w-full" type="text"
                                                name="lname" :value="old('lname')" required autofocus />
                                        </div>
                                        <!--Pic -->
                                        <div>
                                            <x-label for="pic" style="margin-bottom:5px" :value="__('Pic')" />
                                            <x-input id="pic" style="margin-bottom:10px"
                                                class="block  w-full form-control" type="file" name="pic"
                                                :value="old('pic')" autofocus />
                                        </div>
                                        <!--Mobile -->
                                        <div>
                                            <x-label for="mobile" style="margin-bottom:5px" :value="__('Mobile')" />
                                            <x-input id="mobile" style="margin-bottom:10px" class="block  w-full"
                                                type="text" name="mobile" :value="old('mobile')" required autofocus />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <x-label for="email" :value="__('Email')" />
                                            <x-input id="email" class="block mt-1 w-full" type="email"
                                                name="email" :value="old('email')" required />
                                        </div>
                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-label for="password" :value="__('Password')" />
                                            <x-input id="password" class="block mt-1 w-full" type="password"
                                                name="password" required autocomplete="new-password" />
                                        </div>
                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password" name="password_confirmation" required />
                                        </div>
                                        <!--Address -->
                                        {{-- <div>
                                            <x-label for="address" style="margin-bottom:5px" :value="__('Address')" />
                                            <x-input id="address" style="margin-bottom:10px" class="block  w-full"
                                                type="text" name="address" :value="old('address')" required autofocus
                                                readonly />
                                        </div> --}}
                                        {{-- -- Role -- --}}
                                        <div class="mt-4">
                                            {{-- <x-label for="role" :value="__('Role')" /> --}}
                                            <select class="block mt-1 w-full border-gray-300 rounded-md" name="role"
                                                id="role" hidden>
                                                @if ($currentURL == 'user_register' || $currentURL == 'user_regis')
                                                    <option value="user">User</option>
                                                @else
                                                    <option value="enge">Engineer</option>
                                                @endif
                                            </select>
                                        </div>

                                        <!-- longitude and latitude -->
                                        {{-- <div>
                                            <x-label for="latitude" style="margin-bottom:5px;margin-top:10px"
                                                :value="__('Latitude')" />
                                            <x-input style="margin-bottom:10px" class="block  w-full" type="number"
                                                step="any" name="latitude" id="latitude" :value="old('latitude')"
                                                required autofocus readonly />
                                        </div>
                                        <div>
                                            <x-label for="longitude" style="margin-bottom:5px" :value="__('Longitude')" />
                                            <x-input style="margin-bottom:10px" class="block  w-full" type="number"
                                                step="any" name="longitude" id="longitude" :value="old('longitude')"
                                                required autofocus readonly />
                                        </div> --}}
                                        {{-- <input type="text" name="longitude" id="longitude"  readonly> 
                                            <input type="text" name="latitude" id="latitude"  readonly> --}}
                                    </div>
                                    {{-- @if ($currentURL == 'engregister')
                                        {{-- <div class="form-section">
                                            <!-- Engineer category -->
                                            <div>
                                                <x-label for="engrcategory" style="margin-bottom:5px"
                                                    :value="__('Engineer Category')" />
                                                <select class="block mt-1 w-full border-gray-300 rounded-md"
                                                    name="engrcategory" id="engrcategory">
                                                    <option value="">Select Engineer category</option>
                                                    @php
                                                        $category = App\Models\engCategory::get();
                                                    @endphp
                                                    @foreach ($category as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->engrcategory }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- Education -->
                                            <div class="mt-1">
                                                <x-label for="education" style="margin-bottom:5px" :value="__('Degree')" />
                                                <x-input id="education" style="margin-bottom:10px" class="block  w-full"
                                                    type="text" name="education" :value="old('education')" required
                                                    autofocus />
                                            </div>
                                            <!-- University -->
                                            <div>
                                                <x-label for="university" :value="__('Univertsity')" />
                                                <x-input id="university" class="block mt-2 w-full" type="text"
                                                    name="university" :value="old('specialize')" required autofocus />
                                            </div>
                                            <!-- University -->
                                            <div>
                                                <x-label for="degreestartend" :value="__('Degree Date')" />
                                                <span>Start Date</span><input id="degreestart" class="mt-2 ml-2 w-25 "
                                                    style="border-radius: 5px" type="number" name="degreestart"
                                                    :value="old('degreestart')" required autofocus />
                                                <span class="ml-3">End Date </span><input id="degreeend"
                                                    class="mt-2 ml-2 w-25" style="border-radius: 5px" type="number"
                                                    name="degreeend" :value="old('degreeend')" required autofocus />
                                            </div>
                                            <!-- specialize -->
                                            <div>
                                                <x-label for="specialize" :value="__('Specialize Field')" />
                                                <x-input id="specialize" class="block mt-2 w-full" type="text"
                                                    name="specialize" :value="old('specialize')" required autofocus />
                                            </div>
                                        </div> --}}
                                    {{-- <div class="form-section">
                                            <div class="mt-4">
                                                <x-label for="aboutme" :value="__('About Me')" />
                                                <textarea id="aboutme" row="4" class="block mt-1 form-control w-full" type="text" name="aboutme"
                                                    required></textarea>
                                            </div>
                                            <!-- Experience -->
                                            <div class="mt-1">
                                                <x-label for="experience" :value="__('Experience')" />
                                                <x-input id="experience" class="block mt-1 w-full" type="number"
                                                    name="experience" :value="old('experience')" required />
                                            </div>

                                            <!-- current company -->
                                            <div class="mt-1">
                                                <x-label for="currentcomp" :value="__('Current Company')" />
                                                <x-input id="currentcomp" class="block mt-1 w-full" type="text"
                                                    name="currentcomp" required />
                                            </div>
                                            <!-- charge par hour -->
                                            <div class="mt-1">
                                                <x-label for="chargeperhour" :value="__('Charge Per Hour')" />
                                                <x-input id="chargeperhour" class="block mt-1 w-full" type="number"
                                                    name="chargeperhour" required />
                                            </div>
                                        </div> 
                                    @endif --}}
                                    {{-- <div class="form-section">

                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <x-label for="email" :value="__('Email')" />
                                            <x-input id="email" class="block mt-1 w-full" type="email"
                                                name="email" :value="old('email')" required />
                                        </div>
                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-label for="password" :value="__('Password')" />
                                            <x-input id="password" class="block mt-1 w-full" type="password"
                                                name="password" required autocomplete="new-password" />
                                        </div>
                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password" name="password_confirmation" required />
                                        </div>

                                        {{-- <div class="flex items-center justify-end mt-4">
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                                        {{ __('Already registered?') }}
                                                </a>
                                                <x-button class="ml-4">
                                                        {{ __('Register') }}
                                                </x-button>
                                            </div>  --
                                    </div> --}}



                                    <div class="form-navigation">
                                        <button type="button"
                                            class="previous btn bg-info float-left mt-2">Previous</button>
                                        <button type="button" class="next btn bg-info float-right  mt-2">Next</button>
                                        <button type="submit"
                                            class="btn bg-success float-right  mt-2">Register</button>
                                    </div>

                                </form>
                                <div id="map"></div>

                            </x-guest-layout>
                            <!-- /Register Form -->

                        </div>
                    </div>
                </div>
                <!-- /Register Content -->

            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
@push('customscript')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput-jquery.js" integrity="sha512-/acYLNZxNREFFLiu9TPezQUnMP/n9JTKYJJ/nC5JbW1Cpw8wT2hfV0+StgBnut/dCFxYHitlYdQjKRfkNMj+og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('inteltelphone/js/intlTelInput.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js" integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        var input = document.querySelector("#mobile");
        intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: function(success, failure) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    success(countryCode);
                });
            },
            utilsScript: "{{ asset('inteltelphone/js/utils.js') }}",
        });

        function showbtn(id) {
            if (id == 'loginbtn') {
                $('#engrbtn').hide('slow');
                $('#clientbtn').hide('slow');
                $('#loginbtn').toggle('slow');
            } else if (id == 'engrbtn') {
                $('#engrbtn').toggle('slow');
                $('#clientbtn').hide('slow');
                $('#loginbtn').hide('slow');
            } else {
                $('#engrbtn').hide('slow');
                $('#clientbtn').toggle('slow');
                $('#loginbtn').hide('slow');
            }
        }
        $(document).on("click", "#mobile_btn", function() {
            console.log("Arfan");
            $(".main-wrapper").toggleClass("slide-nav");
            $(".sidebar-overlay").toggleClass("opened");
            $("html").addClass("menu-opened");
            return false;
        });
        $(document).on("click", "#menu_close", function() {
            $("html").removeClass("menu-opened");
            $(".sidebar-overlay").removeClass("opened");
            $("main-wrapper").removeClass("slide-nav");
        });
        $('#address').val('Model Town Gujranwala Punjab Pakistan');
        const success = (position) => {
            latd = position.coords.latitude;
            lond = position.coords.longitude;
            $('#latitude').val(latd);
            $('#longitude').val(lond);


        }
        const error = () => {
            console.log("error")
        }
        navigator.geolocation.getCurrentPosition(success, error);
        navigator.permissions.query({
            name: 'geolocation'
        }).then(function(result) {
            // Will return ['granted', 'prompt', 'denied']
            if (result.state == 'denied') {
                alert("Please manaully allow your location");
            }
        });

        $(function() {
            var $sections = $('.form-section');

            function navigateTo(index) {
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }

            function curIndex() {
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click(function() {
                navigateTo(curIndex() - 1);
            });

            $('.form-navigation .next').click(function() {
                $('.contact-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex() + 1);
                });
            });

            $sections.each(function(index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            });

            navigateTo(0);
        });
    </script>
@endpush
