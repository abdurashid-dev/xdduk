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
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>{{__('words.successfully_sent')}}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="contact-form">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('text')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="fname" name="name"
                                       placeholder="{{__('words.name')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="sname" id="lname"
                                       placeholder="{{__('words.surname')}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="tel" id="phone" class="form-control" name="phone" id="phone"
                                       placeholder="{{__('words.phone')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="{{__('words.email')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="matn" rows="3"
                                      placeholder="{{__('words.message')}} ..." name="text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="d-block text-bold">Captcha</label>
                            <div id="captcha-img">{!! captcha_img() !!}</div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="captcha" class="form-control"
                                   placeholder="{{__('words.captcha')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Yuborish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Content end-->
@stop
@section('script')
    <script>
        var phone = document.getElementById("phone");
        var res = new Inputmask("+\\9\\98(99)999-99-99", {'clearIncomplete': true});
        res.mask(phone);
    </script>
@stop
