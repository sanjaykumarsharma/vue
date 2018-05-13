@extends('layouts.app')

@section('content')

    <div class="row">
        <img src="images/thebignews.jpg" alt="thebignews" class="img-responsive">
    </div>

    <div class="row">
        <div class="col-md-8 boby-pd">

            <div class="row">

                @foreach ($feeds as $feed)

                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 card grid-item">
                        <div class="thumbnail">
                        <div class="caption">
                            <p class="description">
                                <a href="{!! url($feed->slug); !!}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            @if(strlen($feed->image)>0)
                                                <img class="feed-img img-responsive" src="{{$feed->image}}">
                                            @else
                                                <img src="images/tbn.jpg" alt="thebignews" class="feed-img img-responsive">

                                            @endif
                                        </div>
                                            <div class="col-md-9"><p class="title">{{ $feed->title }}</p></div>
                                    </div>
                                </a>
                            </p>
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

                        </div>
                    </div>
                    @if ( ($loop->index+1) % 2 == 0)
                        </div><div class="row"> {{-- closing open div --}}
                    @endif

                @endforeach
                </div>

            <div class="row text-center">
                {{ $feeds->links() }}
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>

@endsection