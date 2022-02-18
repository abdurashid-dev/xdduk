@extends('layout.admin')
@section('title', 'Edit User');
@section('style')
    <!-- Filepond stylesheet -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
@stop
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Loyihani tahrirlash</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user.table') }}">Loyihalar</a></li>
                <li class="breadcrumb-item active">Loyihani tahrirlash</li>

            </ol>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.user.update', $doc->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">{{__('words.title')}}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$doc->name}}">
                </div>
                <div class="form-group">
                    <label for="offer">{{__('words.work')}}</label>
                    <input type="text" disabled class="form-control" id="offer"
                           value="{{$doc->offer['name_'.session('locale')]}}">
                </div>
                <div class="form-group mb-3">
                    <label for="file">{{__('words.file')}}</label>
                    <input type="file" class="filepond" name="file" id="file" value="{{$doc->file}}">
                </div>
                <input type="submit" class="btn btn-primary mt-4" value="{{__('words.edit')}}">
            </form>
        </div>
    </div>
@stop
@section('script')
    <!-- Load FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        const inputElement = document.querySelector('input[id="file"]');
        const pond = FilePond.create(inputElement, {
            labelIdle: 'Loyihani yuklang <span class="filepond--label-action">Tanlash.</span>',
        });
        FilePond.setOptions({
            server: {
                url: '/admin/upload-file/update',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
            }
        });
    </script>
@stop

