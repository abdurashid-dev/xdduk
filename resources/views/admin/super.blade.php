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
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{\App\Models\Document::where('status','yangi')->count()}}</h3>

                            <p>Yangi loyihalar</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="{{route('admin.documents.index')}}" class="small-box-footer">Ko'proq <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{\App\Models\Document::where('status', 'tasdiqlangan')->count()}}</h3>

                            <p>Tasdiqlanganlar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <a href="{{route('admin.documents.index')}}" class="small-box-footer">Ko'proq <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $users->count() }}</h3>
                            <p>MCHJ tashkilotlar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('admin.users.index')}}" class="small-box-footer">Ko'proq <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ \App\Models\Document::where('status', 'rad etilgan')->count() }}</h3>
                            <p>Rad etilganlar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <a href="{{route('admin.documents.index')}}" class="small-box-footer">Ko'proq <i
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
        <div class="col-sm-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hujjatlar grafikasi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <div id="piechart" style="width: 700px; height: 500px;"></div>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <!-- PRODUCT LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yangi loyihalar</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @foreach($newdocs as $new)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{asset('defaultAvatar.png')}}" alt="Product Image" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="{{route('admin.documents.show', $new->id)}}"
                                       class="product-title">{{$new->user->name}}
                                        <span
                                            class="badge badge-primary float-right">{{$new->updated_at->diffForHumans()}}</span></a>
                                    <span class="product-description">
                                        {{$new->offer->name_uz}}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="{{route('admin.documents.index')}}" class="uppercase">Barcha loyihalarni ko`rish</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@section('script')
    <!-- Chart js -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Whole year'],
                ['Tenderdagi loyihalar', {{$tender}}],
                ['Shartnomali loyihalr', {{$shartnoma}}],
                ['Auksiondagi loyihalar', {{$auksion}}],
                ['Ekologik ko`rikdagi loyihalar', {{$auksion}}],
                ['Realizatsiya qilingan loyihalar', {{$real}}],
            ]);

            var options = {
                title: 'Hujjatlar'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@stop
