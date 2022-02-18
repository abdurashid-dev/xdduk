@extends('layout.admin')
@section('title')
    Categories
@endsection
@section('content')

    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kategoriya qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.categories.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name_uz">Nomi UZ</label>
                                <input type="text" required class="form-control" name="name_uz"
                                       placeholder="Nomi (uz)ni kiriting" value="{{old('name_uz')}}">
                            </div>
                            @error ('name_uz')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="name_en">Nomi EN</label>
                                <input type="text" required class="form-control" name="name_en"
                                       placeholder="Nomi (en)ni kiriting" value="{{old('name_en')}}">
                            </div>
                            @error ('name_en')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="name_ru">Nomi RU</label>
                                <input type="text" required class="form-control" name="name_ru"
                                       placeholder="Nomi (ru)ni kiriting" value="{{old('name_ru')}}">
                            </div>
                            @error ('name_ru')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 p-3">
                            <h3 class="card-title">Kategoriyalar</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add"
                               class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Qo'shish
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-bordered" id="example1">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomi UZ</th>
                            <th>Nomi EN</th>
                            <th>Nomi RU</th>
                            <th>Harakatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$category->name_uz}}</td>
                                <td>{{$category->name_en}}</td>
                                <td>{{$category->name_ru}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.categories.edit', $category->id )}}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.categories.destroy', $category->id)}}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-flat"
                                                    onclick="confirm('Ishonchingiz komilmi?')" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
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
