<!-- Breadcrumb -->
<div class="breadcrumb-bar topsection">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Booking</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
@php
    if(session()->has('indexengrid')){
        session()->forget('indexengrid');
        session()->forget('indexroute');
    }
@endphp
<!-- Page Content -->
<div class="content">
    <div class="container">

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="booking-doc-info">
                            @php
							if($engr->signupoption == 1){
								$engrimg = $engr->pic;
							}else{
								$engrimg = asset('engrphoto/'.$engr->pic);
							}
                            @endphp
                            <a href="#" class="booking-doc-img">
                                <img src="{{ $engrimg}}" alt="User Image">
                            </a>
                            <div class="booking-info">
                                <h4><a href="#">{{ $engr->fname . ' ' . $engr->lname }}</a></h4>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">35</span>
                                </div>
                                <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i>
                                    {{ $engr->city . ', ' . $engr->country }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Schedule Widget -->
                {{-- <div class="card booking-schedule schedule-widget">
							
								<!-- Schedule Header -->
								<div class="schedule-header">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Day Slot -->
											<div id="calender">
												
											</div>
											
											<!-- /Day Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Header -->
								
								{{-- <!-- Schedule Content -->
								<div class="schedule-cont">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing selected" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
												</ul>
											</div>
											<!-- /Time Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Content --> --
								
							</div> --}}
                <!-- /Schedule Widget -->
                <div class="card booking-schedule schedule-widget">

                    <!-- Schedule Header -->
                    <div class="schedule-header">
                        <div class="row">
                            <div class="col-md-12">

                                <!-- Day Slot -->
                                <div class="day-slot">
                                    <ul>
                                        <li class="left-arrow" onclick="prevweek()">
                                            <i class="fa fa-chevron-left"></i>
                                        </li>
                                        <li class="dayname">
                                            <span class="day_name">Mon</span>
                                            <span class="slot-date">11 Nov <small class="slot-year">2019</small></span>
                                        </li>
                                        <li class="dayname">
                                            <span class="day_name">Tue</span>
                                            <span class="slot-date">12 Nov <small class="slot-year">2019</small></span>
                                        </li>
                                        <li class="dayname">
                                            <span class="day_name">Wed</span>
                                            <span class="slot-date">13 Nov <small class="slot-year">2019</small></span>
                                        </li>
                                        <li class="dayname">
                                            <span class="day_name">Thu</span>
                                            <span class="slot-date">14 Nov <small class="slot-year">2019</small></span>
                                        </li>
                                        <li class="dayname">
                                            <span class="day_name">Fri</span>
                                            <span class="slot-date">15 Nov <small class="slot-year">2019</small></span>
                                        </li>
                                        <li class="dayname">
                                            <span class="day_name">Sat</span>
                                            <span class="slot-date">16 Nov <small class="slot-year">2019</small></span>
                                        </li>
                                        <li class="dayname">
                                            <span class="day_name">Sun</span>
                                            <span class="slot-date">17 Nov <small class="slot-year">2019</small></span>
                                        </li>
                                        <li class="right-arrow" onclick="nextweek()">

                                            <i class="fa fa-chevron-right"></i>

                                        </li>
                                    </ul>
                                </div>
                                <!-- /Day Slot -->

                            </div>
                        </div>
                    </div>
                    <!-- /Schedule Header -->

                    <!-- Schedule Content -->
                    <div class="schedule-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="dateweek">
                                <input type="hidden" id="countlength" value=0>
                                <input type="hidden" id="datesatart">
                                <input type="hidden" id="selectdate" value="<?php echo date('d-m-Y'); ?>">
                                <input type="hidden" id="time" value="9:00 AM">
                                <!-- Time Slot -->
                                <div class="time-slot">
                                    <ul class="clearfix">
                                        <li class="listno">
                                            <a class="timing selected" href="javascript:void(0)"
                                                onclick="get_time(0,1)">
                                                <span>9:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(0,2)">
                                                <span>10:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(0,3)">
                                                <span>11:00</span> <span>AM</span>
                                            </a>
                                            <input type="time" class="form-control customtime timing"
                                                onclick="get_time(0,4)" value="<?php date_default_timezone_set('Asia/Karachi');
                                                $c_d = date('h:i:sa');
                                                echo date('H:i', strtotime($c_d)); ?>">
                                        </li>
                                        <li class="listno">
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(1,1)">
                                                <span>9:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(1,2)">
                                                <span>10:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(1,3)">
                                                <span>11:00</span> <span>AM</span>
                                            </a>
                                            <input type="time" class="form-control customtime timing"
                                                onclick="get_time(1,4)" value="<?php date_default_timezone_set('Asia/Karachi');
                                                $c_d = date('h:i:sa');
                                                echo date('H:i', strtotime($c_d)); ?>">
                                        </li>
                                        <li class="listno">
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(2,1)">
                                                <span>9:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(2,2)">
                                                <span>10:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(2,3)">
                                                <span>11:00</span> <span>AM</span>
                                            </a>
                                            <input type="time" class="form-control customtime timing"
                                                onclick="get_time(2,4)" value="<?php date_default_timezone_set('Asia/Karachi');
                                                $c_d = date('h:i:sa');
                                                echo date('H:i', strtotime($c_d)); ?>">
                                        </li>
                                        <li class="listno">
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(3,1)">
                                                <span>9:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(3,2)">
                                                <span>10:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(3,3)">
                                                <span>11:00</span> <span>AM</span>
                                            </a>
                                            <input type="time" class="form-control customtime timing"
                                                onclick="get_time(3,4)" value="<?php date_default_timezone_set('Asia/Karachi');
                                                $c_d = date('h:i:sa');
                                                echo date('H:i', strtotime($c_d)); ?>">
                                        </li>
                                        <li class="listno">
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(4,1)">
                                                <span>9:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing " href="javascript:void(0)" onclick="get_time(4,2)">
                                                <span>10:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing " href="javascript:void(0)" onclick="get_time(4,3)">
                                                <span>11:00</span> <span>AM</span>
                                            </a>
                                            <input type="time" class="form-control customtime timing "
                                                onclick="get_time(4,4)" value="<?php date_default_timezone_set('Asia/Karachi');
                                                $c_d = date('h:i:sa');
                                                echo date('H:i', strtotime($c_d)); ?>">
                                        </li>
                                        <li class="listno">
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(5,1)">
                                                <span>9:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(5,2)">
                                                <span>10:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(5,3)">
                                                <span>11:00</span> <span>AM</span>
                                            </a>
                                            <input type="time" class="form-control customtime timing"
                                                onclick="get_time(5,4)" value="<?php date_default_timezone_set('Asia/Karachi');
                                                $c_d = date('h:i:sa');
                                                echo date('H:i', strtotime($c_d)); ?>">
                                        </li>
                                        <li class="listno">
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(6,1)">
                                                <span>9:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(6,2)">
                                                <span>10:00</span> <span>AM</span>
                                            </a>
                                            <a class="timing" href="javascript:void(0)" onclick="get_time(6,3)">
                                                <span>11:00</span> <span>AM</span>
                                            </a>
                                            <input type="time" class="form-control customtime timing"
                                                onclick="get_time(6,4)" value="<?php date_default_timezone_set('Asia/Karachi');
                                                $c_d = date('h:i:sa');
                                                echo date('H:i', strtotime($c_d)); ?>">
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Time Slot -->

                            </div>
                        </div>
                    </div>
                    <!-- /Schedule Content -->

                </div>

                <!-- Submit Section -->
                <div class="submit-section proceed-btn text-right">
                    <form method="post" action="{{ route('proceed') }}">
                        @csrf
                        <input type="hidden" name="engr_date" id="engr_date"  required value="<?php echo date('d-m-Y'); ?>">
                        <input type="hidden" name="engr_time" id="engr_time"  required  value="9:00 AM">
                        <input type="hidden" name="engr_id" id="engr_id"      value="{{ $engr->id }}" required >
                        <button class="btn btn-primary px-4 py-2 submit-btn">Proceed to Pay</button>
                    </form>
                    {{-- <a href="{{ route('proceed') }}" class="btn btn-primary submit-btn">Proceed to Pay</a> --}}

                </div>
                <!-- /Submit Section -->

            </div>
        </div>
    </div>

</div>
<!-- /Page Content -->
@push('childscript')
    <script src="{{ asset('newpanel/assets/plugins/pgcalender/js/pignose.calendar.full.min.js') }}"></script>
    <script>
        function get_time(rowid, colno) {
            var selectedcol = document.querySelector('.selected');
            selectedcol.classList.remove('selected');
            var row_no = document.querySelectorAll('.listno');
            var date = document.querySelectorAll('.dayname');

            if (colno == 4) {
                var rowno = row_no[rowid];
                var cur_date = date[rowid];
                var datespan = cur_date.querySelector('.slot-date').innerText;
                $('#engr_date').val('');
                var timeconvert = new Date(datespan);
                var getdate = timeconvert.getDate();
                var getmonth = (timeconvert.getMonth() * 1) + 1;
                var getYear = timeconvert.getFullYear();

                $('#engr_date').val(getdate + '-' + getmonth + '-' + getYear);
                var select_date = date[rowid];
                var col_no = rowno.querySelectorAll('.timing');
                col_no[colno - 1].classList.add('selected');
                var time_cu = $('.selected').val();
                var gethour = time_cu.split(':');
                if (gethour[0] > 11) {
                    var converthour = gethour[0] - 12;
                    $('#engr_time').val(converthour + ':' + gethour[1] + ' PM');
                } else {
                    $('#engr_time').val($gethour[0] + ':' + gethour[1] + ' AM');
                }



                $('.selected').focus(() => {
                    var time_cu = $('.selected').val();
                    var gethour = time_cu.split(':');
                    if (gethour[0] > 11) {
                        var converthour = gethour[0] - 11;
                        $('#engr_time').val(converthour + ':' + gethour[1] + ' PM');
                    } else {
                        $('#engr_time').val($gethour[0] + ':' + gethour[1] + ' AM');
                    }
                }).blur(() => {
                    var time_cu = $('.selected').val();
                    var gethour = time_cu.split(':');
                    console.log(gethour);
                    if (gethour[0] > 11) {
                        var converthour = gethour[0] - 11;
                        console.log(converthour + ':' + gethour[1] + ' PM');
                        $('#engr_time').val(converthour + ':' + gethour[1] + ' PM');
                    } else {
                        console.log(gethour[0] + ':' + gethour[1] + ' AM');
                        $('#engr_time').val(gethour[0] + ':' + gethour[1] + ' AM');
                    }
                });
            } else {
                $('#engr_time').val('')
                var cur_date = date[rowid];
                var datespan = cur_date.querySelector('.slot-date').innerText;

                $('#engr_date').val('');
                var timeconvert = new Date(datespan);
                var getdate = timeconvert.getDate();
                var getmonth = (timeconvert.getMonth() * 1) + 1;
                var getYear = timeconvert.getFullYear();
                $('#engr_date').val(getdate + '-' + getmonth + '-' + getYear);
                var rowno = row_no[rowid];
                var col_no = rowno.querySelectorAll('.timing');
                col_no[colno - 1].classList.add('selected');
                var spantime = $('.selected span')[0];
                var spanap = $('.selected span')[1];
                console.log(spantime.innerText)
                console.log(spanap.innerText)
                $('#engr_time').val('');

                $('#engr_time').val(spantime.innerText + ' ' + spanap.innerText);

            }
        }

        function updatedatecol(date, sign) {

            if (sign == '+') {
                var count_len = $('#countlength').val();
                if (count_len < 5) {
                    $('#countlength').val((count_len * 1) + 1);
                    var date = new Date(date);
                    var nt_week = new Date(date.getFullYear(), date.getMonth(), date.getDate() + 7);
                    $('#dateweek').val(date);
                    $('#datesatart').val(nt_week);
                    var daynamespan = document.querySelectorAll('.day_name');
                    var datespan = document.querySelectorAll('.slot-date');
                    var yearspan = document.querySelectorAll('.slot-year');
                    $.each(daynamespan, function(ref, value) {

                        var ntweek = new Date(date.getFullYear(), date.getMonth(), date.getDate() + (ref * 1));
                        console.log(ntweek);
                        $(daynamespan[ref]).text(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'][ntweek
                    .getDay()]);
                        var curr_date = ntweek.getDate();
                        var curr_month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct',
                            'Nov', 'Dec'
                        ][ntweek.getMonth()]
                        var curr_year = ntweek.getFullYear();
                        var make_date = curr_date + ' ' + curr_month + ' ' + curr_year;
                        $(datespan[ref]).text(make_date);

                    });
                } else {
                    alert('not get the higher date')
                }

            } else {
                var count_len = $('#countlength').val();
                if (count_len > 1) {
                    $('#countlength').val(count_len - 1)
                    var date = new Date(date);
                    var nt_week = new Date(date.getFullYear(), date.getMonth(), date.getDate() - 7);
                    $('#dateweek').val(nt_week);
                    $('#datesatart').val(date);
                    var daynamespan = document.querySelectorAll('.day_name');
                    var datespan = document.querySelectorAll('.slot-date');
                    var yearspan = document.querySelectorAll('.slot-year');

                    var n = 7;
                    $.each(daynamespan, function(ref, value) {

                        var ntweek = new Date(date.getFullYear(), date.getMonth(), date.getDate() - (n * 1));
                        console.log(ntweek);
                        $(daynamespan[ref]).text(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'][ntweek
                    .getDay()]);
                        var curr_date = ntweek.getDate();
                        var curr_month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct',
                            'Nov', 'Dec'
                        ][ntweek.getMonth()]
                        var curr_year = ntweek.getFullYear();
                        var make_date = curr_date + ' ' + curr_month + ' ' + curr_year;
                        $(datespan[ref]).text(make_date);
                        --n;
                    });

                } else {
                    alert('No you got the previous')
                }

            }



        }
        $(document).ready(function() {
            let date = new Date();

            updatedatecol(date, '+');

            let currentdate = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
            $('#date').val(currentdate);

            $(function() {
                let prevdate = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + (date.getDate() -
                1);
                console.log(prevdate);
                $('#calender').pignoseCalendar({
                    theme: 'dark',

                    minDate: currentdate,
                    select: function(dates) {
                        if (dates[0] == null) {
                            $('#date').val('');
                        } else {
                            let chkobj = dates[0];
                            if (chkobj.hasOwnProperty('_i')) {

                                $('#date').val(dates[0]._i);


                            }
                        }
                    }
                });
            });
        });

        function nextweek() {
            var date = $('#datesatart').val();
            updatedatecol(date, '+');
            // alert(getdate);
            // 	// var weekno = $('#dateweek').val();
            // 	var today = new Date($('#datesatart').val());
            // 	// $('#dateweek').val((weekno*1)+1);

            // 		// var next_we = (weekno * 1) + 1;
            // 		var n_week =new Date(today.getFullYear(), today.getMonth(), today.getDate()+7)
            // 		$('#datesatart').val(n_week);
            // 		console.log(today,n_week)
            // 		// alert((weekno * 1)*7 +' :' + (next_we * 1)*7);



            // 	// var nextweek = new Date(today.getFullYear(), today.getMonth(), today.getDate()+7);
            // 	// alert(nextweek);
        }

        function prevweek() {
            // var weekno = $('#dateweek').val();
            var getdate = $('#dateweek').val();
            updatedatecol(getdate, '-');
            // alert(getdate);
            // var today = new Date($('#datesatart').val());
            // 	// $('#dateweek').val((weekno*1)+1);

            // 		// var next_we = (weekno * 1) + 1;
            // 		var n_week =new Date(today.getFullYear(), today.getMonth(), today.getDate()-7)
            // 		$('#datesatart').val(n_week);
            // 		console.log(today,n_week)
            // alert((weekno * 1)*7 +' :' + (next_we * 1)*7);



            // var nextweek = new Date(today.getFullYear(), today.getMonth(), today.getDate()+7);
            // alert(nextweek);
        }
    </script>
@endpush
