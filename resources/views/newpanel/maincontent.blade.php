<style>
    .top-header h2 {
        margin-top: 100px;
        text-align: center;
    }

    #mapid {
        height: 400px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 25px !important;
        margin-bottom: 15px !important;

    }

    #latlng {
        width: 225px;
    }

    .modal-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        width: 475px;
        height: 530px;


    }

    /* using :target */
    .modal-container:target {
        display: flex;
    }

    .modaldiv {
        width: 100%;
        height: 100%;
        padding: 2rem 1rem;
        border-radius: 0.8rem;
        background: linear-gradient(to right bottom, hsl(236deg 50% 54%), hsl(195, 50%, 50%));

        color: var(--light);

        box-shadow: 0.4rem 0.4rem 2.4rem 0.2rem hsla(236, 50%, 50%, 0.3);
        position: relative;

        overflow: hidden;
    }

    .modal__details {
        text-align: center;
        padding-bottom: 2rem;
        border-bottom: 1px solid hsla(0, 0%, 100%, 0.4);
    }

    .modal__title {
        font-size: 1.8rem;
    }

    .modal__description {

        margin-bottom: -1rem;
        font-size: 1.1rem;
        font-weight: 400;
        font-style: italic;
    }

    .intoimg {
        max-width: 92%;
        height: 208px;
        border-radius: 2.8rem;
        margin-left: 25px;
    }

    .intoimg img {
        width: 100%;
        height: 100%;
        border-radius: 10px;

    }

    .modal__text {
        padding: 0 1rem;
        font-size: 1.2rem;
        line-height: 2;
        font-weight: 500;
    }

    .modal__text1 {
        font-size: 1.1rem;
        line-height: 2;
        text-align: center;
        font-weight: 500;
    }

    .modal__text2 {
        font-size: 1.1rem;
        line-height: 2;
        text-align: center;
    }

    .modal__text::before {
        content: "";

        position: absolute;
        top: 0%;
        left: 100%;
        transform: translate(-50%, -50%);

        width: 6rem;
        height: 6rem;
        border: 1px solid hsla(0, 0%, 100%, 0.2);
        border-radius: 100rem;

        pointer-events: none;
    }

    .modal__btn {
        padding: 0.3rem 1rem;
        border: 1px solid hsla(0, 0%, 100%, 0.4);
        border-radius: 100rem;

        color: inherit;
        background: transparent;
        font-size: 1rem;
        font-family: inherit;
        letter-spacing: 0.2rem;

        transition: 0.2s;
        cursor: pointer;
        float: right;
        margin-left: 5px;
    }

    .modal__btn:hover,
    .modal__btn:focus {
        border-color: hsla(0, 0%, 100%, 0.6);
        transform: translateY(-0.2rem);
    }

    /* links */
    /* =============================================== */
    .link-1 {
        font-size: 1.8rem;

        color: var(--light);
        background: var(--background);
        box-shadow: 0.4rem 0.4rem 2.4rem 0.2rem hsla(236, 50%, 50%, 0.3);
        border-radius: 100rem;
        padding: 1.4rem 3.2rem;

        transition: 0.2s;
    }

    .link-1:hover,
    .link-1:focus {
        transform: translateY(-0.2rem);
        box-shadow: 0 0 4.4rem 0.2rem hsla(236, 50%, 50%, 0.4);
    }

    .link-2 {
        width: 1.5rem;
        height: 1.5rem;
        border: 1px solid hsla(0, 0%, 100%, 0.4);
        border-radius: 100rem;
        color: inherit;
        font-size: 1.2rem;
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.2s;
    }

    .link-2::before {
        content: "x";
        transform: translateY(-0.1rem);
    }

    .link-2:hover,
    .link-2:focus {
        border-color: hsla(0, 0%, 100%, 0.6);
        transform: translateY(-0.2rem);
    }

    /* Second Version Link */
    /* =============================================== */
    .second-version-link,
    .second-version-link:link {
        color: hsl(236, 50%, 50%);
        padding: 0.8rem 1.6rem 0.8rem 0.2rem;
        border-bottom: 2px solid hsl(236, 50%, 50%);

        font-size: 1.4rem;
        font-weight: bold;

        position: absolute;
        top: 4rem;
        right: 4rem;
    }

    .second-version-link::after {
        content: "\2197";

        position: absolute;
        top: 0;
        right: 0;

        font-size: 0.9em;
    }

    .abs-site-link {
        position: fixed;
        bottom: 20px;
        left: 20px;
        color: hsla(0, 0%, 0%, 0.6);
        font-size: 1.6rem;
    }

    #previous_btn {
        position: absolute;
    }
    @media only screen and (max-width: 510px) {
       
    .search-box .search-location {
    width: 43%;
}
.search-box .search-info {
    width: 43%;
}
.search-box .search-btn {
   
    width: 10%;
   
}
    }

    @media only screen and (max-width: 479px) {
        .modal-container {
        width: 400px;
    }

    }
    @media only screen and (max-width: 400px) {
        .modal-container {
        width: 340px;
      
    }
    .search-box form {
    /* display: -webkit-box; */
    display: inline;
   
}
.search-box .search-location {
    width: 100%;
}
.search-box .search-info {
    width: 100%;
}
.search-box .search-btn {
    position: relative;
    width: 100%;
    
}
    }
