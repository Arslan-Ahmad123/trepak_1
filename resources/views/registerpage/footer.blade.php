 
 <style>
    .containerlogin {
        width: 100%;
    }

    @media (min-width: 576px) {

        .containerlogin {
            max-width: 540px;
        }
    }

    @media (min-width: 768px) {

        .containerlogin {
            max-width: 720px;
        }
    }

    @media (min-width: 992px) {

        .containerlogin {
            max-width: 960px;
        }
    }

    @media (min-width: 1200px) {

        .containerlogin {
            max-width: 1140px;
        }
    }
</style>
<footer id="footer" class="footer">
    <div class="containerlogin mx-auto">
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

{{-- <footer class="footer">
				
		<!-- Footer Top -->
		<div class="footer-top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6 ">
					
						<!-- Footer Widget -->
						<div class="footer-widget footer-about">
							<div class="footer-logo">
								<img src="{{ asset('newpanel/assets/img/footer-logo.png') }}" alt="logo">
							</div>
							<div class="footer-about-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								<div class="social-icon">
									<ul>
										<li>
											<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /Footer Widget -->
						
					</div>
					
					<div class="col-lg-4 col-md-6 mt-md-4 mt-sm-4 col-sm-6">
					
						<!-- Footer Widget -->
						<div class="footer-widget footer-menu">
							<h2 class="footer-title">Download App On</h2>
							<img src="{{ asset('newpanel/assets/img/appstore.png') }}" alt="" width="200px" height="60px" class="mb-2">
							<img src="{{ asset('newpanel/assets/img/googlestore.png') }}" alt="" width="200px" height="60px">
						</div>
						<!-- /Footer Widget -->
						
					</div>
					
					
					
					<div class="col-lg-4 col-md-6 mt-md-4  col-sm-6">
					
						<!-- Footer Widget -->
						<div class="footer-widget footer-contact">
							<h2 class="footer-title">Contact Us</h2>
							<div class="footer-contact-info">
								<div class="footer-address">
									<span><i class="fas fa-map-marker-alt"></i></span>
									<p> Model Town Gujranwala,<br> Pakistan </p>
								</div>
								<p>
									<i class="fas fa-phone-alt"></i>
									+1 315 369 5943
								</p>
								<p class="mb-0">
									<i class="fas fa-envelope"></i>
									engineer@example.com
								</p>
							</div>
						</div>
						<!-- /Footer Widget -->
						
					</div>
					
				</div>
			</div>
		</div>
		<!-- /Footer Top -->		
								
							
				
</footer> --}}


			<!-- /Footer -->
		   
	   </div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{ asset('newpanel/assets/js/jquery.min.js') }}"></script>
		 {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}
		
		<!-- Bootstrap Core JS -->
		<script src="{{ asset('newpanel/assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('newpanel/assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Slick JS -->
		<script src="{{ asset('newpanel/assets/js/slick.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('newpanel/assets/js/script.js') }}"></script>
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
			 function showbtn(id){
			if(id == 'loginbtn'){
				$('#engrbtn').hide('slow');
				$('#clientbtn').hide('slow');
				$('#loginbtn').toggle('slow');
			}else if(id == 'engrbtn'){
				$('#engrbtn').toggle('slow');
				$('#clientbtn').hide('slow');
				$('#loginbtn').hide('slow');
			}else{
				$('#engrbtn').hide('slow');
				$('#clientbtn').toggle('slow');
				$('#loginbtn').hide('slow');
			}
		 }
		</script>
	   @stack('customscript')
		
	</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>