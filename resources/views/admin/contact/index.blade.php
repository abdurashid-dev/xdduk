@extends('layout.admin')
@section('title', 'Contact')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Xabarlar</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Xabarlar</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Xabarlar</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="contact">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>FIO</th>
                    <th>Email</th>
                    <th>Telefon raqam</th>
                    <th>Xabar</th>
                    <th>Harakatlar</th>
                </tr>
                </thead>
                <tbody>
                @forelse($contacts as $contact)
                    <tr class="{{($contact->is_read == 0)? 'text-bold':''}}">
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ Str::limit($contact->text, 30) }}</td>
                        <td>
                            <a href="{{ route('admin.contact.show', $contact->id) }}" class="btn btn-primary" title="Xabarni ko`rish"><i class="fas fa-eye"></i></a>
                            <form action="{{route('admin.contact.delete', $contact->id)}}" method="post" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Ishonchigiz komilmi?')" class="btn btn-danger" title="Xabarni o`chirish"><i class="fas fa-trash"></i></button>
                            </form>
{{--                            <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>--}}
                        </td>
                        @empty
                            <td colspan="5" class="text-center">
                                <h3>Xabarlar yo'q</h3>
                            </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(function () {
            $("#contact").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
