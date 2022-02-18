@extends('layout.admin')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3>{{$links}}</h3>

                            <p>Foydali havolalar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-link"></i>
                        </div>
                        <a href="{{route('admin.links.index')}}" class="small-box-footer">Ko'proq <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3>{{$news}}</h3>

                            <p>Yangiliklar</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <a href="{{route('admin.blogs.index')}}" class="small-box-footer">Ko'proq <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-warning">
                        <div class="inner">
                            <h3>{{ $videos }}</h3>

                            <p>Videolar</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-youtube"></i>
                        </div>
                        <a href="{{route('admin.videos.index')}}" class="small-box-footer">Ko'proq <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-danger">
                        <div class="inner">
                            <h3>{{$sliders}}</h3>
                            <p>Slayderlar</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-slideshare"></i>
                        </div>
                        <a href="{{route('admin.sliders.index')}}" class="small-box-footer">Ko'proq <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="row">
        <div class="col-md-5 col-sm-12">
            <!-- PRODUCT LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yangi xabarlar</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @forelse($contacts as $new)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{asset('defaultAvatar.png')}}" alt="Product Image" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="{{route('admin.contact.show', $new->id)}}"
                                       class="product-title">{{$new->name}}
                                        <span
                                            class="badge badge-primary float-right">{{$new->updated_at->diffForHumans()}}</span></a>
                                    <span class="product-description">
                                        {{$new->email}}
                                    </span>
                                </div>
                            </li>
                        @empty
                            <p class="text-center">Yangi xabarlar yo'q</p>
                        @endforelse
                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="{{route('admin.contact')}}" class="uppercase">Barcha xabarlarni ko`rish</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Slayderlar</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @forelse($sliderss as $key => $slider)
                                <div class="carousel-item {{($key == 0)? 'active':''}}" data-bs-interval="5000">
                                    <img src="{{asset($slider->image)}}" class="d-block w-100" alt="slider image">
                                </div>
                            @empty
                                <p class="text-center">Slayderlar yo'q</p>
                            @endforelse

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
