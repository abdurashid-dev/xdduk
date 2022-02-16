@extends('layout.admin')
@section('title')
    Blog Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.blogs.index') }}" class="btn btn-block btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Yangilikni tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name_ru">Kategoriya</label>
                            <select name="category_id" class="form-select">
                                <option
                                    disabled>
                                    Open this select menu
                                </option>
                                @foreach ($categories as $category)
                                    <option

                                        @if($category->id == $blog->category_id)
                                        selected
                                        @endif
                                        value="{{$category->id}}">{{$category->name_uz}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error ('category_id')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary card-outline card-outline-tabs">
                                    <div class="card-header p-0 border-bottom-0">
                                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-four-home-tab"
                                                   data-toggle="pill"
                                                   href="#custom-tabs-four-home" role="tab"
                                                   aria-controls="custom-tabs-four-home"
                                                   aria-selected="true">O'zbekcha</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                   href="#custom-tabs-four-profile" role="tab"
                                                   aria-controls="custom-tabs-four-profile"
                                                   aria-selected="false">Inglizcha</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-four-messages-tab"
                                                   data-toggle="pill"
                                                   href="#custom-tabs-four-messages" role="tab"
                                                   aria-controls="custom-tabs-four-messages" aria-selected="false">Ruscha</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-four-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-four-home"
                                                 role="tabpanel"
                                                 aria-labelledby="custom-tabs-four-home-tab">
                                                <div class="form-group mb-3">
                                                    <label for="title_uz">Title UZ</label>
                                                    <input type="text" required class="form-control" name="title_uz"
                                                           value="{{$blog->title_uz}}"
                                                           placeholder="Enter Title UZ">
                                                </div>
                                                <label for="floatingTextarea2">Ma'lumot Uz</label>
                                                <div class="form-floating">
                                                <textarea id="noImage1" class="form-control" name="content_uz" required
                                                          placeholder="Ma'lumot (uz)ni kiriting" id="floatingTextarea2"
                                                          style="height: 100px">{{$blog->content_uz}}</textarea>
                                                    @error ('content_uz')
                                                    <p class="text-danger">* {{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                                 aria-labelledby="custom-tabs-four-profile-tab">
                                                <div class="form-group mb-3">
                                                    <label for="title_en">Title EN</label>
                                                    <input type="text" class="form-control" name="title_en"
                                                           value="{{$blog->title_en}}"
                                                           placeholder="Enter Title EN">
                                                </div>
                                                <label for="floatingTextarea2">Ma'lumot En</label>
                                                <div class="form-floating mt-3">
                                                <textarea id="noImage2" class="form-control" name="content_en"
                                                          placeholder="Ma'lumot (en)ni kiriting" id="floatingTextarea2"
                                                          style="height: 100px">{{$blog->content_en}}</textarea>
                                                    @error ('content_en')
                                                    <p class="text-danger">* {{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                                 aria-labelledby="custom-tabs-four-messages-tab">
                                                <div class="form-group mb-3">
                                                    <label for="title_ru">Title RU</label>
                                                    <input type="text" class="form-control" name="title_ru"
                                                           value="{{$blog->title_ru}}"
                                                           placeholder="Enter Title RU">
                                                </div>
                                                <label for="floatingTextarea2">Ma'lumot Ru</label>
                                                <div class="form-floating mt-3">
                                                <textarea id="noImage3" class="form-control" name="content_ru"
                                                          placeholder="Ma'lumot (ru)ni kiriting" id="floatingTextarea2"
                                                          style="height: 100px">{{$blog->content_ru}}</textarea>
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
                        <div class="form-group mb-3">
                            <label>Asosiy rasm</label>
                            <div>
                                {!! $blog->getBlogImage() !!}
                            </div>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group mb-3">
                            <label>Rasmlar</label>
                            <div>
                                @if(isset($blog->images))
                                    <div class="col-md-3">
                                        @foreach($blog->images as $image)
                                            <img src="{{asset($image->image)}}" alt="blog image" width="100" class="img-responsive">
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <input type="file" class="form-control" multiple name="images[]">
                            @error ('images')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
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
@endsection

