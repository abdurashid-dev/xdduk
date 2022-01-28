@extends('layout.admin')
@section('title', 'Page show')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sahifa namoyishi</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Sahifalar</a></li>
                <li class="breadcrumb-item active">Sahifa namoyishi</li>
            </ol>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $page->id }}</td>
                                </tr>
                                <tr>
                                    <th>Menyusi</th>
                                    <td>{{ $page->menu->name_uz }}</td>
                                </tr>
                                <tr>
                                    <th>Nomi uz</th>
                                    <td>{{ $page->name_uz }}</td>
                                </tr>
                                <tr>
                                    <th>Nomi ru</th>
                                    <td>{{ $page->name_ru }}</td>
                                </tr>
                                <tr>
                                    <th>Nomi en</th>
                                    <td>{{ $page->name_en }}</td>
                                </tr>
                                <tr>
                                    <th>URL</th>
                                    <td>{{ $page->slug }}</td>
                                </tr>
                                <tr>
                                    <th>
                                        Kontent uz
                                    </th>
                                    <td>
                                        {!! $page->content_uz !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Kontent ru
                                    </th>
                                    <td>
                                        {!! $page->content_ru !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Kontent en
                                    </th>
                                    <td>
                                        {!! $page->content_en !!}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
