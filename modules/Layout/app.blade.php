<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta
        name="description"
        content="nhuan">
    <meta
        name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta
        name="author"
        content="nhuan">
    <meta
        name="robots"
        content="noindex, nofollow">
    <!-- CSRF Token -->
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">
    <title>Dashboard - HRMS admin</title>

    <!-- Favicon -->
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="{{asset('assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link
        rel="stylesheet"
        href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link
        rel="stylesheet"
        href="{{asset('assets/css/font-awesome.min.css')}}">

    <!-- Lineawesome CSS -->
    <link
        rel="stylesheet"
        href="{{asset('assets/css/line-awesome.min.css')}}">

@yield("css")

<!-- Main CSS -->
    <link
        rel="stylesheet"
        href="{{asset('assets/css/style.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->

    @stack('css')
</head>

<body>
@yield("content")

<!-- jQuery -->
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('assets/js/app.js')}}"></script>
@yield("js")
@stack('js')
</body>
</html>
