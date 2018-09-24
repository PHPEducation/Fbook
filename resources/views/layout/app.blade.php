<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Fbook</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('layout.style')
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        {{ Html::script('assets/js/vendor/modernizr-2.8.3.min.js') }}
    </head>
    <body>
        @include('layout.header')
            @section('header')
                @show

        @yield('content')

        @include('layout.footer')
            @section('footer')
                @show

        @include('layout.script')
            @section('script')
                @show
    </body>
</html>
