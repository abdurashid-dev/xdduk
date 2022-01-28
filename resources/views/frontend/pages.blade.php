@extends('layout.frontend')
@section('content')
    <div class="container">
        <div class="row m-3 mt-4">
            <div class="col-md-12">
                <h3 class="text-center m-3">{{ $page['name_'.session('locale')] }}</h3>
                {!! $page['content_'.session('locale')] !!}
            </div>
        </div>
    </div>
@stop
