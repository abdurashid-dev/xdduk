@extends('layout.admin')
@section('style')
    <!-- Bootstrap-Iconpicker -->
    {{--    <link rel="stylesheet" href="dist/css/bootstrap-iconpicker.min.css"/>--}}
@endsection
@section('title')
    Sliders
@endsection
@section('content')
    <!-- Create -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Slayder qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title_uz">Sarlavha Uz</label>
                                <input type="text" required class="form-control" name="title_uz"
                                       placeholder="Sarlavha (uz)ni kiriting" value="{{old('title_uz')}}">
                            </div>
                            @error ('title_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="title_en">Sarlavha En</label>
                                <input type="text" required class="form-control" name="title_en"
                                       placeholder="Sarlavha (en)ni kiriting" value="{{old('title_en')}}">
                            </div>
                            @error ('title_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="title_ru">Sarlavha Ru</label>
                                <input type="text" required class="form-control" name="title_ru"
                                       placeholder="Sarlavha (ru)ni kiriting" value="{{old('title_ru')}}">
                            </div>
                            @error ('title_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" required class="form-control" name="link"
                                       placeholder="Linkni kiriting" value="{{old('link')}}">
                            </div>
                            @error ('link')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror

                            <div class="form-group mt-3 mb-3">
                                <label>Slayder rasmi</label>
                                <input required type="file" class="form-control" name="image">
                            </div>
                            <div class="form-floating mt-3">
                                <textarea required class="form-control" name="body_uz"
                                          placeholder="Leave a description Uz here" id="floatingTextarea2"
                                          style="height: 100px">{{old('body_uz')}}</textarea>
                                <label for="floatingTextarea2">Ma'lumot Uz</label>
                                @error ('body_uz')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-floating mt-3">
                                <textarea required class="form-control" name="body_en"
                                          placeholder="Leave a description En here" id="floatingTextarea2"
                                          style="height: 100px">{{old('body_en')}}</textarea>
                                <label for="floatingTextarea2">Ma'lumot En</label>
                                @error ('body_en')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-floating mt-3">
                                <textarea required class="form-control" name="body_ru"
                                          placeholder="Leave a description Ru here" id="floatingTextarea2"
                                          style="height: 100px">{{old('body_ru')}}</textarea>
                                <label for="floatingTextarea2">Ma'lumot Ru</label>
                                @error ('body_ru')
                                <p class="text-danger">* {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    {{--end form--}}
                </div>

            </div>
        </div>
    </div>
    {{--    End Create--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <h3 class="card-title">Slayderlar</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add"
                               class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Qo'shish
                            </a>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Sarlavha UZ</th>
                            <th>Rasm</th>
                            <th>Holati</th>
                            <th>Harakatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $slider->title_uz }}</td>
                                <td>{!! $slider->getImage('width:150px') !!}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{route('admin.status', $slider->id)}}" method="POST">
                                            <input type="hidden" name="type" value="Slider">
                                            @csrf
                                            {!! $slider->getStatus() !!}
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.sliders.show', $slider->id) }}" type="button"
                                           class="btn btn-primary btn-flat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.sliders.edit', $slider->id) }}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.sliders.destroy',$slider->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                    onclick="return confirm('Ishonchingiz komilmi? ')" type="submit"
                                                    class="btn btn-danger btn-flat">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
