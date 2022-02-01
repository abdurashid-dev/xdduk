@extends('layout.admin')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Hujjat</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user.table') }}">Hujjatlar</a></li>
                <li class="breadcrumb-item active">Hujjat</li>
            </ol>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title text-center">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h4>
        </div>
        <div class="card-body">
            <div class="container table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>{{__('words.title')}}</th>
                        <td>{{$doc->name}}</td>
                    </tr>
                    <tr>
                        <th>{{__('words.file')}}</th>
                        <td>
                            <a target="_blank" href="{{asset($doc->file)}}" target="_blank" style="font-size: 20px"><i
                                    class="far fa-file-pdf"></i> Yuklash</a>
                        </td>
                    </tr>
                    <tr>
                        <th>{{__('words.status')}}</th>
                        <td>{!! $doc->status() !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title text-center">{{__('words.comment')}}</h4>
        </div>
        <div class="card-body">
            <div class="container table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>{{__('words.file')}}</th>
                        <th>{{__('words.comment')}}</th>
                        <th>{{__('words.status')}}</th>
                        <th>{{__('words.date')}}</th>
                    </tr>
                    @foreach($comments as $comment)
                        <tr>
                            <td>
                                {{$comment->user->name}}
                            </td>
                            <td>
                                {{$comment->comment}}
                            </td>
                            <td>
                                {{$comment->doc_status()}}
                            </td>
                            <td>
                                {{$comment->created_at}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
