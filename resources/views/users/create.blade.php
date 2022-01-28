@extends('layout.admin')
@section('title', 'Create User')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">MCHJ tashkilot qo'shish</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">MCHJ tashkilotlar</a></li>
                <li class="breadcrumb-item active">MCHJ tashkilot qo'shish</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">MCHJ nomi</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="password">Parol</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="password_confirmation">Parolni tasdiqlash</label>
                    <input type="password" class="form-control" id="password_confirmation"
                           name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Qo'shish</button>
            </form>
        </div>
    </div>
@endsection
