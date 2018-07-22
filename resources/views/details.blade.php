@extends('layouts.app')

@section('banner')
    <div class="row">
        <img src="{{ asset('images/thebignews.jpg') }}" alt="thebignews" class="banner img-fluid">
    </div>
@endsection

@section('content')

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

@endsection

@push('js')
    <script>
        $( "img" ).addClass( "img-fluid" );
    </script>
@endpush