<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    //プロフィール画面へ
    public function profile(){
        $id=Auth::user();
            // フォロワー数表示
        $id=Auth::id();
        $follow_number=DB::table('follows')
        ->where('follower',$id)
        ->count();
        $follower_number=DB::table('follows')
        ->where('follow',$id)
        ->count();

        $user = Auth::user();


        return view('users.profile',compact('follow_number','follower_number','user'));
    }



        // ユーザー検索画面へ
    public function search(){
        // フォロワー数表示
        $id=Auth::id();
        $follow_number=DB::table('follows')
        ->where('follower',$id)
        ->count();
        $follower_number=DB::table('follows')
        ->where('follow',$id)
        ->count();
        $followings =DB::table('follows')
        ->where('follower',$id)
        ->get();

        $user = Auth::user();

        $userlist=DB::table("users")
        ->get();
// dd($userlist);
        return view('users.search',compact('user','follow_number',"follower_number","userlist",'followings',));
    }


    // プロフィール更新
public function store(Request $request){
     $user = Auth::user();

    //  画像があれば実行
    if($request->imgpath){
    // //getClientOriginalNameでオリジナルの名前を取る。
     $filename = $request->imgpath->getClientOriginalName();
    // // storage/app/public直下に画像を保存
     $request->imgpath->storeAs('',$filename,'icon');

     $user->update([
         'images' => $filename
     ]);
    }

    // パスワードがあれば実行
    if($request->newpassword){
        $user->update([
            'password' => bcrypt($request->input('newpassword')),
        ]);
    }


        $user->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'bio' => $request->input('bio'),
        ]);




        // リダイレクト処理
        return redirect('/profile');
}


public function result(Request $request){
    $keyword = $request->input('result');
    $id=Auth::id();
    $follow_number=DB::table('follows')
    ->where('follower',$id)
    ->count();
    $follower_number=DB::table('follows')
    ->where('follow',$id)
    ->count();
    $followings =DB::table('follows')
    ->where('follower',$id)
    ->get();

    $user = Auth::user();

    $userlist=DB::table("users")
    ->where('username','like',"%$keyword%")
    ->get();

    return view('users.search',compact('user','follow_number',"follower_number","userlist",'followings',));


}

public function userprofile($id){
    $follow_number=DB::table('follows')
    ->where('follower',Auth::id())
    ->count();
    $follower_number=DB::table('follows')
    ->where('follow',Auth::id())
    ->count();
    $followings =DB::table('follows')
    ->where('follower',Auth::id())
    ->get();

    $user = Auth::user();

    // クリックした画像のユーザー情報を取得(アイコン、名前、自己紹介文)
    $other_user = DB::table("users")
          ->where('id',$id)
          ->first();

    // クリックした画像のユーザーの投稿内容を取得
    $other_post = DB::table("posts")
    ->join('users','posts.user_id','=','users.id')
    ->select('posts.posts','users.username','users.images','posts.updated_at')
    ->where("user_id",$id)
    ->get();


    return view('users.other_profile',compact('user','follow_number',"follower_number",'followings','other_user','other_post',));

}

}
