@extends('layout.admin')
@section('title')
    Menus
@stop
@section('content')
    @include('admin.menus.create')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Menyular
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('admin.menus.order')}}" class="btn btn-warning btn-sm">
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
                    <th>Holati</th>
                    <th>Harakatlar</th>
                </tr>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{$menu->order}}</td>
                        <td>{{$menu->name_uz}}</td>
                        <td>{{$menu->name_en}}</td>
                        <td>{{$menu->name_ru}}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{route('admin.status', $menu->id)}}" method="POST">
                                    <input type="hidden" name="type" value="Menu">
                                    @csrf
                                    {!! $menu->getStatus() !!}
                                </form>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.menus.edit', $menu) }}" type="button"
                                   class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{route('admin.menus.destroy',$menu)}}" method="POST">
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
