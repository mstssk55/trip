<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    //
    public function getUsersBySearchName(Request $request)
    {
        $users = $this->user->where('userid', 'like', '%' . $userName . '%')->get(); //出品数もほしいため、withCountでitemテーブルのレコード数も取得
        return response()->json($users);
    }
}