</style>
{{-- ======================guideline====================== --}}
<div class="modal-container" id="modal-opened" style="display:none">
    <div class="modaldiv">
        <div class="modal__details">
            <h1 class="modal__title">Engineering Portal</h1>
            <p class="modal__description">Guidlines, How It Works?</p>
        </div>

        <div class="step step1">
            <label class="modal__text" for="step1"> Step 1: </label>
            <div class="intoimg">
                <img src="{{ asset('newpanel/assets/img/S1.png') }}" />
            </div>
            <p class="modal__text1">Search Engineer Location</p>
        </div>
        <div class="step step2" style="display:none">
            <label class="modal__text" for="step1"> Step 2: </label>
            <div class="intoimg">
                <img src="{{ asset('newpanel/assets/img/S2.png') }}" />
            </div>
            <p class="modal__text1">Search Engineer Category</p>
        </div>
        <div class="step step3" style="display:none">
            <label class="modal__text" for="step1"> Step 3: </label>
            <div class="intoimg">
                <img src="{{ asset('newpanel/assets/img/map.png') }}" />
            </div>
            <p class="modal__text1">All Available Engineer</p>
        </div>
        <div class="step step4 " style="display:none">
            <label class="modal__text" for="step1"> Step 4: </label>
            <div class="intoimg">
                <img src="{{ asset('newpanel/assets/img/S3.png') }}" />
            </div>
            <p class="modal__text1">Booked Engineer</p>
        </div>
        <div class="step step5" style="display:none">
            <label class="modal__text" for="step1"> Step 5: </label>
            <div class="intoimg">
                <img src="{{ asset('newpanel/assets/img/orderinfo.png') }}" />
            </div>
            <p class="modal__text1">Booked Order Info</p>
        </div>
        <div class="step step6" style="display:none">
            <label class="modal__text" for="step1"> Step 6: </label>
            <div class="intoimg">
                <img src="{{ asset('newpanel/assets/img/conformstatus.png') }}" />
            </div>
            <p class="modal__text1">Order Status</p>
        </div>
        <!--<div>-->
        <!--    <label class="modal__text" for="step2"> Step 2: </label>-->
        <!--  <div class="intoimg">-->
        <!--    <img  src="{{ asset('newpanel/assets/img/S2.png') }}" />-->
        <!--    </div>-->
        <!--    <p class="modal__text1">Search Engineers</p>-->
        <!--</div>-->
        <!--
  <div>
   <label class="modal__text" for="step3"> Step 3: </label>
   <img src="http://localhost/modal/map.png" />
   <p class="modal__text1">Search Engineer On Map</p>
  </div>
  <div>
   <label class="modal__text" for="step4"> Step 4: </label>
   <img src="http://localhost/modal/S3.png" />
   <p class="modal__text1">Book Engineers</p>
  </div>

  <div>
   <label class="modal__text" for="step5"> Step 5: </label>
   <img src="http://localhost/modal/map.png" />
   <p class="modal__text1">Checkout</p>
  </div>
  <div>
   <label class="modal__text" for="step6"> Step 6: </label>
   <img src="http://localhost/modal/conformstatus.png" />
   <p class="modal__text1">Confirm Appointment</p>
  </div>
 -->
        <input type="checkbox" id="seeagainguideline" name="seeagainguideline" />
        <label class="modal__text2" for="seeagainguideline">
            Don't you want to see this again?</label>
        <br>
        <button class="modal__btn" id="next_btn" onclick="nextdiv()">Next &rarr;</button>
        <button class="modal__btn" onclick="closeguidelinediv()">Skip</button>
        <button class="modal__btn" id="previous_btn" onclick="previousdiv()">Previous</button>

        <a href="javascript:void(0)" onclick="closeguidelinediv()" class="link-2"></a>
    </div>
