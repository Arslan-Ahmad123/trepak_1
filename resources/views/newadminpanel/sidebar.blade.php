<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="active"> 
								<a href="index.html"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							{{-- <li> 
								<a href="{{ route('homepage') }}"><i class="fe fe-home"></i> <span>Home</span></a>
							</li> --}}
							<li class="submenu">
								<a href="#"><i class="fas fa-hard-hat" style="font-size: 18px;"></i> <span> Engineer</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{ route('createengr') }}"><i class="fe fe-user-plus" style="font-size: 18px;"></i><span class="ml-1">Create Engineer</span></a></li>
									<li><a href="{{ route('viewallengineer') }}"><i class="fe fe-user-plus" style="font-size: 18px;"></i><span class="ml-1">View Engineer</span></a></li>
									<li><a href="{{ route('adminconformenge') }}"><i class="fe fe-user-plus" style="font-size: 18px;"></i><span class="ml-1">Register Engineer</span></a></li>
									<li><a href="{{ route('adminunregisenge') }}"><img src="{{ asset('image/unregis.png') }}" width="25px" height="25px"><span class="ml-1">Pending Engineer</span></a></li>
									<li><a href="{{ route('registercategory') }}"><i class="fa-solid fa-list-check " style="font-size: 18px;"></i><span class="ml-1">Engineer Category</span></a></li>
									<li><a href="{{ route('viewcategory') }}"><i class="fa-solid fa-list-check " style="font-size: 18px;"></i><span class="ml-1">View Category</span></a></li>
									<li><a href="{{ route('createpackage') }}"><i class="fa-solid fa-list-check " style="font-size: 18px;"></i><span class="ml-1">Package(s)</span></a></li>
									<li><a href="{{ route('viewsavepackage') }}"><i class="fa-solid fa-list-check " style="font-size: 18px;"></i><span class="ml-1">View Package(s)</span></a></li>
									<li> 
								     <a href="appointment-list.html"><i class="fa-solid fa-calendar-check"></i> <span class="ml-1">Appointments</span></a>
							        </li>
							        <li> 
								    <a href="specialities.html"><i class="fe fe-users"></i> <span class="ml-1">Specialities</span></a>
									</li>
									<li> 
									<a href="specialities.html"><i class="fe fe-users"></i> <span class="ml-1">Packages</span></a>
									</li>
									<li> 
									<a href="specialities.html"><i class="fe fe-users"></i> <span class="ml-1">Engineer Package</span></a>
									</li>
									<li> 
									<a href="reviews.html"><i class="fe fe-star-o"></i> <span class="ml-1">Reviews</span></a>
									</li>	
								</ul>
							</li>
							
							{{-- <li> 
								<a href=""><i class="fe fe-user-plus"></i> <span>Register Engineers</span></a>
							</li>
							<li> 
								<a href="doctor-list.html"><i class="fe fe-user-plus"></i> <span>Unregister Engineers</span></a> 
							</li> --}}
							
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Clients </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{ route('clientpage') }}"><i class="fe fe-user"></i> Clients </a></li>
									<li><a href="#"> Register </a></li>
									
									<li><a href="#"> Lock Screen </a></li>
								</ul>
							</li>
							<li> 
								<a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li> 
								<a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
							</li>
							
							{{-- <li class="menu-title"> 
								<span>Pages</span>
							</li> --}}
							<li> 
								<a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>
							<li><a href="forgot-password.html"><i class="fe fe-user-plus"></i> <span>Change Password</span> </a></li>
							
							{{-- <li class="submenu">
								<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="error-404.html">404 Error </a></li>
									<li><a href="error-500.html">500 Error </a></li>
								</ul>
							</li>
							<li> 
								<a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>
							</li> --}}
							{{-- <li class="menu-title"> 
								<span>UI Interface</span>
							</li>
							<li> 
								<a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="form-basic-inputs.html">Basic Inputs </a></li>
									<li><a href="form-input-groups.html">Input Groups </a></li>
									<li><a href="form-horizontal.html">Horizontal Form </a></li>
									<li><a href="form-vertical.html"> Vertical Form </a></li>
									<li><a href="form-mask.html"> Form Mask </a></li>
									<li><a href="form-validation.html"> Form Validation </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="tables-basic.html">Basic Tables </a></li>
									<li><a href="data-tables.html">Data Table </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li class="submenu">
										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
											<li class="submenu">
												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
												<ul style="display: none;">
													<li><a href="javascript:void(0);">Level 3</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"> <span>Level 1</span></a>
									</li>
								</ul>
							</li> --}}
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->