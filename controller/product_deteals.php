<?php
  require '../config/config.php';

  /*---------------------------------------------
  変数宣言
  ---------------------------------------------*/
  $title = '商品詳細';//test
  $css_file_name = 'product_deteals.css';

  /*---------------------------------------------
  値受取
  ---------------------------------------------*/
  if(isset($_GET['id'])){
    $product_id = (int)$_GET['id'];
  }
  else{
   header( "Location: ./product_view.php" );
  }
   /

  /*---------------------------------------------
  req html
  ---------------------------------------------*/
  require '../view/header.php';
  require '../view/product_deteals.php';
  require '../view/footer.php';
?>