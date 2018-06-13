@extends('layouts.app')

@section('content')

    <div class="row">
        <img src="{{ asset('images/thebignews.jpg') }}" alt="thebignews" class="banner img-fluid">
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8 mt-3">
                    <h2>{{ $feed->title }}</h2>
                    <p>{{ $feed->pub_date }}</p>
                    <h5 id="thumbnail-label" style="color:#005a8c">
                        <?php
                            $tags=explode(',',$feed->category);
                        ?>
                        @foreach ($tags as $k => $v)
                        <span class="tags"><a href="{!! url('/tag/'.$v); !!}">{{$v}}</a></span>
                        @endforeach
                    </h5>

                    <p>
                        {!! $feed->content !!}
                    </p>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>

@endsection