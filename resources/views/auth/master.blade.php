<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{asset('backend')}}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('backend')}}/vendor/chartist/css/chartist.min.css">
    <link href="{{asset('backend')}}/css/style.css" rel="stylesheet">
	<link href="{{asset('backend')}}/assets/style.css" rel="stylesheet">
	<link href="{{asset('backend')}}/css/custom.css" rel="stylesheet">
	<link href="{{asset('backend')}}/assets/css/responsive.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-4">
                    <div class="authincation-content">

                            @yield('main')
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('backend')}}/vendor/global/global.min.js"></script>
    <script src="{{asset('backend')}}/js/quixnav-init.js"></script>
    <script src="{{asset('backend')}}/js/custom.min.js"></script>

</body>

</html>
