<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/search.html  30 Nov 2019 04:12:16 GMT -->
<head>
		<meta charset="utf-8">
		<title>TrePak Engineering Portal</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		
		<!-- Favicons -->
		<link href="{{ asset('newpanel/assets/img/favicon.png') }}" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('newpanel/assets/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('newpanel/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('newpanel/assets/plugins/fontawesome/css/all.min.css') }}">
		<!-- pignose CSS -->
		
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{ asset('newpanel/assets/css/bootstrap-datetimepicker.min.css') }}">
		
		<!-- Select2 CSS -->
		{{-- <link rel="stylesheet" href="{{ asset('newpanel/assets/plugins/select2/css/select2.min.css') }}"> --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="{{ asset('newpanel/assets/plugins/fancybox/jquery.fancybox.min.css') }}">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('newpanel/assets/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('newpanel/assets/css/footer.css') }}">
		<link rel="stylesheet" href="{{ asset('newpanel/assets/plugins/pgcalender/css/pignose.calendar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('newpanel/assets/plugins/pgcalender/css/calenderstyle.css') }}">
	<link rel="stylesheet" href="{{ asset('newpanel/assets/plugins/pgcalender/css/calenderui.css') }}">
	
		@yield('custome_css')
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">