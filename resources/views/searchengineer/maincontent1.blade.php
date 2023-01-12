 <style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

     /* .pagination ul {

         display: flex;
         flex-wrap: wrap;
         background: #fff;
         margin: 0px auto;
         padding: 8px;
         border-radius: 50px;
         box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
     } */

     /* .pagination ul li {
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
     } */

     .alink {
         display: inline-block;
         text-align: center;
         cursor: pointer;
     }

     .pac-container {
         margin-top: -90px;
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
         height: 400px;
         overflow-y: auto;
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
         padding: 4px;
         margin-bottom: 0px;
         margin-top: 0px;
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

         /* .pagination ul {
             width:100%;
         } */
         .pagination ul li.numb {
             list-style: none;
             height: 45px;
             width: 35px;
             margin: 0 2px;
             line-height: 45px;
             border-radius: 50%;
         }

         .pagination ul li.dots {
             font-size: 17px;

         }

         .pagination ul li.next {
             font-size: 15px;
             padding: 0 7px;
             border-radius: 50px;

         }

         .pagination ul li.prev {
             font-size: 15px;
             padding: 0 7px;
             border-radius: 50px;

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

     @media screen and (max-width:430px) {
         .pagination ul li.numb {
             list-style: none;
             font-size: 12px;
             height: 45px;
             width: 30px;
             margin: 0 2px;
             line-height: 45px;
             border-radius: 45%;
         }

         .pagination ul li.dots {
             font-size: 13px;

         }

         .pagination ul li.next {
             font-size: 13px;
             padding: 0 7px;
             border-radius: 35px;

         }

         .pagination ul li.prev {
             font-size: 13px;
             padding: 0 7px;
             border-radius: 35px;

         }


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
                 <h4 class="breadcrumb-title">{{ count($engrs) }} matches found for : {{ $category->engrcategory }} In
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
 <!-- Page Content -->
 <div class="content">
     <div class="container-fluid">

         <div class="row">
             <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                 <!-- Search Filter -->
                 <!-- Search Filter -->
                 <div class="card search-filter" id="filter_start">
                     <div class="card-header">
                         <h4 class="card-title mb-0">Search Filter</h4>
                     </div>
                     <div class="card-body">
                         {{-- <form action="{{ route('searchbarengineer') }}" name="myform1" id="myform1" method="post"> --}}
                         <form action="{{ route('filterengineer1',$category->id) }}" name="myform1" id="myform1" method="get">
                                {{csrf_field()}}
                             {{-- <div class="slidecontainer">
                                 Price Range
                                 <input type="range" min="500" max="5000" value="500" step="500"
                                     class="slider" id="myRange">
                                 <p>Value: <span id="demo"></span></p>
                             </div> --}}

                             
                             {{-- <div class="filter-widget">
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
                     </div> --}}
                     {{-- <div class="filter-widget">
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
                             </div> --}}
                     <div class="filter-widget">
                         <div class="form-group">
                             Select Rating
                             <div class="star-rating">
                                 <input id="star-5" type="radio" name="rating" value="5">
                                 <label for="star-5" title="5 stars">
                                     <i class="active fa fa-star"></i>
                                 </label>
                                 <input id="star-4" type="radio" name="rating" value="4">
                                 <label for="star-4" title="4 stars">
                                     <i class="active fa fa-star"></i>
                                 </label>
                                 <input id="star-3" type="radio" name="rating" value="3">
                                 <label for="star-3" title="3 stars">
                                     <i class="active fa fa-star"></i>
                                 </label>
                                 <input id="star-2" type="radio" name="rating" value="2">
                                 <label for="star-2" title="2 stars">
                                     <i class="active fa fa-star"></i>
                                 </label>
                                 <input id="star-1" type="radio" name="rating" value="1">
                                 <label for="star-1" title="1 star">
                                     <i class="active fa fa-star"></i>
                                 </label>
                             </div>
                         </div>
                     </div>
                     <div class="filter-widget">
                         <div class="form-group">
                             Select Review
                             <select class="form-control" name="review" id="review">
                                 <option value="0">Select Review</option>
                                 <option value="1">Most Reviews</option>
                             </select>
                         </div>
                     </div>
                     <div class="filter-widget">
                         <div class="form-group">
                             Select Experience
                             <select class="form-control" name="experience" id="experience">
                                 <option value="0">Select Experience</option>
                                 <option value="1">Most Experience</option>
                             </select>
                         </div>
                     </div>
                     <input type="hidden" name="cat_id1" id="cat_id1" value="{{$category->id}}">
                     <div class="btn-search">
                         <button type="submit" id="search_btn" class="btn btn-block">Search</button>
                     </div>
                     </form>
                 </div>

             </div>
             <!-- /Search Filter -->
             <!-- /Search Filter -->

             <!-- Search show Filter -->
             <div class="p-2 mb-3" id="filter_eng" style="cursor:pointer">Filter<i class="fa fa-angle-down filtericon_cpro" aria-hidden="true"></i></div>

             <!-- /Search Filter -->

         </div>

         <div class="col-md-12 col-lg-8 col-xl-9">
             <div class="row">
                 <div class="col-md-12" id="all_engr_show">
                    @if(count($engrs)>0)
                    @foreach($engrs as $engr)
                    @if(!empty($engr))
                     <div class="card">
                         <div class="doctor-widget searchcard">
                             <div class="doc-info-left">
                                 <div class="doctor-img" style="position:relative">
                                     <a href="doctor-profile.html">
                                         <i id="showonline_status_{{$engr->id??$engr['id']}}" class="fa fa-circle showonline_status" style="font-size:12px;color:{{$engr->onlinestatus}};position:absolute;right:-3px;top:-3px"></i>
                                         <img src="{{$engr->signupoption?$engr->pic:asset('engrphoto/'.$engr->pic)}}" alt="Engr Image" style="width: 100%;height: 100px;">

                                     </a>
                                 </div>
                                 <div class="doc-info-cont">
                                     <h4 class="doc-name"><a href="javascript:void(0)">{{$engr->fname}}</a></h4>
                                     <p class="doc-speciality">{{$category->categoryname}}</p>
                                     <div id="specilizationfield">
                                         <h5 class="doc-department" style="text-align: left"><img src="{{ asset('newpanel/assets/img/specialities/specialities-05.png') }}" alt="Speciality">AUTO CAD</h5>
                                     </div>
                                     <div id="client_engr_chat_box">
                                         <h5 class="doc-department" style="text-align: left;"><a href="javascript:void(0)" onclick="clientchat_box(${v[k].id},{{ Auth::user()->id }},'${v[k].fname}','${image}','${v[k].onlinestatus}')" style="font-size: 14px;color: #757575;"><i class="far fa-comment"></i> Chat</a></h5>
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
                                         <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$engr->city.' '.$engr->state.', '.$engr->country}}</p>
                                         {{-- <ul class="clinic-gallery">
                                                <li>
                                                    <a href="{{ asset('newpanel/assets/img/features/feature-01.jpg') }}" data-fancybox="gallery">
                                         <img src="{{ asset('newpanel/assets/img/features/feature-01.jpg') }}" alt="Feature">
                                         </a>
                                         </li>
                                         <li>
                                             <a href="{{ asset('newpanel/assets/img/features/feature-02.jpg') }}" data-fancybox="gallery">
                                                 <img src="{{ asset('newpanel/assets/img/features/feature-02.jpg') }}" alt="Feature">
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
                                     <div class="clinic-services">
                                         <span>3D Graph</span>
                                         <span>Artitect</span>
                                     </div>
                                     <div id="showhideactionbtn" class="mt-3">
                                         <div class="clinic-booking" translate="no">
                                             <form method="post">
                                                 @csrf
                                                 <input type="text" name="userid" value="{{$engr->id}}" hidden>
                                                 <input type="text" name="bookingid" value="{{$engr->id}}" hidden>

                                                 <button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('viewprofileeng') }}"><i class="fa fa-eye" aria-hidden="true"></i>Profile</button>
                                                 <button class="btn-info p-0 px-2 btn w-45" type="submit" onclick="shoemodeldate(${v.id})"><i class="fa fa-check" aria-hidden="true"></i>Book</button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="doc-info-right">
                                 <div class="clini-infos">
                                     <ul>
                                         <li><i class="far fa-thumbs-up"></i> 98%</li>
                                         <li><a href="{{ route('viewprofileeng') }}" onclick="clientchat_box(${v[k].id},{{ Auth::user()->id }},'${v[k].fname}','${image}','${v[k].onlinestatus}')"><i class="far fa-comment"></i> Chat</a></li>
                                         {{-- <li><i class="fas fa-map-marker-alt"></i> Florida, USA</li> --}}
                                         {{-- <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li> --}}
                                     </ul>
                                 </div>
                                 <div class="clinic-booking">
                                     <form method="post" translate="no">
                                         @csrf
                                         <input type="text" name="userid" value="${v[k].id}" hidden>
                                         <input type="text" name="bookingid" value="${v[k].id}" hidden>

                                         <button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('viewprofileeng') }}"><i class="fa fa-eye" aria-hidden="true"></i>Profile</button>
                                         <button class="btn-info p-0 px-2 btn w-45" type="submit" onclick="shoemodeldate(${v[k].id})"><i class="fa fa-check" aria-hidden="true"></i>Book</button>
                                     </form>
                                     {{-- <a class="apt-btn" href="{{ route('booking',['id'=>$engr->id]) }}"><i class="fa fa-check" aria-hidden="true"></i>Book</a> --}}
                                 </div>
                             </div>
                         </div>
                     </div>
                     @endif
                     @endforeach
                     @else
                     No Record Found
                     @endif



                 </div>
                 <div class="col-md-3 mx-auto">
                @if($engrs instanceof \Illuminate\Pagination\LengthAwarePaginator )
                    {{$engrs->links('vendor.pagination.custom-pagination1')}}
                @endif
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

                 {{-- <div id="mapid" style="width: 100%; height: 400px;" class="mb-3"></div> --}}

                 {{-- <div id=""></div> --}}
                 <input type="text" id="lat_cur" hidden>
                 <input type="text" id="lon_cur" hidden>

             </div>



         </div>
     </div>
 </section>
 <!-- /Page Content -->

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
                         <input class="form-control" type="date" name="engr_date" id="selectdateorder" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
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
 {{-- ==========================chat box ========================	 --}}
 <div class="container customchatbox" style="display:none">
     <div class="chat_box">
         <div class="head">
             <div class="user">
                 <div class="avatar" style="position: relative">
                     <img id="picofreciver" />
                     <i class="fa fa-circle showonline_status_engr" style="font-size:12px;position:absolute;right:3px;top:0px"></i>
                 </div>
                 <div class="name" id="nameofreciver">
                     <span id="name_engineer"></span>


                 </div>
             </div>
             <ul class="bar_tool">
                 <li><span class="alink"><a href="javascript:void(0)" onclick="closeclientchatbox()"><i class="fa fa-times" aria-hidden="true"></i></a></span></li>
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
                 <input type="text" name="message" id="message" class="msg" placeholder="Type a message..." />
                 <input type="hidden" name="senderid" id="senderid" value="{{ Auth::check() ? Auth::user()->id : '' }}" />
                 <input type="hidden" name="reciverid" id="reciverid" />
                 <input type="hidden" name="_token" id="token_res" value={{ csrf_token() }}>
                 <button id="submitmsg" style="position: absolute;right:2%;"><i class="fas fa-paper-plane"></i></button>
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
 <!-- /Page Content -->

 <!-- Footer -->

 @push('childscript')
 <script src="{{ asset('js/app.js') }}"></script>
 {{-- <script
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDefv55aRSdLiSHe-SgrGrrjp3QWlQspt4&callback=initMap&v=weekly&channel=2&libraries=places,geometry"
         async></script> --}}
 <script>

 </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDefv55aRSdLiSHe-SgrGrrjp3QWlQspt4&callback=initMap&v=weekly&channel=2&libraries=geometry,places" async></script>
 @endpush