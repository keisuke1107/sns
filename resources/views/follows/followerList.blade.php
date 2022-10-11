@extends('layouts.login')



@section('content')
<div class ="followlist">
  <div class="followlist-icon">
   <p class="follow-title">Follower list</p>
               @foreach($follower_icons as $follower_icons)
          <tr class="posts">
          <td><a href="/userprofile/{{ $follower_icons->id }}"><img src="{{ asset('images/'.$follower_icons->images) }}" class="img-circle" ></a></td>
          </tr>
         @endforeach

   </div>

    <div class="followuser_post">
       <table>
         @foreach($follower_user as $follower_user)
          <tr class="posts">
          <td><img src="{{ asset('images/'.$follower_user->images) }}" class="img-circle"></td>
          <td>{{ $follower_user->username }}</td>
          <td>{{ $follower_user->posts }}</td>
          <td>{{ $follower_user->updated_at }}</td>
          </tr>
         @endforeach
         </table>
    </div>


</div>


@endsection
