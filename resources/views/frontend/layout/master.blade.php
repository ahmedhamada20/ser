<!DOCTYPE html>
<html lang="en">
<head>
@include('frontend.layout.header')
</head>
<body>
<div class="wrapper position-relative" style="background-image: linear-gradient(to right, rgba(38, 142, 255, 0.8), rgba(91, 117, 255, 0.7)), url('{{asset('upload/setting/'.$setting->background)}}')">
@include('frontend.layout.navbar')
@yield('content')
</div>
@include('frontend.layout.footerjs')
</body>
</html>
