@extends('layouts.template')

@push('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>

    <script type="text/javascript">
    ymaps.ready(init);
    var myMap;
//Console.log(init);
    function init(){
        myMap = new ymaps.Map("map", {
            center: [53.902496, 27.561481],
            zoom: 12
        });

    }
    </script>
@endpush

@section('accountMenu')
    @parent
@show

{{-- @section('content')
 {{ $title1 }}  <br>
 {{ $title2 }} <br>
 {{ $title3 }} <br>
@endsection --}}

@section('content')
 <div class="col-xs-12 col-sm-9">
     <div class="page-header">
         <h3>Яндекс карта</h3>
     </div>
     <noscript><p>js отключен</p></noscript>
     <div id="map" style="width: 600px; height: 400px">

     </div>
 </div>
@endsection
