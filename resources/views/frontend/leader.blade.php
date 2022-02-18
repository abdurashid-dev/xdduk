@extends('layout.frontend')
@section('content')
    <!--Content-->
    <div class="content">
        <div class="bg"></div>
        <div class="container">
            <div class="side-bar">
                <div class="side-bar__items">
                    @foreach($randomPages as $page)
                        <div class="side-bar__items--item">
                            <h5 class="title">
                                <a href="{{route('page',$page->slug)}}">{{$page->getValue('name')}}</a>
                            </h5>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="main-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('words.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('leaders')}}">{{__('words.leaders')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$leader->getValue('name')}}</li>
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
                    <h5 class="main-content__top--title">{{$leader->getValue('name')}}</h5>
                    <p class="date">{{$leader->created_at->format('m/d/Y')}}</p>
                </div>
                <div class="main-content__bottom mb-4">
                    <div class="main-content__bottom--img mt-3">
                        {!! $leader->getImage('image') !!}
                    </div>
                    <p class="desc">
                        {!! $leader->getValue('bio') !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--Content end-->
@stop
