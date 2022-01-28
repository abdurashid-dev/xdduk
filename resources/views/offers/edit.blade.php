@extends('layout.admin')
@section('title', 'Create Offer')
@section('style')
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <style>
        .select2-container--default .select2-selection--single {
            height: calc(1.5em + .75rem + 2px);
        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hujjatni tahrirlash</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.offers.index') }}">Hujjatlarni shakllantirish</a>
                </li>
                <li class="breadcrumb-item active">Hujjatni tahrirlash</li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.offers.update', $offer) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Nomi (uz)</label>
                            <input type="text" class="form-control" id="title" name="name_uz"
                                   placeholder="Nomi (uz)ni kiriting" value="{{$offer->name_uz}}">
                        </div>
                        @error('name_uz')
                        <div class="alert alert-danger">
                            <strong>Xatolik!</strong> {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="title">Nomi (en)</label>
                            <input type="text" class="form-control" id="titleen" name="name_en"
                                   placeholder="Nomi (en)ni kiriting" value="{{$offer->name_en}}">
                        </div>
                        @error('name_en')
                        <div class="alert alert-danger">
                            <strong>Xatolik!</strong> {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="title">Nomi (ru)</label>
                            <input type="text" class="form-control" id="titleru" name="name_ru"
                                   placeholder="Nomi (ru)ni kiriting" value="{{$offer->name_ru}}">
                        </div>
                        @error('name_ru')
                        <div class="alert alert-danger">
                            <strong>Xatolik!</strong> {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="address">Manzil</label>
                            <input type="text" class="form-control" id="address" name="address"
                                   placeholder="Manzilni kiriting" value="{{$offer->address}}">
                        </div>
                        @error('address')
                        <div class="alert alert-danger">
                            <strong>Xatolik!</strong> {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="price">Summa</label>
                            <input type="text" class="form-control" id="price" name="summa"
                                   placeholder="Summani kiriting" value="{{$offer->summa}}">
                        </div>
                        @error('summa')
                        <div class="alert alert-danger">
                            <strong>Xatolik!</strong> {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link"
                                   placeholder="Linkni kiriting" value="{{$offer->link}}">
                        </div>
                        @error('link')
                        <div class="alert alert-danger">
                            <strong>Xatolik!</strong> {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label>Menyuni oching</label>
                            <select class="form-control js-example-basic" name="user_id" id="offer">
                                <option selected>MCHJni tanlang</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"
                                            @if($user->id == $offer->user_id) selected @endif>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('user_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
    <script>
        let offer = $('#offer');
        offer.select2({
            placeholder: "MCHJni tanlang",
            allowClear: true
        });
    </script>
@stop
