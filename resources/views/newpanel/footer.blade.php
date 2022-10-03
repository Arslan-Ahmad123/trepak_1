 @php
            $engarray = array();
            // $egn_type = $engtype;
            // $egn_type = app;
          foreach (App\Models\engCategory::get('engrcategory')  as $val){
            $engarray[]= $val['engrcategory'];
          }
@endphp 
<!-- Footer -->

{{-- <section id="motto">
	<h2>Download the App</h2>
	<p>Search for engineers, specialities & services.Find <br>engineer reviews and book appointment online.</p>
	<div id="motto-buttons-mobile">
		<a href="#"
		   target="_blank" class="show-ios-flex"><img src="{{asset('newpanel/assets/img/google-play-button.png') }}" alt=""></a>
		<a href="#" target="_blank"
		   class="show-android-flex"><img src="{{asset('newpanel/assets/img/app-store-button.png') }}" alt=""></a>
	   
	</div>
	<div id="motto-buttons-desktop">
		<a href="#" target="_blank"><img
				src="{{asset('newpanel/assets/img/google-play-button.png') }}" alt=""></a>
		<a href="#"
		   target="_blank"><img src="{{asset('newpanel/assets/img/app-store-button.png') }}" alt=""></a>
		
			   </div>
	<div id="motto-image"></div>
</section> --}}
<footer id="footer" class="footer">
	<div class="container">
		<div id="footer-wrapper">
			<nav id="footer-navigation">
				<a href="#" class="footer-logo d-none d-lg-block">
										 <img src="{{asset('newpanel/assets/img/footer-logo.png') }}" alt="Engineering Portal">
									</a>
				<a href="#">Engineer Dashboard</a>
				<a href="#">Client Dashboard</a>
				<a href="#">Admin Dashboard</a>
			   
								</nav>
			<div class="social-media-links">
				<a href="#" target="_blank">
					<img src="{{asset('newpanel/assets/img/facebook.svg') }}" alt="facebook">
				</a>
				<a href="#" target="_blank">
					<img src="{{asset('newpanel/assets/img/twitter.svg') }}" alt="twitter">
				</a>
				<a href="#" target="_blank">
					<img src="{{asset('newpanel/assets/img/linkedin.svg') }}" alt="linkedin">
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
					<img src="{{asset('newpanel/assets/img/footer-logo.png') }}" alt="Engineering Portal">
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
				
				
				
			</footer>
			<!-- /Footer --> --}}
		   
	   </div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{ asset('newpanel/assets/js/jquery.min.js') }}"></script>
		 {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{ asset('newpanel/assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('newpanel/assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Slick JS -->
		<script src="{{ asset('newpanel/assets/js/slick.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('newpanel/assets/js/script.js') }}"></script>
		 <script>
     
         $(function() {
            @php
            $city = array ( 0 => 'Islamabad', 1 => 'Ahmed Nager', 2 => 'Ahmadpur East', 3 => 'Ali Khan', 4 => 'Alipur', 5 => 'Arifwala', 6 => 'Attock', 7 => 'Bhera', 8 => 'Bhalwal', 9 => 'Bahawalnagar', 10 => 'Bahawalpur', 11 => 'Bhakkar', 12 => 'Burewala', 13 => 'Chillianwala', 14 => 'Chakwal', 15 => 'Chichawatni', 16 => 'Chiniot', 17 => 'Chishtian', 18 => 'Daska', 19 => 'Darya Khan', 20 => 'Dera Ghazi', 21 => 'Dhaular', 22 => 'Dina', 23 => 'Dinga', 24 => 'Dipalpur', 25 => 'Faisalabad', 26 => 'Fateh Jhang', 27 => 'Ghakhar Mandi', 28 => 'Gojra', 29 => 'Gujranwala', 30 => 'Gujrat', 31 => 'Gujar Khan', 32 => 'Hafizabad', 33 => 'Haroonabad', 34 => 'Hasilpur', 35 => 'Haveli', 36 => 'Lakha', 37 => 'Jalalpur', 38 => 'Jattan', 39 => 'Jampur', 40 => 'Jaranwala', 41 => 'Jhang', 42 => 'Jhelum', 43 => 'Kalabagh', 44 => 'Karor Lal', 45 => 'Kasur', 46 => 'Kamalia', 47 => 'Kamoke', 48 => 'Khanewal', 49 => 'Khanpur', 50 => 'Kharian', 51 => 'Khushab', 52 => 'Kot Adu', 53 => 'Jauharabad', 54 => 'Lahore', 55 => 'Lalamusa', 56 => 'Layyah', 57 => 'Liaquat Pur', 58 => 'Lodhran', 59 => 'Malakwal', 60 => 'Mamoori', 61 => 'Mailsi', 62 => 'Mandi Bahauddin', 63 => 'mian Channu', 64 => 'Mianwali', 65 => 'Multan', 66 => 'Murree', 67 => 'Muridke', 68 => 'Mianwali Bangla', 69 => 'Muzaffargarh', 70 => 'Narowal', 71 => 'Okara', 72 => 'Renala Khurd', 73 => 'Pakpattan', 74 => 'Pattoki', 75 => 'Pir Mahal', 76 => 'Qaimpur', 77 => 'Qila Didar', 78 => 'Rabwah', 79 => 'Raiwind', 80 => 'Rajanpur', 81 => 'Rahim Yar', 82 => 'Rawalpindi', 83 => 'Sadiqabad', 84 => 'Safdarabad', 85 => 'Sahiwal', 86 => 'Sangla Hill', 87 => 'Sarai Alamgir', 88 => 'Sargodha', 89 => 'Shakargarh', 90 => 'Sheikhupura', 91 => 'Sialkot', 92 => 'Sohawa', 93 => 'Soianwala', 94 => 'Siranwali', 95 => 'Talagang', 96 => 'Taxila', 97 => 'Toba Tek', 98 => 'Vehari', 99 => 'Wah Cantonment', 100 => 'Wazirabad', 101 => 'Badin', 102 => 'Bhirkan', 103 => 'Rajo Khanani', 104 => 'Chak', 105 => 'Dadu', 106 => 'Digri', 107 => 'Diplo', 108 => 'Dokri', 109 => 'Ghotki', 110 => 'Haala', 111 => 'Hyderabad', 112 => 'Islamkot', 113 => 'Jacobabad', 114 => 'Jamshoro', 115 => 'Jungshahi', 116 => 'Kandhkot', 117 => 'Kandiaro', 118 => 'Karachi', 119 => 'Kashmore', 120 => 'Keti Bandar', 121 => 'Khairpur', 122 => 'Kotri', 123 => 'Larkana', 124 => 'Matiari', 125 => 'Mehar', 126 => 'Mirpur Khas', 127 => 'Mithani', 128 => 'Mithi', 129 => 'Mehrabpur', 130 => 'Moro', 131 => 'Nagarparkar', 132 => 'Naudero', 133 => 'Naushahro Feroze', 134 => 'Naushara', 135 => 'Nawabshah', 136 => 'Nazimabad', 137 => 'Qambar', 138 => 'Qasimabad', 139 => 'Ranipur', 140 => 'Ratodero', 141 => 'Rohri', 142 => 'Sakrand', 143 => 'Sanghar', 144 => 'Shahbandar', 145 => 'Shahdadkot', 146 => 'Shahdadpur', 147 => 'Shahpur Chakar', 148 => 'Shikarpaur', 149 => 'Sukkur', 150 => 'Tangwani', 151 => 'Tando Adam', 152 => 'Tando Allahyar', 153 => 'Tando Muhammad', 154 => 'Thatta', 155 => 'Umerkot', 156 => 'Warah', 157 => 'Abbottabad', 158 => 'Adezai', 159 => 'Alpuri', 160 => 'Akora Khattak', 161 => 'Ayubia', 162 => 'Banda Daud', 163 => 'Bannu', 164 => 'Batkhela', 165 => 'Battagram', 166 => 'Birote', 167 => 'Chakdara', 168 => 'Charsadda', 169 => 'Chitral', 170 => 'Daggar', 171 => 'Dargai', 172 => 'Darya Khan', 173 => 'dera Ismail', 174 => 'Doaba', 175 => 'Dir', 176 => 'Drosh', 177 => 'Hangu', 178 => 'Haripur', 179 => 'Karak', 180 => 'Kohat', 181 => 'Kulachi', 182 => 'Lakki Marwat', 183 => 'Latamber', 184 => 'Madyan', 185 => 'Mansehra', 186 => 'Mardan', 187 => 'Mastuj', 188 => 'Mingora', 189 => 'Nowshera', 190 => 'Paharpur', 191 => 'Pabbi', 192 => 'Peshawar', 193 => 'Saidu Sharif', 194 => 'Shorkot', 195 => 'Shewa Adda', 196 => 'Swabi', 197 => 'Swat', 198 => 'Tangi', 199 => 'Tank', 200 => 'Thall', 201 => 'Timergara', 202 => 'Tordher', 203 => 'Awaran', 204 => 'Barkhan', 205 => 'Chagai', 206 => 'Dera Bugti', 207 => 'Gwadar', 208 => 'Harnai', 209 => 'Jafarabad', 210 => 'Jhal Magsi', 211 => 'Kacchi', 212 => 'Kalat', 213 => 'Kech', 214 => 'Kharan', 215 => 'Khuzdar', 216 => 'Killa Abdullah', 217 => 'Killa Saifullah', 218 => 'Kohlu', 219 => 'Lasbela', 220 => 'Lehri', 221 => 'Loralai', 222 => 'Mastung', 223 => 'Musakhel', 224 => 'Nasirabad', 225 => 'Nushki', 226 => 'Panjgur', 227 => 'Pishin valley', 228 => 'Quetta', 229 => 'Sherani', 230 => 'Sibi', 231 => 'Sohbatpur', 232 => 'Washuk', 233 => 'Zhob', 234 => 'Ziarat', );
              $cities = json_encode($city);
            @endphp
            let cityarray = @php echo $cities @endphp;
           
            $( "#search" ).autocomplete({
               source: cityarray,
               autoFocus:true
            });
         });
         $(function() {
           
            let eng_type = @php echo json_encode($engarray) @endphp
           
           
            $( "#eng_type" ).autocomplete({
               source: eng_type,
               autoFocus:true
            });
         });

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
		
	</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>