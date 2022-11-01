<!-- Header -->
<style>
    .signin-btn-block {
    position: relative;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: 40px;
    margin-top: 0;
    padding-top: 1px;
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    border-style: none solid solid;
    border-width: 1px;
    border-color: rgb(75, 74, 74);
    -webkit-transform: translate(0,0);
    -ms-transform: translate(0,0);
    transform: translate(0,0);
    line-height: 1; 
}

a {
    background-color: transparent;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.div-block-162 {
    width: 1px;
    height: 22px;
    margin-top: 0;
    background-image: -webkit-gradient(linear,left top,left bottom,from(#000),to(#000));
    background-image: linear-gradient(180deg,#000,#000);
}
.link-42 {
    padding: 5px 25px;
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    -webkit-transition: background-color .2s;
    transition: background-color .2s;
    color: black;
    font-size: 16px;
    line-height: 1;
    font-weight: 500;
    text-decoration: none;
}
.text-block-161 {
    left: 145px;
    top: -5px;
    display: block;
    -webkit-box-flex: 0;
    -webkit-flex: 0 auto;
    -ms-flex: 0 auto;
    flex: 0 auto;
    letter-spacing: 1px;
    text-transform: uppercase;
}
.text-block-160 {
    position: absolute;
    left: 148px;
    top: -5px;
    right: auto;
    bottom: auto;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    color: black;
    font-size: 12px;
    line-height: 1;
    font-weight: 500;
}
.div-block-157 {
    position: absolute;
    left: 0;
    top: 0;
    right: auto;
    bottom: auto;
    width: 139px;
    height: 1px;
    background-image: -webkit-gradient(linear,left top,left bottom,from(#000),to(#000));
    background-image: linear-gradient(180deg,#000,#000);
}
.div-block-160 {
    position: absolute;
    left: auto;
    top: 0;
    right: 0;
    bottom: auto;
    width: 122px;
    height: 1px;
    background-image: -webkit-gradient(linear,left top,left bottom,from(#000),to(#000));
    background-image: linear-gradient(180deg,#000,#000);
}
.header-btns-2 {
	display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
}
.link-44 {
	
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: 39px;
    margin-left: 10px;
    padding-left: 10px;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    border-left: 1px solid rgb(82, 79, 79);
    color: #000;
    font-size: 16px;
    font-weight: 500;
    text-decoration: none;
}
@media only screen and (max-width: 991.98px) {
    .header-btns-2{
        display: none;
    }
}
</style>			
<nav class="navbar navbar-expand-lg fixed-top header-nav">
	<div class="navbar-header">
		<a id="mobile_btn" href="javascript:void(0);">
			<span class="bar-icon">
				<span></span>
				<span></span>
				<span></span>
			</span>
		</a>
		<a href="{{ route('indexpage') }}" class="navbar-brand logo">
			<img src="{{ asset('newpanel/assets/img/logo.png') }}" class="navbrand_logo" alt="Logo" >
		</a>
	</div>
	<div class="main-menu-wrapper">
		<div class="menu-header">
			<a href="index-2.html" class="menu-logo">
				<img src="{{ asset('newpanel/assets/img/logo.png') }}" class="img-fluid" alt="Logo">
			</a>
			<a id="menu_close" class="menu-close" href="javascript:void(0);">
				<i class="fas fa-times"></i>
			</a>
		</div>
		<ul class="main-nav" >
			@if(Auth::check())
			@if(Auth::user()->role == 'user')
			<li>
				<a href="{{ Route('home') }}">Home</a>
			</li>
			@endif
			@else
			<li>
				<a href="{{ Route('home') }}">Home</a>
			</li>
			@endif

			@if(Auth::check())
			@if(Auth::user()->role == 'enge')
			<li class="has-submenu" id="engrnabfirst">
				<a href="#">Engineers <i class="fas fa-chevron-down"></i></a>
				<ul class="submenu">
					<li><a href="{{ route('newengineerpanel') }}">Engineer Dashboard</a></li>
					<li><a href="{{ route('engappointment') }}">Appointments</a></li>
					{{-- <li><a href="{{ route('engschedule') }}">Schedule Timing</a></li> --}}
					<li><a href="{{ route('engclient') }}">Clients List</a></li>
					<li><a href="{{ route('engclientprofile') }}">Clients Profile</a></li>
					{{-- <li><a href="chat-doctor.html">Chat</a></li> --}}
					<li><a href="{{ route('enginvoice') }}">Invoices</a></li>
					<li><a href="{{ route('engprofilesetting') }}">Profile Settings</a></li>
					<li><a href="{{ route('engreviews') }}">Reviews</a></li>
					@if(Auth::check())
					@if(Auth::user()->role == 'enge')
					<li>
						<form action="{{ route('engineerlogout') }}" method="post">
							@csrf
							<button class="btn  form-control my-1 " style="border:none;text-align:left;font-size:13px;border-top: 0.5px solid #ebe6e6;" onmouseover="fntonm(this)" onmouseout="fntoutm(this)">Logout</button>
							{{-- <input type="submit" value="Engineer Logout"  style="border:none;background-color:none;margin-left:10px" /> --}}
							
						</form>
					</li>
					@endif
					@else
					<li><a href="{{ route('engregister') }}">Engineer Register</a></li>
					<li><a href="{{ route('engrlogin') }}">Engineer Login</a></li>
					@endif
				</ul>
			</li>
			<li class="has-submenu" id="engrnab">
				<a href="#">Engineers <i class="fas fa-chevron-down" onclick="showbtn('engrbtn')"></i></a>
				<ul class="submenu" id="engrbtn">
					<li><a href="{{ route('newengineerpanel') }}">Engineer Dashboard</a></li>
					<li><a href="{{ route('engappointment') }}">Appointments</a></li>
					{{-- <li><a href="{{ route('engschedule') }}">Schedule Timing</a></li> --}}
					<li><a href="{{ route('engclient') }}">Clients List</a></li>
					<li><a href="{{ route('engclientprofile') }}">Clients Profile</a></li>
					{{-- <li><a href="chat-doctor.html">Chat</a></li> --}}
					<li><a href="{{ route('enginvoice') }}">Invoices</a></li>
					<li><a href="{{ route('engprofilesetting') }}" >Profile Settings</a></li>
					<li><a href="{{ route('engreviews') }}" >Reviews</a></li>
					@if(Auth::check())
					@if(Auth::user()->role == 'enge')
					<li>
						<form action="{{ route('engineerlogout') }}" method="post">
							@csrf
							<button class="btn  form-control  pl-4" style="border:none;font-size:13px;text-align:left;color:white;margin-left:6px;"  >Logout</button>
							{{-- <input type="submit" value="Engineer Logout"  style="border:none;background-color:none;margin-left:10px" /> --}}
						</form>
						<script>
							function fntonm(thisv){
								$(thisv).css({'color':'#09dca4','margin-left':'6px','transition':'all 0.5s ease'})
							}
							function fntoutm(thisv){
								$(thisv).css({'color':'black','margin-left':'0px','transition':'all 0.5s ease'})
							}
						</script>
					</li>
					@endif
					@else
					<li><a href="{{ route('engregister') }}">Engineer Register</a></li>
					<li><a href="{{ route('engrlogin') }}">Engineer Login</a></li>
					@endif
				</ul>
			</li>
			
			@elseif(Auth::user()->role == 'user')	
			<li class="has-submenu " id="clientnabfirst">
				<a href="#">Clients <i class="fas fa-chevron-down"></i></a>
				<ul class="submenu">
					{{-- <li class=""><a href="{{ route('clientsearchengr') }}">Search Engineers</a></li> --}}
					{{-- <li><a href="{{ route('engineerprofile') }}">Engineer Profile</a></li> --}}
					{{-- <li><a href="booking.html">Booking</a></li> --}}
					{{-- <li><a href="checkout.html">Checkout</a></li> --}}
					{{-- <li><a href="{{ route('clientprofile') }}">Booking Success</a></li> --}}
					<li><a href="{{ route('clientprofile') }}">Client Dashboard</a></li>
					{{-- <li><a href="favourites.html">Favourites</a></li> --}}
					{{-- <li><a href="chat.html">Chat</a></li> --}}
					<li><a href="{{ route('clientprofilesetting') }}">Profile Settings</a></li>
					<li><a href="{{ route('clientchangepassword') }}">Change Password</a></li>
				</ul>
			</li>
			<li class="has-submenu " id="clientnab">
				<a href="#">Clients <i class="fas fa-chevron-down" onclick="showbtn('clientbtn')"></i></a>
				<ul class="submenu" id="clientbtn">
					{{-- <li class=""><a href="{{ route('clientsearchengr') }}">Search Engineers</a></li> --}}
					{{-- <li><a href="{{ route('engineerprofile') }}">Engineer Profile</a></li> --}}
					{{-- <li><a href="booking.html">Booking</a></li> --}}
					{{-- <li><a href="checkout.html">Checkout</a></li> --}}
					{{-- <li><a href="{{ route('clientprofile') }}">Booking Success</a></li> --}}
					<li><a href="{{ route('clientprofile') }}">Client Dashboard</a></li>
					{{-- <li><a href="favourites.html">Favourites</a></li> --}}
					{{-- <li><a href="chat.html">Chat</a></li> --}}
					<li><a href="{{ route('clientprofilesetting') }}">Profile Settings</a></li>
					<li><a href="{{ route('clientchangepassword') }}">Change Password</a></li>
				</ul>
			</li>
			@else
			@endif
			@else

			<li class="has-submenu">
				<a href="#">Find Engineering Jobs</a>
			</li>
			<li class="has-submenu">
				<a href="#">About Us</a>
			</li>
			@endif	
			{{-- <li class="has-submenu">
				<a href="#">Pages <i class="fas fa-chevron-down"></i></a>
				<ul class="submenu">
					<li><a href="voice-call.html">Voice Call</a></li>
					<li><a href="video-call.html">Video Call</a></li>
					<li><a href="search.html">Search Doctors</a></li>
					<li><a href="calendar.html">Calendar</a></li>
					<li><a href="components.html">Components</a></li>
					<li class="has-submenu">
						<a href="invoices.html">Invoices</a>
						<ul class="submenu">
							<li><a href="invoices.html">Invoices</a></li>
							<li><a href="invoice-view.html">Invoice View</a></li>
						</ul>
					</li>
					<li><a href="blank-page.html">Starter Page</a></li>
					<li><a href="login.html">Login</a></li>
					<li><a href="register.html">Register</a></li>
					<li><a href="forgot-password.html">Forgot Password</a></li>
				</ul>
			</li> --}}
			{{-- <li>
				<a href="{{ route('newadminportal') }}" >Admin</a>
			</li> --}}
			<li class="has-submenu login-link">
			
				@if(Auth::check())
				<form method="post">
					@csrf
				@if(Auth::user()->role == 'user')
				
				
				<button class="btn   my-1 form-control" formaction="{{ route('userlogout') }}" style="border:none;text-align:initial;font-size:15px;color:white">Logout</button>
				@elseif(Auth::user()->role == 'admin')
				
				<button class="btn   my-1 form-control" formaction="{{ route('adminlogout') }}" style="border:none;text-align:initial;font-size:15px;color:white">Logout</button>
				@elseif(Auth::user()->role == 'enge')
				<button class="btn   my-1 form-control" formaction="{{ route('engineerlogout') }}" style="border:none;text-align:initial;font-size:15px;color:white">Logout</button>
				@else
				<button class="btn   my-1 form-control" formaction="{{ route('logout') }}" style="border:none;text-align:initial;font-size:15px;color:white">Logout</button>
				
				@endif
		   </form>
				@else
				<a href="#">Login / Signup <i class="fas fa-chevron-down" onclick="showbtn('loginbtn')"></i></a>
				<ul class="submenu" id="loginbtn">
					
				<form>
					
				<li><button class="btn  header-login" style="color:white;font-size:14px" formaction="{{ route('login') }}"><span class="ml-2">Sign in</span></button></li>
				<li><button class="btn  header-login" style="color:white;font-size:14px" formaction="{{ route('engregister') }}"><span class="ml-2">Apply for Jobs</span></button></li>
				<li><button class="btn  header-login" style="color:white;font-size:14px" formaction="{{ route('user_regis') }}"><span class="ml-2">Hire an Engineer</span></button></li>
				</form>
				
{{-- 				
					<a href="#">Hire an Engineer</a>
				
					<a href="#">Apply for Jobs</a> --}}
				
			

				{{-- <div class="header-btns-2">
					<div class="div-block-158 div-block-156 div-block-156 div-block-156 div-block-156 div-block-6 div-block-6 div-block-156 div-block-156 signin-btn-block ">
					<a href="#" class="link-42" data-toggle="dropdown">
						Hire an Engineer
					</a>
					<div class="div-block-162"></div>
					<a href="#" class="link-42">Apply for Jobs</a>
					<div class="text-block-160 text-block-161">Signup</div>
					<div class="div-block-157"></div>
					<div class="div-block-160"></div>
					</div>
					<a id="headerLoginBtn" href="#" class="link-44">Log in</a>
					</div> --}}
			
				@endif
				{{-- <a href="#">Login / Signup <i class="fas fa-chevron-down"></i></a>
				<ul class="submenu">
					<li>
						<form 
			@if(Auth::check()) 
			method="post"
			@endif>
				@if(Auth::check())
				@if(Auth::user()->role == 'user')
				
				@csrf
				<li><button class="btn btn-primary header-login" formaction="{{ route('userlogout') }}">LOGOUT</button></li>
				@elseif(Auth::user()->role == 'admin')
				@csrf
				<li><button class="btn btn-primary header-login" formaction="{{ route('adminlogout') }}">LOGOUT</button></li>
				@else
				@csrf
				<li><button class="btn btn-primary header-login" formaction="{{ route('engineerlogout') }}">LOGOUT</button></li>
				@endif
				@else
				
				@endif
			</form>
					</li> --}}
					
				</ul>
			</li>
			{{-- <li class="login-link">
				<a href="login.html">Login / Signup</a>
			</li> --}}
		</ul>
	</div>		 
	<ul class="nav header-navbar-rht">
		{{-- <li class="nav-item contact-item">
			<div class="header-contact-img">
				<i class="far fa-hospital"></i>							
			</div>
			<div class="header-contact-detail">
				<p class="contact-header">Contact</p>
				<p class="contact-info-header"> +1 315 369 5943</p>
			</div>
		</li> --}}
		
			<!-- User Menu -->
			@if(Auth::check())
			<form method="post">
			@if(Auth::user()->role == 'user')
				
				@csrf
				<button class="btn btn-primary header-login" formaction="{{ route('userlogout') }}">LOGOUT</button>
				@elseif(Auth::user()->role == 'admin')
				@csrf
				<button class="btn btn-primary header-login" formaction="{{ route('adminlogout') }}">LOGOUT</button>
				@elseif(Auth::user()->role == 'enge')
				@csrf
				<button class="btn btn-primary header-login" formaction="{{ route('engineerlogout') }}">LOGOUT</button>
				@else
				@csrf
				<button class="btn btn-primary header-login" formaction="{{ route('logout') }}">LOGOUT</button>
				@endif
		   </form>
			@else
			{{-- <li class="nav-item dropdown has-arrow has-submenu">
			<a href="#" class="nav-link dropdown-toggle header-login " data-toggle="dropdown">
				Login / Signup
			</a> --}}
			{{-- <a class="nav-link header-login" href="#">login / Signup </a> --}}
			{{-- <div class="dropdown-menu dropdown-menu-right " id="submenu">
				<form >
				<button class="btn  header-login" formaction="{{ route('login') }}">LOGIN</button>
				<button class="btn  header-login" formaction="{{ route('engregister') }}">ENGINEER SIGNUP</button>
				<button class="btn  header-login" formaction="{{ route('user_regis') }}">USER SIGNUP</button>
				</form> --}}
				{{-- <form 
			@if(Auth::check()) 
			method="post"
			@endif>
				@if(Auth::check())
				@if(Auth::user()->role == 'user')
				
				@csrf
				<button class="btn btn-primary header-login" formaction="{{ route('userlogout') }}">LOGOUT</button>
				@elseif(Auth::user()->role == 'admin')
				@csrf
				<button class="btn btn-primary header-login" formaction="{{ route('adminlogout') }}">LOGOUT</button>
				@else
				@csrf
				<button class="btn btn-primary header-login" formaction="{{ route('engineerlogout') }}">LOGOUT</button>
				@endif
				@else
				
				@endif
			</form> --}}
			{{-- </div>
		</li> --}}
		<div class="header-btns-2">
			<div class="div-block-158 div-block-156 div-block-156 div-block-156 div-block-156 div-block-6 div-block-6 div-block-156 div-block-156 signin-btn-block ">
			<a href="{{ route('user_regis') }}" class="link-42" >
				Hire an Engineer
			</a>
			<div class="div-block-162"></div>
			<a href="{{ route('engregister') }}" class="link-42">Apply for Jobs</a>
			<div class="text-block-160 text-block-161">Signup</div>
			<div class="div-block-157"></div>
			<div class="div-block-160"></div>
			</div>
			<a id="headerLoginBtn" href="{{ route('login') }}" class="link-44">Log in</a>
			</div>
			@endif
		
		<!-- /User Menu -->
			{{-- <form 
			@if(Auth::check()) 
			method="post"
			@endif>
				@if(Auth::check())
				@if(Auth::user()->role == 'user')
				
				@csrf
				<button class="btn btn-primary header-login" formaction="{{ route('userlogout') }}">LOGOUT</button>
				@elseif(Auth::user()->role == 'admin')
				@csrf
				<button class="btn btn-primary header-login" formaction="{{ route('adminlogout') }}">LOGOUT</button>
				@else
				@csrf
				<button class="btn btn-primary header-login" formaction="{{ route('engineerlogout') }}">LOGOUT</button>
				@endif
				@else
				<button class="btn btn-primary header-login" formaction="{{ route('user_regis') }}">USER SIGNUP</button>
				<button class="btn btn-primary header-login" formaction="{{ route('engregister') }}">ENGINEER SIGNUP</button>
				@endif
			</form> --}}
		
	</ul>
</nav>

<!-- /Header -->