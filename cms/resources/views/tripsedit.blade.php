@extends('layouts.app')
@section('content')
<div class="row container">
    <div class="col-md-12">
    @include('common.errors')
    <form action="{{ url('trips/update') }}" method="POST">

        <!-- item_name -->
        <div class="form-group">
           <label for="trip">タイトル</label>
           <input type="text" name="title" class="form-control" value="{{$trip->title}}">
        </div>
        <!--/ item_name -->
        
        <!-- item_number -->
        <div class="form-group">
           <label for="出発日">出発日</label>
        <input type="date" name="departure" class="form-control" value="{{$trip->departure}}">
        </div>
        <!--/ item_number -->

        <!-- item_amount -->
        <div class="form-group">
           <label for="到着日">到着日</label>
        <input type="date" name="arrival" class="form-control" value="{{$trip->arrival}}">
        </div>
        <!--/ item_amount -->
        
        <!-- published -->
        <div class="form-group">
           <label for="description">内容</label>
            <input type="text" name="description" class="form-control" value="{{$trip->description}}">
        </div>
        <div class="col-sm-6">
                <label>画像</label>
                <input type="file" name="fname" value="{{$trip->fname}}">
            </div>
        <!--/ published -->
        
        <!-- Saveボタン/Backボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/') }}">
                Back
            </a>
        </div>
        <!--/ Saveボタン/Backボタン -->
         
         <!-- id値を送信 -->
         <input type="hidden" name="id" value="{{$trip->id}}">
         <!--/ id値を送信 -->
         
         <!-- CSRF -->
         @csrf
         <!--/ CSRF -->
         
    </form>
    </div>
</div>
@endsection
