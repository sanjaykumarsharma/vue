@extends('layouts.app')

@section('banner')
    <div class="row">
        <img src="{{ asset('images/thebignews.jpg') }}" alt="thebignews" class="banner img-fluid">
    </div>
@endsection

@section('content')

    <div class="row">

        @foreach ($feeds as $feed)

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 thumbnail p-3">
                    <a href="{!! url($feed->slug); !!}">
                        <div class="row">
                            <div class="col-3">
                                @if(strlen($feed->image)>0)
                                    <img class="feed-img img-fluid" src="{{$feed->image}}" alt="thebignews">
                                @else
                                    <img src="images/tbn.jpg" alt="thebignews" class="feed-img img-fluid">

                                @endif
                            </div>
                                <div class="col-9"><p class="title">{{ $feed->title }}</p></div>
                        </div>
                    </a>
                    <p>
                        {{$feed->pub_date}}

                        <a class="btn btn-default btn-sm read-more" href="{{ $feed->slug }}" role="button">Read More</a>
                    </p>
                    <h5 id="thumbnail-label" style="color:#005a8c">
                        <?php
                            $tags=explode(',',$feed->category);
                        ?>
                        @foreach ($tags as $k => $v)
                            <span class="tags"><a href="/tag/{{$v}}">{{$v}}</a></span>
                        @endforeach
                    </h5>
            </div>
            @if ( ($loop->index+1) % 2 == 0)
                </div><div class="row"> {{-- closing open div --}}
            @endif

        @endforeach
        </div>

        <div class="row mt-3 mb-3">
            <nav aria-label="navigation" class="table-responsive">
                {{$feeds->links('vendor.pagination.bootstrap-4')}}
            </nav>
        </div>

@endsection