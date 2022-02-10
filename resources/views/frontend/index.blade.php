@extends('layout.frontend')
@section('content')

    <style>

    </style>
    <!--Header Slider-->

    {{ view('frontend._slider', compact('sliders'))  }}

    <!--Header Slider end-->
    <!--News-->
    <div class="latest-news">
        <div class="container">
            <h5><span>{{__('words.news')}}</span></h5>
            <div class="row">
                @foreach($lastNews as $new)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="latest-news__item">
                            <img src="{{asset($new->image)}}" alt="{{$new['title_'.session('locale')]}}">
                            <h5 class="latest-news__item--title">
                                <a href="{{route('new',$new->id)}}">{{$new['title_'.session('locale')]}}</a>
                            </h5>
                            <p class="latest-news__item--date">{{$new->created_at->format('d/m/Y')}}</p>
                            <div class="latest-news__item--desc" style="word-break: break-all">{!!
                        \Illuminate\Support\Str::limit(strip_tags($new['content_'.session('locale')]),150) !!}</div>
                            <a href="{{route('new',$new->id)}}" class="latest-news__item--link">{{__('words.more')}}
                                ...</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--News end-->
    <!--All News-->
    <div class="all-news">
        <div class="container">
            <h5><span>{{__('words.news')}}</span></h5>
            <div class="row">
                @foreach($allNews as $new)
                    <div class="col-lg-6">
                        <div class="all-news__item">
                            <img src="{{asset($new->image)}}" class="all-news__item--img" alt="{{$new['title_'.session('locale')]}}">
                            <div class="all-news__item--text">
                                <h5 class="title">
                                    <a href="{{route('new', $new->id)}}">{{$new['title_'.session('locale')]}}</a>
                                </h5>
                                <div class="date" style="word-break: break-all">
                                </div>
                                <div class="latest-news__item--desc"
                                     style="font-size: 15px !important;">{!! \Illuminate\Support\Str::limit(strip_tags($new['content_'.session('locale')]), 200) !!}</div>
                                <a href="{{route('new', $new->id)}}" class="link">{{__('words.more')}}...</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{route('news')}}" class="btn-st">{{__('words.see all')}}</a>
        </div>
    </div>
    <!--All News end-->
    <!--Videos-->
    <div class="videos">
        <div class="container">
            <h5><span>{{__('words.videos')}}</span></h5>
            <div class="row">
                <div class="col-lg-9">
                    <div class="video-selected">
                        <div class="video-iframe">{!! ($video)? $video->link:'' !!}</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="video-thumbnails">
                        @foreach($videos as $video)
                            <div class="video-thumb">
                                <img src="https://source.unsplash.com/random/8" alt="{{$video->name}}">
                                {!! $video->link !!}
                                <h5 class="title">{{$video->name}}</h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Videos end-->
@stop
