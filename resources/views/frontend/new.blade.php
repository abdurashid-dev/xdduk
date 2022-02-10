@extends('layout.frontend')
@section('content')
    <!--Content-->
    <div class="content">
        <div class="bg"></div>
        <div class="container">
            <div class="side-bar">
                <div class="side-bar__items">
                    @foreach($allNews as $item)
                        <div class="side-bar__items--item">
                            <h5 class="title">
                                <a href="{{route('new', $item->id)}}">{{$item['title_'.session('locale')]}}</a>
                            </h5>
                            <p class="date">13/12/2021</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="main-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('words.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('news')}}">{{__('words.news')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$new['title_'.session('locale')]}}</li>
                    </ol>
                </nav>
                <div class="options">
                    <div class="social">
                        @foreach($socials as $social)
                            <a href="{{$social->link}}" class="social__link"><i class="{{$social->icon}}"></i></a>
                        @endforeach
                    </div>
                    <button class="print-btn" onclick="window.print()">
                        <i class=" fas fa-print"></i>
                    </button>
                </div>
                <div class="main-content__top">
                    <h5 class="main-content__top--title">{{$new['title_'.session('locale')]}}</h5>
                    <p class="date">{{$new->created_at->format('d/m/Y')}}</p>
                </div>
                <div class="main-content__bottom p-3">
                    <img class="mb-4" src="{{asset($new->image)}}" alt="{{$new['title_'.session('locale')]}}">
                    {!! $new['content_'.session('locale')] !!}
                </div>
            </div>
        </div>
    </div>
    <!--Content end-->
@stop
