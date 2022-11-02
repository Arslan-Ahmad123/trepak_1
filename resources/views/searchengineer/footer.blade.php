 {{-- @php
	$current_url = url()->current();
	if($current_url == ""){
		$currentpagedocs = true;
	}else{
		$currentpagedocs = false;
	}
 @endphp --}}
 <footer id="footer" class="footer">
     <div class="container">
         <div id="footer-wrapper">
             <nav id="footer-navigation">
                 <a href="#" class="footer-logo d-none d-lg-block">
                     <img src="{{ asset('newpanel/assets/img/footer-logo.png') }}" alt="Engineering Portal">
                 </a>
                 <a href="#">Engineer Dashboard</a>
                 <a href="#">Client Dashboard</a>
                 <a href="#">Admin Dashboard</a>

             </nav>
             <div class="social-media-links">
                 <a href="#" target="_blank">
                     <img src="{{ asset('newpanel/assets/img/facebook.svg') }}" alt="facebook">
                 </a>
                 <a href="#" target="_blank">
                     <img src="{{ asset('newpanel/assets/img/twitter.svg') }}" alt="twitter">
                 </a>
                 <a href="#" target="_blank">
                     <img src="{{ asset('newpanel/assets/img/linkedin.svg') }}" alt="linkedin">
                 </a>
             </div>
         </div>
         <div id="bottom">
             <nav id="bottom-navigation">
                 <a href="#">Terms of Service</a>
                 <a href="#">Privacy Policy</a>
             </nav>
             <div id="copyright">
                 <a href="#" class="footer-logo d-lg-none">
                     <img src="{{ asset('newpanel/assets/img/footer-logo.png') }}" alt="Engineering Portal">
                 </a>
                 <p>© 2022 All Rights Reserved. Engineering Portal</p>
             </div>
         </div>
     </div>
 </footer>
 <!-- /Footer -->

 </div>
 <!-- /Main Wrapper -->

 <!-- jQuery -->
 <script src="{{ asset('newpanel/assets/js/jquery.min.js') }}"></script>
 <script src="{{ asset('newpanel/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
 <script src="{{ asset('newpanel/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
 <!-- Select2 JS -->
 {{-- <link rel="stylesheet" href="{{ asset('newpanel/assets/plugins/select2/js/select2.min.js') }}"> --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
     integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
 {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}

 <!-- Bootstrap Core JS -->
 <script src="{{ asset('newpanel/assets/js/popper.min.js') }}"></script>
 <script src="{{ asset('newpanel/assets/js/bootstrap.min.js') }}"></script>

 <!-- Slick JS -->
 <script src="{{ asset('newpanel/assets/js/slick.js') }}"></script>

 <!-- Custom JS -->
 <script src="{{ asset('newpanel/assets/js/script.js') }}"></script>
 <script type="text/javascript">
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>
 {{-- ======================================== --}}
 <script>
     // previous page should be reloaded when user navigate through browser navigation
     // for mozilla
     window.onunload = function() {};
     // for chrome
     if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
         location.reload();
     }
 </script>
 <script>
     function showbtn(id) {
         if (id == 'loginbtn') {
             $('#engrbtn').hide('slow');
             $('#clientbtn').hide('slow');
             $('#loginbtn').toggle('slow');
         } else if (id == 'engrbtn') {
             $('#engrbtn').toggle('slow');
             $('#clientbtn').hide('slow');
             $('#loginbtn').hide('slow');
         } else {
             $('#engrbtn').hide('slow');
             $('#clientbtn').toggle('slow');
             $('#loginbtn').hide('slow');
         }
     }
 </script>
 @stack('childscript')

 </body>

 <!-- doccure/  30 Nov 2019 04:11:53 GMT -->

 </html>
