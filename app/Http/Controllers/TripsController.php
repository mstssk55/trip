<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use Validator;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Tripplan;
use App\Plancategory;
use App\Event;
use App\Tripuser;
class TripsController extends Controller
{
    
    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    //更新処理
    public function update(Request $request)
    {
         //バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255'
        ]);
    
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        //以下に登録処理を記述（Eloquentモデル）
        // Eloquentモデル
        $trips = Trip::find($request->id);
        $trips->title = $request->title;
        $trips->departure = $request->departure;
        $trips->arrival = $request->arrival;
        $trips->days = '1';
        $trips->description = $request->description;
        $trips->fname = $request->fname;
        $trips->author_id = '1';
        $trips->save(); 
        return redirect('/');
    }
    
    
    //登録処理
    public function store(Request $request)
    {   
        //file 取得
        $file = $request->file('fname'); //file が空かチェック
        if( !empty($file) ){
        //ファイル名を取得
            $filename = $file->getClientOriginalName();
            //AWSの場合どちらかになる事がある”../upload/” or “./upload/”
            $move = $file->move('../storage/trip_thumb/',$filename); 
            //public/upload/... 
        }else{
            $filename = "";
        }
            
        $departure = new Carbon($request->departure);
        $arrival = new Carbon($request->arrival);
        $days = $departure->diffInDays($arrival);
        $days = $days + 1;
        //バリデーション
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
    
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）
        // Eloquentモデル
        $trips = new Trip;
        $trips->title = $request->title;
        $trips->departure = $request->departure;
        $trips->arrival = $request->arrival;
        $trips->days = $days;
        $trips->description = $request->description;
        $trips->fname = $filename;
        $trips->author_id = Auth::user()->id;
        $trips->save(); 
        return redirect('/');
    }
    
    //表示
    public function index(){
        $trips = Trip::orderBy('created_at', 'asc')->get();
        return view('top',[
                'trips' => $trips
        ]); 
    }
     //一覧ページ
    public function trip_list(){
        $trips = Trip::orderBy('created_at', 'asc')->get();
        // $auth_user = 
        return view('trip_list',[
                'trips' => $trips,

        ]); 
    }
    
      //プロフィール
    public function profile(){
        $friends = Auth::User()->friends()->get();
        $friends = $friends->merge(Auth::User()->oppsite_friends()->get());
        $users = User::all();
        
        $mytrips = Tripuser::where("user_id",Auth::user()->id)->get();
        $triparr =[];
        foreach($mytrips as $mytrip){
        $trips = Trip::find($mytrip->trip_id)->get();
        dd($trips);
        $triparr=$trips;
        };
        
        return view('profile',[
                'users'=>$users,
                'friends' =>$friends,
                'trips' =>$trips,
                'mytrips' =>$mytrips
            ]); 
    }
    
    
    
    public function f_search(Request $request) {
      $keyword_name = $request->name;

      if(!empty($keyword_name)) {
      $query = User::query();
      $users = $query->where('userid',$keyword_name)->get();
      $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
      return view('f_search')->with([
        'users' => $users,
        'message' => $message,
      ]);
    }

    else {
      $message = "検索結果はありません。";
      return view('f_search')->with('message',$message);
      }
    }
    
    
    
    
     //旅行詳細ページ
    public function trip_item(Trip $trip){
        $tripplans = Tripplan::where('trip_id',$trip->id)->get();
        $tripusers = Trip::find($trip->id)->users()->get();
        $friends = Auth::User()->friends()->get();
        $friends = $friends->merge(Auth::User()->oppsite_friends()->get());
        $plancategories = Plancategory::all();
        $events = Event::where('startdate',null)->get();

        return view('trip_item',[
            'trip'=>$trip,
            'tripusers' =>$tripusers,
            'friends' =>$friends,
            'tripplans' =>$tripplans,
            'plancategories' =>$plancategories,
            'events' =>$events
        ]); 
    }
    
    //更新画面
    public function edit(Trip $trips){
         return view('tripsedit',[
            'trip'=>$trips
        ]);
    }
    
    //削除処理
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect('/');
    }
        
    public function fc(){
        
        $events = Event::where('startdate',null)->get();
        return view('fc',[
                'events' => $events
        ]); 
        
        
    }
    public function map(){
        return view('map'); 
        
        
    }
        
}
