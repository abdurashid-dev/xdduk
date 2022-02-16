@extends('layout.admin')
@section('title')
    Create news
@stop
@section('content')
    <div class="col-md-2 mb-3">
        <a type="button" href="{{ route('admin.blogs.index') }}" class="btn btn-block btn-primary btn-sm">
            <i class="fas fa-arrow-left"></i> Orqaga
        </a>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">Yangilik qo'shish</div>
        </div>
        <div class="card-body">
            <!-- form start -->
            <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Kategoriya</label>
                    <select name="category_id" class="form-select mb-3">
                        <option disabled selected>Ushbu tanlash menyusini oching</option>
                        @if($categories)
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name_uz}}</option>
                            @endforeach
                        @else
                            <option disabled selected>Kategoriyalar mavjud emas</option>
                        @endif
                    </select>
                    @error ('category_id')
                    <p class="text-danger">* {{$message}}</p>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                           href="#custom-tabs-four-home" role="tab"
                                           aria-controls="custom-tabs-four-home"
                                           aria-selected="true">O'zbekcha</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                           href="#custom-tabs-four-profile" role="tab"
                                           aria-controls="custom-tabs-four-profile" aria-selected="false">Inglizcha</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                           href="#custom-tabs-four-messages" role="tab"
                                           aria-controls="custom-tabs-four-messages" aria-selected="false">Ruscha</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                         aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-group">
                                            <label for="title_uz">Sarlovha UZ</label>
                                            <input type="text" required class="form-control" id="title_uz"
                                                   name="title_uz"
                                                   placeholder="Sarlovha (uz)ni kiriting" value="{{old('title_uz')}}">
                                        </div>
                                        @error ('title_uz')
                                        <p class="text-danger">* {{$message}}</p>
                                        @enderror
                                        <label for="content_uz">Ma'lumot Uz</label>
                                        <div class="form-floating">
                                            <textarea id="content_uz" name="content_uz"
                                                      required>{{old('content_uz')}}</textarea>

                                            @error ('content_uz')
                                            <p class="text-danger">* {{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                         aria-labelledby="custom-tabs-four-profile-tab">
                                        <div class="form-group">
                                            <label for="title_en">Sarlovha EN</label>
                                            <input type="text" class="form-control" id="title_en"
                                                   name="title_en"
                                                   placeholder="Sarlovha (en)ni kiriting" value="{{old('title_en')}}">
                                        </div>
                                        @error ('title_en')
                                        <p class="text-danger">* {{$message}}</p>
                                        @enderror
                                        <label for="floatingTextarea2">Ma'lumot En</label>
                                        <div class="form-floating mt-3">
                                        <textarea id="content_en"
                                                  name="content_en">{{old('content_en')}}</textarea>
                                            @error ('content_en')
                                            <p class="text-danger">* {{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                         aria-labelledby="custom-tabs-four-messages-tab">
                                        <div class="form-group">
                                            <label for="title_ru">Sarlovha RU</label>
                                            <input id="title_ru" type="text" class="form-control"
                                                   name="title_ru"
                                                   placeholder="Sarlovha (ru)ni kiriting" value="{{old('title_ru')}}">
                                        </div>
                                        @error ('title_ru')
                                        <p class="text-danger">* {{$message}}</p>
                                        @enderror
                                        <label for="floatingTextarea2">Ma'lumot Ru</label>
                                        <div class="form-floating mt-3">
                                        <textarea id="content_ru" name="content_ru">{{old('content_ru')}}</textarea>
                                            @error ('content_ru')
                                            <p class="text-danger">* {{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label>Asosiy rasm</label>
                    <input type="file" required class="form-control" name="image">
                </div>
                @error ('image')
                <p class="text-danger">* {{$message}}</p>
                @enderror
                <div class="form-group mt-3">
                    <label>Rasmlar</label>
                    <input type="file" class="form-control" multiple name="images[]">
                </div>
                @error ('images')
                <p class="text-danger">* {{$message}}</p>
                @enderror
                <button type="submit" class="btn btn-primary">Saqlash</button>
            </form>
            {{--end form--}}

        </div>
    </div>
@stop
@section('script')
    <script src="https://cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content_uz', {
            filebrowserImageBrowseUrl: '/elfinder/ckeditor',
            filebrowserBrowseUrl: '/elfinder/ckeditor',
        });
        CKEDITOR.replace('content_en', {
            filebrowserImageBrowseUrl: '/elfinder/ckeditor',
            filebrowserBrowseUrl: '/elfinder/ckeditor',
        });
        CKEDITOR.replace('content_ru', {
            filebrowserImageBrowseUrl: '/elfinder/ckeditor',
            filebrowserBrowseUrl: '/elfinder/ckeditor',
        });
    </script>
@stop
