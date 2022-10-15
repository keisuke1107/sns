@extends('layouts.login')

@section('content')
<div class="post-content">

<a href ="test">ログインユーザーの投稿</a>

 <!-- 投稿ボタン -->
   <div class='post_input'>
    <img src="images/{{$user->images}}" class="img-circle">
       {{ Form::open(['url' => 'post/create']) }}
       @csrf
        <div class="form-group">
            {{ Form::input('text', 'newPost', '何をつぶやこうか・・・・', ['required', 'class' => 'form-control']) }}
        </div>
        <button type="submit" class="btn btn-success pull-right">追加</button>
        {{ Form::close() }}
    </div>
aaaaaa


        <table>
         @foreach($list as $list)
          <tr class="posts">
          <td class="td"><img src="images/{{$list->images }}" class="img-circle"></td>
          <td class="td">{{ $list->username }}</td>
          <td class="td">{{ $list->posts }}</td>
          <td class="td">{{ $list->updated_at }}</td>
          <td>

            <!-- 条件分岐 -->
            @if($id == $list->user_id)
            <!-- 更新ボタン -->
           <div class="edit">
            <a href="/post/{{$list->id}}/update" class="modalopen" data-target="{{$list->id}}">
            <img class="edit-img" src="{{asset('/images/edit.png')}}" alt="edit"></a>

               <!-- モーダルの中身 -->
               <div class="modal-main js-modal" id="{{$list->id}}">
                 {{ Form::open(['url' => 'post/update']) }}
                 {{ Form::hidden('id', $list->id) }}
                <div class="modal-inner">
                <div class="inner-content">
                 {{ Form::input('text', 'upPost', $list->posts, ['required', 'class' => 'form-control']) }}
                  <button type="submit" img class="edit-img" src="{{asset('/images/edit.png')}}" alt="edit">編集</button>
                 {{ Form::close() }}
                 </div>
                 </div>
                </div>
            </div>

              <!-- 削除ボタン -->
              <a href="/post/{{$list->id}}/delete" onclick = "return confirm('こちらのつぶやきを削除します。よろしいでしょうか？')">
              <img src="{{ asset('images/trash.png') }}" alt="削除"></a>
              @endif</td>
          </tr>
         @endforeach
         </table>

</div>

@endsection
