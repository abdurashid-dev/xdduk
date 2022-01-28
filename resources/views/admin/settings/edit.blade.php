@extends('layout.admin')
@section('title')
    Ma'lumotlarni tahrirlash
@endsection
@section('content')
    <a href="{{route('admin.settings.index')}}" class="btn-primary btn btn-sm mb-3"><i
            class="bi bi-arrow-left-short"></i> Orqaga</a>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ma'lumotlarni tahrirlash</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name_uz">Nomi UZ</label>
                            <input type="text" required class="form-control" name="name_uz"
                                   placeholder="Nomi (uz)ni kiriting" value="{{ $setting->name_uz }}">
                        </div>
                        @error ('name_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="name_en">Nomi EN</label>
                            <input type="text" required class="form-control" name="name_en"
                                   placeholder="Nomi (en)ni kiriting" value="{{ $setting->name_en }}">
                        </div>
                        @error ('name_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="name_RU">Nomi RU</label>
                            <input type="text" required class="form-control" name="name_ru"
                                   placeholder="Nomi (ru)ni kiriting" value="{{ $setting->name_ru }}">
                        </div>
                        @error ('name_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="address_uz">Manzil UZ</label>
                            <input type="text" required class="form-control" name="address_uz"
                                   placeholder="Manzil (uz)ni kiriting" value="{{ $setting->address_uz }}">
                        </div>
                        @error ('address_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="address_en">Manzil EN</label>
                            <input type="text" required class="form-control" name="address_en"
                                   placeholder="Manzil (en)ni kiriting" value="{{ $setting->address_en }}">
                        </div>
                        @error ('address_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="address_ru">Manzil RU</label>
                            <input type="text" required class="form-control" name="address_ru"
                                   placeholder="Manzil (ru)ni kiriting" value="{{ $setting->address_ru }}">
                        </div>
                        @error ('address_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required class="form-control" name="email"
                                   placeholder="Emailni kiriting" value="{{ $setting->email }}">
                        </div>
                        @error ('email')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="number">Telefon raqam</label>
                            <input type="text" required class="form-control" name="number"
                                   placeholder="Telefon raqamni kiriting" value="{{ $setting->number }}">
                        </div>
                        @error ('number')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="number">Biz haqimizda</label>
                            <textarea type="text" required class="form-control" cols="20" rows="5"
                                      name="about_uz">{{ $setting->about_uz }}</textarea>
                        </div>
                        @error ('about_uz')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="number">Biz haqimizda (english)</label>
                            <textarea type="text" required class="form-control" cols="20" rows="5"
                                      name="about_en">{{ $setting->about_en }}</textarea>
                        </div>
                        @error ('about_en')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="number">Biz haqimizda (russian)</label>
                            <textarea type="text" required class="form-control" cols="20" rows="5"
                                      name="about_ru">{{ $setting->about_ru }}</textarea>
                        </div>
                        @error ('about_ru')
                        <p class="text-danger">* {{$message}}</p>
                        @enderror
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
