@extends('layout.admin')
@section('title')
    Social media links edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.social.index') }}" class="btn btn-primary ">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ijtimoiy tarmoqlar linkini tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.social.update', $social->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nomi</label>
                            <input type="text" required class="form-control" name="name"
                                   placeholder="Nomini kiriting" value="{{$social->name}}">
                        </div>
                        @error ('name')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon" class="d-block">Eski ikonka</label>
                            {!! $social->getIcon() !!}
                        </div>
                        <div class="form-group">
                            <label for="icon">Ikonka</label>
                            <input type="text" required class="form-control" name="icon"
                                   placeholder="Ikonka klassini kiriting" value="{{$social->icon}}">
                        </div>
                        @error ('icon')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror

                        <div class="form-group">
                            <label for="icon">Link</label>
                            <input type="text" required class="form-control" name="link"
                                   placeholder="Link kiriting" value="{{$social->link}}">
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

