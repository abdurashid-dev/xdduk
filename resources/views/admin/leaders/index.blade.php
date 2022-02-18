@extends('layout.admin')
@section('title', 'Leaders')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 p-3">
                            <h3 class="card-title">Rahbarlar</h3>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('admin.leaders.create')}}" class="btn btn-block btn-primary btn-sm">
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
                            <th>FIO</th>
                            <th>Lavozimi</th>
                            <th>Telefon raqami</th>
                            <th>Harakatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leaders as $leader)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$leader->name_uz}}</td>
                                <td>{{$leader->position_uz}}</td>
                                <td>{{$leader->number}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.leaders.show', $leader )}}" type="button"
                                           class="btn btn-primary btn-flat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.leaders.edit', $leader->id )}}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.leaders.destroy', $leader->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-flat"
                                                    onclick="return confirm('Ishonchingiz komilmi?')" type="submit">
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
@stop
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
