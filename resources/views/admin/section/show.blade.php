@extends('layout.admin')
@section('title')
Section show
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">Hududiy boʻlinmalar</h3>
                    </div>
                    <div class="col-md-2">
                        <a type="button" href="{{ route('admin.sections.index') }}"
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
                        <td>{{ $section->id }}</td>
                    </tr>
                    <tr>
                        <th>FIO</th>
                        <td>
                            {{ $section->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $section->email }}</td>
                    </tr>
                    <tr>
                        <th>Telefon raqami</th>
                        <td>{{ $section->number }}</td>
                    </tr>
                    <tr>
                        <th>Lavozimi</th>
                        <td>{{ $section->position }}</td>
                    </tr>
                    <tr>
                        <th>Ish vaqtlari (uz)</th>
                        <td>{{ $section->time_uz }}</td>
                    </tr>
                    <tr>
                        <th>Ish vaqtlari (en)</th>
                        <td>{{ $section->time_en }}</td>
                    </tr>
                    <tr>
                        <th>Ish vaqtlari (ru)</th>
                        <td>{{ $section->time_ru }}</td>
                    </tr>
                    <tr>
                        <th>Ma'lumot UZ</th>
                        <td>
                            {!! $section->bio_uz !!}
                        </td>
                    </tr>
                    <tr>
                        <th>Ma'lumot RU</th>
                        <td>
                            {!! $section->bio_ru !!}
                        </td>
                    </tr>
                    <tr>
                        <th>Ma'lumot EN</th>
                        <td>
                            {!! $section->bio_en !!}
                        </td>
                    </tr>
                    <tr>
                        <th>Rasm</th>
                        <td>{!! $section->getImage('width:200px') !!}</td>
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
