<div class="breadcrumb-bar topsection">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Booking</h2>
            </div>
        </div>
    </div>
</div>
<div class="content success-page-cont" style="min-height: 180px;">
    <div class="container-fluid">
    
        <div class="row justify-content-center">
            <div class="col-lg-6">
           
                <!-- Success Card -->
                <div class="card success-card">
                    <div class="card-body">
                        <div class="success-cont">
                            <i class="fas fa-check"></i>
                            @if(session()->has('conformengrid'))
                            <h3>Your Appointment Request Sent To The Engineer!</h3>
                            <p>Appointment request with <strong>{{ getuser(session()->get('conformengrid'))->fname }}</strong><br> on <strong>{{ session()->get('conformmeetingdate') }}</strong></p>
                            @php
                                session()->forget('conformengrid');
                                session()->forget('conformmeetingdate');
                            @endphp
                            @else
                            <h3>Appointment book notausiiu Successfully!</h3>
                            <p>Appointment booked with <strong>Dr. Darren Elder</strong><br> on <strong>12 Nov 2019 5:00PM to 6:00PM</strong></p>
                            @endif
                            <a href="invoice-view.html" class="btn btn-primary view-inv-btn">View Invoice</a>
                        </div>
                    </div>
                </div>
                <!-- /Success Card -->
                
            </div>
        </div>
        
    </div>
</div>