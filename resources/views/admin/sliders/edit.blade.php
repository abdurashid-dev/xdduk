@extends('layout.admin')
@section('title')
    Slider Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 mb-3">
            <a type="button" href="{{ route('admin.sliders.index') }}" class="btn btn-block btn-primary ">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Slayderni tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.sliders.update', $slider->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="icon">Sarlavha Uz</label>
                            <input type="text" required class="form-control" name="title_uz"
                                   placeholder="Sarlavha (uz) kiriting" value="{{$slider->title_uz}}">
                        </div>
                        @error ('title_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha En</label>
                            <input type="text" required class="form-control" name="title_en"
                                   placeholder="Sarlavha (en) kiriting" value="{{$slider->title_en}}">
                        </div>
                        @error ('title_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="icon">Sarlavha Ru</label>
                            <input type="text" required class="form-control" name="title_ru"
                                   placeholder="Sarlavha (ru) kiriting" value="{{$slider->title_ru}}">
                        </div>
                        @error ('title_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" required class="form-control" name="link"
                                   placeholder="Linkni kiriting" value="{{$slider->link}}">
                        </div>
                        @error ('link')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror

                        <div class="form-group mt-3 mb-3">
                            <label class="d-block">Slayderning eski rasmi</label>
                            {!! $slider->getImage('width:200px') !!}
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Slayder rasmi</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-floating mt-3">
                            <textarea class="form-control" name="body_uz" placeholder="Leave a description Uz here" id="floatingTextarea2" style="height: 100px">{{$slider->body_uz}}</textarea>
                            <label for="floatingTextarea2">Ma'lumot Uz</label>
                            @error ('body_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-floating mt-3">
                            <textarea class="form-control" name="body_en" placeholder="Leave a description En here" id="floatingTextarea2" style="height: 100px">{{$slider->body_en}}</textarea>
                            <label for="floatingTextarea2">Ma'lumot En</label>
                            @error ('body_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-floating mt-3">
                            <textarea class="form-control" name="body_ru" placeholder="Leave a description Ru here" id="floatingTextarea2" style="height: 100px">{{$slider->body_ru}}</textarea>
                            <label for="floatingTextarea2">Ma'lumot Ru</label>
                            @error ('body_ru')
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
    <script src="{{ asset('../../plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()
            $("#noImage3").summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    // [ 'table', [ 'table' ] ],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            });
            $("#noImage1").summernote({
                height: 300,
                lang: 'uz-UZ',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    // [ 'table', [ 'table' ] ],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            });
            $("#noImage2").summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    // [ 'table', [ 'table' ] ],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            });
        })
    </script>
@endsection

