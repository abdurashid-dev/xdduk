@extends('layout.admin')
@section('title')
    Videos
@endsection
@section('content')
    @include('admin.videos.create')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 p-3">
                            <h3 class="card-title">Videolar</h3>
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
                            <th>Nomi</th>
                            <th>Link</th>
                            <th>Holati</th>
                            <th>Harakatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$video->name}}</td>
                                <td>{{\Illuminate\Support\Str::limit($video->link,50)}}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{route('admin.status', $video->id)}}" method="POST">
                                            <input type="hidden" name="type" value="Video">
                                            @csrf
                                            {!! $video->getStatus() !!}
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.videos.edit', $video->id )}}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.videos.destroy', $video->id)}}"
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

