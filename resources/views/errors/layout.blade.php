<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title> @yield('title') </title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="{{ favicon() }}">

    <link rel="stylesheet" href="{{asset('backend')}}/css/style.css" />


</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">

            @yield('content')

        </div>
    </div>
</body>

</html>
