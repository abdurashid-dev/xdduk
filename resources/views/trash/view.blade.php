@extends('layout.admin')
@section('title', 'Trash')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Arxiv</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.trash') }}">Arxiv</a></li>
                <li class="breadcrumb-item active">{{$user->name}}</li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Arxiv</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>MCHJ nomi</th>
                            <th>Email</th>
                            <th>O'chirilgan vaqti</th>
                        </tr>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->updated_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Hujjatlar</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Yuborilgan loyihalar nomi</th>
                            <th>Biriktirilgan hujjatlar nomi</th>
                            <th>Yuklab olish</th>
                        </tr>
                        @foreach($documents as $document)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $document->name }}</td>
                                <td>{{ $document->offer->name_uz }}</td>
                                <td><a target="_blank" href="{{ asset($document->file) }}"><i class="fas fa-file-pdf"></i> Yuklab olish</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