</div>
{{-- ======================guideline====================== --}}
<div class="top-header mt-5 pt-5 text-center">
    <h4>Find and Book the Best Engineers</h4>
</div>
<section class="section mt-0 pt-0">
    <div class="container topsection category_container">
        <div class="banner-wrapper">
            <div class="row">
                <div class="col-12">
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

                    <!-- Search -->
                    <div class="search-box">
                        <form method="post" action="{{ route('searchbarengineer') }}">
                            @csrf
                            <div class="form-group search-location">
                                <input type="text" class="form-control" id="search" name="cityname"
                                    placeholder="Location"
                                    onblur="getcordinataddress()">
                                @error('cityname')
                                    <div class="alert alert-danger" id="cityname_div">This Field is Required.</div>
                                    <script>
                                        setTimeout(() => {
                                            $('#cityname_div').hide();
                                        }, 3000);
                                    </script>
                                @enderror
                                <!-- <span class="form-text">Based on your Location</span> -->
                                <input type="text" id="addresslat" name="addresslat" hidden>
                                <input type="text" id="addresslon" name="addresslon" hidden>
                            </div>
                            <div class="form-group search-info">
                                <input type="text" class="form-control" id="eng_type" name="date"
                                    value="{{ old('date') }}" placeholder="Select Engineer">
                                @error('date')
                                    <div class="alert alert-danger" id="datediv_hide">This Field is Required.</div>
                                    <script>
                                        setTimeout(() => {
                                            $('#datediv_hide').hide();
                                        }, 3000);
                                    </script>
                                @enderror
                                <!-- <span class="form-text">Ex : Dental or Sugar Check up etc</span> -->
                            </div>
                            <button type="submit" class="btn btn-primary search-btn" id="search_btn" disabled><i
                                    class="fas fa-search"></i>
                                <span id="searchtext">Search</span></button>
                        </form>

                    </div>
                </div>

                <!-- /Search -->
            </div>

        </div>
    </div>
</section>
<!-- /Home Banner -->
<!--	  <div class="top-header1">-->
<!--						<h2>Find Engineers By Categories</h2>-->

 
<!--</div>-->

<section class=" section-category mt-2 pt-2">
    <div class="container category_container">
        <div class="row  ml-0 mr-0">
            @php
                $all_category = \App\Models\engCategory::get();
                
            @endphp
            @foreach ($all_category as $r)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mx-auto mx-md-0 maindiv_cat">
                    <a href="{{ route('searchengineer', $r->id) }}">
                        <div class="civil">
                            <img src="{{ asset('categorylogo/' . $r->engrcategorylogo) }}" class="img-fluid "
                                style="height: 100%;min-width:100%;">

                            <div class="civilhover">
                                <h6>{{ $r->engrcategory }}</h6>
                                <p>Total Engineer : 1025</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>

<!--========div for tutorial field======-->

<!--<div class='tutorial searchbox' >-->
<!--    <div style="padding:10px;height:100%">-->
<!--    <div class="header-gl" style="text-align:center;height:25%">-->
<!--        <h4>Welcome to Trepak</h4>-->
<!--        <h5>Guideline for use this Web Portal.</h5>-->
<!--    </div>-->
<!--    <div class="body-gl" style="height:55%">-->
<!--        <h5>How to search engineer?</h5>-->

<!--    </div>-->
<!--    <div class="footer-gl" style="height:20%">-->
<!--        <div style="display:flex;">-->
<!--            <button class="btn btn-primary">Skip</button>-->
<!--            <button class="btn btn-primary">Next</button>-->
<!--        </div>-->
<!--    </div>-->
<!--    </div>-->
<!--</div>-->



<!--========div for tutorial field======-->

<!--==================================google  map here =====-->

