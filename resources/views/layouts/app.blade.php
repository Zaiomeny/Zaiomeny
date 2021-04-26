<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>INSTAT Madagascar</title>

        <!-- Favicon icon -->
        <link rel="icon" href="{{ asset('assets/images/favicon.ico')}}" type="image/x-icon">
        <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css')}}">
        <!-- themify-icons line icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css')}}">
        <!-- ico font -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css')}}">
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css')}}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </heaz>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

           
        </div>



        <!-- Required Jquery -->
            <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js')}}"></script>
            <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
            <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js')}}"></script>
            <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- jquery slimscroll js -->
            <script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <!-- modernizr js -->
            <script type="text/javascript" src="{{ asset('assets/js/modernizr/modernizr.js')}}"></script>
            <script type="text/javascript" src="{{ asset('assets/js/modernizr/css-scrollbars.js')}}"></script>
        <!-- classie js -->
            <script type="text/javascript" src="{{ asset('assets/js/classie/classie.js')}}"></script>
        <!-- Custom js -->
            <script type="text/javascript" src="{{ asset('assets/js/script.js')}}"></script>
            <script src="{{ asset('assets/js/pcoded.min.js')}}"></script>
            <script src="{{ asset('assets/js/demo-12.js')}}"></script>
            <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    </body>
</html>
