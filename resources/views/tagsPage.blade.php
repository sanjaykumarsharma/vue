@extends('layouts.app')

@section('content')

    <div class="row">
        <img src="{{ asset('images/thebignews.jpg') }}" alt="thebignews" class="banner img-fluid">
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8 mt-3">

                <div class="row">
                    <ul id="myTags" class="demo">
                        @foreach ($tags as $tag)
                            <li><a href="{!! url('/tag/'.$tag->tag); !!}">{{$tag->tag}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>

@endsection
