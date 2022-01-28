@extends('layout.admin')
@section('title', 'Edit Page')
@section('style')
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <style>
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            padding: 0.46875rem 0.75rem;
            height: calc(2.25rem + 2px);
        }
    </style>
@stop
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sahifani tahrirlash</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashborad</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Sahifalar</a></li>
                <li class="breadcrumb-item active">Sahifani tahrirlash</li>
            </ol>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sahifa tahrirlash</h3>
                        </div>
                        <form role="form" action="{{ route('admin.pages.update', $page->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label>Menyu nomi</label>
                                        <select
                                            class="form-control select2 p-1"
                                            id="menu"
                                            name="menu_id"
                                            style="width: 100%;">
                                            @foreach($menus as $menu)
                                                <option
                                                    value="{{ $menu->id }}"
                                                    {{ $menu->id == $page->menu_id ? 'selected' : '' }}>
                                                    {{ $menu->name_uz }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                                                        <a class="nav-link" id="custom-tabs-four-profile-tab"
                                                           data-toggle="pill"
                                                           href="#custom-tabs-four-profile" role="tab"
                                                           aria-controls="custom-tabs-four-profile"
                                                           aria-selected="false">Inglizcha</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-four-messages-tab"
                                                           data-toggle="pill"
                                                           href="#custom-tabs-four-messages" role="tab"
                                                           aria-controls="custom-tabs-four-messages"
                                                           aria-selected="false">Ruscha</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                                    <div class="tab-pane fade show active" id="custom-tabs-four-home"
                                                         role="tabpanel"
                                                         aria-labelledby="custom-tabs-four-home-tab">
                                                        <div class="form-group">
                                                            <label for="name_uz">Sahifa nomi uz</label>
                                                            <input type="text" class="form-control" id="name_uz"
                                                                   name="name_uz"
                                                                   placeholder="Sahifa nomi(uz)ni kiriting"
                                                                   value="{{ $page->name_uz }}">
                                                            @error('name_uz')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <label for="content_uz">Ma'lumot Uz</label>
                                                        <div class="form-floating">
                                            <textarea id="content_uz" name="content_uz"
                                                      required>{{ $page->content_uz }}</textarea>

                                                            @error ('content_uz')
                                                            <p class="text-danger">* {{$message}}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="custom-tabs-four-profile"
                                                         role="tabpanel"
                                                         aria-labelledby="custom-tabs-four-profile-tab">
                                                        <div class="form-group">
                                                            <label for="name_en">Sahifa nomi en</label>
                                                            <input type="text" class="form-control" id="name_en"
                                                                   name="name_en"
                                                                   placeholder="Sahifa nomi(en)ni kiriting"
                                                                   value="{{ $page->name_en }}">
                                                            @error('name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <label for="floatingTextarea2">Ma'lumot En</label>
                                                        <div class="form-floating mt-3">
                                        <textarea id="content_en"
                                                  name="content_en"
                                                  required>{{$page->content_en}}</textarea>
                                                            @error ('content_en')
                                                            <p class="text-danger">* {{$message}}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="custom-tabs-four-messages"
                                                         role="tabpanel"
                                                         aria-labelledby="custom-tabs-four-messages-tab">
                                                        <div class="form-group">
                                                            <label for="name_ru">Sahifa nomi ru</label>
                                                            <input type="text" class="form-control" id="name_ru"
                                                                   name="name_ru"
                                                                   placeholder="Sahifa nomi(ru)ni kiriting"
                                                                   value="{{ $page->name_ru }}">
                                                            @error('name_ru')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <label for="floatingTextarea2">Ma'lumot Ru</label>
                                                        <div class="form-floating mt-3">
                                        <textarea id="content_ru" name="content_ru"
                                                  required>{{$page->content_ru}}</textarea>
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
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tahrirlash</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
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
        let menu = $('#menu');
        menu.select2({
            placeholder: "Menyu tanlang",
            allowClear: true
        });
    </script>
@stop
