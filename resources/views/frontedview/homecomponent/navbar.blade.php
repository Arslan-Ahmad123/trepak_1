<header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('homeview/assets/img/logo/logo.png') }}" alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li>
                                                <div style="position: relative">
                                                    <i  style="position: absolute; right:9px;top:12px;color:#555" class="fa fa-list-alt" aria-hidden="true" ></i>
                                                    <input type="text" placeholder="@if(Auth::check()) @if(Auth::user()->role =='user'){{ $engcategory }}  @endif @else  {{ 'Please Select Type' }} @endif" style="padding: 7px ;border:none;border-radius:10px;width:100%;background-color: rgb(243, 236, 236)" class="my-1">
                                                </div>

                                            </li>
                                             <li>
                                                <div style="position: relative">
                                                    <i  style="position: absolute; right:5px;top:9px;color:#555" class="fa fa-map-marker" aria-hidden="true" ></i>
                                                    <input type="text"   placeholder="@if(Auth::check()) @if(Auth::user()->role =='user'){{ $cityname }}  @endif @else  {{ 'Please Select city' }} @endif" style="padding: 7px ;border:none;border-radius:10px;width:100% ;background-color: rgb(243, 236, 236)" class="my-1" >
                                                </div>

                                            </li>
                                            {{-- <li> --}}
                                                {{-- <div> --}}
                                                    {{-- <i class="fa-solid fa-angle-down" style="position:absolute;"></i> --}}
                                                    {{-- <a href="index.html" style="position: relative">
                                                        <i class="fa-solid fa-angle-down" style="position:absolute;top:37px;right: -3px;"></i>
                                                        Engineer
                                                    </a>
                                                </div>
                                            
                                            </li> --}}
                                            <li><a href="about.html">About US</a></li>
                                            @usercheck
                                            <li>
                                                <form action="{{ route('userlogout') }}" method="post">
                                                    @csrf
                                                    <input type="text" hidden value="{{ $cityname }}">
                                                    <input type="text" hidden value="{{ $engcategory }}">
                                                    <button type="submit" class="form-control"><i class="fa fa-sign-in mx-1" aria-hidden="true" ></i>Logout</button>
                                                </form>
                                               
                                            </li>
                                            @endusercheck
                                            
                                                
                                            @usernot
                                            <li>
                                                <form action="{{ route('user_register') }}" method="post">
                                                    @csrf
                                                    <input type="text" name="city_name"  value="{{ $cityname }}" hidden">
                                                    <input type="text" name="eng_type"  value="{{ $engcategory }}">
                                                    <button type="submit" class="form-control"><i class="fa fa-sign-in mx-1" aria-hidden="true" ></i>Register</button>
                                                </form>
                                            <li>
                                            @endusernot
                                            {{-- <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="job_details.html">job Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li> --}}
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                               
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>