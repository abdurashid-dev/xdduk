@extends('layout.admin')
@section('title')
    Social Settings
@endsection
@section('content')
    <!-- Create -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ijtimoiy tarmoq linkini qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.social.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nomi</label>
                                <input  type="text" required class="form-control" name="name"
                                        placeholder="Ijtimoiy tarmoq nomini kiriting" value="{{old('name')}}">
                            </div>
                            @error ('name')
                            <p class="text-danger">* {{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label for="icon">Ikonka</label>
                                <input  type="text" required class="form-control" name="icon"
                                       placeholder="Ikonka klassini kiriting" value="{{old('icon')}}">
                            </div>
                            @error ('icon')
                                <p class="text-danger">* {{$message}}</p>
                            @enderror

                            <div class="form-group">
                                <label for="icon">Link</label>
                                <input type="text" required class="form-control" name="link"
                                       placeholder="Link kiriting" value="{{old('link')}}">
                            </div>
                            @error ('link')
                                <p class="text-danger">* {{$message}}</p>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    {{--end form--}}
                </div>

            </div>
        </div>
    </div>
    {{--    End Create--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <h3 class="card-title">Ijtimoiy tarmoq sozlamalari</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add"
                               class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Qo'shish
                            </a>
                        </div>
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
            <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomi</th>
                            <th>Ikon</th>
                            <th>Holati</th>
                            <th>Harakatlar</th>
                        </tr>
                        @foreach($socials as $social)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $social->name }}</td>
                                <td>{!! $social->getIcon() !!}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{route('admin.status', ['id'=>$social->id])}}" method="POST">
                                            <input type="hidden" name="type" value="SocialSetting">
                                            @csrf
                                            {!! $social->getStatus() !!}
                                        </form>
                                    </div>
                                </td>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.social.edit', $social->id) }}" type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.social.destroy',$social->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" onclick="return confirm('Ishonchingiz komillmi?')" type="submit" class="btn btn-danger btn-flat">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        {{$socials->links()}}
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
