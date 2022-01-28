@extends('layout.admin')
@section('title')
    Order menu
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <a href="{{route('admin.menus.index')}}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-left"></i>
                        Orqaga
                    </a>
                </div>
                <div class="col-6 text-right">
                    Menyularni tartiblash
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered user-select-none">
                <thead>
                <tr>
                    <th>Menyu nomlari</th>
                </tr>
                </thead>
                <tbody style="cursor: pointer">
                @foreach($menus as $menu)
                    <tr data-index="{{$menu->id}}" data-order="{{$menu->order}}">
                        <td class="border-0"><i class="fas fa-arrows-alt"></i> {{$menu->name_uz}}</td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('script')
<script>
    $(() => {
        $('table tbody').sortable({
            update: function (event, ui) {
                $(this).children().each(function (index) {
                    if ($(this).attr('data-order') != (index + 1)) {
                        $(this).attr('data-order', (index + 1)).addClass('updated')
                    }
                });
                saveOrders();
            }
        });
    })

    function saveOrders() {
        var orders = [];
        $('.updated').each(function () {
            orders.push([$(this).attr('data-index'), $(this).attr('data-order')])
            $(this).removeClass('updated');
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route('admin.menus.saveOrder')}}',
            method: 'POST',
            data: {
                updated: 1,
                orders: orders
            }, success: function (response) {
                console.log(response);
            }
        })
    }
</script>
@stop
