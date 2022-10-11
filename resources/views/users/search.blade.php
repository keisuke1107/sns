@extends('layouts.login')

@section('content')

<div class="search-content">
  <div class="search-form">

      <div class="search-input">
        <form action="/result" method="get">
         @csrf
          <input type="text" class="form-control input-lg" placeholder="ユーザー名" name="result">
           <button class="search-btn" type="submit"> <img src="{{asset('/images/post.png')}}"></button>
          </form>
      </div>
  </div>


   <div class="search-table">
        <table>
         @foreach($userlist as $userlist)
          <tr class="userlist">
          <td class="search-icon"><img src="{{ asset('images/'.$userlist->images) }}" class="img-circle"></td>
          <td class="search-username">{{ $userlist->username }}</td>

          @if($followings->contains('follow',$userlist->id))
          {{Form::open(['url'=>'/follow/remove'])}}
          {{Form::hidden('id',$userlist->id)}}
          <td><button type="submit" class="btn unfollowbtn">フォローをはずす</button></td>
          {{Form::close()}}
          @else
          {{Form::open(['url'=>'/follow/create'])}}
          {{Form::hidden('id',$userlist->id)}}
          <td><button type="submit" class="btn followbtn">フォローする</button></td>
          {{Form::close()}}
          @endif
          </tr>
         @endforeach
         </table>
    </div>


 </div>
@endsection
