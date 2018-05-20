@extends('layouts.app')

@section('content')

    <div class="row">
        <img src="{{ asset('images/thebignews.jpg') }}" alt="thebignews" class="img-responsive">
    </div>

    <div class="row" style="padding-top:20px">
        <div class="col-md-8 boby-pd">

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

@endsection
