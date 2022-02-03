@extends('layout.admin')
@section('title', 'Dashboard')
@section('style')
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <style>
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            padding: 0.46875rem 0.75rem;
            height: calc(2.25rem + 2px);
        }
    </style>
@stop
@section('content')
    {{--    <div class="container mt-4">--}}
    {{--        <div class="card">--}}
    {{--            <div class="card-header mb-3"><h2--}}
    {{--                    class="text-center mt-3">{{\Illuminate\Support\Facades\Auth::user()->name}}</h2>--}}
    {{--            </div>--}}
    {{--            <div class="container">--}}
    {{--                @if ($errors->any())--}}
    {{--                    <div class="alert alert-danger">--}}
    {{--                        <ul>--}}
    {{--                            @foreach ($errors->all() as $error)--}}
    {{--                                <li>{{ $error }}</li>--}}
    {{--                            @endforeach--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                @endif--}}
    {{--                @if(session('message'))--}}
    {{--                    <div class="alert alert-success" role="alert">--}}
    {{--                        {{session('message')}}--}}
    {{--                    </div>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--            <div class="card-body">--}}
    {{--                <div class="row d-flex justify-content-around">--}}
    {{--                    <div class="card col-md-8 col-sm-12 p-3">--}}
    {{--                        <div class="card-body">--}}
    {{--                            <div class=" table-responsive">--}}
    {{--                                <table class="table table-bordered">--}}
    {{--                                    <thead>--}}
    {{--                                    <tr>--}}
    {{--                                        <th scope="col">{{__('words.title')}}</th>--}}
    {{--                                        <th scope="col">{{__('words.file')}}</th>--}}
    {{--                                        <th scope="col">{{__('words.work')}}</th>--}}
    {{--                                        <th scope="col">{{__('words.status')}}</th>--}}
    {{--                                        <th scope="col">{{__('words.condition')}}</th>--}}
    {{--                                        <th scope="col">{{__('words.action')}}</th>--}}
    {{--                                    </tr>--}}
    {{--                                    </thead>--}}
    {{--                                    <tbody>--}}
    {{--                                    @forelse($documents as $document)--}}
    {{--                                        <tr>--}}
    {{--                                            <td>{{$document->name}}</td>--}}
    {{--                                            <td><a href="{{asset($document->file)}}" style="font-size: 25px"><i--}}
    {{--                                                        class="far fa-file-pdf"></i></a></td>--}}
    {{--                                            @if($user->offer->count() > 0)--}}
    {{--                                                <td>{{$document->offer['name_'.session('locale')]}}</td>--}}
    {{--                                            @else--}}
    {{--                                                <td>{{__('words.no_work')}}</td>--}}
    {{--                                            @endif--}}
    {{--                                            <td>--}}
    {{--                                                {!! $document->status() !!}--}}
    {{--                                            </td>--}}
    {{--                                            <th>--}}
    {{--                                                {!! $document->getOfferStatus() !!}                                             </th>--}}
    {{--                                            <td>--}}
    {{--                                                <div class="btn-group">--}}
    {{--                                                    <a href="{{ route('admin.user.show', $document->id) }}" type="button"--}}
    {{--                                                       class="btn btn-primary btn-flat">--}}
    {{--                                                        <i class="fas fa-eye"></i>--}}
    {{--                                                    </a>--}}
    {{--                                                    @if($document->status == 'rad etilgan')--}}
    {{--                                                        <a href="{{ route('admin.user.edit', $document->id) }}" type="button"--}}
    {{--                                                           class="btn btn-success btn-flat">--}}
    {{--                                                            <i class="fas fa-edit"></i>--}}
    {{--                                                        </a>--}}
    {{--                                                    @endif--}}
    {{--                                                </div>--}}
    {{--                                            </td>--}}
    {{--                                        </tr>--}}
    {{--                                    @empty--}}
    {{--                                        <tr>--}}
    {{--                                            <td colspan="6">{{__('words.no_data')}}</td>--}}
    {{--                                        </tr>--}}
    {{--                                    @endforelse--}}
    {{--                                    </tbody>--}}
    {{--                                </table>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    @if($user->offer->count() > 0)--}}
    {{--                        <div class="card col-md-3 col-sm-12 p-3">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <div>--}}
    {{--                                    <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">--}}
    {{--                                        @csrf--}}
    {{--                                        <div class="d-flex flex-column">--}}
    {{--                                            <label for="name">{{__('words.title')}}</label>--}}
    {{--                                            <input required name="name" class="form-group form-control" type="text"--}}
    {{--                                                   placeholder="{{__('words.title')}}">--}}
    {{--                                        </div>--}}
    {{--                                        <div class="form-group">--}}
    {{--                                            <label>Menyuni oching</label>--}}
    {{--                                            <select class="form-control" id="offer" name="offer_id">--}}
    {{--                                                @foreach($user->offer as $offer)--}}
    {{--                                                    @if($documents->count() > 0)--}}
    {{--                                                        @if(!in_array($offer->id, $documents->pluck('offer_id')->toArray()))--}}
    {{--                                                            <option value="{{$offer->id}}">{{$offer->name_uz}}</option>--}}
    {{--                                                        @endif--}}
    {{--                                                    @else--}}
    {{--                                                        <option value="{{$offer->id}}">{{$offer->name_uz}}</option>--}}
    {{--                                                    @endif--}}
    {{--                                                @endforeach--}}
    {{--                                            </select>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="d-flex flex-column mb-3">--}}
    {{--                                            <label for="file">{{__('words.file')}}</label>--}}
    {{--                                            <input required id="file" name="file" type="file" class="filepond">--}}
    {{--                                        </div>--}}
    {{--                                        <input type="submit" class="btn btn-primary" value="{{__('words.send')}}">--}}
    {{--                                    </form>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="row">

        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Dashboard</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$news->count()}}</h3>

                            <p>Yangi loyihalarlar</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-folder-open"></i>
                        </div>
                        <a href="#" class="small-box-footer">Ko'proq <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            {{--                <div class="col-lg-3 col-6">--}}
            {{--                    <!-- small box -->--}}
            {{--                    <div class="small-box bg-warning">--}}
            {{--                        <div class="inner">--}}
            {{--                            <h3>{{$progress->count()}}</h3>--}}

            {{--                            <p>Jarayondagi hujjatlar</p>--}}
            {{--                        </div>--}}
            {{--                        <div class="icon">--}}
            {{--                            <i class="fas fa-tasks"></i>--}}
            {{--                        </div>--}}
            {{--                        <a href="#" class="small-box-footer">Ko'proq <i class="fas fa-arrow-circle-right"></i></a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$reject->count()}}</h3>
                            <p>Rad etilganlar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">Ko'proq <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$done->count()}}</h3>
                            <p>Realizatsiyaga o`tkazilganlar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">Ko'proq <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yangi loyihalar</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nomi</th>
                            <th>Fayl</th>
                        </tr>
                        @forelse($news as $new)
                            <tr>
                                <td>
                                    <a href="{{route('admin.user.show',$new->id)}}">{{$new->name}}</a>
                                </td>
                                <td>
                                    <a href="{{asset($new->file)}}"><i class="fas fa-file-pdf"></i> Yuklash</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">
                                    <p class="text-center">Yangi loyihalar yo'q</p>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Rad etilganlar loyihalar</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nomi</th>
                            <th>Fayl</th>
                        </tr>
                        @forelse($reject as $rej)
                            <tr>
                                <td>
                                    <a href="{{route('admin.user.show',$rej->id)}}">{{$rej->name}}</a>
                                </td>
                                <td>
                                    <a href="{{asset($rej->file)}}"><i class="fas fa-file-pdf"></i> Yuklash</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">
                                    <p class="text-center">Rad etilganlar loyihalar yo'q</p>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h3 class="card-title">Loyihalar grafikasi</h3>--}}
{{--                    <div class="card-tools">--}}
{{--                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">--}}
{{--                            <i class="fas fa-minus"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-body table-responsive">--}}
{{--                    <table class="table">--}}
{{--                        <div id="piechart" style="width: 900px; height: 500px;"></div>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@stop
{{--@section('script')--}}
{{--    <script type="text/javascript" src="{{asset('dashboard/dist/js/chart.js')}}"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        google.charts.load('current', {'packages': ['corechart']});--}}
{{--        google.charts.setOnLoadCallback(drawChart);--}}

{{--        function drawChart() {--}}

{{--            var data = google.visualization.arrayToDataTable([--}}
{{--                ['Task', 'Hours per Day'],--}}
{{--                ['Yangi loyihalar', {{$news->count()}}],--}}
{{--                ['Rad etilgan loyihalar', {{$reject->count()}}],--}}
{{--                ['Shartnomali loyihalar', {{$shartnoma}}],--}}
{{--                ['Ekologik ko`rikdagi loyihalar', {{$ecokorik}}],--}}
{{--                ['Auksiondagi loyihalar', {{$auksion}}],--}}
{{--                ['Realizatsiya qilingan loyihalar', {{$done->count()}}],--}}
{{--            ]);--}}

{{--            var options = {--}}
{{--                title: 'Loyihalar'--}}
{{--            };--}}

{{--            var chart = new google.visualization.PieChart(document.getElementById('piechart'));--}}

{{--            chart.draw(data, options);--}}
{{--        }--}}
{{--    </script>--}}
{{--@stop--}}
