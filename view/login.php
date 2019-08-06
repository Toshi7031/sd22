<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<meta name="description" content="">
<meta name="keywords" content=",,,,,">
<meta name="author" content="">
<meta property="og:site_name" content="">
<meta property="og:type" content="website">
<meta property="og:locale" content="ja_JP">
<meta property="fb:app_id" content="">
<meta property="og:image" content="">
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:url" content="">
<link rel="canonical" href="">
<link rel="stylesheet" href="../css/login.css">
<script src="../js/jquery-3.4.1.min.js"></script>
<link rel="icon" type="image/png" href=""><!--ファビコン-->
<link rel="apple-touch-icon" href="">
<!--[if lt IE 9]>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js" defer></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js" defer></script>
<![endif]-->
<!--
<meta name="mobile-web-app-capable" content="yes">
<link rel="icon" sizes="196x196" href="">
<link rel="apple-touch-icon" sizes="152x152" href="">
-->
</head>
<body>
  <div id="wrapper">
    <div id="login_form">
      <h1>ログイン</h1>
      <ul id="name">
        <li>ニックネーム又はメールアドレス又は電話番号</li>
        <li><input type="text" name="name"><br><span id="error_msg_name"></span></li>
      </ul>
      <ul id="password">
        <li>パスワード</li>
        <li><input type="password" name="password"><br><span id="error_msg_pass"></span></li>
      </ul>
      <button id="login">ログインする</button>
    </div>
  </div>
  <script src="../js/login.js"></script>
</body>
</html>