<section class=" section-category mt-2 pt-2">

    <div class="container category_container">
        <div class="row  ml-0 mr-0">

            <div class="col-12 mx-auto mx-md-0 p-0">
                <div id="btn_location_type">
                    @if (Auth::check())
                        <div id="authuser">
                            <input id="current_location_btn_db" type="radio" name="select_type"
                                value="databaseloc" onchange="select_val_radio()"><label>&nbsp;&nbsp;Database
                                Location</label>

                            <input id="current_location_btn" style="display:none" type="radio" name="select_type"
                                value="currentloc" onchange="select_val_radio()"><label>&nbsp;&nbsp;Current
                                Location</label>

                        </div>
                    @else
                        <div>
                            <input id="withoutauth" style="display:none" type="radio" name="select_type" checked
                                value="currentloc"><label>&nbsp;&nbsp;Current
                                Location</label>
                        </div>
                    @endif
                    @php
                        if (Auth::check()) {
                            $userloginstatus = 'yes';
                        } else {
                            $userloginstatus = 'no';
                        }
                        
                    @endphp

                </div>
                <!--<div id="floating-panel">-->
                <!--     <input id="latlng" type="text" value="31.4504,73.1350" />-->
                <!--     <input id="submit" type="button" value="Reverse Geocode" />-->
                <!--     </div>-->

                <div id="result"></div>

                <div id="mapid"></div>
                <input type="text" id="lat_cur" hidden>
                <input type="text" id="lon_cur" hidden>
                <input type="text" id="countryshortname" hidden>

            </div>



        </div>
    </div>
</section>

@php
    $engarray = [];
    // $egn_type = $engtype;
    // $egn_type = app;
    foreach (App\Models\engCategory::get('engrcategory') as $val) {
        $engarray[] = $val['engrcategory'];
    }
    $get_all_engr = [];
    // $egn_type = $engtype;
    // $egn_type = app;
    foreach (App\Models\User::where('role', 'engr') as $val) {
        $engarray[] = $val['engrcategory'];
    }
