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
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-3935599736267366"
     data-ad-slot="2217676837"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

    <p>
        {!! $feed->content !!}
    </p>



@endsection

@push('js')
    <script>
        $( "img" ).addClass( "img-fluid" );
    </script>
@endpush