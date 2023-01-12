@php
    $count = count($engrs);
@endphp

@if($count > 0)
@foreach($engrs as $engr)
<!-- Doctor Widget -->
<div class="card">
    
        <div class="doctor-widget searchcard">
            <div class="doc-info-left">
                <div class="doctor-img">
                    {{-- <a href="doctor-profile.html"> --}}
                        @php
                            if($engr->signupoption == 1){
                                $image = $engr->pic;
                            }else{
                                $image = asset('engrphoto/'.$engr->pic);
                            }
                        @endphp
                        <img src="{{ $image }}"  alt="Engr Image" style="width: 100%;height: 100px;" >
                    {{-- </a> --}}
                </div>
                <div class="doc-info-cont">
                    <h4 class="doc-name"><a href="javascript:void(0)">{{ $engr->fname }}</a></h4>
                    <p class="doc-speciality">{{ getcategoryname($engr->engrcategoryid) }}</p>
                    <div id="specilizationfield">
                        <h5 class="doc-department" style="text-align: left"><img src="{{ asset('newpanel/assets/img/specialities/specialities-05.png') }}"  alt="Speciality">AUTO CAD</h5>
                    </div>
                    <div id="client_engr_chat_box">
                        <h5 class="doc-department" style="text-align: left;"><a href="javascript:void(0)" style="font-size: 14px;color: #757575;" onclick="clientchat_box({{ $engr->id }},{{ (Auth::check())?Auth::user()->id:'' }})"><i class="far fa-comment"></i> Chat</a></h5>
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
                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $engr->city.' '.$engr->state.', '.$engr->country }}</p>
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
                                <input type="text" name="userid" value="{{ $engr->id }}" hidden>
                                <input type="text" name="bookingid" value="{{ $engr->id }}" hidden>
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
                        <li><a href="javascript:void(0)" onclick="clientchat_box({{ $engr->id }},{{ Auth::check()?Auth::user()->id:'' }})"><i class="far fa-comment"></i> Chat</a></li>
                        {{-- <li><i class="fas fa-map-marker-alt"></i> Florida, USA</li> --}}
                        {{-- <li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li> --}}
                    </ul>
                </div>
                <div class="clinic-booking">
                    <form method="post">
                        @csrf
                        <input type="text" name="userid" value="{{ $engr->id }}" hidden>
                        <input type="text" name="bookingid" value="{{ $engr->id }}" hidden>
                        <button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('viewprofileeng') }}"><i class="fa fa-eye" aria-hidden="true"></i>Profile</button>
                        <button class="btn-info p-0 px-2 btn w-45" type="submit" formaction="{{ route('booking') }}"><i class="fa fa-check" aria-hidden="true"></i>Booked</button>
                    </form>
                    {{-- <a class="apt-btn" href="{{ route('booking',['id'=>$engr->id]) }}"><i class="fa fa-check" aria-hidden="true"></i>Booked</a> --}}
                </div>
            </div>
        </div>
    
</div>
<!-- /Doctor Widget -->
@endforeach
@else
No Record Found!!
@endif