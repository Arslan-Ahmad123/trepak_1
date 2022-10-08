
	<section class="section ">
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
								<div class="search-box d-none d-sm-block">
									<form method="post" action="{{ route('searchbarengineer') }}">
										@csrf
										<div class="form-group search-location">
											<input type="text" class="form-control" id="search"  name="cityname" placeholder="What are you looking for?">
											  @error('cityname')
												<div class="alert alert-danger" id="cityname_div">This Field is Required.</div>
												<script>
												setTimeout(() => {
													$('#cityname_div').hide();
												}, 3000);
												</script>
												@enderror
											<!-- <span class="form-text">Based on your Location</span> -->
										</div>
										<div class="form-group search-info">
											<input type="text" class="form-control"  id="eng_type" name="date"  placeholder="Select Engineer">
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
										<button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span id="searchtext">Search</span></button>
									</form>
									
								</div>
							</div>

							<!-- /Search -->
						</div>

					</div>
				</div>
			</section>
			<!-- /Home Banner -->
			  
			<section class=" section-category mt-2 pt-2">
				<div class="container category_container">
				   <div class="row  ml-0 mr-0">
					@php 
					$all_category =  \App\Models\engCategory::get();
					
					@endphp
					@foreach($all_category as $r)
					<div class="col-lg-3 col-md-4 col-sm-6 col-12 mx-auto mx-md-0 maindiv_cat"  >
						<a href="{{ route('searchengineer',$r->id) }}">
						<div  class="civil">
							<img src="{{ asset('categorylogo/'.$r->engrcategorylogo) }}" class="img-fluid " style="height: 100%;min-width:100%;">
							
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
		
		
		
			<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container category_container">
				   <div class="row">
						<div class="col-lg-4 col-sm-12 col-12 mx-auto">
							<div class="section-header ">
								<h2>Book Our Engineer</h2>
								<p>Lorem Ipsum is simply dummy text </p>
							</div>
							<div class="about-content">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
								<p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>					
								<a href="javascript:;">Read More..</a>
							</div>
						</div>
						<div class="col-lg-8 col-sm-12 col-12 mx-auto">
							<div class="doctor-slider slider">
							@php 
							$engineer = App\Models\User::where('role','enge')->where('status',1)->inRandomOrder()->limit(6)->get();
							
							$countrecord = count($engineer);	
							@endphp
							@if($countrecord > 0)
							@foreach($engineer as $res)
							
							<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										{{-- <a href="doctor-profile.html"> --}}
											<img class="img-fluid" alt="User Image" src="{{asset('engrphoto/'.$res->pic)}}" style="max-height:130px">
										{{-- </a> --}}
										{{-- <a href="javascript:void(0)" class="fav-btn"> --}}
											<i class="far fa-bookmark"></i>
										{{-- </a> --}}
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="javascript:void(0)">{{ $res->fname }}</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										{{-- @php
											$enginercategory = App\Models\engCategory::where('id',$res->engrcategoryid)->first();
											  
											@endphp --}}
										<p class="speciality">{{ getcategoryname($res->engrcategoryid) }}</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(17)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> {{ $res->city , $res->country }}
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> {{ $res->pricerange}} 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm mx-auto">
											<form method="post">
												@csrf
												<input type="text" name="userid" value="{{ $res->id }}" hidden>
												<input type="text" name="bookingid" value="{{ $res->id }}" hidden>
												<button class="btn-info p-0 px-3 btn  w-40" type="submit" formaction="{{ route('viewprofileeng') }}"><i class="fa fa-eye" aria-hidden="true"></i>Profile</button>
												<button class="btn-info p-0 px-3 ml-2 btn w-40" type="submit" formaction="{{ route('booking') }}"><i class="fa fa-check" aria-hidden="true"></i>Booked</button>
											</form>
											{{-- <div class="col-6">
												<a href="{{ route('viewprofileeng',['id'=>$res->id]) }}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{ route('booking',['id'=>$res->id]) }}" class="btn book-btn">Book Now</a>
											</div> --}}
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
							@endforeach
							@else
							<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="{{ asset('newpanel/assets/img/doctors/doctor-01.png') }}" >
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Ruby Perrin</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">Civil Engineer</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(17)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Florida, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $300 - $1000 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{ route('viewprofileeng') }}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{ route('booking') }}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
						
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="{{ asset('newpanel/assets/img/doctors/doctor-02.png') }}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Darren Elder</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">Civil Engineer</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(35)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Newyork, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $50 - $300 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{ route('viewprofileeng') }}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{ route('booking') }}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
						
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="{{ asset('newpanel/assets/img/doctors/doctor-03.png') }}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Deborah Angel</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">Civil Engineer</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(27)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Georgia, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $400 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{ route('viewprofileeng') }}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{ route('booking') }}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
						
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="{{ asset('newpanel/assets/img/doctors/doctor-04.png') }}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Sofia Brient</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">Civil Engineer</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(4)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Louisiana, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $150 - $250 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{ route('viewprofileeng') }}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{ route('booking') }}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
								
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="{{ asset('newpanel/assets/img/doctors/doctor-05.png') }}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="javascript:void(0)">Marvin Campbell</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">Civil Engineer</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(66)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Michigan, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $50 - $700 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{ route('viewprofileeng') }}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{ route('booking') }}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
								
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="{{ asset('newpanel/assets/img/doctors/doctor-06.png') }}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Katharine Berthold</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">Civil Engineer</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(52)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Texas, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $500 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{ route('viewprofileeng') }}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{ route('booking') }}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
									<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="{{ asset('newpanel/assets/img/doctors/doctor-07.png') }}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Linda Tobin</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">Civil Engineer</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(43)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Kansas, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $1000 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{ route('viewprofileeng') }}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{ route('booking') }}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->
								
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="{{ asset('newpanel/assets/img/doctors/doctor-08.png') }}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Paul Richard</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">Civil Engineer</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(49)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> California, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $400 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{ route('viewprofileeng') }}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{ route('booking') }}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- Doctor Widget -->
							@endif
								
								
							
								
							</div>
						</div>
				   </div>
				</div>
			</section>