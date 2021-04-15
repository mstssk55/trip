<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            プロフィール
        </div>
        <div style="margin-top:50px;">
<h1>検索結果</h1>
@if(isset($users))
<table class="table">
  <tr>
    <th>ユーザー名</th><th>年齢</th><th>性別</th>
  </tr>
  @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td><td>{{$user->age}}</td><td>{{$user->sex}}</td>
    </tr>
  @endforeach
</table>
@endif
@if(!empty($message))
<div class="alert alert-primary" role="alert">{{ $message}}</div>
@endif
</div>

        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
  
        
        <section class="js-parallax u-promo-block u-promo-block--mheight-500 u-overlay u-overlay--dark text-white" style="background-image: url({{asset('storage/userback/DSC08394.JPG')}});">
        <!-- Promo Content -->
        <div class="container u-overlay__inner u-ver-center u-content-space">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="text-center">
                <h1 class="display-sm-4 display-lg-3">{{ Auth::user()->name }}</h1>
              </div>
            </div>
          </div>
        </div>
        <!-- End Promo Content -->
      </section>
      <!-- End Promo Block -->

    <!-- End Header -->

    <main role="main">
      <!-- About Section -->
      <section>
        <div class="container">
          <!-- Profile Block -->
          <div class="row">
            <div class="col-md-4 mx-auto">
              <div class="u-pull-half text-center">
                @if(Auth::user()->icon!='')
                    <img class="img-fluid u-avatar u-box-shadow-lg rounded-circle mb-3" width="200" height="auto" src="{{asset('storage/icon/'.Auth::user()->icon)}}" alt="Image Description">
                @else
                    <img class="img-fluid u-avatar u-box-shadow-lg rounded-circle mb-3" width="200" height="auto" src="{{asset('storage/icon/default.png')}}" alt="Image Description">
                @endif
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- End About Section -->
     
        <div class="mb-4 mb-lg-0">
            <ul class="list-group u-font-size-90">
                <li class="list-group-item bg-light">
                    <div class="media align-items-center justify-content-between container">
                        <p class="mb-0"><strong>友達一覧</strong></p>
                        <form class="form-inline my-2 my-lg-0" action="{{ url('/profile/f_search')}}" method="post">
                            {{ csrf_field()}}
                            {{method_field('get')}}
                            <input type="search" class="form-control mr-sm-2" placeholder="ユーザーIDで検索" name="name">
                            <button type="submit" class="btn btn-outline-info my-2 my-sm-0">search</button>
                        </form>
                    </div>
                    @if(session('flash_message'))
                        <div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
                    @endif
                </li>
                
                @foreach($friends as $friend)
                <li class="list-group-item">
                    <div class="media container">
                        <div class="media w-30">
                            <div class="d-flex mr-3">
                              @if($friend->icon!='')
                                <img class="rounded-circle u-box-shadow-sm mt-1" width="40" height="40" src="{{asset('storage/icon/'.$friend->icon)}}" alt="">

                              @else
                                <img class="rounded-circle u-box-shadow-sm mt-1" width="40" height="40" src="{{asset('storage/icon/default.png')}}" alt="">
                              @endif
                            </div>
                            <div class="media-body">
                                <p class="mb-0"><strong>{{$friend->name }}</strong></p>
                            </div>
                        </div>
                        <form action="" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-outline-info">
                                友達追加
                            </button>
                        </form>
                    </div>
                </li>
                
                @endforeach
            </ul>
        </div>
          <!-- End List Groups -->
            
    
@endsection