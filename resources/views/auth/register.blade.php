@extends('layouts.logout')

@section('content')

{!! Form::open() !!}



<div class="logout-content">

<div class="register-content">

<div>
<h2>新規ユーザー登録</h2></div>

     <div>{{ Form::label('ユーザー名') }}<br>
     {{ Form::text('username',null,['class' => 'input']) }}
@if($errors->has('username'))
<p>{{ $errors->first('username') }}</p>
@endif

</div>

<div>
{{ Form::label('メールアドレス') }}<br>
{{ Form::text('mail',null,['class' => 'input']) }}
@if($errors->has('mail'))
<p>{{ $errors->first('mail') }}</p>
@endif
</div>


<div>
{{ Form::label('パスワード') }}<br>
{{ Form::text('password',null,['class' => 'input']) }}
@if($errors->has('password'))
<p>{{ $errors->first('password') }}</p>
@endif
</div>

<div>
{{ Form::label('パスワード確認') }}<br>
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
@if($errors->has('password_confirmation'))
<p>{{ $errors->first('password_confirmation') }}</p>
@endif
</div>

<div>
{{ Form::submit('登録') }}
</div>

<div>
<p><a href="/login">ログイン画面へ戻る</a></p>
</div>

{!! Form::close() !!}

</div>

</div>

@endsection
