@extends('layout.admin')
@section('title', 'Edit')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<a class="btn btn-primary mb-3" href="{{route('admin.sections.index')}}"><i class="fas fa-arrow-left"></i> Orqaga</a>
<form method="POST" action="{{ route('admin.sections.update', $section) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="name">FIO</label>
                <input type="text" required class="form-control" name="name" placeholder="FIO ni kiriting"
                    value="{{$section->name}}">
            </div>
            @error ('name')
            <p class="text-danger">* {{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="position">Lavozimi</label>
                <input type="text" required class="form-control" name="position" placeholder="Vazifasi kiriting"
                    value="{{$section->position}}">
            </div>
            @error ('position')
            <p class="text-danger">* {{$message}}</p>
            @enderror
            <div class="mb-3 d-flex flex-column">
                <label>Eski rasm</label>
                {!! $section->getImage() !!}
            </div>
            <div class="form-group">
                <label for="image">Rasm</label>
                <input type="file" class="form-control" name="image" placeholder="Rasmni kiriting">
            </div>
            @error ('image')
            <p class="text-danger">* {{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" required class="form-control" name="email" placeholder="Emailni kiriting"
                    value="{{$section->email}}">
            </div>
            @error ('email')
            <p class="text-danger">* {{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="number">Telefon raqami</label>
                <input type="text" required class="form-control" name="number" placeholder="Telefon raqamni kiriting"
                    value="{{$section->number}}">
            </div>
            @error ('number')
            <p class="text-danger">* {{$message}}</p>
            @enderror
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                aria-selected="true">Uzbek</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                                aria-selected="false">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                                href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages"
                                aria-selected="false">Russian</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                            aria-labelledby="custom-tabs-three-home-tab">
                            <div class="form-group">
                                <label for="time_uz">Ish kunlari (uz)</label>
                                <input type="text" required class="form-control" name="time_uz"
                                    placeholder="Ish kunlarini(uz) kiriting" value="{{$section->time_uz}}">
                            </div>
                            @error ('time_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <label for="floatingTextarea2">Ma'lumot Uz</label>
                            <div class="form-floating mt-3">
                                <textarea id="bio_uz" name="bio_uz" required>{{$section->bio_uz}}</textarea>
                                @error ('bio_uz')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-three-profile-tab">
                            <div class="form-group">
                                <label for="time_en">Ish kunlari (en)</label>
                                <input type="text" class="form-control" name="time_en"
                                    placeholder="Ish kunlarini(en) kiriting" value="{{$section->time_en}}">
                            </div>
                            @error ('time_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <label for="floatingTextarea2">Ma'lumot En</label>
                            <div class="form-floating mt-3">
                                <textarea id="bio_en" name="bio_en">{{$section->bio_en}}</textarea>
                                @error ('bio_en')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                            aria-labelledby="custom-tabs-three-messages-tab">
                            <div class="form-group">
                                <label for="time_ru">Ish kunlari (ru)</label>
                                <input type="text" class="form-control" name="time_ru"
                                    placeholder="Ish kunlarini(en) kiriting" value="{{$section->time_ru}}">
                            </div>
                            @error ('time_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror


                            <label for="floatingTextarea2">Ma'lumot Ru</label>
                            <div class="form-floating mt-3">
                                <textarea id="bio_ru" name="bio_ru">{{$section->bio_ru}}</textarea>
                                @error ('bio_ru')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <input type="submit" value="Tahrirlash" class="btn btn-primary">
        </div>
    </div>
</form>
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('bio_uz', {
            filebrowserImageBrowseUrl: '/elfinder/ckeditor',
            filebrowserBrowseUrl: '/elfinder/ckeditor',
        });
        CKEDITOR.replace('bio_en', {
            filebrowserImageBrowseUrl: '/elfinder/ckeditor',
            filebrowserBrowseUrl: '/elfinder/ckeditor',
        });
        CKEDITOR.replace('bio_ru', {
            filebrowserImageBrowseUrl: '/elfinder/ckeditor',
            filebrowserBrowseUrl: '/elfinder/ckeditor',
        });
</script>
@stop
