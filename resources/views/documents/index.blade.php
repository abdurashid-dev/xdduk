@extends('layout.admin')
@section('title', 'Documents')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Loyihalar</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Loyihalar</li>
            </ol>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Loyihalar</h3>
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
                                            @if($document->user->role !== 'deleted')
                                                <td>
                                                    <a href="{{route('admin.documents.show', $document->id)}}">
                                                        {!! $document->status() !!}
                                                    </a>
                                                </td>
                                                @if($document->status == 'off')
                                                    <td class="text-danger">* Ish yopilgan</td>
                                                @else
                                                <td>
                                                    <a href="{{route('admin.documents.show', $document->id)}}">
                                                        {!! $document->getOfferStatus() !!}
                                                    </a>
                                                </td>
                                                @endif
                                            @else
                                                <td>
                                                    <a class="btn btn-sm btn-danger"
                                                       href="{{route('admin.documents.show', $document->id)}}">
                                                        MCHJ tashkilot ochirilgan
                                                    </a>
                                                </td>
                                                <td></td>
                                            @endif
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
