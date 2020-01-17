<?php
  /*-------------------------------------
  購入手続きプロセス
  -------------------------------------*/
  //req
  require '../config/config.php';
  require '../model/func/func.php';
  /*-------------------------------------
  変数宣言
  -------------------------------------*/
  //ページ情報
  $title = '購入手続き';
  $css_file_name = 'buy_procedures.css';
  $_SESSION['login_id'] = 1;
  $_GET['product_id'] = 1;

  /*-------------------------------------
  値受取
  -------------------------------------*/
  //postで値受取(受け取っていない場合はエラーを返す)
  //購入確認が押されたとき
  if(!isset($_POST['submit'])){
    //不正アクセスエラー
  }
  //getで値受取
  if(isset($_GET['product_id'])){
   $product_id = $_GET['product_id'];
  }
  else{
    //不正アクセスエラー
  }
  //ログインセッション確認
  if(isset($_SESSION['login_id'])){
    $login_id = $_SESSION['login_id'];
  }
  else{
    //不正アクセスエラー
  }

  /*-------------------------------------
  db読み込み
  -------------------------------------*/
  //sql作成
  $product_sql = "SELECT product_name,price,postage_id FROM products WHERE id = {$product_id}";
  $member_sql = "SELECT point,proceeds FROM member WHERE id = {$login_id} ";
  //db接続
  $mysql = new mysqli(HOST,DB_USER,DB_PASS,DB_NAME);
  //実行
  $result = $mysql -> query($product_sql);
  $array_product = $result -> fetch_all(MYSQLI_ASSOC);
  $result = $mysql -> query($member_sql);
  $array_member = $result -> fetch_all(MYSQLI_ASSOC);
  /*-------------------------------------
  req
  -------------------------------------*/
  require '../view/header.php';
  require '../view/buy_procedures.html';
  require '../view/footer.php';
?>