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
  //session_start();

  /*-------------------------------------
  test 値受取
  -------------------------------------*/

  $_SESSION['login_id'] = 8;
  $_GET['product_id'] = 1;

  //入力
  $_POST['input_point'];
  $_POST['method_payment'];
  $_POST['sipping_address'];

  /*-------------------------------------
  エラー関係
  -------------------------------------*/

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
  $member_sql = "SELECT point,proceeds,address1,address2,address3 FROM member WHERE id = {$login_id} ";
  //db接続
  $mysql = new mysqli(HOST,DB_USER,DB_PASS,DB_NAME);
  //実行
  $result = $mysql -> query($product_sql);
  $array_product = $result -> fetch_all(MYSQLI_ASSOC);
  $result = $mysql -> query($member_sql);
  $array_member = $result -> fetch_all(MYSQLI_ASSOC);

  $mysql -> close();


  /*-------------------------------------
  値処理
  -------------------------------------*/
  //住所の配列を別に作成する
  $array_address = [
    $array_member[0]['address1'],
    $array_member[0]['address2'],
    $array_member[0]['address3'],
  ];
  //送料負担者を言語化 postage == 1 購入者　0 == 発送者負担
  $array_product['postage_id'] == 0 ? $postage = '発送者負担':$postage = '購入者負担';
  /*-------------------------------------
  view req
  -------------------------------------*/

  require '../view/buy_procedures.php';

?>