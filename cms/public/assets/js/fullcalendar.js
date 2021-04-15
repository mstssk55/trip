
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var Draggable = FullCalendarInteraction.Draggable;
    var Calendar = FullCalendar.Calendar;
    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    const calstartday = $('.calstartday').text();
    // console.log(calstartday.getDay())
    const calstart = new Date(calstartday);
    const setday = calstart.getDate();
    const trip_id_set = document.getElementById('dropaddtrip').getAttribute('name');

    new Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
            return {
                id:eventEl.id,
                title: eventEl.innerText
            };
        }
    });    
    var calendar = new Calendar(calendarEl, {
        height: 650,
        firstDay:setday,
        plugins: [ 'interaction', 'dayGrid','timeGrid' ],
        header: {//header部分のメニュー設定
        right: 'prev,next',
        center: 'title',
        left: ''
        },
        allDaySlot: false,
        droppable: true, // this allows things to be dropped onto the calendar
        scrollTime:"09:00",
        locale: 'ja',
        defaultView: 'timeGridWeek',//カレンダーを月ごとに表示
        eventSources: [
            {
              url: '/setEvents', 
              methos:'GET',
              extraParams:{
                  'trip_id_set':trip_id_set, 
              }   
            }
          ],
        defaultDate: calstartday,
        selectable: true,
        editable: true,//イベント編集
        selectLongPressDelay:0,// スマホでタップしたとき即反応  
       
        
        eventTimeFormat: { hour: 'numeric', minute: '2-digit' },
        eventMouseEnter: function(){
        },
        drop: function(info) {
          // is the "remove after drop" checkbox checked?
            info.draggedEl.parentNode.removeChild(info.draggedEl);
        },
        
        eventDrop: function(info){
        //eventをドラッグしたときの処理
             editEventDate(info);
        },
        eventReceive: function(info) {
            // イベントがexternal-eventからドロップされた時のコールバック
            // console.log(info.event.start);
            // console.log(info.event.end);
            dropAddevent(info)
         
        },
        eventResize: function(info) {
            // イベントがリサイズ（引っ張ったり縮めたり）された時のコールバック
            resizeEvent(info)
        },
        
        dateClick: function(info) {
        //日付をクリックしたときの処理
            // addEvent(calendar,info);
        },
        eventClick: function(info) {
        //カレンダーへのリンクはさせません。
        },
        select: function(info) {
            // const modal = document.getElementById('exampleModalCenter');
            // modal.classList.add('d-block');
            // $("#startevent").val(info.startStr);
            // $("#endevent").val(info.endStr);
            //  $('.new_event_save').on("click",function(info){
            //     const save = document.getElementById('exampleModalCenter');
            //     save.classList.remove('d-block');
            //     let category = $("#new_category").val();
            //     let title = $("#new_title").val();
            //     let text = $("#new_text").val();
            //     let startevent = $("#startevent").val();
            //     let endevent = $("#endevent").val();
            //     let newevent = [];
            //     newevent.push(category,title,text,startevent,endevent);
            //     addEvent(calendar,newevent);
                
            //     $("#new_category").val("");
            //     $("#new_title").val("");
            //     $("#new_text").val("");
            //     $("#startevent").val("");
            //     $("#endevent").val("");
            //     $(".new_event_save").off('click');
            // });
        }
    });

        
        calendar.render()
  
    
});