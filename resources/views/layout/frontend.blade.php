<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/fa/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    {{-- SEO TOOLS --}}
    {!! SEO::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! JsonLd::generate() !!}
    @yield('style')
</head>

<body>
<div id="preloader">
    <div id="loader"></div>
</div>
<div class="goTop"></div>

<!--Navigation-->
<div class="navigation">
    <div class="navigation__top">
        <div class="container">
            <div class="accessibility">
                <div class="font-change" id="btn-increase">
                    <i class="fas fa-search-plus"></i>
                </div>
                <div class="font-change" id="btn-orig">
                    <i class="fas fa-search"></i>
                </div>
                <div class="font-change" id="btn-decrease">
                    <i class="fas fa-search-minus"></i>
                </div>
            </div>
            <div class="wrap">
                <div class="langs">
                    <a href="{{route('locale','uz')}}"
                       class="lang {{(session('locale') == 'uz')? 'active':''}}">O'zbek</a>
                    <a href="{{route('locale','ru')}}"
                       class="lang {{(session('locale') == 'ru')? 'active':''}}">Русский</a>
                    <a href="{{route('locale','en')}}"
                       class="lang {{(session('locale') == 'en')? 'active':''}}">English</a>
                </div>
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <div class="user">
                            <div class="dropdown">
                                <button class="user-link" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('login')}}"><i
                                            class="far fa-address-card"></i> {{__('words.profile')}}</a>
                                    <form id="logout-form" class="mr-3"
                                          action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="dropdown-item btn btn-sm btn-secondary"
                                                onclick="return confirm('Ishonchingiz komilmi?')">
                                            <i class="fas fa-sign-out-alt"></i>
                                            {{__('words.logout')}}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                @guest
                    <a href="{{route('login')}}" class="ml-2">
                        <i class="fas fa-sign-in-alt"></i> {{__('words.login')}}
                    </a>
                @endauth
            </div>
        </div>
    </div>
    <div class="navigation__main">
        <div class="container">
            <div class="row mb-2 stroke">
                <div class="col-md-6 d-flex align-items-center mb-2">
                    <a href="{{route('index')}}" class="logo">
                        <img src="{{asset('frontend/img/logo.png')}}" alt="logo">
                        <div class="logo__title">
                            <p class="text-muted md:text-xl font-weight-bold">{{__('words.uz')}}</p>
                            <p class="font-weight-bold text-uppercase text-dark text-2xl md:text-3xl">
                                {{$setting['name_'.session('locale')]}}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                    <div class="details">
                        <div class="details__links">
                            <p>
                                <i class="fas fa-phone-square-alt"></i>
                                {{__('words.phone')}}: <a href="tel:{{$setting->number}}">{{$setting->number}}</a>
                            </p>
                            <p>
                                <i class="fas fa-envelope-open-text"></i>
                                {{__('words.email')}}: <a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <span style="width: 50%; line-height: 14px">
{{--                <marquee><i class="text-danger">{{__('words.test_text')}} !</i></marquee>--}}
                </span>
            </div>
            <!-- <div class="row">
           <div class="col-md-6 d-flex align-items-center">
              <form class="form-inline my-2 my-lg-0">
                 <div class="search" id="search">
                    <input type="text" class="form-control input-sm" maxlength="64" placeholder="Search" />
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"
                          aria-hidden="true"></i></button>
                 </div>
              </form>
           </div>
           <div class="col-md-6 d-flex align-items-center justify-content-start justify-content-md-end">
              <div class="social">
                 <a href="#" class="social__link"><i class="fab fa-facebook"></i></a>
                 <a href="#" class="social__link"><i class="fab fa-instagram"></i></a>
                 <a href="#" class="social__link"><i class="fab fa-twitter"></i></a>
                 <a href="#" class="social__link"><i class="fab fa-telegram"></i></a>
                 <a href="#" class="social__link"><i class="fab fa-whatsapp"></i></a>
              </div>
           </div>
        </div> -->
        </div>
    </div>
    <div class="navigation__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        {{--                        <li class="nav-item dropdown">--}}
                        {{--                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"--}}
                        {{--                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--                                QO'MITA HAQIDA--}}
                        {{--                            </a>--}}
                        {{--                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                        {{--                                <a class="dropdown-item" href="#">Action Something else here Something</a>--}}
                        {{--                                <a class="dropdown-item" href="#">Another action</a>--}}
                        {{--                                <a class="dropdown-item" href="#">Something else here</a>--}}
                        {{--                                <a class="dropdown-item" href="#">Action Something else here Something</a>--}}
                        {{--                                <a class="dropdown-item" href="#">Another action</a>--}}
                        {{--                                <a class="dropdown-item" href="#">Something else here</a>--}}
                        {{--                                <a class="dropdown-item" href="#">Action Something else here Something</a>--}}
                        {{--                                <a class="dropdown-item" href="#">Another action</a>--}}
                        {{--                                <a class="dropdown-item" href="#">Something else here</a>--}}
                        {{--                            </div>--}}
                        {{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('leaders')}}">{{__('words.leaders')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('news')}}">{{__('words.news')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('offers')}}">{{__('words.projects')}}</a>
                        </li>
                        @foreach($menus as $menu)
                            @if($menu->page->count() > 0)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $menu['name_'.session('locale')] }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($menu->page as $page)
                                            <a class="dropdown-item"
                                               href="{{route('page', $page->slug)}}">{{ $page['name_'.session('locale')] }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="{{route('page', $page->slug)}}">{{ $menu['name_'.session('locale')] }}</a>
                                </li>
                            @endif
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">{{__('words.contact')}}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!--Navigation end-->

<!--Banner-->
<!-- <div class="banner">
<div class="container">
  <div class="banner__title">
     <h3 class="text-light text-center font-weight-bold">O`ZBEKISTON RAQAMLARDA</h3>
     <h5 class="text-white text-center font-weight-bold">(2021- yil yanvar-sentabr holatiga)</h5>
  </div>
  <div class="banner__main">
     <div class="banner__main--item">
        <img src="img/png/001-pie-chart.png">
        <div class="text">
           <h5 class="text-light">YALPI ICHKI MAHSULOT</h5>
           <p>106,9% <i class="fas fa-caret-up"></i></p>
           <p>2020- yilning yanvar-sentabr oyiga nisbatan foizda</p>
        </div>
     </div>
     <div class="banner__main--item">
        <img src="img/png/010-stock-market-3.png">
        <div class="text">
           <h5 class="text-light">SANOAT</h5>
           <p>106,9% <i class="fas fa-caret-up"></i></p>
           <p>2020- yilning yanvar-sentabr oyiga nisbatan foizda</p>
        </div>
     </div>
     <div class="banner__main--item">
        <img src="img/png/002-diagram.png">
        <div class="text">
           <h5 class="text-light">QISHLOQ O`RMON VA BALIQ XO`JALIGI</h5>
           <p>106,9% <i class="fas fa-caret-up"></i></p>
           <p>2020- yilning yanvar-sentabr oyiga nisbatan foizda</p>
        </div>
     </div>
     <div class="banner__main--item">
        <img src="img/png/011-clipboard.png">
        <div class="text">
           <h5 class="text-light">YALPI ICHKI MAHSULOT</h5>
           <p>106,9% <i class="fas fa-caret-up"></i></p>
           <p>2020- yilning yanvar-sentabr oyiga nisbatan foizda</p>
        </div>
     </div>
     <div class="banner__main--item">
        <img src="img/png/004-presentation.png">
        <div class="text">
           <h5 class="text-light">YALPI ICHKI MAHSULOT</h5>
           <p>106,9% <i class="fas fa-caret-up"></i></p>
           <p>2020- yilning yanvar-sentabr oyiga nisbatan foizda</p>
        </div>
     </div>
     <div class="banner__main--item">
        <img src="img/png/005-pie-chart-1.png">
        <div class="text">
           <h5 class="text-light">YALPI ICHKI MAHSULOT</h5>
           <p>106,9% <i class="fas fa-caret-up"></i></p>
           <p>2020- yilning yanvar-sentabr oyiga nisbatan foizda</p>
        </div>
     </div>
     <div class="banner__main--item">
        <img src="img/png/006-folder.png">
        <div class="text">
           <h5 class="text-light">YALPI ICHKI MAHSULOT</h5>
           <p>106,9% <i class="fas fa-caret-up"></i></p>
           <p>2020- yilning yanvar-sentabr oyiga nisbatan foizda</p>
        </div>
     </div>
     <div class="banner__main--item">
        <img src="img/png/007-stock-market.png">
        <div class="text">
           <h5 class="text-light">YALPI ICHKI MAHSULOT</h5>
           <p>106,9% <i class="fas fa-caret-up"></i></p>
           <p>2020- yilning yanvar-sentabr oyiga nisbatan foizda</p>
        </div>
     </div>
     <div class="banner__main--item">
        <img src="img/png/008-stock-market-1.png">
        <div class="text">
           <h5 class="text-light">YALPI ICHKI MAHSULOT</h5>
           <p>106,9% <i class="fas fa-caret-up"></i></p>
           <p>2020- yilning yanvar-sentabr oyiga nisbatan foizda</p>
        </div>
     </div>
     <div class="banner__main--item">
        <img src="img/png/009-stock-market-2.png">
        <div class="text">
           <h5 class="text-light">YALPI ICHKI MAHSULOT</h5>
           <p>106,9% <i class="fas fa-caret-up"></i></p>
           <p>2020- yilning yanvar-sentabr oyiga nisbatan foizda</p>
        </div>
     </div>

  </div>
</div>
</div> -->
<!--Banner end-->
@yield('content')


<!--Usefull-->
<div class="usefull">
    <h5 class="text-center"><span>{{__('words.useful links')}}</span></h5>
    <div class="wrapper">
        <div class="owl-carousel owl-theme">
            @foreach($links as $link)
                <div class="item">
                    <a href="{{$link->link}}" target="_blank">
                        <img src="{{asset($link->image)}}" alt="{{$link['title_'.session('locale')]}}">
                        <p>{{$link['title_'.session('locale')]}}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="prev"></div>
        <div class="next"></div>
    </div>
</div>
<!--Usefull end-->

<!--Footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                <a href="{{route('index')}}" class="logo">
                    <div class="logo__title">
                        <p class="font-weight-bold text-uppercase text-light text-2xl md:text-3xl">
                            {{$setting->name_uz}}</p>
                    </div>
                </a>
                <h5 class="title">{{__('words.about')}}</h5>
                <p class="desc">{{$setting['about_'.session('locale')]}}</p>
            </div>
            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                <h5 class="text-light">{{__('words.useful links')}}</h5>
                <ul>
                    @foreach($links as $link)
                        <li><a href="{{$link->link}}" target="_blank"
                               style="text-transform: uppercase">{{$link['title_'.session('locale')]}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                <h5 class="text-light">{{__('words.contact')}}</h5>
                <p>{{__('words.address')}}: {{$setting['address_'.session('locale')]}}</p>
                <p>{{__('words.phone')}}: <a href="tel:{{$setting->number}}" class="number">{{$setting->number}}</a>
                <p>{{__('words.email')}}: <a href="mailto:{{$setting->email}}" class="email">{{$setting->email}}</a>
                </p>
                <p>{{$setting['name_'.session('locale')]}}</p>
            </div>
            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5991.046338927871!2d69.262698!3d41.340981!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaf8d20d341c7df9c!2zNDHCsDIwJzI3LjUiTiA2OcKwMTUnNDUuNyJF!5e0!3m2!1suz!2s!4v1643279931887!5m2!1suz!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
<!--Footer end-->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/darkmode-js.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('frontend/js/inputmask.js')}}"></script>
@yield('script')
</body>

</html>
