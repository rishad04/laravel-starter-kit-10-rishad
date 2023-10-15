<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title> @yield('title') </title>

	<!-- Favicon icon -->
	<!-- <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png"> -->


    <link rel="stylesheet" href="{{asset('backend')}}/vendor/jqvmap/css/jqvmap.min.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/chartist/css/chartist.min.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/css/style.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/assets/style.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/css/custom.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/responsive.css" />
    {{-- select 2 css  --}}
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/select2/css/select2.min.css" />



</head>

<body>

	<!--*******************  Preloader start ******************** -->
	<div id="preloader">
		<div class="sk-three-bounce">
			<div class="sk-child sk-bounce1"></div>
			<div class="sk-child sk-bounce2"></div>
			<div class="sk-child sk-bounce3"></div>
		</div>
	</div>


	<!-- Start Rtl  ==================================== -->
	<button type="button" class="rtl-mode">RTL/LTL</button>

  	<!--**********************************  Main wrapper start  ***********************************-->
	<div id="main-wrapper">
