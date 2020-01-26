<?php
  /*----------------------------------------------------
  商品一覧
  ----------------------------------------------------*/
    require '../config/config.php';

    //変数宣言
    //session_start();
    $title = '商品一覧';
    $css_file_name = 'product_view.css';
    $js_file_name = 'a';
  /*----------------------------------------------------
  値受取
  ----------------------------------------------------*/
  //検索ワードが送信された場合

  if(isset($_GET['search'])){
    //ページカウントをリセット
    $_SESSION['page'] = 1;
    //searchをセッションに追加
    $_SESSION['search'] = $_GET['search'];
    //sessionをローカル変数に追加
    $search = $_SESSION['search'];
  }

  //ページング処理
  //  if(isset($_GET['next'])) $page++;
  //  if(isset($_GET['before'])) $page--;
  //  if(isset($_GET['last']))
  //  if(isset($_GET['first'])) $page = 1;

  /*----------------------------------------------------
  $search配列処理
  ----------------------------------------------------*/
  //全角スペースが入っている場合は半角スペースに変換
  $search = mb_convert_kana($search, 'as', 'UTF-8');
  // 両サイドのスペースを消す
  $search = trim($search);
  // 改行、タブをスペースへ
  $search = preg_replace('/[\n\r\t]/', '', $search);
  // 複数スペースを一つへ
  $search = preg_replace('/\s(?=\s)/', '', $search);
  //スペース区切りで配列に挿入
  $search = explode(' ',$search);
  /*----------------------------------------------------
  sql文作成
  ----------------------------------------------------*/
  //sqlベース作成
  $sql = 'SELECT id,product_name,price FROM products WHERE progress = 0 AND ';
  //検索条件部分作成
  foreach($search as $word){
    //$sqlに追記
    $sql .= "product_name LIKE'%{$word}%'";
    if($word != end($search)){
      $sql .= ' AND ';
    }
  }
  /*----------------------------------------------------
  DB取り出し
  ----------------------------------------------------*/
  //接続
  $mysqli = new mysqli(HOST,DB_USER,DB_PASS,DB_NAME);
  //qery
  $result = $mysqli -> query($sql);
  //close
  $mysqli -> close();
  //配列に挿入
  $product_array = $result -> fetch_all(MYSQLI_ASSOC);
  //商品IDを主キーに変換
  $product_array = array_column($product_array,null,'id');
  /*----------------------------------------------------
  html req
  ----------------------------------------------------*/
  require '../view/header.php';
  require '../view/product_view.php';
  require '../view/footer.php';
?>