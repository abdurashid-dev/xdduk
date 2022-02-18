@extends('layout.admin')
@section('title', 'Profile')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-auto">
                    <h4 class="mr-2 d-inline"></h4>
                    <h4 class="mr-2 d-inline">Foydalanuvchi</h4>
                    <h4 class="mr-2 d-inline"></h4>
                    <h4 class="mr-2 d-inline"></h4>
                    <h4 class="mr-2 d-inline"></h4>
                </div><!-- /.col -->
                <div class="col-auto">
                    <nav aria-label="breadcrumb">
                        <ol id="w1" class="breadcrumb text-sm float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i> Bosh
                                    sahifa</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Foydalanuvchi</li>
                        </ol>
                    </nav>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('defaultAvatar.png')}}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">{{($user->role == 'user1') ? 'Super administrator':'Administrator' }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>ID</b>
                                    <a class="float-right">{{$user->id}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Yaratilgan</b>
                                    <a class="float-right">{{($user->created_at)?$user->created_at->format('M d Y'):'No data'}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>O'zgartirilgan</b>
                                    <a class="float-right">{{($user->updated_at)?$user->updated_at->format('M d Y'):'No data'}}</a>
                                </li>
                            </ul>
                            <a class="btn btn-primary btn-block">
                                <i class="fa fa-check"></i>
                                <b>Faol</b>
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="card card-tabs card-primary card-outline">
                                <div class="card-header p-0">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-auto">
                                            <ul class="nav nav-pills ml-auto p-2">
                                                <li class="nav-item"><a href="{{($user->role=='user1')?route('admin.profile'):route('admin.profile.index')}}"
                                                                        class="nav-link {{request()->is('admin/profile*')? 'active':''}}"><i
                                                            class="fas fa-cogs"></i> Umumiy</a></li>
                                                <li class="nav-item"><a href="{{($user->role == 'user1')?route('admin.profile.password'):route('admin.profile.password.index')}}"
                                                                        class="nav-link {{request()->is('admin/password*')? 'active':''}}"><i
                                                            class="fa fa-lock"></i> Parol</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card">
                                <div class="card-body">
                                    <form id="w0" action="{{($user->role == 'user1')?route('admin.password.change'):route('admin.password.change.index')}}" method="post">
                                        @csrf
                                        <div class="form-group field-usersettingsform-password_old required">
                                            <label for="usersettingsform-password_old">Eski parol</label>
                                            <input type="password" id="usersettingsform-password_old"
                                                   class="form-control" name="password_old"
                                                   value="" aria-required="true">

                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group field-usersettingsform-password required">
                                            <label for="usersettingsform-password">Yangi parol</label>
                                            <input type="password" id="usersettingsform-password"
                                                   class="form-control" name="password" value=""
                                                   aria-required="true">

                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group field-usersettingsform-password_repeat required">
                                            <label for="usersettingsform-password_repeat">Parolni takrorlang</label>
                                            <input type="password" id="usersettingsform-password_repeat"
                                                   class="form-control" name="password_confirmation"
                                                   value="" aria-required="true">

                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Saqlash</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop
