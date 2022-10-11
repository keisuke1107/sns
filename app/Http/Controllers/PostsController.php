<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class PostsController extends Controller
{

    public function posts(){
        $id = Auth::id();
        $list = DB::table('posts')
            ->where('user_id',$id)
            ->get();

        return view('posts.list',compact('list'));

    }


    //テーブル結合
    public function index(){
        $user = Auth::user();
        Auth::user();
        $list = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->orderBy('posts.updated_at', 'desc')
        ->select('posts.posts','posts.id','users.username','users.images','posts.updated_at','posts.user_id',)
        ->get();

        // フォロワー数表示
        $id=Auth::id();
        $follow_number=DB::table('follows')
        ->where('follower',$id)
        ->count();
        $follower_number=DB::table('follows')
        ->where('follow',$id)
        ->count();

        return view('posts.index',compact('list','user','follow_number','follower_number','id'));
    }

    // 投稿機能
    public function create(Request $request){
        $id = Auth::id();
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_id' => $id,
            'posts' => $post,
            'created_at' => now(),
            'updated_at' =>now(),
        ]);

        return redirect('/top');
    }

    // 更新機能
    public function update(Request $request){
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        $request->validate([
            'upPost' => 'required|string|max:150',
            ],[
            'upPost.required' => '入力は150文字までです',
            ]);
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post,
                'updated_at' => now()]
            );


            return redirect('/top');

    }

// 投稿削除
    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }



// フォロワーリスト
    public function followerList(){
        $user = Auth::user();

        $id=Auth::id();
        $follower_user = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->join('follows','posts.user_id','=','follows.follower')
        ->select('posts.posts','posts.id','users.username','users.images','posts.updated_at')
        ->where("follow",$id)
        ->get();

        // dd($follower_user);


        $id=Auth::id();
        // pluckで'follower'カラムのIDのみを持ってくる
        $follower_id=DB::table("follows")
        ->where('follow',$id)
        ->pluck('follower');
        $follower_icons = DB::table('users')
        ->whereIn("id",$follower_id)
        ->select('users.images','users.id')
        ->get();




        // フォロワー数表示

        $id=Auth::id();
        $follow_number=DB::table('follows')
        ->where('follower',$id)
        ->count();
        $follower_number=DB::table('follows')
        ->where('follow',$id)
        ->count();
        return view('follows.followerList',compact('follower_user','follower_icons','user','follow_number','follower_number'));
    }







    // public function followList(){
    //     return view('follows.followList');
    // }
}
