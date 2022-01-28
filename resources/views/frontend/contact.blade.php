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
                                <a href="{{route('page',$page->slug)}}">{{$page['name_'.session('locale')]}}</a>
                            </h5>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="main-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{__('words.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('words.contact')}}</li>
                    </ol>
                </nav>
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <div class="contact-info__item">
                                <i class="fas fa-phone-square-alt"></i>
                                <a href="tel:{{$setting->number}}">{{$setting->number}}</a>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <div class="contact-info__item">
                                <i class="fas fa-envelope-open-text"></i>
                                <a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <div class="contact-info__item">
                                <i class="fas fa-map-marker-alt"></i>
                                <a href="https://www.google.com/maps/place/{{$setting['address_'.session('locale')]}}">{{$setting['address_'.session('locale')]}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="fname" placeholder="{{__('words.name')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="lname"
                                       placeholder="{{__('words.surname')}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" id="phone" placeholder="{{__('words.phone')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" id="email" placeholder="{{__('words.email')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="matn" rows="3"
                                      placeholder="{{__('words.message')}} ..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Yuborish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Content end-->
@stop
