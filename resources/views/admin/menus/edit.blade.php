@extends('layout.admin')
@section('title')
    Menu Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.menus.index') }}" class="btn btn-block btn-primary ">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Menyuni tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.menus.update', $menu)}}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="icon">Nomi Uz</label>
                            <input type="text" required class="form-control" name="name_uz"
                                   value="{{$menu->name_uz}}">
                        </div>
                        @error ('name_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Nomi En</label>
                            <input type="text" required class="form-control" name="name_en"
                                   value="{{$menu->name_en}}">
                        </div>
                        @error ('name_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Nomi Ru</label>
                            <input type="text" required class="form-control" name="name_ru"
                                   value="{{$menu->name_ru}}">
                        </div>
                        @error ('name_ru')
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

