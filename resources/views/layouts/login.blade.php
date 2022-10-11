<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
<!-- bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>

<header>
    <div id = "head">
     <h1 class="top-logo"><a href="/top"><img src="{{asset('/images/main_logo.png')}}"></a></h1>
        <div id="top-content">
         <div id="menu">
          <label for ="menu_bar"> {{ $user['username'] }}さん
            <!-- ハンバーガーメニュー -->
             <nav class="g-navi">
              <div class="nav-wrapper">
                <ul>
                 <li class="nav-item"><a href="/top">ホーム</a></li>
                 <li class="nav-item"><a href="/profile">プロフィール</a></li>
                 <li class="nav-item"><a href="/logout">ログアウト</a></li>
                </ul>
              </div>
             </nav>
             <nav class="g-navi-sp">
              <div class="menu-trigger">
               <span></span>
               <span></span>
              </div>
             </nav>
            <img src="{{ asset('images/'.$user->images) }}" class="img-circle">
           </label>
          </div>
        </div>
    </div>
</header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ $user['username'] }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ $follow_number }}名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{ $follower_number }}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn btn-search"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>



    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/style.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
