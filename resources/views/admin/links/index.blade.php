@extends('layout.admin')
@section('title')
    Links
@endsection
@section('content')
    <!-- Create -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foydali link qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.links.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-sarlavha-uz-tab" data-toggle="pill"
                                           href="#sarlavha_uz" role="tab" aria-controls="custom-tabs-three-home"
                                           aria-selected="true">Sarlavha uz</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-sarlavha-en-tab" data-toggle="pill"
                                           href="#sarlavha_en" role="tab" aria-controls="custom-tabs-three-profile"
                                           aria-selected="false">Sarlavha en</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-sarlavha-ru-tab" data-toggle="pill"
                                           href="#sarlavha_ru" role="tab" aria-controls="custom-tabs-three-messages"
                                           aria-selected="false">Sarlavha ru</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="sarlavha_uz" role="tabpanel"
                                         aria-labelledby="custom-tabs-sarlavha-uz-tab">
                                        <input type="text" required class="form-control" name="title_uz"
                                               placeholder="Sarlavha (uz)ni kiriting" value="{{old('title_uz')}}">
                                        @error ('title_uz')
                                        <p class="text-danger">* {{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="tab-pane fade" id="sarlavha_en" role="tabpanel"
                                         aria-labelledby="custom-tabs-sarlavha-en-tab">
                                        <input type="text" required class="form-control" name="title_en"
                                               placeholder="Sarlavha (en)ni kiriting" value="{{old('title_en')}}">
                                        @error ('title_en')
                                        <p class="text-danger">* {{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="tab-pane fade" id="sarlavha_ru" role="tabpanel"
                                         aria-labelledby="custom-tabs-sarlavha-ru-tab">
                                        <input type="text" required class="form-control" name="title_ru"
                                               placeholder="Sarlavha (ru)ni kiriting" value="{{old('title_ru')}}">
                                        @error ('title_ru')
                                        <p class="text-danger">* {{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="icon">Rasm</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            @error ('image')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror

                            <div class="form-group">
                                <label for="icon">Link</label>
                                <input type="text" required class="form-control" name="link"
                                       placeholder="Link kiriting" value="{{old('link')}}">
                            </div>
                            @error ('link')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
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
                            <h3 class="card-title">Foydali linklar</h3>
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
                    <table class="table table-bordered" id="example1">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Sarlavha UZ</th>
                            {{-- <th>Name EN</th> --}}
                            <th>Ikon</th>
                            <th>Holati</th>
                            <th>Harakatlar</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($links as $link)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $link->title_uz }}</td>
                                <td>{!! $link->getImage() !!}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{route('admin.status', ['id'=>$link->id])}}" method="POST">
                                            <input type="hidden" name="type" value="Link">
                                            @csrf
                                            {!! $link->getStatus() !!}
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.links.show', $link->id) }}" type="button"
                                           class="btn btn-primary btn-flat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.links.edit', $link->id) }}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.links.destroy',$link->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
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
