@extends('layout.admin')
@section('title')
    Blog show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Yangilik namoyishi</h3>
                        </div>
                        <div class="col-md-2">
                            <a type="button" href="{{ route('admin.blogs.index') }}" class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-arrow-left"></i> Orqaga
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th>#</th>
                            <td>{{ $blog->id }}</td>
                        </tr>
                        <tr>
                            <th>Holati</th>
                            <td>{!! $blog->getStatusBadge() !!} </td>
                        </tr>
                        <tr>
                            <th>Kategoriya</th>
                            <td>
                                {{ $blog->category->name_uz }}
                            </td>
                        </tr>
                        <tr>
                            <th>Sarlovha UZ</th>
                            <td>{{ $blog->title_uz }}</td>
                        </tr>
                        <tr>
                            <th>Sarlovha EN</th>
                            <td>{{ $blog->title_en }}</td>
                        </tr>
                        <tr>
                            <th>Sarlovha RU</th>
                            <td>{{ $blog->title_ru }}</td>
                        </tr>
                        <tr>
                            <th>Ma'lumot UZ</th>
                            <td>
                                {!! $blog->content_uz !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Ma'lumot RU</th>
                            <td>
                                {!! $blog->content_ru !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Ma'lumot EN</th>
                            <td>
                                {!! $blog->content_en !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Rasm</th>
                            <td>{!! $blog->getBlogImage('width:200px') !!}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
