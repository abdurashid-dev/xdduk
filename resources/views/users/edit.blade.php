@extends('layout.admin')
@section('title', 'Create User')

@section('content')
    @include('users.password')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Foydalanuvchini tahrirlash</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Foydalanuvchilar</a></li>
                <li class="breadcrumb-item active">Foydalanuvchini tahrirlash</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">MCHJ nomi</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Tahrirlash</button>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editPassword">Parolni o'zgartirish</button>
            </form>
        </div>
    </div>
@endsection
