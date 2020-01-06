<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title><?php echo $title; ?></title>
  <link href="../css/<?php echo $css_file_name; ?>" rel="stylesheet" type="text/css">
  <script src="../js/jquery-3.4.1.min.js"></script>
</head>

<body>
  <article>
    <div id="global_nav">
      <h1><a href="../index.php"><img src="../images/image_materials/logo.png" width="308" height="77" alt="まさる堂ロゴ"></a></h1>
      <div id="header_search_area">
        <input type="text" name="search" placeholder="何かお探しですか？">
        <button>検索</button>
      </div>
      <div id="header_login_area">
        <button><a href="./controller/login.php">ログイン</a></button>
      </div>
    </div><!-- global_navi -->
    <nav>
      <ul>
        <li><a href="">商品ジャンル一覧</a></li>
        <li><a href="">掲示板一覧</a></li>
        <li><a href="./s_sell.php">出品</a></li>
        <li><a href="">マイページ</a></li>
      </ul>
    </nav><!-- top_navi -->