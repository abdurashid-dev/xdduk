@extends('layout.admin')
@section('title', 'User')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Foydalanuvchi</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Foydalanuvchilar</a></li>
                <li class="breadcrumb-item active">{{$user->name}}</li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Ismi</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{!!$user->getStatus()!!}</td>
                        </tr>
                        <tr>
                            <th>Bog'langan topshiriq</th>
                            <td>
                                @forelse($user->offer as $offer)
                                    <a target="_blank" href="{{route('admin.offers.show', $offer->id)}}">{{$offer->name_uz}}</a><br>
                                @empty
                                    Bog'langan topshiriq yo'q
                                @endforelse
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
