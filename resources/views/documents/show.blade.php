@extends('layout.admin')
@section('title', 'Document')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Loyiha</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.documents.index') }}">Loyihalar</a></li>
                        <li class="breadcrumb-item active">Loyiha</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Loyiha</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $document->id }}</td>
                                </tr>
                                <tr>
                                    <th>MCHJ nomi</th>
                                    <td>{{ $document->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>MCHJ tashkilot tarafidan qo'yilgan nom</th>
                                    <td>{{ $document->name }}</td>
                                </tr>
                                <tr>
                                    <th>Manzil</th>
                                    <td>{{ $document->offer->address }}</td>
                                </tr>
                                <tr>
                                    <th>Biriktirilgan hujjat</th>
                                    <td>{{ $document->offer->name_uz }}</td>
                                </tr>
                                <tr>
                                    <th>Fayl</th>
                                    <td><a target="_blank" href="{{asset($document->file)}}" class="fs-4"><i
                                                class="fas fa-file-pdf"></i> Download</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Izohlar</h3>
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
                            <h3 class="card-title">MCHJ tashkilotga xabar yozish</h3>
                        </div>
                        <div class="card-body">
                            @foreach($user->offer as $offer)
                                @if($offer->id == $document->offer_id)
                                    @if($offer->status == 'real')
                                        <div class="alert alert-success">
                                            <p>Realizatsiya qilingan</p>
                                        </div>
                                    @else
                                        <form action="{{ route('admin.documents.update', $document->id) }}"
                                              method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="status">Statusni tanlang</label>
                                                <select name="status" id="status" class="form-control">
                                                    {!! $document->showStatus($offer) !!}
                                                    <option value="rad etish">Rad etish</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Xabar</label>
                                                <textarea name="comment" id="comment" cols="30" rows="10"
                                                          class="form-control">{{ $document->message }}</textarea>
                                            </div>
                                            <input type="hidden" name="offer_id" value="{{$offer->id}}">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Saqlash</button>
                                            </div>
                                        </form>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
