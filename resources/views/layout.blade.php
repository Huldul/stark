<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset("img/favicon.png")}}" type="image/x-icon">
    <title>Главная</title>
    <link rel="stylesheet" href="{{asset("css/swiper-bundle.min.css?_v=20240329172913")}}">
    <link rel="stylesheet" href="{{asset("css/style.css?_v=2.12")}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    @include('components/header')
    @yield('content')
    @include('components/footer')


    
<script src="{{asset("js/jquery-3.6.0.min.js?_v=20240329172913")}}"></script>
<script src="{{asset("js/jquery-marquee.js?_v=20240329172913")}}"></script>
<script src="{{asset("js/swiper-bundle.min.js?_v=20240329172913")}}"></script>
<script src="{{asset("js/jquery.maskedinput.min.js")}}"></script>
<script src="{{asset("js/app.js?_v=2.11")}}"></script>
<!-- ALERT FORM -->

<!-- ALERT FORM END -->
<div class="popup form_loader" id="form_loader">
    <div class="form_loader_block">
        <div class="form_loader_animate"></div>
        <div class="form_loader_text" style="color: #000;">Пожалуйста, подождите</div>
    </div>
</div>
<!-- loader form -->
</body>

</html>