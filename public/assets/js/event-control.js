
// function addEvent(calendar,info){
//     //addEvent()を使うためにfullcalendar.jsで定義したcalendarを引数で受け取る
//     var dateStr = info.dateStr;
//     console.log(dateStr);
//     var datetime = info.date;
//     console.log(datetime);
//     let startdate = '';
//     let starttime = '';
//     if(dateStr.length < 11){
//         startdate = dateStr;
//     }else{
//         startdate = formatDate(datetime);
//         starttime = formatTime(datetime);
//     }
//     var title = "サンプルイベント";
//     //ホントはjsでformのvalue取得とかするんだと思いますが、説明を簡潔にするために割愛します。
//     $.ajax({
//         headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         url: '/ajax/addEvent',
//         type: 'POST',
//         dataType: 'json',
//         data:{
//             "title":title,
//             "startdate":startdate,
//             "starttime":starttime
//             //日程取得
//         }
        
//     }).done(function(result) {
//         calendar.addEvent({
//             id:result['event_id'],
//             title:result['title'],
//             start:result['start'],

//         });
//         //ajaxに成功したらフロント側にeventを追加で表示
//     });
// }


function addEvent(calendar,newevent){
    //addEvent()を使うためにfullcalendar.jsで定義したcalendarを引数で受け取る
    const category = newevent[0];
    const title = newevent[1];
    const text = newevent[2];
    let startdate = '';
    let starttime = '';
    if(newevent[3].length < 11){
        startdate = newevent[3];
    }else{
        let split = newevent[3].split('T');
        const del = '+09:00';
        let replace = split[1].replace(del,'');
        startdate = split[0];
        starttime = replace;
    }
    //ホントはjsでformのvalue取得とかするんだと思いますが、説明を簡潔にするために割愛します。
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/ajax/addEvent',
        type: 'POST',
        dataType: 'json',
        data:{
            "title":title,
            "startdate":startdate,
            "starttime":starttime
            //日程取得
        }
        
    }).done(function(result) {
        calendar.addEvent({
            id:result['event_id'],
            title:result['title'],
            start:result['start'],

        });
        //ajaxに成功したらフロント側にeventを追加で表示
    });
}
function dropAddevent(info){
    const trip_id = document.getElementById('dropaddtrip').getAttribute('name');
    console.log(trip_id)
    const id=info.event.id;
    const tripplan_id = id.replace("dropadd", "");
    console.log(tripplan_id)
    var startdate = formatDate(info.event.start);
    console.log(startdate)
    var starttime = formatTime(info.event.start);
        console.log(starttime)

    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/ajax/dropAddevent',
        type: 'POST',
        data:{
            "trip_id":trip_id,
            "tripplan_id":tripplan_id,
            "newStartDate":startdate,
            "newStartTime":starttime,
            //ドロップしたあとの日付をphp側に渡す
        }
    })
}

function resizeEvent(info){
    const event_id = info.event.id
    const enddate = formatDate(info.event.end)
    const endtime = formatTime(info.event.end)
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/ajax/resizeEvent',
        type: 'POST',
        data:{
            "id":event_id,
            "newEndDate":enddate,
            "newEndTime":endtime,
            //ドロップしたあとの日付をphp側に渡す
        }
    })
}

function editEventDate(info){
    var event_id = info.event.id;
    var startdate = formatDate(info.event.start);
    var starttime = formatTime(info.event.start);
    if(info.event.end != null){
        var enddate = formatDate(info.event.end);
        var endtime = formatTime(info.event.end);
    }else{
        var enddate = "";
        var endtime = "";
    }
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/ajax/editEventDate',
        type: 'POST',
        data:{
            "id":event_id,
            "newStartDate":startdate,
            "newStartTime":starttime,
            "newEndDate":enddate,
            "newEndTime":endtime
            //ドロップしたあとの日付をphp側に渡す
        }
    })
}



function formatDate(date) {
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var newDate = year + '-' + month + '-' + day;
    return newDate;
}
function formatTime(time) {
    var hour = time.getHours();
    var minute = time.getMinutes();
    var second = time.getSeconds();
    if (minute == 0){
        var newTime = hour + ':' + '00' + ':0' + second;
    }else{
        var newTime = hour + ':' + minute + ':0' + second;
    }
    return newTime;
}
//info.event.startの日付を"2019-12-12"のように整形する関数