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
                        <a href="{{route('admin.links.index')}}" class="small-box-footer">Ko'proq <i class="fas fa-arrow-circle-right"></i></a>
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
@endsection
