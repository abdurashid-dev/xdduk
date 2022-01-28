@extends('layout.admin')
@section('style')
@endsection
@section('title')
    Blogs
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <h3 class="card-title">Yangiliklar</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{route('admin.blogs.create')}}"
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
                            <th>Sarlavha UZ</th>
                            {{-- <th>Name EN</th> --}}
                            <th>Rasm</th>
                            <th>Holati</th>
                            <th>Harakatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $blog->title_uz }}</td>
                                <td>
                                    {!! $blog->getBlogImage() !!}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{route('admin.status', $blog->id)}}" method="POST">
                                            <input type="hidden" name="type" value="Blog">
                                            @csrf
                                            {!! $blog->getStatusBadge() !!}
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.blogs.show', $blog->id) }}" type="button"
                                           class="btn btn-primary btn-flat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.blogs.destroy',$blog->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Ishonchingiz komilmi ?')"
                                                    type="submit" class="btn btn-danger btn-flat"><i
                                                    class="fas fa-trash"></i></button>
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
