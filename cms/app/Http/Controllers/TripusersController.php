<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use Validator;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Tripuser;
class TripusersController extends Controller
{
    
    //旅行に友達を追加する
    public function store(Request $request)
    {   
        
        // Eloquentモデル
        $tripuseradd = new Tripuser;
        $tripuseradd->trip_id = $request->trip_id;
        $tripuseradd->user_id = $request->user_id;
        $tripuseradd->kanri_flg = '1';
        $tripuseradd->life_flg = '1';
        $tripuseradd->save(); 
        // return redirect('/trip_item/'.$request->trip_id);
        $trip = Trip::find($request->trip_id)->get();
        $tripusers = Trip::find($request->trip_id)->users()->get();
        $friends = Auth::User()->friends()->get();
        $friends = $friends->merge(Auth::User()->oppsite_friends()->get());
        
        return redirect(route('trip_item.index',[
                'trip'=>$request->trip_id,
                'trip_info'=>$trip,
                'tripusers' =>$tripusers,
                'friends' =>$friends
            
            ]));

    }
    
     //旅行の友達を削除する
    public function destroy(Request $request)
    {   
        Tripuser::where('trip_id',$request->trip_id)->where('user_id',$request->user_id)->delete();
        $trip = Trip::find($request->trip_id)->get();
        $tripusers = Trip::find($request->trip_id)->users()->get();
        $friends = Auth::User()->friends()->get();
        $friends = $friends->merge(Auth::User()->oppsite_friends()->get());
        
        return redirect(route('trip_item.index',[
                'trip'=>$request->trip_id,
                'trip_info'=>$trip,
                'tripusers' =>$tripusers,
                'friends' =>$friends
            
            ]));

    }
}
