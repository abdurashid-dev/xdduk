@extends('layout.admin')
@section('title')
    MCHJ tashkilotlar
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10 mb-3">
                    <h3 class="card-title">MCHJ tashkilotlar</h3>
                </div>
                <div class="col-md-2">
                    <a href="{{route('admin.users.create')}}" class="btn btn-primary float-end"><i
                            class="fas fa-plus"></i> Qo'shish
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>MCHJ tashkilot nomi</th>
                    <th>Email</th>
                    <th>Holati</th>
                    <th>Harakatalar</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{($users->currentpage()-1)*$users->perpage()+($loop->index+1)}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{route('admin.userStatus', $user)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="User">
                                    {!! $user->getStatus() !!}
                                </form>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('admin.users.show', $user)}}" class="btn btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.users.edit', $user) }}" type="button"
                                   class="btn btn-success btn-flat">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{route('admin.users.destroy',$user)}}" method="POST">
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
    {{$users->links()}}
@stop
