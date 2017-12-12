@extends('layouts.template')

@section('accountMenu')
    @parent
@show

@section('content')

<div class="col-sm-9">

<div class="page-header">
    <h3>Создать магазин</h3>
</div>


<style type="text/css">
.w200 {
    width: 200px;
}
.w300 {
    width: 300px;
}
.image-uploader {
    display: table;
    position: relative;
}
.iu-default {
    background: #f5f7f8 none repeat scroll 0 0;
    border: 2px dashed #e4e4e2;
    display: table-cell;
    width: 100%;
}
.iu-upload-btn input {
    height: 100px;
}

.iu-image {
    overflow: hidden;
    position: relative;
    width: 100%;
}
.iu-image-actions {
    position: absolute;
    top: 0px;
    right: 0px;
    padding: 5px;
}
</style>

<form class="form-horizontal" action="{{ url('/account/shops/create') }}" method="POST">
     {{ csrf_field() }}
<!--    <div class="form-group">
        <label class="col-sm-2 control-label" for="shop-logo">
            Логотип        </label>
        <div class="col-sm-8">
            <div class="image-uploader ng-scope" ng-app="imageUploader" ng-controller="ImageUploaderController" style="width: 200px;">
                <div class="iu-default" ng-hide="iuObject.thumb_url">
                    <div class="btn fileinput-button iu-upload-btn" ng-show="iuUploadBtn">
                        <i class="fa fa-cloud-upload fa-3x"></i>
                        <div>Выберите изображение...</div>
                        <input name="Shop[file]" value="" type="hidden"><input id="iu-fileupload" name="Shop[file]" type="file">                    </div>
                    <div class="small">Максимальный размер файла: 2M.</div>
                </div>
                <div class="iu-image ng-hide" ng-show="iuObject.thumb_url" style="width: 200px;">
                    <img src="" alt="">
                    <div class="iu-image-actions">
                        <a class="iu-update-btn" href="javascript:void(0);" ng-click="updateImage()" title="Изменить">
                            <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="small error-message" error-attribute="file"></div>        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="shop-type" data-toggle="popover" data-content-selector=".shop-type" data-original-title="" title="">
            Тип            <i class="fa fa-question-circle"></i>
        </label>
        <div class="col-sm-8">
            <select id="shop-type" class="form-control" name="Shop[type]">
<option value="shop" selected="selected">Мастерская</option>
<option value="showcase">Витрина</option>
</select>            <small><div></div></small>
        </div>
        <div class="hidden shop-type">
            <small>
                <strong>Мастерская</strong> - тип, который предоставляет все возможные способы покупки и заказа товаров/услуг.
                <br>
                <strong>Витрина</strong> - тип, который не предоставляет возможность сделать заказ или покупку товаров/услуг непосредственно.
                В таком случае связь с покупателями может вестись только через личные сообщения на сайте.
                Подходит для ремесленников, не зарегистрированных индивидуальными предпринимателями.
            </small>
        </div>
    </div>-->
    <div class="form-group">
        <label class="col-sm-2 control-label" for="shop-title" data-toggle="popover" data-content-selector=".shop-title" data-original-title="" title="">Название
            <i class="fa fa-question-circle"></i>
        </label>
        <div class="col-sm-8">
            <input id="shop-title" class="form-control" name="name" type="text" value="">            <small><div></div></small>
        </div>


    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="shop-description" data-toggle="popover" data-content-selector=".shop-description" data-original-title="" title="">Описание
            <i class="fa fa-question-circle" aria-hidden="true"></i>
        </label>
        <div class="col-sm-8">
            <textarea id="shop-description" class="form-control" name="description" rows="6" value=""></textarea>
             <div class="small"></div>
         </div>

    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn btn-success" name="save">Сохранить</button>
        <!--    <button type="submit" class="btn btn-success" name="createitem">Сохранить и добавить работу</button>-->
        </div>
    </div>
</form>
<script type="text/javascript">

// angular.module('imageUploader', [])
//     .controller('ImageUploaderController', function($scope) {
//         $scope.iuUploadBtn = true;
//         $scope.iuObject = {"id":null,"thumb_url":""};
//
//         $scope.iuUploadUrl = function() {
//             var url = '/frontend/shop/upload-logo';
//             if ($scope.iuObject.id)
//                 url = url + '?id=' + $scope.iuObject.id;
//             return url;
//         }
//         $scope.iuDeleteUrl = function() {
//             var url = '/frontend/shop/delete-logo';
//             if ($scope.iuObject.id)
//                 url = url + '?id=' + $scope.iuObject.id;
//             return url;
//         }
//         $scope.refreshImage = function() {
//             $scope.$apply();
//             angular.element('.iu-image img').attr('src', $scope.iuObject.thumb_url);
//         }
//         $scope.updateImage = function() {
//             $('#iu-fileupload').trigger('click');
//         }
//
//         // upload handler
//         var progressModal = $('#progress-modal');
//
//         $('#iu-fileupload').fileupload({
//             type: 'POST',
//             dataType: 'JSON',
//             url: $scope.iuUploadUrl(),
//             submit: function(e, data) {
//                 data.url = $scope.iuUploadUrl();
//                 progressModal.find('.progress-info .filename').html(data.files[0].name);
//             },
//             done: function(e, data) {
//                 var response = data.result;
//                 if (!response.errors) {
//                     $scope.iuObject = response;
//                     $scope.refreshImage();
//                 } else {
//                     for (var attribute in response.errors) {
//                         angular.element('[error-attribute="' + attribute + '"]').each(function(index) {
//                             angular.element(this).html(response.errors[attribute][0]);
//                         });
//                     }
//                 }
//             },
//             start: function(e) {
//                 $scope.iuUploadBtn = false;
//                 $scope.$apply();
//                 progressModal.modal('show');
//             },
//             stop: function(e) {
//                 $scope.iuUploadBtn = true;
//                 $scope.$apply();
//                 progressModal.modal('hide');
//             },
//             progress: function(e, data) {
//                 var progress = parseInt(data.loaded / data.total * 100, 10);
//                 progressModal.find('.progress-bar').css({'width': progress + '%'});
//                 progressModal.find('.progress-info .percent').html(progress + '%');
//             },
//         })
//         .prop('disabled', !$.support.fileInput)
//         .parent().addClass($.support.fileInput ? undefined : 'disabled');
//
//         // set image
//         angular.element('.iu-image img').attr('src', $scope.iuObject.thumb_url);
//     });
// </script>


 <script type="text/javascript">
// jQuery(function($){
//     $('[data-toggle=popover]').popover({
//         html: true,
//         trigger: 'hover',
//         content: function(){
//             return $($(this).attr('data-content-selector')).html();
//         },
//     });
// });
</script>

<!--
<style type="text/css">
.progress {
    position: relative;
}
.progress-info {
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
}
.progress-info .filename, .progress-info .percent {
    margin: 0 5px;
}
</style>

<div id="progress-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Загрузка файлов</h4>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-info">
                        <div class="pull-left filename"></div>
                        <div class="pull-right percent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    </div>-->
@endsection
