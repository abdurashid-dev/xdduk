@extends('layout.admin')
@section('title', 'Documents')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Hujjatlarni shakllashtirish</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Hujjatlarni shakllashtirish</li>
            </ol>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Hujjatlar</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.offers.create') }}" class="btn btn-success">
                                        <i class="fa fa-plus"></i> Yangi qo'shish
                                    </a>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="documents" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nomi</th>
                                        <th>Manzil</th>
                                        <th>Summa</th>
                                        <th>Status</th>
                                        <th>Holati</th>
                                        <th>Harakatlar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($offers as $offer)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ Str::limit($offer->name_uz, 50) }}</td>
                                            <td>{{ $offer->address }}</td>
                                            <td>{{ $offer->summa }}</td>
                                            <td>
                                                <form action="{{route('admin.offers.status', $offer->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    <input type="hidden" name="type" value="Offer">
                                                    {!! $offer->getStatus() !!}
                                                </form>
                                            </td>
                                            <td>{!! $offer->getCondition() !!}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('admin.offers.show', $offer->id)}}"
                                                       class="btn btn-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    {!! $offer->getEdit() !!}
                                                    @if($offer->status == 'tender')
                                                        <form action="{{route('admin.offers.destroy', $offer->id)}}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="return confirm('Ishonchingiz komilmi?')"
                                                                    class="btn btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
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
