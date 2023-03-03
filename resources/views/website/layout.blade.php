<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    

    @yield('styles') 
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <style>
        *{
            margin: 0;
        }
        body{
            background-color: rgb(40, 50, 70);
            color: orange;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>@include('website.common.navbar')</div>
        @yield('content')
        <div>@include('website.common.footer')</div>
    </div>
</body>
        @yield('scripts')
</html>