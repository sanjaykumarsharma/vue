@extends('layouts.app')

@push('js')
    <link href="{{ asset('css/list-nav.css') }}" rel="stylesheet">
@endpush

@section('banner')
    <div class="row">
        <img src="{{ asset('images/thebignews.jpg') }}" alt="thebignews" class="banner img-fluid">
    </div>
@endsection

@section('content')

    <div class="row">
        <ul id="myTags" class="demo">
            @foreach ($tags as $tag)
                <li><a href="{!! url('/tag/'.$tag->tag); !!}">{{$tag->tag}}</a></li>
            @endforeach
        </ul>
    </div>

@endsection

@push('js')
    <script src="{{ asset('js/jquery-listnav.js') }}"></script>
    <script>
        $("#myTags").listnav();
    </script>
@endpush