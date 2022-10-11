<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $user = Auth::user();
        $id=Auth::id();
        // pluckで'follow'カラムのみを持ってくる
        $follow_id=DB::table("follows")
        ->where('follower',$id)
        ->pluck('follow');

        $follow_icons = DB::table('users')
        ->whereIn("id",$follow_id)
        ->select('users.images','users.id')
        ->get();

       $follow_lists = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->select('posts.posts','posts.id','users.username','users.images','posts.updated_at')
        ->whereIn("user_id",$follow_id)
        ->get();



        // フォロワー数表示

        $id=Auth::id();
        $follow_number=DB::table('follows')
        ->where('follower',$id)
        ->count();
        $follower_number=DB::table('follows')
        ->where('follow',$id)
        ->count();

        return view('follows.followList',compact('user','follow_number',"follower_number",'follow_icons',"follow_lists"));
    }




// フォローボタン実装
        public function create(Request $request) {
        $auth_id = Auth::id();
        $follower_id = $request->input('id');
         \DB::table('follows')
            ->insert([
        'follower' => $auth_id,
        'follow' => $follower_id,
        ]);
        return back();
    }
    public function remove(Request $request){
        $auth_id = Auth::id();
        $follower_id = $request->input('id');
        \DB::table('follows')
        ->where(['follower' => $auth_id,
            'follow' => $follower_id
        ])->delete();
        return back();
    }




}
