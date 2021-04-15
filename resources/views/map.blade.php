@extends('layouts.app')
@include('layouts.head')
@include('layouts.header')

@section('content')
<!-- 旅程詳細 -->
        <!-- Promo Content -->
<section>

<input type="text" id="keyword"><button id="search" class="mt-9">検索実行</button>
    <button id="clear">結果クリア</button>
    <button id="centerchange" onclick="change()">chenge</button>

  <div id="map" style="height:500px"></div>
<script src="{{asset("assets/js/maps/maps.js")}}"></script>  
  <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBdVVbddRby0y_s6Udh2_oGYRAT2hDUaCk&callback=initMap" 
          async defer>
  </script>
  
  
</section>
 


@endsection
@include('layouts.footer')
