@extends('layout.admin')
@section('title')
    Links Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.links.index') }}" class="btn btn-block btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Foydali linkni tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.links.update', $link->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="icon">Sarlavha Uz</label>
                            <input type="text" required class="form-control" name="title_uz"
                                   placeholder="Sarlavha (uz) kiriting" value="{{$link->title_uz}}">
                        </div>
                        @error ('title_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha En</label>
                            <input type="text" required class="form-control" name="title_en"
                                   placeholder="Sarlavha (en) kiriting" value="{{$link->title_en}}">
                        </div>
                        @error ('title_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha Ru</label>
                            <input type="text" required class="form-control" name="title_ru"
                                   placeholder="Sarlavha (ru) kiriting" value="{{$link->title_ru}}">
                        </div>
                        @error ('title_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon" class="d-block">Eski rasmi</label>
                            {!! $link->getImage() !!}
                        </div>
                        <div class="form-group">
                            <label for="icon">Rasm</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        @error ('image')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror

                        <div class="form-group">
                            <label for="icon">Link</label>
                            <input type="text" required class="form-control" name="link"
                                   placeholder="Link kiriting" value="{{$link->link}}">
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

