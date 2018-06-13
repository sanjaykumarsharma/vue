<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0 shrink-to-fit=no" name="viewport">
        <meta name="csrf-token" content="{{csrf_token()}}">

        {!! SEO::generate(true) !!}

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body id="body">

        @include('layouts.header')

        <div class="container-fluid" style="background-color:#FFF">
            @section('content')

            @show
        </div>

        <footer id="footer">
            <div class="container">
                <div class="copyright">
                &copy; Copyright <strong>2018</strong>. All Rights Reserved
                </div>
            </div>
        </footer><!-- #footer -->

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/superfish/superfish.min.js') }}"></script>
        <script src="{{ asset('js/sticky/sticky.js') }}"></script>
        <script src="{{ asset('js/wow/wow.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/jquery-listnav.js') }}"></script>
        <script>
            $("#myTags").listnav();
        </script>
    </body>
</html>