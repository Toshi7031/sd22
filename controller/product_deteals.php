<?php
  session_start();
  require '../config/config.php';
  /*---------------------------------------------
  変数宣言
  ---------------------------------------------*/
  $title = '商品詳細';//test
  $css_file_name = 'product_deteals.css';
  $_GET['id'] = 10;

  /*---------------------------------------------
  値受取
  ---------------------------------------------*/
  //ログイン
  if(isset($_SESSION['login_id']) || !empty($_SESSION['login_id'])){
    $login_id = $_SESSION['login_id'];
  }
  //商品ID
  if(isset($_GET['id'])){
    $product_id = (int)$_GET['id'];
  }
  //ID指定なし
  else{
   header( "Location: ./product_view.php" );
  }

  /*---------------------------------------------
  DB取り出し
  ---------------------------------------------*/

  //sql作成
  $product_sql = "SELECT product_name,price,description,small_product_category_id,large_product_category_id,product_condition_id,postage_id,send_method,state_id,days_to_send,progress,images_count,white_list,exhibition_date,exhibitor FROM products WHERE id = {$product_id}";
  //接続・取り出し
  $mysqli = new mysqli(HOST,DB_USER,DB_PASS,DB_NAME);
  $product_result = $mysqli -> query($product_sql);
  $mysqli -> close();

  //配列変換
  $array_product = $product_result -> fetch_all(MYSQLI_ASSOC);

  //出品者名を取り出し
  $exhibitor_sql = "SELECT nickname FROM member WHERE id = {$array_product[0]['exhibitor']}";
  $mysqli = new mysqli(HOST,DB_USER,DB_PASS,DB_NAME);
  $exhibitor_result = $mysqli -> query($exhibitor_sql);
  $mysqli -> close();
  //配列変換
  $array_exhibitor = $exhibitor_result -> fetch_all(MYSQLI_ASSOC);
  var_dump($array_exhibitor);

  /*---------------------------------------------
  商品のホワイトリストを照合
  ---------------------------------------------*/
  if($array_product[0]['white_list'] != 0){
    if($array_product[0]['white_list'] != $login_id){
      header('Location: ./product_view.php');
    }
  }
  /*---------------------------------------------
  req html
  ---------------------------------------------*/
  require '../view/header.php';
  require '../view/product_deteals.php';
  require '../view/footer.php';
?>