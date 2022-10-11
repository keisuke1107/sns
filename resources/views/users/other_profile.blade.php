@extends('layouts.login')

@section('content')



<div class = "other_contents">
      <!-- ユーザー詳細 -->
   <div class ="other_profile">
       <div class="other_icon">
        <img src="{{ asset('images/'.$other_user->images) }}" class="img-circle">
       </div>
        <div class="others">
        <div  class="other_name">
         <h3>Name</h3>
         <p class="other_name">{{ $other_user->username }}</p>
         </div>
         <div class="other_bio">
         <h3>Bio</h3>
         <p class>{{ $other_user->bio }}</p>
        </div>
      </div>

          <!-- フォローボタン -->
          <div class="follow-btn">
           @if($followings->contains('follow',$other_user->id))
          {{Form::open(['url'=>'/follow/remove'])}}
          {{Form::hidden('id',$other_user->id)}}
          <td><button type="submit" class="btn unfollowbtn">フォローをはずす</button></td>
          {{Form::close()}}
           @else
          {{Form::open(['url'=>'/follow/create'])}}
          {{Form::hidden('id',$other_user->id)}}
          <td><button type="submit" class="btn followbtn">フォローする</button></td>
          {{Form::close()}}
          @endif
          </div>
   </div>

<!-- ユーザー投稿内容 -->
   <div class= "other_posts">
     <table>
    @foreach($other_post as $other_post)
          <tr class="posts">
          <td class="td"><img src="{{ asset('images/'.$other_post->images) }}" class="img-circle"></td>
          <td class="td">{{ $other_post->username }}</td>
          <td class="td">{{ $other_post->posts }}</td>
          <td class="td">{{ $other_post->updated_at }}</td>
          <td>
    @endforeach
    </table>
   </div>

</div>

@endsection
