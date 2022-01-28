@extends('layout.admin')
@section('title')
    Ma'lumotlar
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 p-3">
                            <h1 class="card-title">Ma'lumotlar</h1>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('admin.settings.edit', $settings->id)}}" class="btn btn-block btn-success">
                                <i class="bi bi-pencil"></i>  Tahrirlash
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th>Nomi</th>
                            <th>Qiymati</th>
                        </tr>
                        <tr>
                            <td>Nomi Uz</td>
                            <td>{{$settings->name_uz}}</td>
                        </tr>
                        <tr>
                            <td>Nomi En</td>
                            <td>{{$settings->name_en}}</td>
                        </tr>
                        <tr>
                            <td>Nomi Ru</td>
                            <td>{{$settings->name_ru}}</td>
                        </tr>
                        <tr>
                            <td>Manzil Uz</td>
                            <td>{{$settings->address_uz}}</td>
                        </tr>
                        <tr>
                            <td>Manzil En</td>
                            <td>{{$settings->address_en}}</td>
                        </tr>
                        <tr>
                            <td>Manzil Ru</td>
                            <td>{{$settings->address_ru}}</td>
                        </tr>
                        <tr>
                            <td>Telefon raqam</td>
                            <td>{{$settings->number}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$settings->email}}</td>
                        </tr>
                        <tr>
                            <td>Biz haqimizda (uzbek)</td>
                            <td>{{$settings->about_uz}}</td>
                        </tr>
                        <tr>
                            <td>Biz haqimizda (english)</td>
                            <td>{{$settings->about_en}}</td>
                        </tr>
                        <tr>
                            <td>Biz haqimizda (russia)</td>
                            <td>{{$settings->about_ru}}</td>
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
