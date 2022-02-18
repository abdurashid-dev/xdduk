@extends('layout.admin')
@section('title')
    Video tahrirlash
@endsection
@section('content')
    <a href="{{route('admin.videos.index')}}" class="btn-primary btn btn-sm mb-3"><i class="bi bi-arrow-left-short"></i> Orqaga</a>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Videoni tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.videos.update', $video->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nomi</label>
                            <input type="text" required class="form-control" name="name" placeholder="Nomi ni kiriting" value="{{ $video->name }}">
                        </div>
                        @error ('name')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" required class="form-control" name="link" placeholder="Link ni kiriting" value="{{ $video->link }}">
                        </div>
                        @error ('link')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
