<style>
    @media only screen and (min-width: 992px) {
        .footer_pc {
            position: fixed;
            bottom: 0%;
            width: 100%;
        }
        .footer_lp {
            position: static;
            bottom: 0%;
            width: 100%;
        }
		.topsection{
            box-sizing: border-box;
            margin-top: 78px;
            padding-bottom: 15px;
		}
	}
  
</style>
<!-- Page Content -->
<div class="content topsection">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Login Tab Content -->
                <div class="account-content pt-5">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="{{ asset('newpanel/assets/img/login-banner.jpg') }}" class="img-fluid"
                                alt="Doccure Login">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right"
                            style="box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 50%);">
                            <div class="login-header">
                                <h3 style="text-align:justify">Your approval request has gone to the Admin.Now You wait
                                    until Admin approve your request.</h3>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Login Tab Content -->

            </div>
        </div>

    </div>

</div>
@push('customjscode')
    <script>
         if(window.innerHeight > 715){
                var footer_class =  document.getElementById('footer').classList;
                footer_class.remove('footer_lp');
                footer_class.add('footer_pc');
            }else{
                var footer_class =  document.getElementById('footer').classList;
                footer_class.remove('footer_pc');
                footer_class.add('footer_lp');
            }    
    </script>
@endpush

<!-- /Page Content -->
