<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use Validator;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Tripuser;
use App\Tripplan;
use App\Plancategory;
use App\Event;

class TripplansController extends Controller
{
    //
    
    
    public function store(Request $request)
    {   
        // Eloquentモデル
        $tripplanadd = new Tripplan;
        $tripplanadd->trip_id = $request->trip_id;
        $tripplanadd->category_id = $request->category;
        $tripplanadd->plan = $request->plan;
        $tripplanadd->text = $request->text;
        $tripplanadd->user_id = $request->user_id;
        $tripplanadd->kanri_flg = '1';
        $tripplanadd->save();
        
        $tripplanevent = new Event;
        $tripplanevent->trip_id = $request->trip_id;
        $tripplanevent->tripplan_id = $tripplanadd->id;
        $tripplanevent->save();

        $trip = Trip::find($request->trip_id)->first();
        $tripplans = Tripplan::where('trip_id',$trip->id)->get();
        $tripusers = Trip::find($trip->id)->users()->get();
        $friends = Auth::User()->friends()->get();
        $friends = $friends->merge(Auth::User()->oppsite_friends()->get());
        $plancategories = Plancategory::all();
        
        return redirect(route('trip_item.index',[
                'trip'=>$request->trip_id,
                'trip_info'=>$trip,
                'tripusers' =>$tripusers,
                'friends' =>$friends,
                'tripplans' =>$tripplans,
                'plancategories' =>$plancategories,
                'tripplanevent' => $tripplanevent
            
            ]));

    }
    public function editkanri(Request $request)
    {  
        $data = $request->all();
        // Eloquentモデル
        $tripplanedit = Tripplan::find($data['id']);
       
        $tripplanedit->kanri_flg = $data['kanri_flg'];
        $tripplanedit->save(); 
        $newtripplan = $tripplanedit->plan;
        return response()->json([
            'id'=>$data['id'],
            'kanri_flg' => $data['kanri_flg'],
            'newtripplan' =>$newtripplan,
            ]);

    }
    
    
    public function setEvents(Request $request){
        $data = $request->all();
        $events = Event::where('trip_id',$data["trip_id_set"])->get();
        //カレンダーの期間内のイベントを取得
        $newArr = [];
        foreach($events as $item){
            if($item["startdate"] !=null){
                $start = '';
                $endevent = '';
                if($item["starttime"] !=null){
                    $start = $item["startdate"].'T'.$item["starttime"];
                }else{
                    $start = $item["startdate"];
                }
                if($item["endtime"] !=null){
                    $endevent = $item["enddate"].'T'.$item["endtime"];
                }else{
                    $endevent = $item["enddate"];
                }
                $newItem["id"] = $item["id"];
                $newItem["title"] = $item->tripplan->plan;
                $newItem["start"] = $start;
                $newItem["end"] = $endevent;
                $newItem["color"] = $item->tripplan->plancategory->color;
                $newArr[] = $newItem;
            }
            
        }
        //新たな配列を用意し、 EventsObjectが対応している配列にキーの名前を変更する
        echo json_encode($newArr);
        //json形式にして出力
    }

    public function formatDate($date){
        return str_replace('T00:00:00+09:00', '', $date);
    }
    // "2019-12-12T00:00:00+09:00"のようなデータを今回のDBに合うように"2019-12-12"に整形
    
    public function addEvent(Request $request)
    {
        $data = $request->all();
        $event = new Event();
        $event->startdate = $data['startdate'];
        
        $start = '';
        if($data["starttime"] != null){
            $event->starttime = $data['starttime'];
            $start = $data["startdate"].'T'.$data['starttime'];
        }else{
            $start = $data['startdate'];
        };
        $event->title = $data['title'];
        $event->save();
        
        return response()->json([
            'event_id' => $event->id,
            'title' => $event->title,
            'start' => $start
            ]);
    }
    // ajaxで受け取ったデータをデータベースに追加し、今度はidを返す。

    public function editEventDate(Request $request){
        $data = $request->all();
        if($data["newEndDate"] != null){
            $event = Event::find($data['id']);
            $event->startdate = $data['newStartDate'];
            $event->starttime = $data['newStartTime'];
            $event->enddate = $data['newEndDate'];
            $event->endtime = $data['newEndTime'];
            $event->save();
        }else{
            $event = Event::find($data['id']);
            $event->startdate = $data['newStartDate'];
            $event->starttime = $data['newStartTime'];
            $event->save();
        }
        
        return null;
    }
     public function dropAddevent(Request $request){
        $data = $request->all();
            $event = Event::where('trip_id',$data['trip_id'])->where('tripplan_id',$data['tripplan_id'])->first();
            $event->startdate = $data['newStartDate'];
            $event->starttime = $data['newStartTime'];
            $event->save();
        
        
        return null;
    }
    
    public function resizeEvent(Request $request){
        $data = $request->all();
            $event = Event::find($data['id']);
            $event->enddate = $data['newEndDate'];
            $event->endtime = $data['newEndTime'];
            $event->save();
        
        
        return null;
    }
    // ajaxで受け取ったデータからデータベースの日付データを変更。
}
