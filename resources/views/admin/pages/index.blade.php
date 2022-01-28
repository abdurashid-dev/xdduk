@extends('layout.admin')
@section('title', 'Pages')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sahifalar</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Sahifalar</li>
            </ol>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sahifalar</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.pages.create') }}" class="btn btn-success">
                                    <i class="fa fa-plus"></i> Yangi qo'shish
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>T/R</th>
                                    <th>Sahifa nomi</th>
                                    <th>Harakatlar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ Str::limit($page->name_uz, 70) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.pages.show', $page->id) }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.pages.edit', $page->id) }}"
                                                   class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.pages.destroy', $page->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Ishonchingiz komilmi?')" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@stop
