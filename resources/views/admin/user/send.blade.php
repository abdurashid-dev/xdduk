@extends('layout.admin')
@section('title', 'Send File')
@section('style')
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Filepond stylesheet -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <style>
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            padding: 0.46875rem 0.75rem;
            height: calc(2.25rem + 2px);
        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Loyiha yuborish</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user.table') }}">Loyihalar</a></li>
                <li class="breadcrumb-item active">Loyiha yuborish</li>

            </ol>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-column">
                            <label for="name">{{__('words.title')}}</label>
                            <input required name="name" class="form-group form-control" type="text"
                                   placeholder="{{__('words.title')}}">
                        </div>
                        <div class="form-group">
                            <label>Menyuni oching</label>
                            <select class="form-control" id="offer" name="offer_id">
                                @foreach($user->offer as $offer)
                                    @if($documents->count() > 0)
                                        @if(!in_array($offer->id, $documents->pluck('offer_id')->toArray()))
                                            <option value="{{$offer->id}}">{{$offer->name_uz}}</option>
                                        @endif
                                    @else
                                        <option value="{{$offer->id}}">{{$offer->name_uz}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <label for="file">{{__('words.file')}}</label>
                            <input required id="file" name="file" type="file" class="filepond">
                        </div>
                        <input type="submit" class="btn btn-primary" value="{{__('words.send')}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <!-- Load FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        let offer = $('#offer');
        offer.select2({
            placeholder: "Loyihani tanlang",
            allowClear: true
        });
        const inputElement = document.querySelector('input[id="file"]');
        const pond = FilePond.create(inputElement, {
            'labelIdle': 'Loyihani yuklang. <span class="filepond--label-action">Tanlang</span>',
        });
        FilePond.setOptions({
            server: {
                url: '/admin/upload-file',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
            }
        });
    </script>
@stop

