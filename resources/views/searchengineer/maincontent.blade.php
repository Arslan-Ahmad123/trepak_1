 <style>
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

         .customchatbox {
             width: 315px;
             height: 70vh;
         }
     }

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

                         <div class="filter-widget">

                             <input type="text" class="form-control " placeholder="Select City">

                         </div>
                         <div class="slidecontainer">
                             <h4>Price Range</h4>
                             <input type="range" min="500" max="5000" value="500" step="500"
                                 class="slider" id="myRange">
                             <p>Value: <span id="demo"></span></p>
                         </div>
                         <div class="filter-widget">
                             <h4>Select Specialist</h4>
                             <select id="engrcategory" class="form-control">
                                 @php
                                     $res = getallcategory();
                                 @endphp
                                 @foreach ($res as $res)
                                     <option value="{{ $res->id }}"
                                         {{ $res->id == $category_id ? 'selected' : '' }}>
                                         {{ $res->engrcategory }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="btn-search">
                             <button type="button" class="btn btn-block">Search</button>
                         </div>
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

                         <div class="filter-widget">

                             <input type="text" class="form-control " placeholder="Select City">

                         </div>
                         <div class="slidecontainer">
                             <h4>Price Range</h4>
                             <input type="range" min="500" max="5000" value="500" step="500"
                                 class="slider" id="myRange">
                             <p>Value: <span id="demo"></span></p>
                         </div>
                         <div class="filter-widget">
                             <h4>Select Specialist</h4>
                             <select id="engrcategory" class="form-control">
                                 @php
                                     $res = getallcategory();
                                 @endphp
                                 @foreach ($res as $res)
                                     <option value="{{ $res->id }}"
                                         {{ $res->id == $category_id ? 'selected' : '' }}>
                                         {{ $res->engrcategory }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="btn-search">
                             <button type="button" class="btn btn-block">Search</button>
                         </div>
                     </div>
                 </div>
                 <!-- /Search Filter -->

             </div>

             <div class="col-md-12 col-lg-8 col-xl-9" id="all_engr_show">

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
                     <img src="{{ Auth::check() ? asset('engrphoto/' . Auth::user()->pic) : '' }}" id="picofreciver" />
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
    if(session()->has('search_id')){
        session()->forget('search_id');
        session()->forget('routename');
    }
@endphp
 {{-- ==========================chat box ========================	 --}}
 <!-- /Page Content -->

 <!-- Footer -->

 @push('childscript')
 
     <script src="{{ asset('js/app.js') }}"></script>
     <script>
                //  ============function for show map and clients=================
               
        //  ============function for show map and clients=================
         $(document).ready(function() {
             
             fetch('{{ route("returnsession") }}').then((res) => {
                 return res.json()
             }).then((res) => {
                
                 var output = "";
                   $('#all_engr_show').html('');
                 $.each(res, function(i, v) {
                     if (v.signupoption == 1) {
                         var image = v.pic;
                     } else {
                         var image = "{{ asset('engrphoto/') }}" + v.pic;
                     }
                     $('#all_engr_show').append(`<div class="card">
    
    <div class="doctor-widget searchcard">
        <div class="doc-info-left">
            <div class="doctor-img">
                {{-- <a href="doctor-profile.html"> --}}
                   
                    <img src="${v.imagepath }"  alt="Engr Image" style="width: 100%;height: 100px;" >
                {{-- </a> --}}
            </div>
            <div class="doc-info-cont">
                <h4 class="doc-name"><a href="javascript:void(0)">${v.fname }</a></h4>
                <p class="doc-speciality">${v.categoryname}</p>
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
                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> ${v.address}</p>
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
                            <input type="text" name="userid" value="${v.id}" hidden>
                            <input type="text" name="bookingid" value="${v.id}" hidden>
                            <button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('viewprofileeng') }}"><i class="fa fa-eye" aria-hidden="true"></i>Profile</button>
                            <button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('booking') }}"><i class="fa fa-check" aria-hidden="true"></i>Booked</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="doc-info-right">
            <div class="clini-infos">
                <ul>
                    <li><i class="far fa-thumbs-up"></i> 98%</li>
                    <li><a href="javascript:void(0)"><i class="far fa-comment"></i> Chat</a></li>
                    {{-- <li><i class="fas fa-map-marker-alt"></i> Florida, USA</li> --}}
                    {{-- <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li> --}}
                </ul>
            </div>
            <div class="clinic-booking">
                <form method="post">
                    @csrf
                    <input type="text" name="userid" value="${v.id}" hidden>
                    <input type="text" name="bookingid" value="${v.id}" hidden>
                    <button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('viewprofileeng') }}"><i class="fa fa-eye" aria-hidden="true"></i>Profile</button>
                    <button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('booking') }}"><i class="fa fa-check" aria-hidden="true"></i>Booked</button>
                </form>
                {{-- <a class="apt-btn" href="{{ route('booking',['id'=>$engr->id]) }}"><i class="fa fa-check" aria-hidden="true"></i>Booked</a> --}}
            </div>
        </div>
    </div>

</div>`);

                 })
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
             console.log("Arfan");
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
                     console.log(data);
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
            try{
                make_cord(make_map);
            }catch(e){
                console.log(e);
            }
        }
         function make_cord(callback) {
            const success = (position) => {
                $('#lat_cur').val(position.coords.latitude);
                $('#lon_cur').val(position.coords.longitude);
                callback();
                console.log('1st');
            }
            const error = () => {
                console.log("error");
                callback();
            }

            navigator.geolocation.getCurrentPosition(success, error);
            navigator.permissions.query({
                name: 'geolocation'
            }).then(function(result) {
                console.log(result);
                if (result.state == 'denied' || result.state == 'gratned') {
                    alert(result.state);
                }
            });
            // setTimeout(()=>{

            // },1000)

        }

        function make_map() {
            var allengr = [];
            $.ajax({
                url: '{{ route("returnsession") }}',
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
           
            var latitude_cur = $('#lat_cur').val() != "" ? parseFloat($('#lat_cur').val()) : 32.1877;
            var longitude_cur = $('#lon_cur').val() != "" ? parseFloat($('#lon_cur').val()) : 74.1945;

          
            map = new google.maps.Map(document.getElementById("mapid"), {
                center: {
                    lat: latitude_cur,
                    lng: longitude_cur,
                },
               
                zoom: 8,
            });
          
           
            console.log('before load map '+ latitude_cur +'  ' +longitude_cur);
            const shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: "poly",
            };
            var checkuserlogin = {{ Auth::user() ? '1' : '0' }};
            console.warn(checkuserlogin);
            if (checkuserlogin == 1 || $('#lat_cur').val() != "") {
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


                $.each(allengr, function(i, m) {
                    //  var latLngA = {'lat':32.1877,'lng':74.1945};
                    //  var latLngB = {'lat':m.lan,'lng':m.lng};
                    var latitude1 = latitude_cur;
                    var longitude1 = longitude_cur;
                    var latitude2 = m.latitude / 1000000;
                    var longitude2 = m.longitude / 1000000;
                    new google.maps.Marker({
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
                    var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(
                        latitude1, longitude1), new google.maps.LatLng(latitude2, longitude2));
                    var distance_km = distance / 1000;

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
                        // console.log(m.category.engrcategory);
                        const message =
                            `<form action='{{ route('proceed') }}' method='post'> @csrf <div><h6>Engineer Name:<br> ${m.fname}</h6><h6>Engineer Type:<br> ${m.categoryname}</h6>Date: <br>  <input class="form-control" type='date' name="engr_date" value='{{ date('Y-m-d') }}' min='{{ date('Y-m-d') }}'><br><br><input type="hidden" name="engr_id" value='${m.id}'><button class='btn w-100 btn-primary p-0'>Booked</button></div><form>`;

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
                        google.maps.event.addListener(marker_s, 'click', function() {
                            infowindow.open({
                                anchor: marker_s,
                                map,
                                shouldFocus: false,
                            });
                        });
                    }
                });
            } else {
                $.each(allengr, function(i, m) {
                    //  var latLngA = {'lat':32.1877,'lng':74.1945};
                    //  var latLngB = {'lat':m.lan,'lng':m.lng};

                    var latitude2 = m.latitude / 1000000;
                    var longitude2 = m.longitude / 1000000;

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
                                <button class='btn w-100 btn-primary p-0'>Booked</button>
                                </div>
                                <form>`;

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
                    google.maps.event.addListener(marker_s, 'click', function() {
                        infowindow.open({
                            anchor: marker_s,
                            map,
                            shouldFocus: false,
                        });
                    });

                });
            }
        }
       
     </script>
      <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDefv55aRSdLiSHe-SgrGrrjp3QWlQspt4&callback=initMap&v=weekly&channel=2&libraries=geometry"
      async></script>
 @endpush
