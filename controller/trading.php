<?php
session_start();

require_once '../config/config.php';
require_once '../model/func/func.php';
require_once '../model/login_check.php';

$title = 'まさる堂/取引ページ';
$css_file_name = "trading.css";
$js_file_name = "";
$id = 0;

// 商品id受取
if(isset($_GET['id']) && isset($_GET['request'])) {
  $id = (string)filter_input(INPUT_GET, 'id');
  $request = (string)filter_input(INPUT_GET, 'request');
}
else {
  redirect('./mypage_notification.php');
}

// 取引状態判定

if($request == 'exhibition') {  //出品中
  $h2 = '出品中';
}
elseif($request == 'trading') {   //取引中
  $h2 = '取引中';
}
elseif($request == 'sold') {  //売却済 取引完了でprogressを9にする
  $h2 = '売却済';
}
elseif($request == 'buying') {  //購入中
  $h2 = '購入中';
}
elseif($request == 'bought') {  //購入済
  $h2 = '購入済';
}

require_once '../view/header.php';
require_once '../view/trading.php';
require_once '../view/footer.php';
