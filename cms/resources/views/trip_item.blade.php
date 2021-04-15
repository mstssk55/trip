@extends('layouts.app')
@include('layouts.head')
@include('layouts.header')

@section('content')
<!-- 旅程詳細 -->
        <!-- Promo Content -->
    <section class="u-promo-block u-promo-block--mheight-500 u-overlay u-overlay--dark text-white" style="background-image: url({{asset('storage/userback/DSC08394.JPG')}});">
        <!-- Promo Content -->
            <div class="container u-overlay__inner u-ver-center u-content-space">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="text-center">
                            <h1 class="display-sm-4 display-lg-3">{{ $trip->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Promo Content -->
    </section>
    <!-- End Promo Block -->


       
    <div class="container mt-6">
          <!-- 旅程概要 -->
        <div class="media">
              
        　  <div class="col-lg-6 mb-5 mb-lg-5 pl-lg-5">
              <h4 class="mb-3">作成者</h4>
              
              <div class="media mb-3">
                @if($trip->user_id->icon!='')
                  <img class="rounded-circle u-box-shadow-sm mr-2 border-success border" width="35" height="35" src="{{asset('storage/icon/'.$trip->user_id->icon)}}" alt="Image Description">
                  <p class="mb-sm-0">{{$trip->user_id->name}}</p>                    
                  @else
                　<img class="rounded-circle u-box-shadow-sm mr-2 border-success border" width="35" height="35" src="{{asset('storage/icon/default.png')}}" alt="Image Description">
                　<p class="mb-sm-0">{{$trip->user_id->name}}</p>
                @endif
            　</div>
            　
            　<h6 class="mb-3">参加者</h6>
            　<div class="row">
            　　@if(count($tripusers)> 0)
                　<div class="row">
              　     @foreach($tripusers as $tripuser)
                        @if($tripuser->id != Auth::user()->id)
                            @if($tripuser->icon!='')
                                <img class="rounded-circle u-box-shadow-sm mr-2 d-block mb-2 border-success border" data-toggle="tooltip" data-placement="top" title="{{$tripuser->name}}" width="35" height="35" src="{{asset('storage/icon/'.$tripuser->icon)}}" alt="">
                            @else
                                <img class="rounded-circle u-box-shadow-sm mr-2 d-block mb-2 border-success border" data-toggle="tooltip" data-placement="top" title="{{$tripuser->name}}" width="35" height="35" src="{{asset('storage/icon/default.png')}}" alt="">
                            @endif
                        @endif
                    @endforeach
                　</div>
                @endif
                
                <div class="media">
                  <div class="mr-1">
                  <!-- Trigger Modal -->
                  <a class="u-link text-center d-block" 
                      data-toggle="modal" 
                      href="#exampleModalLong"
                  >
                      <button type="button" class="btn btn-primary btn--circle">
                        <i class="fas fa-user-plus text-white"></i>
                      </button>
                  </a>
                <!-- Scrolling Long Content -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">この旅行に友達を追加する</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <ul class="list-group u-font-size-90">
                         @foreach($friends as $friend)
                            <li class="list-group-item">
                                <div class="media container justify-content-between">
                                    <div class="media">
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
                                    <form action="{{url('tripuseradd')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="trip_id" value="{{$trip->id}}" class="form-control">
                                        <input type="hidden" name="user_id" value="{{$friend->id}}" class="form-control">
                                        <button type="submit" class="btn btn-success">
                                            追加
                                        </button>
                                    </form>
                                </div>
                            </li> 
                        @endforeach
                        </ul>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Scrolling Long Content -->
              </div>
                <!-- Trigger Modal -->
                <div>
                <a class="u-link text-center d-block" 
                    data-toggle="modal" 
                    href="#tripuseredit"
                >
                    <button type="button" class="btn btn-primary btn--circle">
                      <i class="fas fa-user-edit text-white"></i>
                    </button>
                </a>
                <!-- End Trigger Modal -->

                <!-- Scrolling Long Content -->
                <div class="modal fade" id="tripuseredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">参加メンバーを管理する</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <ul class="list-group u-font-size-90">
                          @foreach($tripusers as $tripuser)
                            @if($tripuser->id != Auth::user()->id)
                            <li class="list-group-item">
                                <div class="media container justify-content-between">
                                    <div class="media">
                                        <div class="d-flex mr-3">
                                          @if($tripuser->icon!='')
                                            <img class="rounded-circle u-box-shadow-sm mt-1" width="40" height="40" src="{{asset('storage/icon/'.$tripuser->icon)}}" alt="">
            
                                          @else
                                            <img class="rounded-circle u-box-shadow-sm mt-1" width="40" height="40" src="{{asset('storage/icon/default.png')}}" alt="">
                                          @endif
                                        </div>
                                        <div class="media-body">
                                            <p class="mb-0"><strong>{{$tripuser->name }}</strong></p>
                                        </div>
                                    </div>
                                    <form action="{{url('tripuserdel')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="trip_id" value="{{$trip->id}}" class="form-control">
                                        <input type="hidden" name="user_id" value="{{$friend->id}}" class="form-control">
                                        <button type="submit" class="btn btn-success">
                                            削除
                                        </button>
                                    </form>
                                </div>
                            </li>
                            @endif
                        　@endforeach
                        </ul>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                </div>
                </div>
                <!-- End Scrolling Long Content -->
            </div>

            <div class="col-lg-6">
                <h4 class="mb-3">About</h4>
              <p>{{$trip->description}}</p>
              
              <h5 class="u-font-size-90 mb-1">出発日</h4>
              <div class="progress mb-3 h-auto">
                  <p class="pt-2 pl-2 pb-2 mb-sm-0 calstartday">{{$trip->departure}}</p>
              </div>
              <!-- End Progress Bar -->
             <h5 class="u-font-size-90 mb-1">到着日</h4>
              <div class="progress mb-3 h-auto">
                  <p class="pt-2 pl-2 pb-2 mb-sm-0">{{$trip->arrival}}</p>
              </div>
              
              <h5 class="u-font-size-90 mb-1">日数</h4>
              <div class="progress mb-3 h-auto">
                  <p class="pt-2 pl-2 pb-2 mb-sm-0">{{$trip->days - 1}} 泊 {{$trip->days}} 日</p>
              </div>
            </div>
            
            
         
          <!-- End About and Skills -->
        </div>
    </div>
    
    
    <div class="container mt-6 mb-3">
      
      
      
      <div class="card text-center">
        <div class="card-header bg-primary row justify-content-between mr-0 ml-0 align-items-center">
              <h6 class="nav-link active text-white mb-0" id="pills-home-tab-1">行きたい</h6>
              <button type="button" class="btn btn-secondary btn--circle btn-sm test" 
                      data-toggle="collapse" 
                      data-target="#pills-tabContent" 
                      aria-expanded="false" 
                      aria-controls="collapseExample">
                <i class="fas fa-plus text-primary"></i>
              </button>
        </div>
        <div class="card-body tab-content tab-content--v1 collapse" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home-1" role="tabpanel" aria-labelledby="pills-home-tab-1">
              <form action="{{ url('tripplanadd') }}" method="POST" class="form-horizontal mb-6">
                {{ csrf_field() }}
                <div class="form-group">
                  <p class="text-left pl-3">カテゴリ</p>
                  <div class="text-left pl-3">
                    @foreach($plancategories as $category)
                    
                    <div class="form-check form-check-inline">
                      <input type="radio" id="category_{{$category->id}}" name="category" value="{{$category->id}}" class="form-check-input">
                      <label for="category_{{$category->id}}" class="form-check-label">{{$category->category}}</label>
                    </div>
                    
                    @endforeach
                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <p class="text-left">場所</p>
                  <input type="text" name="plan" class="form-control">
                </div>
                <div>
                <!--<div class="row pl-3 pr-3">-->
                <!--  <div class="form-group col-sm-3">-->
                <!--    <p class="text-left">出発日</p>-->
                <!--    <input type="date" value="{{$trip->departure}}" name="startdate" class="form-control">-->
                <!--  </div>-->
                <!--  <div class="form-group col-sm-3">-->
                <!--          <p class="text-left">時間</p>-->
                <!--          <input type="time" name="starttime" class="form-control">-->
                <!--  </div>-->
                <!--  <div class="form-group col-sm-3">-->
                <!--          <p class="text-left">到着日</p>-->
                <!--          <input type="date" value="{{$trip->departure}}" name="enddate" class="form-control">-->
                <!--  </div>-->
                <!--  <div class="form-group col-sm-3">-->
                <!--          <p class="text-left">時間</p>-->
                <!--          <input type="time" name="endtime" class="form-control">-->
                <!--  </div>-->
                <!--</div>-->
                </div>
                <div class="form-group pl-3 pr-3">
                        <p class="text-left">内容</p>
                        <input type="text" name="text" class="form-control">
                </div>
                <input type="hidden" name="trip_id" value="{{$trip->id}}" class="form-control">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control">

                <div class="form-group row justify-content-center">
                  <button type="submit" class="btn btn-block btn-primary w-50">追加</button>
                </div>
            </form>
              
            
            <table class="table mb-5 tripplan_table">
              <thead class="text-left">
                <tr>
                  <th scope="col"></th>
                  <th scope="col" class="w-25">場所</th>
                  <th scope="col">内容</th>
                  <th scope="col">登録者</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              @foreach($tripplans as $tripplan)
              
              <tbody class="text-left">
                <tr>
                  @if($tripplan->category_id == 1)
                  <td><i class="fas fa-plane"></i></td>
                  @elseif($tripplan->category_id == 2)
                  <td><i class="fas fa-bed"></i></td>
                  @elseif($tripplan->category_id == 3)
                  <td><i class="fas fa-utensils"></i></td>
                  @elseif($tripplan->category_id == 4)
                  <td><i class="fas fa-child"></i></td>
                  @elseif($tripplan->category_id == 5)
                  <td><i class="fas fa-info-circle"></i></td>
                  @endif
                  <td>{{$tripplan->plan}}</td>
                  <td>{{$tripplan->text}}</td>
                  <td>
                    @if($tripplan->planuser->icon!='')
                        <img class="rounded-circle u-box-shadow-sm  d-block border-success border" data-toggle="tooltip" data-placement="top" title="{{$tripplan->planuser->name}}" width="35" height="35" src="{{asset('storage/icon/'.$tripplan->planuser->icon)}}" alt="">
                    @else
                        <img class="rounded-circle u-box-shadow-sm d-block border-success border" data-toggle="tooltip" data-placement="top" title="{{$tripplan->planuser->name}}" width="35" height="35" src="{{asset('storage/icon/default.png')}}" alt="">
                    @endif
                  </td>
                  <td id="plan_favorite{{$tripplan->id}}" name="{{$tripplan->kanri_flg}}" value="{{$tripplan->trip_id}}" class="plan_favorite">
                    @if($tripplan->kanri_flg ==1)
                    <i class="far fa-star text-secondary"></i>
                    @elseif($tripplan->kanri_flg ==2)
                    <i class="fas fa-star text-primary"></i>
                    @endif
                    </td>
                </tr>
              </tbody>
              
              @endforeach
            </table>
        
          </div>
          
        </div>
      </div>
      
      
    </div>
    
                   <section>
 
                <!-- Vertically Centered Modals -->
                <div class="modal show" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">予定を追加する</h5>
                        <button type="button" class="close new_event_cancel" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       <form action="" method="" class="form-horizontal">
                            {{ csrf_field() }}
                            <!-- 旅行のタイトル -->
                            <div class="form-group">
                                    <p class="text-left pl-3">カテゴリ</p>
                                    <div class="text-left pl-3">
                                      @foreach($plancategories as $category)
                                      
                                      <div class="form-check form-check-inline">
                                        <input type="radio" id="category_{{$category->id}}" name="category" value="{{$category->id}}" class="form-check-input">
                                        <label for="category_{{$category->id}}" class="form-check-label">{{$category->category}}</label>
                                      </div>
                                      
                                      @endforeach
                                    </div>
                            </div>
                            <div class="form-group">
                                    <p class="text-left">場所</p>
                                    <input id="new_title" type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                    <p class="text-left">内容</p>
                                    <input id="new_text" type="text" name="text" class="form-control">
                            </div>
                            <input id="startevent" type="hidden" name="startevent" value="" class="form-control">
                            <input id="endevent" type="hidden" name="endevent" value="" class="form-control">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary new_event_cancel" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary new_event_save">Save changes</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
<div class="row ml-0 mr-0 mapcal_flex">       
  <div class="w-50 mt-9 pr-2 pl-2 mapcal">
  
  <!--<input type="text" id="keyword"><button id="search" class="mt-9">検索実行</button>-->
  <!--    <button id="clear">結果クリア</button>-->
  <!--    <button id="centerchange"">chenge</button>-->
    <div id="map" style="height:800px"></div>
    <script src="{{asset("assets/js/maps/maps.js")}}"></script>  
    <!--<script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBdVVbddRby0y_s6Udh2_oGYRAT2hDUaCk&callback=initMap" -->
    <!--        async defer>-->
    <!--</script>-->
  </div>

  <div class="w-50  pr-2 pl-2 mapcal">
    <div id='external-events' class="mt-9">
      <div class="list-group">
        <div class="list-group-item list-group-item-action bg-secondary">
          <p class="mb-0 text-center">未設定イベント</p>
        </div>
        <div class="list-group-item">
          <div id="dropaddtrip" name="{{$trip->id}}" class=" row mr-0 ml-0 newdropevent">
          @foreach($tripplans as $event)
            @if($event->kanri_flg ==2 && $event->plan_event->startdate == null)
            <div class="mr-2" style="width:100px">
              <div id="dropadd{{$event->id}}" class='fc-event mb-3 dropaddeventitem' style="width:100px"><p class="small mb-0 text-center p-2 dropaddebent">{{$event->plan}}</p></div>
            </div>
            @endif
          @endforeach
          </div>
        </div>
      </div>
    </div>
    <div id='calendar-container'>
      <div id='calendar' class="mt-4"></div>
    </div>
  </div>
  </section>
    <!-- End Promo Block -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    
</script>
<script src='{{asset('assets/js/fullcalendar/core/main.js')}}'></script>
<script src='{{asset('assets/js/fullcalendar/daygrid/main.js')}}'></script>
<script src='{{asset('assets/js/fullcalendar/interaction/main.js')}}'></script>
<script src='{{asset('assets/js/fullcalendar/timegrid/main.js')}}'></script>

<script src="{{asset('assets/js/ajax-setup.js')}}"></script>
<script src='{{asset('assets/js/fullcalendar.js')}}'></script>
<script src='{{asset('assets/js/event-control.js')}}'></script>

<link href='{{asset('assets/css/fullcalendar/core/main.css')}}' type="text/css" rel='stylesheet' />
<link href='{{asset('assets/css/fullcalendar/daygrid/main.css')}}' type="text/css" rel='stylesheet' />
<link href='{{asset('assets/css/fullcalendar/timegrid/main.css')}}' type="text/css" rel='stylesheet' />
<script>
   
    
    $('.new_event_cancel').on("click",function(){
        const cancel = document.getElementById('exampleModalCenter');
        cancel.classList.remove('d-block');
    });
    
</script>
@endsection
@include('layouts.footer')
