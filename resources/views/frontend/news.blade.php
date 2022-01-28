@extends('layout.frontend')
@section('style')
    <style>
        .latest-news {
            margin-top: -200px !important;
        }
        .content::before {
            display: none !important;
        }
        .content::after {
            display: none !important;
        }
    </style>
@stop
@section('content')
    <!--Content-->
    <div class="content">
        <div class="latest-news">
            <div class="container">
                <h5><span>BARCHA YANGILIKLAR</span></h5>
                <div class="row">
                    @foreach($news as $new)
                        <div class="col-lg-3 col-md-4 col-sm-6 mt-3">
                            <div class="latest-news__item">
                                <img src="{{asset($new->image)}}">
                                <h5 class="latest-news__item--title">
                                    <a href="{{route('new', $new->id)}}">{{$new['title_'.session('locale')]}}</a>
                                </h5>
                                <p class="latest-news__item--date">{{$new->created_at->format('d/m/Y')}} • <a
                                        href="{{route('new', $new->id)}}">{{$new->category['name_'.session('locale')]}}</a>
                                </p>
                                <div class="latest-news__item--desc">
                                    {!! Str::limit(strip_tags($new['content_'.session('locale')]), 200) !!}
                                    <a href="{{route('new', $new->id)}}" class="latest-news__item--link">Batafsil
                                        ...</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="pagination" class="pagination-wrap">
                    {{$news->links()}}
                </nav>
            </div>
        </div>
    </div>
    <!--Content end-->
@stop
