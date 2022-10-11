@extends('layouts.login')

@section('content')
<div class ="followlist">
  <div class="followlist-icon">
   <p class="follow-title">Follow list</p>
            @foreach($follow_icons as $follow_icon)
          <tr class="posts">
          <td><a href="/userprofile/{{ $follow_icon->id }}"><img src="{{ asset('images/'.$follow_icon->images) }}" class="img-circle"></a></td>
          </tr>
         @endforeach

   </div>

    <div class="followuser_post">
       <table>
         @foreach($follow_lists as $follow_list)
          <tr class="posts">
          <td><a href="/userprofile/{{ $follow_icon->id }}">
          <img src="{{ asset('images/'.$follow_list->images) }}" class="img-circle"></td>
          <td>{{ $follow_list->username }}</td>
          <td>{{ $follow_list->posts }}</td>
          <td>{{ $follow_list->updated_at }}</td>
          </tr>
         @endforeach
         </table>
    </div>



</div>


<!-- "{{asset('/images/main_logo.png')}}" -->

@endsection
