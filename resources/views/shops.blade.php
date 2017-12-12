@extends('layouts.template')

@section('accountMenu')
    @parent
@show

@section('content')
    <div class="col-sm-9">

    <style type="text/css">
    .td-thumb {
        width: 90px;
    }
    .td-actions {
        width: 140px;
    }
    </style>

    <div class="page-header">
        <h3>
            Мои Магазины
            <a class="btn btn-success btn-sm btn-orange" href="{{ url('/account/shops/create/cform') }}">Создать магазин</a>
        </h3>
    </div>
    <table class="table table-striped table-hover table-list">
        <tbody>
            @if(isset($data))
                @foreach ($data as $value)
                <tr>
                <td class="td-thumb">
                    <div class="thumbnail thumbnail-64x64">
                        <img class="center" src="{{ asset('img/shopslogo.jpg') }}" alt="" style="position: relative; left: 0px; top: 7px;">
                    </div>
                </td>
                <td>
                    <a title="{{ $value['name'] }}" href="#"> {{ $value['name'] }} </a>
                    <p>{{ $value['description'] }}</p>
                </td>
                <td class="td-actions">
                    <div>

                        <a class="ws-nowrap" href="{{ url('/account/shops/upd/uform/'.$value['id']) }}" title="Редактировать магазин" data-toggle="tooltip">
                            <i class="fa fa-pencil fa-fw"></i>Редактировать
                        </a>
                        <a class="ws-nowrap" href="{{ url('/account/shops/delete/'.$value['id']) }}" title="Удалить магазин" data-y-url="#" data-toggle="modal" data-target="#confirmation-modal-delete-shop">
                            <i class="fa fa-trash fa-fw"></i>Удалить
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
    </table>

    <!-- confirmation modal
    <div id="confirmation-modal-delete-shop" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        Удаление магазина                </h4>
                </div>
                <div class="modal-body">
                    <i class="fa fa-exclamation-triangle fa-fw"></i>
                    Убедитесь, что все работы магазина удалены. Продолжить удаление?            </div>
                <div class="modal-footer">
                    <a id="y-url" class="btn btn-primary" href="#">Да</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>-->

    <script type="text/javascript">
    /*jQuery(function($) {
        $('#confirmation-modal-delete-shop').on('show.bs.modal', function(e) {
            $(this).find('#y-url').attr('href', $(e.relatedTarget).attr('data-y-url'));
        });
    });*/
    </script>
                </div>
    </div>

@endsection