@endphp
<!--==================================google  map here =====-->
@push('customjscode')
    <script>
        var custom_lat;
        var custom_lon;
        var giveaccesslocation = 'no';
        var userloginstatus = '{{ $userloginstatus }}';
        var indexdiv = 1;
        $(document).ready(function() {
            $('#previous_btn').hide();
            if (getCookie('status')) {

            } else {
                $('#modal-opened').show('slow');
            }



        });

        function previousdiv() {
            if (indexdiv == 6) {
                $('.step5').show();
                $('.step6').hide();
            } else {
                var indexin = indexdiv - 1;
                $('.step' + indexin).show();
                $('.step' + indexdiv).hide();
            }
            indexdiv--;
            if (indexdiv == 6) {
                $('#next_btn').hide();
            }
            if (indexdiv < 6) {
                $('#next_btn').show();
            }

            if (indexdiv == 1) {
                $('#previous_btn').hide();
            }
        }

        function nextdiv() {
            if (indexdiv == 1) {
                $('.step2').show();
                $('.step1').hide();
            } else {
                var indexin = indexdiv + 1;
                $('.step' + indexin).show();
                $('.step' + indexdiv).hide();
            }
            indexdiv++;
            if (indexdiv == 6) {
                $('#next_btn').hide();
            }
            if (indexdiv > 1) {
                $('#previous_btn').show();
            }
        }

        function getCookie(name) {
            let cookie = {};
            document.cookie.split(';').forEach(function(el) {
                let [k, v] = el.split('=');
                cookie[k.trim()] = v;
            })
            return cookie[name];
        }

        function closeguidelinediv() {
            if ($('#seeagainguideline').is(':checked')) {
                document.cookie = "status=yes";
                $('#modal-opened').hide('slow');

            } else {
                $('#modal-opened').hide('slow');
            }

        }

        const geocodeLatLng = async (geocoder, lat, lon) => {

            const latlng = {
                lat: parseFloat(lat),
                lng: parseFloat(lon),
            };

            await geocoder
                .geocode({
                    location: latlng
                })
                .then((response) => {
                    if (response.results[0]) {

                        for (var i = 0; i < response.results[0].address_components.length; i++) {
                            if (response.results[0].address_components[i].types[0] == "country") {
                                country = response.results[0].address_components[i];
                                // console.log('short name ioof dipaosj dansdkl a:'+country.short_name);
                                $('#countryshortname').val(country.short_name);

                            }
                        }

                    } else {
                        return 'no';
                       console.log("No results found");
                    }
                })

        }

        function getcordinataddress() {
            setTimeout(() => {
                var value_city = $('#search').val();
                if (value_city != "") {
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        'address': value_city
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var Lat = results[0].geometry.location.lat();
                            var Lng = results[0].geometry.location.lng();
                            $('#addresslat').val(Lat);
                            $('#addresslon').val(Lng);
                            document.getElementById('search_btn').disabled = false;
                            
                        } else {
                            console.log("Something got wrong " + status);
                        }
                    });
                } else {
                    console.log('please fill this field');
                }
            }, 500);

        }

        function checklocationpermission() {
            const success = (position) => {
                $('#lat_cur').val(position.coords.latitude);
                $('#lon_cur').val(position.coords.longitude);
                return 'yes';
            }
            const error = () => {
                return 'no';
            }
            navigator.geolocation.getCurrentPosition(success, error);
        }


        async function make_cord(check_select_btn) {
            const success = (position) => {
                $('#lat_cur').val(position.coords.latitude);
                $('#lon_cur').val(position.coords.longitude);
                giveaccesslocation = 'yes';
                if (userloginstatus == 'yes') {
                    $('#current_location_btn').show();
                    document.getElementById('current_location_btn').checked = true;
                    document.getElementById('current_location_btn_db').checked = false;

                } else {
                    $('#withoutauth').show();
                    document.getElementById('withoutauth').checked = true;
                }

                check_select_btn();


            }
            const error = () => {
                console.log("error");
                $('#lat_cur').val('');
                $('#lon_cur').val('');
                giveaccesslocation = 'no';
                if (userloginstatus == 'yes') {
                    $('#current_location_btn').hide();
                    $('#current_location_btn + label').hide();
                    document.getElementById('current_location_btn').checked = false;
                    document.getElementById('current_location_btn_db').checked = true;
                } else {
                    $('#withoutauth').hide();
                    $('#withoutauth + label').hide();
                    document.getElementById('withoutauth').checked = false;
                }

                check_select_btn();
            }

            navigator.geolocation.getCurrentPosition(success, error);
            navigator.permissions.query({
                name: 'geolocation'
            }).then(function(result) {
                console.log(result);
                if (result.state == 'denied' || result.state == 'gratned') {

                }
            });
            // setTimeout(()=>{

            // },1000)

        }

        function make_map(snc, lat_client, lon_client,currentlocationfetch = 'no') {
            if (lat_client == "" && lon_client == "") {
                console.log('yes yor are offline and you only see the people of pakistan');
                var allengr = [];
                $.ajax({
                    url: 'fetchallrangeengr',
                    type: 'get',
                    async: false,
                    success: function(data) {
                        console.log('fetch all user :' + data.length)

                        $.each(data, function(index, value) {
                            allengr[index] = value;
                        });

                    }
                });
                var map;
                map = new google.maps.Map(document.getElementById("mapid"), {
                    center: {
                        'lat': 32.174792,
                        'lng': 74.181595,
                    },
                    mapTypeControl: false,
                    zoom: 8,
                    gestureHandling: 'greedy',
                    draggable: true,
                });
                var input = document.getElementById('search');
                const options = {
                    types: ['administrative_area_level_2'],
                    componentRestrictions: {
                        country: "pak"
                    },
                    fields: ["address_components", "geometry", "icon", "name"],
                    strictBounds: false,


                };
                var autocomplete = new google.maps.places.Autocomplete(input, options);
                const shape = {
                    coords: [1, 1, 1, 20, 18, 20, 18, 1],
                    type: "poly",
                };





                var style_s = [{
                        featureType: "poi.business",
                        stylers: [{
                            visibility: "off"
                        }],
                    },
                    {
                        featureType: "transit",
                        elementType: "labels.icon",
                        stylers: [{
                            visibility: "off"
                        }],
                    },
                ];
                //  new google.maps.StyledMapType(styles,{name: "Styled Map"});

                var infoWindow = new google.maps.InfoWindow();
                $.each(allengr, function(i, m) {
                    console.log(m);
                    //  var latLngA = {'lat':32.1877,'lng':74.1945};
                    //  var latLngB = {'lat':m.lan,'lng':m.lng};
                    function randomInRange(min, max) {
                        return Math.random() < 0.5 ? ((1 - Math.random()) * (max - min) + min) : (Math.random() * (max - min) + min);
                        }
                    let variation = randomInRange(0.1, 5) / 500;
                    var latitude2 = m.latitude + variation;
                    var longitude2 = m.longitude  + variation;
                    // var idfetch =  m.id;
                    // var url = '{{ route('fetchcategorynamemap', ':id') }}';
                    // url = url.replace(':id', idfetch );
                    // let message;
                    // $.ajax({
                    //     url:url,
                    //     type:'get',
                    //     success:function(data){
                    //         console.log("Arfan ahmad is a:"+data);
                    //         message = 
                    //     }
                    // });
                    // console.log(m.category.engrcategory);
                    const message =
                        `<form action='{{ route('proceed') }}' method='post'> @csrf <div><h6>Engineer Name: ${m.fname}</h6><h6>Engineer Type: ${m.category.engrcategory}</h6>   <span style="font-weight:bold">Date:</span>   <input type='date' name="engr_date" value='{{ date('Y-m-d') }}' min='{{ date('Y-m-d') }}'><br><br><input type="hidden" name="engr_id" value='${m.id}'><button class='btn w-100 btn-primary p-0'>Booked</button></div><form>`;
                    const infowindow = new google.maps.InfoWindow({
                        content: message,
                    });
                    const svgMarker = {
                        path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
                        fillColor: "red",
                        fillOpacity: 1,
                        strokeWeight: 0,
                        rotation: 0,
                        scale: 2,
                        anchor: new google.maps.Point(15, 30),
                    };
                    var image = {
                        url: "{{ asset('engrphoto/demo.png') }}",
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    let marker_s = new google.maps.Marker({
                        position: new google.maps.LatLng(latitude2, longitude2),
                        shape: shape,
                        title: m.fname,
                        map: map,
                        icon: image
                    });
                    (function(marker, m) {
                        google.maps.event.addListener(marker_s, "click", function(e) {
                            //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                            infoWindow.setContent(
                                `<form action='{{ route('proceed') }}' method='post'> @csrf <div><h6>Engineer Name: ${m.fname}</h6><h6>Engineer Type: ${m.category.engrcategory}</h6><span style="font-weight:bold">Date: &nbsp;&nbsp;</span><input type='date' name="engr_date" value='{{ date('Y-m-d') }}' min='{{ date('Y-m-d') }}'><br><br><input type="hidden" name="engr_id" value='${m.id}'><button class='btn w-100 btn-primary p-0'>Booked</button></div><form>`
                            );
                            infoWindow.open(map, marker);
                        });
                    })(marker_s, m);
                    // google.maps.event.addListener(marker_s, 'click', function() {
                    //     infowindow.open({
                    //         anchor: marker_s,
                    //         map,
                    //         shouldFocus: false,
                    //     });
                    // });
                });

            } else {
                var allengr = [];
                if(currentlocationfetch ==  'yes'){
                    $.ajax({
                    url: 'getuserlanlog',
                    type: 'post',
                    async: false,
                    data:{lat:lat_client,lon:lon_client,"_token":"{{ csrf_token() }}"},
                    success: function(data) {   
                        $.each(data, function(index, value) {
                            allengr[index] = value;
                        });
                    }
                });
                }else{
                    $.ajax({
                    url: 'fetchallrangeengr',
                    type: 'get',
                    async: false,
                    success: function(data) {
                        console.log('fetch all user :' + data.length)
                        console.log(data);
                        $.each(data, function(index, value) {
                            allengr[index] = value;
                        });

                    }
                });
                }
               

                
                var map;
                var input = document.getElementById('search');
                const options = {
                    types: ['administrative_area_level_2'],
                    componentRestrictions: {
                        country: snc
                    },
                    fields: ["address_components", "geometry", "icon", "name"],
                    strictBounds: false,


                };
                var latitude_cur = parseFloat(lat_client);
                var longitude_cur = parseFloat(lon_client);

                // test code to fetch country name

                // test code to fetch country name

                var autocomplete = new google.maps.places.Autocomplete(input, options);
                map = new google.maps.Map(document.getElementById("mapid"), {
                    center: {
                        'lat': latitude_cur,
                        'lng': longitude_cur,
                    },
                    mapTypeControl: false,
                    zoom: 8,
                    gestureHandling: 'greedy',
                    draggable: true,
                });
                const shape = {
                    coords: [1, 1, 1, 20, 18, 20, 18, 1],
                    type: "poly",
                };





                var style_s = [{
                        featureType: "poi.business",
                        stylers: [{
                            visibility: "off"
                        }],
                    },
                    {
                        featureType: "transit",
                        elementType: "labels.icon",
                        stylers: [{
                            visibility: "off"
                        }],
                    },
                ];
                //  new google.maps.StyledMapType(styles,{name: "Styled Map"});
                map.setOptions({
                    styles: style_s
                });
                //   map.setOptions({ styles: styles["hide"] });

                var infoWindow = new google.maps.InfoWindow();
                var lon_s = [];
                var lat_s = [];
                var distance_boolean = [];
                $.each(allengr, function(i, m) {
                    if (lon_s.includes(m.longitude) && lat_s.includes(m.latitude)) {
                        function randomInRange(min, max) {
                            return Math.random() < 0.5 ? ((1 - Math.random()) * (max - min) + min) : (Math
                                .random() * (max - min) + min);
                        }
                        let variation = randomInRange(0.1, 5) / 500;

                        var latitude2 = m.latitude  + variation;
                        var longitude2 = m.longitude  + variation;
                    } else {
                        var latitude2 = m.latitude ;
                        var longitude2 = m.longitude ;
                    }
                    lon_s.push(m.longitude);
                    lat_s.push(m.latitude);

                    var latitude1 = latitude_cur;
                    var longitude1 = longitude_cur;

                    var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(
                        latitude1, longitude1), new google.maps.LatLng(latitude2, longitude2));
                    var distance_km = distance / 1000;
                    console.log(distance_km);
                    if (distance_km < 1) {
                        distance_boolean.push('no');
                    } else {
                        distance_boolean.push('yes');
                    }

                    // var latitude2 = m.latitude / 1000000;
                    // var longitude2 = m.longitude / 1000000;



                    if (distance_km < 100) {
                        // var idfetch =  m.id;
                        // var url = '{{ route('fetchcategorynamemap', ':id') }}';
                        // url = url.replace(':id', idfetch );
                        // let message;
                        // $.ajax({
                        //     url:url,
                        //     type:'get',
                        //     success:function(data){
                        //         console.log("Arfan ahmad is a:"+data);
                        //         message = 
                        //     }
                        // });
                       
                        const message =
                            `<form action='{{ route('proceed') }}' method='post'> @csrf <div><h6>Engineer Name: ${m.fname}</h6><h6>Engineer Type: ${m.category.engrcategory}</h6><span style="font-weight:bold">Date: &nbsp;&nbsp;</span><input type='date' name="engr_date" value='{{ date('Y-m-d') }}' min='{{ date('Y-m-d') }}'><br><br><input type="hidden" name="engr_id" value='${m.id}'><button class='btn w-100 btn-primary p-0'>Booked</button></div><form>`;
                       
                        const infowindow = new google.maps.InfoWindow({
                            content: message,
                        });
                        const svgMarker = {
                            path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
                            fillColor: "red",
                            fillOpacity: 1,
                            strokeWeight: 0,
                            rotation: 0,
                            scale: 2,
                            anchor: new google.maps.Point(15, 30),
                        };
                        var image = {
                            url: "{{ asset('engrphoto/demo.png') }}",
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        };


                        let marker_s = new google.maps.Marker({
                            position: new google.maps.LatLng(latitude2, longitude2),
                            shape: shape,
                            title: m.fname,
                            label: {
                                text: parseFloat(distance_km).toFixed(1) + 'KM',
                                color: "red",
                                fontSize: "15px",
                                fontWeight: "bold"
                            },
                            map: map,
                            icon: image
                        });
                        // google.maps.event.addListener(marker_s, 'mouseover', function() {
                        //     infowindow.open({
                        //         anchor: marker_s,
                        //         map,
                        //         shouldFocus: false,
                        //     });
                        // });

                        (function(marker, m) {
                            google.maps.event.addListener(marker_s, "click", function(e) {
                                //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                                infoWindow.setContent(
                                    `<form action='{{ route('proceed') }}' method='post'> @csrf <div><h6>Engineer Name: ${m.fname}</h6><h6>Engineer Type: ${m.category.engrcategory}</h6><span style="font-weight:bold">Date: &nbsp;&nbsp;</span><input type='date' name="engr_date" value='{{ date('Y-m-d') }}' min='{{ date('Y-m-d') }}'><br><br><input type="hidden" name="engr_id" value='${m.id}'><button class='btn w-100 btn-primary p-0'>Booked</button></div><form>`
                                );
                                infoWindow.open(map, marker);
                            });
                        })(marker_s, m);
                        // google.maps.event.addListener(marker_s, 'click', function() {
                        //     infowindow.open({
                        //         anchor: marker_s,
                        //         map,
                        //         shouldFocus: false,
                        //     });
                        // });
                        // google.maps.event.addListener(marker_s, 'mouseout', function() {
                        //     infowindow.close(

                        //     );
                        // });
                    }
                });

                if (distance_boolean.includes('no')) {
                   
                } else {
                    var latitude1 = latitude_cur;
                    var longitude1 = longitude_cur;

                    var markercurrentlocation = new google.maps.Marker({
                        position: new google.maps.LatLng(latitude1, longitude1),
                        shape: shape,
                        title: 'Current location',
                        label: {
                            text: 'U',
                            color: "black",
                            fontSize: "15px",
                            fontWeight: "bold"
                        },
                        map: map,

                    });

                }
            }
        }

        function initMap() {
            make_cord(check_select_btn);
        }
        // 		 ==========geolocation script====================


        $(function() {

            let eng_type = @php echo json_encode($engarray) @endphp


            $("#eng_type").autocomplete({
                source: eng_type,
                autoFocus: true
            });
        });
    </script>
    <script>
        function check_select_btn() {

            if (userloginstatus == 'yes') {
                var val_login_status = $('input[name="select_type"]:checked').val();
                if (val_login_status == 'databaseloc') {
                    console.log('userlogin and select access db');
                    var longitudeclient = '{{ Auth::check() ? Auth::user()->longitude : '' }}';
                    var latitudeclient = '{{ Auth::check() ? Auth::user()->latitude : '' }}';
                    console.log('database url is :'+longitudeclient);
                    console.log('database url is :'+latitudeclient);
                    const geocoder = new google.maps.Geocoder();
                    $res = geocodeLatLng(geocoder, latitudeclient, longitudeclient);
                    setTimeout(() => {
                        let sn_con = $('#countryshortname').val();

                        make_map(sn_con, latitudeclient, longitudeclient);
                    }, 1500);

                } else {
                    console.log('value is the one and only :' + $('input[name="select_type"]:checked').val());
                    var longitudeclient = $('#lon_cur').val();
                    var latitudeclient = $('#lat_cur').val();
                    const geocoder = new google.maps.Geocoder();
                    $res = geocodeLatLng(geocoder, latitudeclient, longitudeclient);
                    setTimeout(() => {
                        let sn_con = $('#countryshortname').val();

                        make_map(sn_con, latitudeclient, longitudeclient,'yes');
                    }, 1500);

                }
            } else {

                // console.log('value is the one and only :' + $('input[name="select_type"]:checked').val());
                var val_login_status = $('input[name="select_type"]:checked').val();
                if (val_login_status == 'currentloc') {
                    var longitudeclient = $('#lon_cur').val();
                    var latitudeclient = $('#lat_cur').val();
                    const geocoder = new google.maps.Geocoder();
                    $res = geocodeLatLng(geocoder, latitudeclient, longitudeclient);
                    setTimeout(() => {
                        let sn_con = $('#countryshortname').val();

                        make_map(sn_con, latitudeclient, longitudeclient,'yes');
                    }, 1500);
                } else {
                    console.log('no access you');
                    var longitudeclient = "";
                    var latitudeclient = '';
                    make_map("", latitudeclient, longitudeclient);


                }


            }
        }

        function select_val_radio() {
            var val_login_status = $('input[name="select_type"]:checked').val();
            if (val_login_status == 'databaseloc') {

                var longitudeclient = '{{ Auth::check() ? Auth::user()->longitude  : '' }}';
                var latitudeclient = '{{ Auth::check() ? Auth::user()->latitude  : '' }}';
                console.log(longitudeclient + ' , lat :' + latitudeclient);
                const geocoder = new google.maps.Geocoder();
                $res = geocodeLatLng(geocoder, latitudeclient, longitudeclient);
                setTimeout(() => {
                    let sn_con = $('#countryshortname').val();

                    make_map(sn_con, latitudeclient, longitudeclient);
                }, 1500);

            } else {
                navigator.permissions.query({
                    name: 'geolocation'
                }).then(function(result) {
                    console.log(result);
                    if (result.state == 'granted') {
                        var longitudeclient = $('#lon_cur').val();
                        var latitudeclient = $('#lat_cur').val();
                        const geocoder = new google.maps.Geocoder();
                        $res = geocodeLatLng(geocoder, latitudeclient, longitudeclient);
                        setTimeout(() => {
                            let sn_con = $('#countryshortname').val();

                            make_map(sn_con, latitudeclient, longitudeclient,'yes');
                        }, 1500);
                    } else {
                        console.log('Please Allow Your Current Location');
                    }
                });
            }
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDefv55aRSdLiSHe-SgrGrrjp3QWlQspt4&callback=initMap&v=weekly&channel=2&libraries=geometry,places"
        async></script>
@endpush
