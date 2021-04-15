<?php
use App\Trip;
use App\Tripuser;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'],function(){
    
    //旅行登録ページ表示
    Route::get('/','TripsController@profile');

    //旅行新規追加処理
    Route::post('/trips','TripsController@store');
    
    //一覧ページ
    Route::get('/trip_list','TripsController@trip_list');
    
    //プロフィール
    Route::get('/profile','TripsController@profile');
   //検索結果を表示する
    Route::get('/profile/f_search','TripsController@f_search');
    
    //旅行詳細ページ
    Route::get('/trip_item/{trip}','TripsController@trip_item')->name('trip_item.index');
    
    //更新画面
    Route::post('/tripsedit/{trips}','TripsController@edit');
    
    //更新処理
    Route::post('/trips/update','TripsController@update');
    
    Route::get('/profile/{userName}', 'UserController@getUsersBySearchName'); // url: '/user/index/' + userNameと同じ
    
    //削除処理
    Route::delete('/trip/{trip}','TripsController@destroy');
    
    
    
    // Tripplanscontroller旅行詳細画面
    //予定追加
    Route::post('/tripplanadd','TripplansController@store');
    Route::post('/tripplanfavorite','TripplansController@editkanri');
    
    
    // Tripuserscontroller旅行メンバー管理
     //参加者追加
    Route::post('/tripuseradd','TripusersController@store');
    //参加者削除
    Route::post('/tripuserdel','TripusersController@destroy');
    
    
    
    
    Route::get('/setEvents','TripplansController@setEvents');
    Route::post('/ajax/addEvent', 'TripplansController@addEvent');
    Route::post('/ajax/editEventDate', 'TripplansController@editEventDate');
    Route::post('/ajax/dropAddevent', 'TripplansController@dropAddevent');
    Route::post('/ajax/resizeEvent', 'TripplansController@resizeEvent');


    //旅行登録ページ表示
    Route::get('/fc','TripsController@fc');
    //旅行登録ページ表示
    Route::get('/map','TripsController@map');
    
    
});


Auth::routes();

Route::get('/home', 'TripsController@index')->name('home');
