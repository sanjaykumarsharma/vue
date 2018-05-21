<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">

        {!! SEO::generate(true) !!}

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}
    </head>
    <body>
        {{-- <header>
            <div class="container-fluid" style="padding-top:5px;background-color:#FFF">
                <div class="row">
                    <h2 style="padding-left: 20px;"><a href="/">theBIGnews</a></h2>

                </div>
            </div>
        </header> --}}

        @include('layouts.header')

        <div class="container-fluid" style="background-color:#FFF">
            @section('content')

            @show
        </div>
        <footer>
            <div class="container-fluid">
                <div class="row footer">
                    <div class="col-md-12">Copyright 2018</div>
                </div>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-listnav.js') }}"></script>
        <script>
            $("#myTags").listnav();
        </script>
    </body>
</html>