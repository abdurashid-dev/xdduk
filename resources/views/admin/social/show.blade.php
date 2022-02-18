@extends('admin.layouts.app')
@section('title')
    Link show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Foydali link namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.links.index') }}" class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-arrow-left"></i> Orqaga
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th>#</th>
                            <td>{{ $link->id }}</td>
                        </tr>
                        <tr>
                            <th>Holati</th>
                            <td>{!! $link->getStatus() !!} </td>
                        </tr>
                        <tr>
                            <th>Sarlavha UZ</th>
                            <td>{{ $link->title_uz }}</td>
                        </tr>
                        <tr>
                            <th>Sarlavha EN</th>
                            <td>{{ $link->title_en }}</td>
                        </tr>
                        <tr>
                            <th>Sarlavha RU</th>
                            <td>{{ $link->title_ru }}</td>
                        </tr>
                        <tr>
                            <th>Link</th>
                            <td>{{$link->link}}</td>
                        </tr>
                        <tr>
                            <th>Ikonka</th>
                            <td>{!! $link->getIcon('font-size:xxx-large') !!}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
