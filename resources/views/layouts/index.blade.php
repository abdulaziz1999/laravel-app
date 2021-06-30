<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apps</title>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container fluid">
@include('layouts.header')
    <div class="row">
        <div class="col-md-9 mt-3">
        @yield('content')
        </div>
        @include('layouts.sidebar')
    </div>
</div>
@include('layouts.footer')
    
</body>
</html>

