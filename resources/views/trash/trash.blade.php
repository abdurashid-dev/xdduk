@extends('layout.admin')
@section('title', 'Documents')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Arxiv</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Arxiv</li>
            </ol>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">MCHJ tashkilotlar</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="documents" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>MCHJ nomi</th>
                                        <th>Harakatlar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <a href="{{route('admin.users.trashshow', $user->id)}}"
                                                   class="btn btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{route('admin.users.restore', $user->id)}}"
                                                      method="POST" class="d-inline-block">
                                                    @csrf
                                                    <button
                                                        class="btn btn-danger">
                                                        <i class="fas fa-undo-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $("#documents").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
