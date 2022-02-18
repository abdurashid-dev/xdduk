@extends('layout.frontend')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@stop
@section('content')
{{--make offers table--}}
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">{{__('words.documents')}}</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('words.title')}}</th>
                                <th>{{__('words.address')}}</th>
{{--                                <th>{{__('words.price')}}</th>--}}
                                <th>{{__('words.condition')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offers as $offer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{($offer['name_'.session('locale')] == null)? $offer->name_uz : $offer['name_'.session('locale')]}} @if($offer->link !== null) <p><a href="{{$offer->link}}">{{$offer->link}}</a></p>@endif</td>
                                <td>{{$offer->address}}</td>
{{--                                <td>{{$offer->summa}}</td>--}}
                                <td>{!! $offer->getCondition() !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop

