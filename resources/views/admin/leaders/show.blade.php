@extends('layout.admin')
@section('title')
Leader show
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">Rahbar namoyishi</h3>
                    </div>
                    <div class="col-md-2">
                        <a type="button" href="{{ route('admin.leaders.index') }}"
                            class="btn btn-block btn-primary btn-sm">
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
                        <td>{{ $leader->id }}</td>
                    </tr>
                    <tr>
                        <th>FIO (uz)</th>
                        <td>
                            {{ $leader->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>FIO (en)</th>
                        <td>
                            {{ $leader->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>FIO (ru)</th>
                        <td>
                            {{ $leader->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $leader->email }}</td>
                    </tr>
                    <tr>
                        <th>Telefon raqami</th>
                        <td>{{ $leader->number }}</td>
                    </tr>
                    <tr>
                        <th>Lavozimi (uz)</th>
                        <td>{{ $leader->position_uz }}</td>
                    </tr>
                    <tr>
                        <th>Lavozimi (en)</th>
                        <td>{{ $leader->position_en }}</td>
                    </tr>
                    <tr>
                        <th>Lavozimi (ru)</th>
                        <td>{{ $leader->position_ru }}</td>
                    </tr>
                    <tr>
                        <th>Ish vaqtlari (uz)</th>
                        <td>{{ $leader->time_uz }}</td>
                    </tr>
                    <tr>
                        <th>Ish vaqtlari (en)</th>
                        <td>{{ $leader->time_en }}</td>
                    </tr>
                    <tr>
                        <th>Ish vaqtlari (ru)</th>
                        <td>{{ $leader->time_ru }}</td>
                    </tr>
                    <tr>
                        <th>Ma'lumot UZ</th>
                        <td>
                            {!! $leader->bio_uz !!}
                        </td>
                    </tr>
                    <tr>
                        <th>Ma'lumot RU</th>
                        <td>
                            {!! $leader->bio_ru !!}
                        </td>
                    </tr>
                    <tr>
                        <th>Ma'lumot EN</th>
                        <td>
                            {!! $leader->bio_en !!}
                        </td>
                    </tr>
                    <tr>
                        <th>Rasm</th>
                        <td>{!! $leader->getLeaderImage('width:200px') !!}</td>
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
