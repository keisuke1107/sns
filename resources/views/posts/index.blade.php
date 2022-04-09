@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<!-- 投稿ボタン -->
<p class=""><a class="" href="" ><img src="images/post.png"></a></p>

<!-- 削除ボタン -->
<a class="btn btn-danger"  onclick = "return confirm('こちらのつぶやきを削除します。よろしいでしょうか？')">
<img src="images/trash.png"></a>



@endsection
