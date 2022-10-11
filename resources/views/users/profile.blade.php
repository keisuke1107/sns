@extends('layouts.login')

@section('content')


<div class = "profile-content">
            <div class ="profile-icon">
              <img src="images/{{$user->images}}" class="img-circle">
               </div>

      <form action="upload" enctype="multipart/form-data" method="post">
       @csrf
      <input type="hidden" name='user_id' value="{{ $user->id }}">

   <div class="input-form">
    <!-- ユーザー名 -->
             <div class="form-group1">
                <p class="form-title">UserName</p>
                {{Form::text('username', $user->username, ['class' => 'form-control', 'id' =>'name'])}}
                </div>

    <!-- メールアドレス -->
             <div class="form-group2">
               <p class="form-title">MailAdress</p>
                {{Form::text('mail', $user->mail, ['class' => 'form-control', 'id' =>'mail'])}}
                </div>

     <!-- パスワード -->
             <div class="form-group3">
                <p class="form-title">PassWord</p>
                {{Form::text('password', $user->password, ['class' => 'form-control', 'id' =>'password','readonly'])}}
                </div>

      <!-- 新パスワード -->
             <div class="form-group4">
                <p class="form-title">new PassWord</p>
                {{Form::text('newpassword', '', ['class' => 'form-control', 'id' =>'newpassword'])}}
                </div>

      <!-- 自己紹介 -->
             <div class="form-group5">
                <p class="form-title">Bio</p>
                {{Form::text('bio', $user->bio, ['class' => 'form-control', 'id' =>'bio'])}}
                </div>

      <!-- アイコン -->
             <div class="form-group6">
                <p class="form-title">Icon</p>
              <input type="file" name="imgpath">
             </div>

           <button type='submit' class="update-btn ">更新</button>
   </form>


</div>

</div>



@endsection
