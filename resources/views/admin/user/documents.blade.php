@extends('layout.admin')
@section('title', 'Documents')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Hujjatlar</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Hujjatlar</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Hujjatlar</div>
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th scope="col">{{__('words.title')}}</th>
                        <th scope="col">{{__('words.file')}}</th>
                        <th scope="col">{{__('words.work')}}</th>
                        <th scope="col">{{__('words.condition')}}</th>
                        <th scope="col">{{__('words.action')}}</th>
                    </tr>
                    @forelse($documents as $document)
                        <tr>
                            <td>{{$document->name}}</td>
                            <td><a href="{{asset($document->file)}}"
                                   style="font-size: 25px"><i
                                        class="far fa-file-pdf"></i></a></td>
                            @if($user->offer->count() > 0)
                                <td>{{$document->offer['name_'.session('locale')]}}</td>
                            @else
                                <td>Biriktirilgan ish topilmadi!</td>
                            @endif
                            <th>
                                {!! $document->getOfferStatus() !!}
                                @if($document->status == 'rad etilgan')
                                    <div class="badge badge-danger">
                                        rad etilgan
                                    </div>
                                @endif
                            </th>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.user.show', $document->id) }}"
                                       type="button"
                                       class="btn btn-primary btn-flat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($document->status == 'rad etilgan')
                                        <a href="{{ route('admin.user.edit', $document->id) }}"
                                           type="button"
                                           class="btn btn-success btn-flat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">{{__('words.no_data')}}</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@stop


