<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title> @yield('title') </title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="{{ favicon() }}">

    {{-- <link rel="stylesheet" href="{{asset('backend')}}/vendor/font_awesome/6.4.2/all.min.css" /> --}}
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/jqvmap/css/jqvmap.min.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/chartist/css/chartist.min.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/css/style.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/assets/style.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/css/custom.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/responsive.css" />
    {{-- select 2 css  --}}
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/select2/css/select2.min.css" />

    @stack('styles')

</head>
