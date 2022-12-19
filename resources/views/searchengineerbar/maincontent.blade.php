 <style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

     .pagination ul {

         display: flex;
         flex-wrap: wrap;
         background: #fff;
         position: relative;
         left: 35%;
         padding: 8px;
         border-radius: 50px;
         box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
     }

     .pagination ul li {
         color: #20B2AA;
         list-style: none;
         line-height: 45px;
         text-align: center;
         font-size: 18px;
         font-weight: 500;
         cursor: pointer;
         user-select: none;
         transition: all 0.3s ease;
     }

     .pagination ul li.numb {
         list-style: none;
         height: 45px;
         width: 45px;
         margin: 0 3px;
         line-height: 45px;
         border-radius: 50%;
     }

     .pagination ul li.numb.first {
         margin: 0px 3px 0 -5px;
     }

     .pagination ul li.numb.last {
         margin: 0px -5px 0 3px;
     }

     .pagination ul li.dots {
         font-size: 22px;
         cursor: default;
     }

     .pagination ul li.btn {
         padding: 0 20px;
         border-radius: 50px;
     }

     .pagination li.active,
     .pagination ul li.numb:hover,
     .pagination ul li:first-child:hover,
     .pagination ul li:last-child:hover {
         color: #fff;
         background: #20B2AA;
     }

     .alink {
         display: inline-block;
         text-align: center;
         cursor: pointer;
     }

     input[type="text"],
     button {
         padding: 4px 8px;
         border: 0;
         outline: 0;
     }

     button {
         background-color: transparent;
         cursor: pointer;
     }

     button:hover i {
         color: #79c7c5;
         transform: scale(1.2);
     }

     /* container */
     .customchatbox {
         width: 450px;
         height: 70vh;
         position: fixed;
         bottom: 2%;
         right: 2%;
         /* transform: translate(-50%, -50%); */
         z-index: 1;
         border-radius: 10px;
         background-color: #f9fbff;
         box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
         overflow: hidden;
     }

     /* chat_box */
     .chat_box {
         display: flex;
         flex-direction: column;
         height: 100%;
     }

     .chat_box>* {
         padding: 8px;
     }

     /* head */
     .head {
         display: flex;
         align-items: center;
     }

     .head .user {
         display: flex;
         align-items: center;
         flex-grow: 1;
     }

     .head .user .avatar {
         margin-right: 8px;
     }

     .head .user .avatar img {
         display: block;
         border-radius: 50%;
     }

     .head .bar_tool {
         display: flex;
     }

     .head .bar_tool i {
         padding: 5px;
         width: 30px;
         height: 30px;
         display: flex;
         align-items: center;
         justify-content: center;
     }

     /* body */
     .chatbody {
         flex-grow: 1;
         background-color: #eee;
     }

     .chatbody .bubble {
         display: inline-block;
         padding: 10px;
         margin-bottom: 5px;
         border-radius: 15px;
     }

     .chatbody .bubble p {
         color: #f9fbff;
         font-size: 14px;
         text-align: left;
         line-height: 0.6;
     }

     .chatbody .incoming {
         text-align: left;
     }

     .chatbody .incoming .bubble {
         background-color: #b2b2b2;
     }

     .chatbody .outgoing {
         text-align: right;
     }

     .chatbody .outgoing .bubble {
         background-color: #79c7c5;
     }

     /* foot */
     .foot {
         display: flex;
     }

     .foot .msg {
         flex-grow: 1;
     }


     @media screen and (max-width:520px) {
         .pagination ul {


             width: 100%;

         }

         .customchatbox {
             width: 315px;
             height: 70vh;
         }
     }

     @media only screen and (max-width: 400px) {}

     .slidecontainer {
         width: 100%;
     }

     .slider {
         -webkit-appearance: none;
         width: 100%;
         height: 25px;
         background: #d3d3d3;
         outline: none;
         opacity: 0.7;
         -webkit-transition: .2s;
         transition: opacity .2s;
     }

     .slider:hover {
         opacity: 1;
     }

     .slider::-webkit-slider-thumb {
         -webkit-appearance: none;
         appearance: none;
         width: 25px;
         height: 25px;
         background: #04AA6D;
         cursor: pointer;
     }

     .slider::-moz-range-thumb {
         width: 25px;
         height: 25px;
         background: #04AA6D;
         cursor: pointer;
     }

     .linksstyle {
         position: relative;
         left: 30%;
     }

     #select2-engrcategory-container {
         display: none;
     }

     .select2-container--default {
         display: none;
     }
 </style>

 <!-- Breadcrumb -->
 <div class="breadcrumb-bar topsection">
     <div class="container-fluid">
         <div class="row align-items-center">
             <div class="col-md-8 col-12">
                 <nav aria-label="breadcrumb" class="page-breadcrumb">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Search</li>
                     </ol>
                 </nav>
                 <h4 class="breadcrumb-title">{{ $tlengr }} matches found for : {{ $cate_name->engrcategory }} In
                     Lahore</h2>
             </div>
             {{-- <div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
							</div>
						</div> --}}
         </div>
     </div>
 </div>
 <!-- /Breadcrumb -->
 @php
     if (session()->has('indexengrid')) {
         session()->forget('indexengrid');
         session()->forget('indexroute');
     }
 @endphp
 <!-- Page Content -->
 <div class="content">
     <div class="container-fluid">

         <div class="row">
             <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                 <!-- Search Filter -->
                 <div class="card search-filter" id="filter_start">
                     <div class="card-header">
                         <h4 class="card-title mb-0">Search Filter</h4>
                     </div>
                     <div class="card-body">
                         <form action="{{ route('searchbarengineer') }}" method="post">
                             @csrf
                             <div class="slidecontainer">
                                 Price Range
                                 <input type="range" min="500" max="5000" value="500" step="500"
                                     class="slider" id="myRange">
                                 <p>Value: <span id="demo"></span></p>
                             </div>


                             <div class="filter-widget">
                                 <h4>Select Specialist</h4>
                                 <select id="engrcategory" class="form-control" name="date">
                                     @php
                                         $res = getallcategory();
                                     @endphp
                                     @foreach ($res as $res)
                                         <option value="{{ $res->engrcategory }}"
                                             {{ $res->id == $category_id ? 'selected' : '' }}>
                                             {{ $res->engrcategory }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="filter-widget">
                                 <div class="form-group">
                                     Select City
                                     <input type="text" onfocus="checkerror()" onblur="getcordinataddress()"
                                         class="form-control" name="cityname" id="selectcity" placeholder="Select City"
                                         style="position:relative;border:1px solid rgb(180, 177, 177)">
                                     <span id="error_msg_show"
                                         style="color:red;font-weight: 600;font-size:15px;display:none">Select Correct
                                         City Name!!</span>
                                     <input type="hidden" name="addresslat" id="addresslat">
                                     <input type="hidden" name="addresslon" id="addresslon">
                                 </div>
                             </div>
                             <div class="btn-search">
                                 <button type="submit" id="search_btn" disabled class="btn btn-block">Search</button>
                             </div>
                         </form>
                     </div>

                 </div>
                 <!-- /Search Filter -->

                 <!-- Search show Filter -->
                 <div class="p-2 mb-3" id="filter_eng" style="cursor:pointer">Filter<i
                         class="fa fa-angle-down filtericon_cpro" aria-hidden="true"></i></div>
                 <div class="card search-filter" id="filter_later">
                     <div class="card-header">
                         <h4 class="card-title mb-0">Search Filter</h4>
                     </div>
                     <div class="card-body">

                         <form action="{{ route('searchbarengineer') }}" method="post">
                             @csrf
                             <div class="slidecontainer">
                                 Price Range
                                 <input type="range" min="500" max="5000" value="500" step="500"
                                     class="slider" id="myRange">
                                 <p>Value: <span id="demo"></span></p>
                             </div>

                             <div class="filter-widget">
                                 <h4>Select Specialist</h4>
                                 <select id="engrcategory" class="form-control" name="date">
                                     @php
                                         $res = getallcategory();
                                     @endphp
                                     @foreach ($res as $res)
                                         <option value="{{ $res->engrcategory }}"
                                             {{ $res->id == $category_id ? 'selected' : '' }}>
                                             {{ $res->engrcategory }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="filter-widget">
                                 <div class="form-group">
                                     Select City
                                     <input type="text" onfocus="checkerror_sm()" onblur="getcordinataddresss()"
                                         class="form-control" name="cityname" id="selectcitys" placeholder="Select City"
                                         style="position:relative;border:1px solid rgb(180, 177, 177)">
                                     <span id="error_msg_show_sm"
                                         style="color:red;font-weight: 600;font-size:15px;display:none">Select Correct
                                         City Name!!</span>
                                     <input type="hidden" name="addresslat" id="addresslats">
                                     <input type="hidden" name="addresslon" id="addresslons">
                                 </div>
                             </div>

                             <div class="btn-search">
                                 <button type="submit" id="search_btns" disabled
                                     class="btn btn-block">Search</button>
                             </div>
                         </form>
                     </div>
                 </div>
                 <!-- /Search Filter -->

             </div>

             <div class="col-md-12 col-lg-8 col-xl-9">
                 <div class="row">
                     <div class="col-md-12" id="all_engr_show">

                     </div>
                     <div class="col-md-12">
                         <div class="pagination">
                             <ul>
                                 <!--pages or li are comes from javascript -->
                             </ul>
                         </div>
                     </div>
                 </div>

                 {{-- @include('searchengineer.searchengrpage')
 {!! $engr->links() !!} --}}
             </div>

         </div>

     </div>

 </div>
 <section class=" section-category mt-2 pt-2">
     <div class="container category_container">
         <div class="row  ml-0 mr-0">

             <div class="col-12 mx-auto mx-md-0 p-0">
                 <!--<div id="floating-panel">-->
                 <!--     <input id="latlng" type="text" value="31.4504,73.1350" />-->
                 <!--     <input id="submit" type="button" value="Reverse Geocode" />-->
                 <!--     </div>-->

                 <div id="result"></div>

                 <div id="mapid" style="width: 100%; height: 400px;" class="mb-3"></div>

                 {{-- <div id=""></div> --}}
                 <input type="text" id="lat_cur" hidden>
                 <input type="text" id="lon_cur" hidden>

             </div>



         </div>
     </div>
 </section>
 <!-- /Page Content -->
 {{-- ==========================chat box ========================	 --}}
 <div class="container customchatbox" style="display:none">
     <div class="chat_box">
         <div class="head">
             <div class="user">
                 <div class="avatar">
                     <img src="{{ Auth::check() ? asset('engrphoto/' . Auth::user()->pic) : '' }}"
                         id="picofreciver" />
                 </div>
                 <div class="name" id="nameofreciver">{{ Auth::check() ? Auth::user()->fname : 'Test' }}</div>
             </div>
             <ul class="bar_tool">
                 <li><span class="alink"><a href="javascript:void(0)" onclick="closeclientchatbox()"><i
                                 class="fa fa-times" aria-hidden="true"></i></a></span></li>
             </ul>
         </div>
         <div class="chatbody" id="chatbody{{ getuseronline() }}">
             <div class="chatboxdiv">
                 <div class="incoming">

                     <div class="bubble">
                         <p>Hey, Father's Day is coming up..</p>
                     </div>
                     <div class="bubble">
                         <p>What are you getting.. Oh, oops sorry dude.</p>
                     </div>
                 </div>
                 <div class="outgoing">
                     <div class="bubble lower">
                         <p>Nah, it's cool.</p>
                     </div>
                     <div class="bubble">
                         <p>Well you should get your Dad a cologne. Here smell it. Oh wait! ...</p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="foot" style="position:relative">
             <form method='post' action='#'>
                 @csrf
                 <input type="text" name="message" id="message" class="msg"
                     placeholder="Type a message..." />
                 <input type="text" name="senderid" id="senderid"
                     value="{{ Auth::check() ? Auth::user()->id : '' }}" />
                 <input type="text" name="reciverid" id="reciverid" />
                 <input type="text" name="_token" id="token_res" value={{ csrf_token() }}>
                 <button id="submitmsg" style="position: absolute;right:2%;"><i
                         class="fas fa-paper-plane"></i></button>
             </form>
         </div>
     </div>
 </div>
 @php
     if (session()->has('search_id')) {
         session()->forget('search_id');
         session()->forget('routename');
     }
 @endphp
 {{-- ==========================chat box ========================	 --}}
 {{-- ===========modal for select order date================== --}}
 <div class="modal" tabindex="-1" role="dialog" id="orderdetail_modal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Select Date</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="{{ route('proceed') }}" method="post">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="selectdateorder">Select Date</label>
                         <input class="form-control" type="date" name="engr_date" id="selectdateorder"
                             min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
                         <input class="form-control" type="text" name="engr_id" id="select_engrid" hidden>

                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Place Order</button>
                     {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                 </div>
             </form>

         </div>
     </div>
 </div>
 {{-- ===========modal for select order date================== --}}
 <!-- /Page Content -->

 <!-- Footer -->

 @push('childscript')
     <script src="{{ asset('js/app.js') }}"></script>
     <script>
         //  ============function for show map and clients=================
         //  ============function for  clients with pagination=================
         var totalPages = 0;
         var allengr_array;
         var page = 1;
         var element_pagination = document.querySelector(".pagination ul");
         //  ============function for show map and clients=================

         //  ============function for show map and clients=================
         $(document).ready(function() {

             fetch('{{ route('returnsession') }}').then((res) => {
                 return res.json()
             }).then((res) => {
               

                 var output = "";
                 $('#all_engr_show').html('');
                 if (res.length > 0) {
                     let gettotalpage = Math.ceil(res.length / 5);

                     totalPages = gettotalpage;

                     allengr_array = res;
                     showEngineer(allengr_array, page);
                     createPagination(totalPages, page, element_pagination);
                 } else {
                     $('#all_engr_show').html('No Engineer Found!!');
                 }
             });
             if (jQuery(window).width() > 767) {
                 if (jQuery(".theiaStickySidebar").length > 0) {
                     jQuery(".theiaStickySidebar").theiaStickySidebar({
                         // Settings
                         additionalMarginTop: 20,
                     });
                 }

             }
             // $("#engrcategory").select2();

             // 	$(document).on(click,'.page-link',function(e){
             // 	e.preventDefault();
             // 	var pathname = $(this).attr("href");
             // 	console.log(pathname);
             //     // var id_cat =pathname.substr(-1,1);
             // 	// $.ajaxSetup({
             // 	// 	headers: {
             // 	// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             // 	// 	}
             // 	// });
             // 	// $.ajax({
             // 	// 	url:'/searchspecificcategory/'+id_cat,
             // 	// 	method:'post',
             // 	// 	data:{id:id_cat},
             // 	// 	success:function(data){
             // 	// 		console.log(data);
             // 	// 	}
             // 	// });

             // });
             $('.customchatbox').hide();
         });

         var slider = document.getElementById("myRange");
         var output = document.getElementById("demo");
         output.innerHTML = slider.value; // Display the default slider value

         // Update the current slider value (each time you drag the slider handle)
         slider.oninput = function() {
             output.innerHTML = this.value;
         }
         $("#filter_eng").click(function() {
             $("#filter_later").slideToggle('slow');
         });
         $(document).on("click", "#mobile_btn", function() {

             $(".main-wrapper").toggleClass("slide-nav");
             $(".sidebar-overlay").toggleClass("opened");
             $("html").addClass("menu-opened");
             return false;
         });
         $(document).on("click", ".sidebar-overlay", function() {
             $("html").removeClass("menu-opened");
             $(this).removeClass("opened");
             $("main-wrapper").removeClass("slide-nav");
         });

         $(document).on("click", "#menu_close", function() {
             $("html").removeClass("menu-opened");
             $(".sidebar-overlay").removeClass("opened");
             $("main-wrapper").removeClass("slide-nav");
         });

         function clientchat_box(engrid, clientid) {

             $('.customchatbox').hide('slow');

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: "{{ URL::to('onegetchatmsg') }}",
                 method: 'post',
                 data: {
                     senderid: clientid,
                     reciverid: engrid,

                 },
                 success: function(data) {
                   
                     $('.customchatbox').show('slow');
                     $('.customchatbox').attr('id', 'clientengr' + engrid + clientid);
                     $('.chatboxdiv').attr('id', 'chatbox' + engrid);
                     $('#reciverid').val(engrid);
                     const innerDiv = document
                         .getElementById('chatbody' + clientid)
                         .querySelector('#chatbox' + engrid);
                     if (innerDiv != null) {
                         $('#chatbox' + engrid).html('');
                         $.each(data, function(res, value) {
                             if (value.senderid == clientid) {
                                 var app_s = "<div class='outgoing'>" +
                                     "<div class='bubble'>" +
                                     "<p>" + value.message + "</p>" +
                                     "</div>" +
                                     "</div>";
                             } else {
                                 var app_s = "<div class='incoming'>" +
                                     "<div class='bubble'>" +
                                     "<p>" + value.message + "</p>" +
                                     "</div>" +
                                     "</div>";
                             }


                             $('#chatbox' + engrid).append(app_s);
                         });

                     } else {
                         alert("Not reciver online");
                     }

                 }
             });




         }

         function closeclientchatbox() {
             $('.customchatbox').hide('slow');
         }

         function initMap() {
             try {
                 make_cord(make_map);
             } catch (e) {
                
             }
         }

         function make_cord(callback) {
             const success = (position) => {
                 $('#lat_cur').val(position.coords.latitude);
                 $('#lon_cur').val(position.coords.longitude);
                 callback();
             
             }
             const error = () => {
               
                 callback();
             }

             navigator.geolocation.getCurrentPosition(success, error);
             navigator.permissions.query({
                 name: 'geolocation'
             }).then(function(result) {
               
                 if (result.state == 'denied' || result.state == 'gratned') {

                 }
             });
             // setTimeout(()=>{

             // },1000)

         }

         function make_map() {
             var allengr = [];
             var firstengr = [];
             $.ajax({
                 url: '{{ route('returnsession') }}',
                 type: 'get',
                 async: false,
                 success: function(data) {

                     if (data.length > 0) {
                         $.each(data, function(index, value) {
                             if (index == 0) {
                                 firstengr[index] = value;
                             }
                          
                             $('#lat_cur').val(value.client_lat);
                             $('#lon_cur').val(value.client_lon);
                             allengr[index] = value;
                         });
                     } else {
                         $.ajax({
                             url: '{{ route('returnclientsession') }}',
                             type: 'get',
                             async: false,
                             success: function(data) {

                                 $.each(data, function(index, value) {
                                   
                                     $('#lat_cur').val(value.client_lat);
                                     $('#lon_cur').val(value.client_lon);
                                 });





                             }
                         });
                     }


                 }
             });

             var input = document.getElementById('selectcity');
             var inputs = document.getElementById('selectcitys');
             const options = {
                 types: ['administrative_area_level_2'],

                 fields: ["address_components", "geometry", "icon", "name"],
                 strictBounds: false,


             };
             new google.maps.places.Autocomplete(input, options);
             new google.maps.places.Autocomplete(inputs, options);
             var map;

             var latitude_cur = $('#lat_cur').val() != "" ? parseFloat($('#lat_cur').val()) : 32.1877;
             var longitude_cur = $('#lon_cur').val() != "" ? parseFloat($('#lon_cur').val()) : 74.1945;


             map = new google.maps.Map(document.getElementById("mapid"), {
                 center: {
                     lat: latitude_cur,
                     lng: longitude_cur,
                 },
                 mapTypeControl: false,
                 zoom: 13,
             });
             const shape = {
                 coords: [1, 1, 1, 20, 18, 20, 18, 1],
                 type: "poly",
             };
             var checkuserlogin = {{ Auth::user() ? '1' : '0' }};
             console.warn(checkuserlogin);
             if (checkuserlogin == 1 || $('#lat_cur').val() != "") {



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

                 let infoWindow = new google.maps.InfoWindow();
                 var distance_boolean = [];
                 var lon_s = [];
                 var lat_s = [];
                 $.each(allengr, function(i, m) {
                     //  var latLngA = {'lat':32.1877,'lng':74.1945};
                     //  var latLngB = {'lat':m.lan,'lng':m.lng};
                     var latitude1 = latitude_cur;
                     var longitude1 = longitude_cur;
                     //    ================== 
                     if (lon_s.includes(m.longitude) && lat_s.includes(m.latitude)) {
                         function randomInRange(min, max) {
                             return Math.random() < 0.5 ? ((1 - Math.random()) * (max - min) + min) : (Math
                                 .random() * (max - min) + min);
                         }
                         let variation = randomInRange(0.1, 5) / 500;

                         var latitude2 = (m.latitude * 1) + variation;
                         var longitude2 = (m.longitude * 1) + variation;
                     } else {
                         var latitude2 = m.latitude;
                         var longitude2 = m.longitude;
                     }
                     lon_s.push(m.longitude);
                     lat_s.push(m.latitude);

                     //    ================== 

                     var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(
                         latitude1, longitude1), new google.maps.LatLng(latitude2, longitude2));
                     var distance_km = distance / 1000;

                     if (distance_km < 1) {
                         distance_boolean.push('no');
                     } else {
                         distance_boolean.push('yes');
                     }
                     if (distance_km < 80) {
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
                         // const message =
                         //     `<form action='{{ route('proceed') }}' method='post'> @csrf <div><h6>Engineer Name:<br> ${m.fname}</h6><h6>Engineer Type:<br> ${m.categoryname}</h6>Date: <br>  <input class="form-control" type='date' name="engr_date" value='{{ date('Y-m-d') }}' min='{{ date('Y-m-d') }}'><br><br><input type="hidden" name="engr_id" value='${m.id}'><button class='btn w-100 btn-primary p-0'>Booked</button></div><form>`;


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
                             url: "{{ asset('engrphoto/googlemap2.png') }}",
                             size: new google.maps.Size(80, 81),
                             origin: new google.maps.Point(0, 0),
                             anchor: new google.maps.Point(20, 40),
                             scaledSize: new google.maps.Size(40, 39)
                         };


                         let marker_s = new google.maps.Marker({
                             position: new google.maps.LatLng(latitude2, longitude2),

                             title: m.fname,
                             label: {
                                 text: parseFloat(distance_km).toFixed(0) + 'KM',
                                 color: "red",
                                 fontSize: "15px",
                                 fontWeight: "bold"
                             },
                             map: map,
                             icon: image
                         });


                         (function(marker, m) {
                          
                             google.maps.event.addListener(marker, "click", function(e) {

                                 //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                                 infoWindow.setContent(
                                     `<form action='{{ route('proceed') }}' method='post'> @csrf <div><h6>Engineer Name: ${m.fname}</h6><h6>Engineer Type: ${m.categoryname}</h6><h6>Address: ${m.city+', '+m.state+', '+m.short_country}</h6><span style="font-weight:bold">Date: &nbsp;&nbsp;</span><input type='date' name="engr_date" value='{{ date('Y-m-d') }}' min='{{ date('Y-m-d') }}'><br><br><input type="hidden" name="engr_id" value='${m.id}'><button class='btn w-100 btn-primary p-0'>Book</button></div><form>`
                                 );
                                 infoWindow.open(map, marker);
                             });
                         })(marker_s, m);

                     }
                 });
                 if (distance_boolean.includes('no')) {

                 } else {
                     new google.maps.Marker({
                         position: new google.maps.LatLng(latitude_cur, longitude_cur),
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
             } else {
                 let infoWindow = new google.maps.InfoWindow();
                 $.each(allengr, function(i, m) {
                     //  var latLngA = {'lat':32.1877,'lng':74.1945};
                     //  var latLngB = {'lat':m.lan,'lng':m.lng};

                     var latitude2 = m.latitude;
                     var longitude2 = m.longitude;

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
                         `<form action='{{ route('proceed') }}' method='post'> 
                            @csrf
                             <div>
                                <h6>Engineer Name: ${m.fname}</h6>
                                <h6>Engineer Type: ${m.categoryname}</h6>
                                Date:   <input class="form-controll" type='date' name="engr_date" value='{{ date('Y-m-d') }}' min='{{ date('Y-m-d') }}'><br><br>
                                <input type="text"  name="engr_id" value='${m.id}' hidden>
                                <button class='btn w-100 btn-primary p-0'>Book</button>
                                </div>
                                <form>`;

                     // const infowindow = new google.maps.InfoWindow({
                     //     content: message,
                     // });
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
                         url: "{{ asset('engrphoto/googlemap2.png') }}",
                         size: new google.maps.Size(80, 81),
                         origin: new google.maps.Point(0, 0),
                         anchor: new google.maps.Point(20, 40),
                         scaledSize: new google.maps.Size(40, 39)
                     };


                     let marker_s = new google.maps.Marker({
                         position: new google.maps.LatLng(latitude2, longitude2),

                         title: m.fname,

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
                                 `<form action='{{ route('proceed') }}' method='post'> @csrf <div><h6>Engineer Name: ${m.fname}</h6><h6>Engineer Type: ${m.categoryname}</h6><h6>Address: ${m.city+', '+m.state+', '+m.short_country}</h6><span style="font-weight:bold">Date: &nbsp;&nbsp;</span><input type='date' name="engr_date" value='{{ date('Y-m-d') }}' min='{{ date('Y-m-d') }}'><br><br><input type="hidden" name="engr_id" value='${m.id}'><button class='btn w-100 btn-primary p-0'>Book</button></div><form>`
                             );
                             infoWindow.open(map, marker);
                         });
                     })(marker_s, m);

                 });
             }
         }

         function getcordinataddress() {
             setTimeout(() => {
                 var value_city = $('#selectcity').val();
              
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
                             $('#error_msg_show').show('slow');
                             $('#addresslat').val('');
                             $('#addresslon').val('');
                             document.getElementById('search_btn').disabled = true;
                            
                         }
                     });
                 } else {
                     $('#addresslat').val('');
                     $('#addresslon').val('');
                     document.getElementById('search_btn').disabled = true;
                 }
             }, 500);

         }

         function getcordinataddresss() {
             setTimeout(() => {
                 var value_city = $('#selectcitys').val();
                 if (value_city != "") {
                     var geocoder = new google.maps.Geocoder();
                     geocoder.geocode({
                         'address': value_city
                     }, function(results, status) {
                         if (status == google.maps.GeocoderStatus.OK) {
                             var Lat = results[0].geometry.location.lat();
                             var Lng = results[0].geometry.location.lng();
                             $('#addresslats').val(Lat);
                             $('#addresslons').val(Lng);
                             document.getElementById('search_btns').disabled = false;

                         } else {
                             $('#error_msg_show_sm').show('slow');
                             $('#addresslats').val('');
                             $('#addresslons').val('');
                             document.getElementById('search_btns').disabled = true;
                            
                         }
                     });
                 } else {
                     $('#addresslats').val('');
                     $('#addresslons').val('');
                     document.getElementById('search_btns').disabled = true;
                 }
             }, 500);

         }

         function checkerror() {

             $('#error_msg_show').hide('slow');
         }

         function checkerror_sm() {
             $('#error_msg_show_sm').hide('slow');
         }

         function shoemodeldate(id) {
             event.preventDefault();
             $('#orderdetail_modal').appendTo('body').modal('show');
             $('#select_engrid').val(id);
         }

         
         // pagination with js 

         function createPagination(totalPages, page, element) {
           

           showEngineer(allengr_array, page);

           let liTag = '';
           let active;
           let beforePage = page > 1 ? page - 1 : 1;
           let afterPage = page > 1 ? page + 1 : 1;
           console.warn('tlpage:' + totalPages);


           if (page > 1) { //show the next button if the page value is greater than 1
               liTag +=
                   `<li class="btn prev" onclick="createPagination(totalPages, ${page - 1},element_pagination)"><span><i class="fas fa-angle-left"></i> Prev</span></li>`;
            

           }

           if (page > 2) { //if page value is less than 2 then add 1 after the previous button
              if(page == 3 && totalPages == 4){

              }else{
                  liTag +=
                   `<li class="first numb" onclick="createPagination(totalPages, 1,element_pagination)"><span>1</span></li>`;

              } 
             
               if (page > 3) { //if page value is greater than 3 then add this (...) after the first li or page
                   liTag += `<li class="dots"><span>...</span></li>`;
                 
               }
           }

           // how many pages or li show before the current li
           if (page == totalPages) {
               // beforePage = beforePage - 2;
           } else if (page == totalPages - 1) {
               beforePage = beforePage - 1;

           }
           // how many pages or li show after the current li
           if (page == 1) {
               afterPage = afterPage + 2;
           } else if (page == 3) {
               afterPage = afterPage + 1;
           }
           console.warn('before[age no]:' + beforePage);
           console.warn('afterpage[age no]:' + afterPage);
           for (var plength = beforePage; plength <= afterPage; plength++) {
               if (plength > totalPages) { //if plength is greater than totalPage length then continue
                 
                   continue;

               }
               if (plength == 0) { //if plength is 0 than add +1 in plength value

                   plength = plength + 1;
               }
               if (page == plength) { //if page is equal to plength than assign active string in the active variable

                   active = "active";

               } else { //else leave empty to the active variable
                   active = "";
               }
               if (totalPages == 1) {
                  
                   liTag += `<li class="numb ${active}" ><span>${plength}</span></li>`;
               } else {
                  
                   liTag +=
                       `<li class="numb ${active}" onclick="createPagination(totalPages, ${plength},element_pagination)"><span>${plength}</span></li>`;
               }

           }

           if (page < totalPages - 1) { //if page value is less than totalPage value by -1 then show the last li or page
             
              if (page < totalPages -
                   2) { //if page value is less than totalPage value by -2 then add this (...) before the last li or page
                  
                   liTag += `<li class="dots"><span>...</span></li>`;
               }
              if((page == 1 && totalPages == 3) || (page == 3 && totalPages == 4) || (page == 3 && totalPages == 5)){

              }else{
                  liTag +=
                   `<li class="last numb" onclick="createPagination(totalPages, ${totalPages},element_pagination)"><span>${totalPages}</span></li>`;

              }

             
             
           }

           if (page < totalPages) { //show the next button if the page value is less than totalPage(20)
             
               liTag +=
                   `<li class="btn next" onclick="createPagination(totalPages, ${page + 1},element_pagination)"><span>Next <i class="fas fa-angle-right"></i></span></li>`;
           }

           element.innerHTML = liTag; //add li tag inside ul tag
         
           return liTag; //reurn the li tag
       }
       // pagination with js

         function showEngineer(v, page) {
           
             var perpageshow = 5;
             var last_index_page = 4;
             if (page == 1) {
                 var startindex = 0;
                 var endindex = last_index_page;
             } else {
                 let calnopre = page - 1;
                 let calno = page * perpageshow;
                 var startindex = 0 + (calnopre * perpageshow);
                 var endindex = last_index_page + (calno - 1);

             }
          
             $('#all_engr_show').html('');
             for (let k = startindex; k <= endindex; k++) {
                 if (v.length == k) {
                     break;
                 }
              

                 if (v[k].signupoption == 1) {
                     var image = v[k].pic;
                 } else {
                     var image = `{{ asset('engrphoto/${v[k].pic}') }}`;

                 }
                 $('#all_engr_show').append(`<div class="card">

      <div class="doctor-widget searchcard">
<div class="doc-info-left">
<div class="doctor-img">
   {{-- <a href="doctor-profile.html"> --}}
      
       <img src="${image }"  alt="Engr Image" style="width: 100%;height: 100px;" >
   {{-- </a> --}}
</div>
<div class="doc-info-cont">
   <h4 class="doc-name"><a href="javascript:void(0)">${v[k].fname }</a></h4>
   <p class="doc-speciality">${v[k].categoryname}</p>
   <div id="specilizationfield">
       <h5 class="doc-department" style="text-align: left"><img src="{{ asset('newpanel/assets/img/specialities/specialities-05.png') }}"  alt="Speciality">AUTO CAD</h5>
   </div>
   <div id="client_engr_chat_box">
       <h5 class="doc-department" style="text-align: left;"><a href="javascript:void(0)" style="font-size: 14px;color: #757575;" ><i class="far fa-comment"></i> Chat</a></h5>
   </div>
   {{-- <div class="rating">
       <i class="fas fa-star filled"></i>
       <i class="fas fa-star filled"></i>
       <i class="fas fa-star filled"></i>
       <i class="fas fa-star filled"></i>
       <i class="fas fa-star"></i>
       <span class="d-inline-block average-rating">(17)</span>
   </div> --}}
   <div class="clinic-details">
       <p class="doc-location"><i class="fas fa-map-marker-alt"></i> ${v[k].city+' '+v[k].state+', '+v[k].country}</p>
       {{-- <ul class="clinic-gallery">
           <li>
               <a href="{{ asset('newpanel/assets/img/features/feature-01.jpg') }}" data-fancybox="gallery">
                   <img src="{{ asset('newpanel/assets/img/features/feature-01.jpg') }}" alt="Feature">
               </a>
           </li>
           <li>
               <a href="{{ asset('newpanel/assets/img/features/feature-02.jpg') }}" data-fancybox="gallery">
                   <img  src="{{ asset('newpanel/assets/img/features/feature-02.jpg') }}" alt="Feature">
               </a>
           </li>
           <li>
               <a href="{{ asset('newpanel/assets/img/features/feature-03.jpg') }}" data-fancybox="gallery">
                   <img src="{{ asset('newpanel/assets/img/features/feature-03.jpg') }}" alt="Feature">
               </a>
           </li>
           <li>
               <a href="{{ asset('newpanel/assets/img/features/feature-04.jpg') }}" data-fancybox="gallery">
                   <img src="{{ asset('newpanel/assets/img/features/feature-04.jpg') }}" alt="Feature">
               </a>
           </li>
       </ul> --}}
   </div>
   {{-- <div class="clinic-services">
       <span>3D Graph</span>
       <span>Artitect</span>
   </div> --}}
   <div id="showhideactionbtn" class="mt-3">
       <div class="clinic-booking">
           <form method="post">
               @csrf
               <input type="text" name="userid" value="${v[k].id}" hidden>
               <input type="text" name="bookingid" value="${v[k].id}" hidden>
             
               <button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('viewprofileeng') }}"><i class="fa fa-eye" aria-hidden="true"></i>Profile</button>
               <button class="btn-info p-0 px-2 btn w-45" type="submit" onclick="shoemodeldate(${v.id})" ><i class="fa fa-check" aria-hidden="true"></i>Book</button>
           </form>
       </div>
   </div>
   
</div>
</div>
<div class="doc-info-right">
<div class="clini-infos">
   <ul>
       <li><i class="far fa-thumbs-up"></i> 98%</li>
       <li><a href="javascript:void(0)" ><i class="far fa-comment"></i> Chat</a></li>
       {{-- <li><i class="fas fa-map-marker-alt"></i> Florida, USA</li> --}}
       {{-- <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li> --}}
   </ul>
</div>
<div class="clinic-booking">
   <form method="post">
       @csrf
       <input type="text" name="userid" value="${v[k].id}" hidden>
       <input type="text" name="bookingid" value="${v[k].id}" hidden>
      
       <button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('viewprofileeng') }}"><i class="fa fa-eye" aria-hidden="true"></i>Profile</button>
       <button class="btn-info p-0 px-2 btn w-45" type="submit" onclick="shoemodeldate(${v[k].id})" ><i class="fa fa-check" aria-hidden="true"></i>Book</button>
   </form>
   {{-- <a class="apt-btn" href="{{ route('booking',['id'=>$engr->id]) }}"><i class="fa fa-check" aria-hidden="true"></i>Book</a> --}}
</div>
</div>
</div>

</div>`);
             }

         }
     </script>
     <script
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDefv55aRSdLiSHe-SgrGrrjp3QWlQspt4&callback=initMap&v=weekly&channel=2&libraries=geometry,places"
         async></script>
 @endpush
