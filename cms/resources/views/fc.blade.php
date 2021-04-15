@extends('layouts.app')
@include('layouts.head')
@include('layouts.header')

@section('content')
<!-- 旅程詳細 -->
        <!-- Promo Content -->
    <section>
 
                <!-- Vertically Centered Modals -->
                <div class="modal show" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Vertically Centered Modal</h5>
                        <button type="button" class="close new_event_cancel" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
                      <div class="modal-body">
                       <form action="" method="" class="form-horizontal">
                            {{ csrf_field() }}
                            <!-- 旅行のタイトル -->
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">カテゴリ</label>
                                    <input id="new_category" type="text" name="category" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">タイトル</label>
                                    <input id="new_title" type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">メモ</label>
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
                
    
  <div class="container-fluid row justify-content-between">
    <div id='external-events' class="w-25 mt-9 pr-3 pl-3">
      
      <div class="mt-9">
        <div class="list-group">
          <div class="list-group-item list-group-item-action bg-primary">
            <p class="mb-0 text-center text-white">未設定イベント</p>
          </div>
          <div class="list-group-item list-group-item-action">
            @foreach($events as $event)
            <div class="text-center">
              <div id="dropadd{{$event->id}}" class='fc-event mb-3 dropaddeventitem' width="150px"><p class="mb-0 text-center p-2 dropaddebent">{{$event->title}}</p></div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      
       
    </div>
    <div id='calendar-container' class="w-75 pr-3 pl-3">
      <div id='calendar' class="mt-9"></div>
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
