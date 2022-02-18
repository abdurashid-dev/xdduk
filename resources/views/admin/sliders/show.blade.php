@extends('layout.admin')
@section('title')
    Slider show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Slayder namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.sliders.index') }}" class="btn btn-block btn-primary btn-sm">
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
                            <td>{{ $slider->id }}</td>
                        </tr>
                        <tr>
                            <th>Holati</th>
                            <td>{!! $slider->getStatus() !!} </td>
                        </tr>
                        <tr>
                            <th>Sarlavha UZ</th>
                            <td>{{ $slider->title_uz }}</td>
                        </tr>
                        <tr>
                            <th>Sarlavha EN</th>
                            <td>{{ $slider->title_en }}</td>
                        </tr>
                        <tr>
                            <th>Sarlavha RU</th>
                            <td>{{ $slider->title_ru }}</td>
                        </tr>
                        <tr>
                            <th>Ma'lumot UZ</th>
                            <td>{{ $slider->body_uz }}</td>
                        </tr>
                        <tr>
                            <th>Ma'lumot EN</th>
                            <td>{{ $slider->body_en }}</td>
                        </tr>
                        <tr>
                            <th>Ma'lumot RU</th>
                            <td>{{ $slider->body_ru }}</td>
                        </tr>
                        <tr>
                            <th>Rasm</th>
                            <td>{!! $slider->getImage('width:300px') !!}</td>
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
