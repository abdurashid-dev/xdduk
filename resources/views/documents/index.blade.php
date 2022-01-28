@extends('layout.admin')
@section('title', 'Documents')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hujjatlar</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Hujjatlar</li>
            </ol>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Hujjatlar</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="documents" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>MCHJ nomi</th>
                                        <th>Manzil</th>
                                        <th>Biriktirilgan hujjat</th>
                                        <th>Status</th>
                                        <th>Holati</th>
                                        <th>Harakatlar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($documents as $document)
                                        <tr class="{{($document->status == 'yangi')? 'text-bold':''}}">
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $document->user->name }}</td>
                                            <td>{{ $document->offer->address }}</td>
                                            <td>{{ $document->offer->name_uz }}</td>
                                            <td>
                                                {!! $document->status() !!}
                                            </td>
                                            <td>
                                                {!! $document->getOfferStatus() !!}
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('admin.documents.show', $document->id)}}"
                                                       class="btn btn-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
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
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
