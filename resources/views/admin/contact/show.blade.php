@extends('layout.admin')
@section('title', 'Contact')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Xabarlar</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.contact') }}">Xabarlar</a></li>
                <li class="breadcrumb-item active">Xabar</li>
            </ol>
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Xabarni o`qish</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
                <h5>Xabar <span class="text-bold">{{$contact->name }} {{$contact->sname}}</span> dan</h5><br>
                <h6>Email: {{$contact->email}}</h6>
                <h6>Telefon: {{$contact->phone}}
                    <span class="mailbox-read-time float-right">{{$contact->created_at->format('M, d Y H:m')}}</span>
                </h6>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                    <form action="{{route('admin.contact.delete', $contact->id)}}" method="post" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Ishonchigiz komilmi?')" class="btn btn-default btn-sm" data-container="body" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
                <!-- /.btn-group -->
                <button type="button" onclick="window.print()" class="btn btn-default btn-sm" title="Print">
                    <i class="fas fa-print"></i>
                </button>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
                {!! $contact->text !!}
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
