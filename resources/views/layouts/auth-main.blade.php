<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-office</title>
    <link rel="shortcut icon" href="{{ asset('assets/auth/img/favicon.png') }}" /> 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/iofrm-theme5.css') }}">
</head>
<body class="hold-transition login-page">

@yield('content')

<script src="{{ asset('assets/auth/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/auth/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/auth/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/auth/js/main.js') }}"></script>
</body>
</html>
