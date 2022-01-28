@extends('layout.admin')
@section('title', 'Offer')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hujjat</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.offers.index') }}">Hujjatlarni shakllashtirish</a>
                </li>
                <li class="breadcrumb-item active">{{$offer->name_uz}}</li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$offer->name_uz}}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $offer->id }}</td>
                            </tr>
                            <tr>
                                <th> Nomi uz</th>
                                <td> {{ $offer->name_uz }} </td>
                            </tr>
                            <tr>
                                <th> Nomi en</th>
                                <td> {{ $offer->name_en }} </td>
                            </tr>
                            <tr>
                                <th> Nomi ru</th>
                                <td> {{ $offer->name_ru }} </td>
                            </tr>
                            <tr>
                                <th> Manzil</th>
                                <td> {{ $offer->address }} </td>
                            </tr>
                            <tr>
                                <th> Summa</th>
                                <td> {{ $offer->summa }} </td>
                            </tr>
                            <tr>
                                <th> Link</th>
                                <td><a href="{{ $offer->link }}" target="_blank">{{ $offer->link }}</a></td>
                            </tr>
                            <tr>
                                <th>MCHJ tashkilot</th>
                                <td>{!! $offer->getUser() !!}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
