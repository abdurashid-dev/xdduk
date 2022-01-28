@extends('layout.admin')
@section('title')
    Submenus
@stop
@section('content')
    @include('admin.submenus.create')
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
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Submenyular
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('admin.submenus.order')}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-sort-amount-down-alt"></i>
                        Tartiblash
                    </a>
                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fas fa-plus"></i>
                        Qo'shish
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>T/R</th>
                    <th>Nomi uz</th>
                    <th>Nomi en</th>
                    <th>Nomi ru</th>
                    <th>Bosh menyusi</th>
                    <th>Holati</th>
                    <th>Harakatlar</th>
                </tr>
                @foreach($submenus as $menu)
                    <tr>
                        <td>{{$menu->order}}</td>
                        <td>{{$menu->name_uz}}</td>
                        <td>{{$menu->name_en}}</td>
                        <td>{{$menu->name_ru}}</td>
                        <td>{{$menu->menu->name_uz}}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{route('admin.status', $menu->id)}}" method="POST">
                                    <input type="hidden" name="type" value="SubMenu">
                                    @csrf
                                    {!! $menu->getStatus() !!}
                                </form>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.submenus.edit', $menu) }}" type="button"
                                   class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{route('admin.submenus.destroy',$menu)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Ishonchingiz komilmi? ')"
                                            type="submit" class="btn btn-danger btn-flat">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
