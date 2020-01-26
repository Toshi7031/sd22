<?php
session_start();

require_once '../config/config.php';
require_once '../model/func/func.php';
require_once '../model/login_check.php';

$title = 'まさる堂/取引ページ';
$css_file_name = "trading.css";
$js_file_name = "trading.js";
$id = 0;


// 通知を送信したとき
if(isset($_GET['send'])) {
  $date = new DateTimeImmutable();
  $id = (string)filter_input(INPUT_GET, 'product_id');  //商品id
  $partner_id = (string)filter_input(INPUT_GET, 'partner_id');  //取引相手id
  $progress = (string)filter_input(INPUT_GET, 'progress');
  // ニックネーム取得
  $sql = "SELECT member.nickname FROM masarudoh.member WHERE member.id = " . $_SESSION['login_id'];
  try {
    $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
    $mysqli->set_charset('utf8');
    $result = $mysqli->query($sql);
    $user_name = $result->fetch_row();
  } catch (Exception $e) {
    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit;
    }
  }

  //通知文作成 
  if($progress == 1) {
    $notification = $user_name[0] . "さんから、商品代金の入金が通知されました。";
  }
  elseif($progress == 2) {
    $notification = $user_name[0] . "さんから、商品の発送が通知されました。";
  }
  elseif($progress == 3) {
    $notification = $user_name[0] . "さんから、商品の受取が通知されました。";
  }
  
  // 進捗をすすめる
  $progress++;
  if($progress >= 4) {
    $progress = 9;
  }
  $sql = "UPDATE products SET progress = " . $progress . " WHERE id = " . $id;
  try {
    $mysqli->query($sql);
  } catch (Exception $e) {
    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit;
    }
  }

  // 通知を書き込み
  $sql = "INSERT INTO notification(member_id, notification, date) VALUES(" . $partner_id . ",'" . $notification . "','" . $date -> format('Y/m/d H:i:s') . "')";
  try {
    $mysqli->query($sql);
  }
  catch (Exception $e) {
    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit;
    }
  }

  $mysqli -> close();
  redirect('./trading_notification_sended.php');
}

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
  $product_sql = "SELECT products.id,products.product_name,products.price,products.progress,member.nickname,member.id AS 'partner_id' FROM masarudoh.products INNER JOIN masarudoh.member ON products.exhibitor = member.id WHERE products.id = " . $id;
}
elseif($request == 'trading') {   //取引中
  $h2 = '取引中';
  $product_sql = "SELECT products.id,products.product_name,products.price,products.progress,member.nickname,member.id AS 'partner_id' FROM masarudoh.products INNER JOIN masarudoh.member ON products.buyer = member.id WHERE products.id = " . $id;
}
elseif($request == 'sold') {  //売却済 取引完了でprogressを9にする
  $h2 = '売却済';
  $product_sql = "SELECT products.id,products.product_name,products.price,products.progress,member.nickname FROM masarudoh.products INNER JOIN masarudoh.member ON products.buyer = member.id WHERE products.id = " . $id;
}
elseif($request == 'buying') {  //購入中
  $h2 = '購入中';
  $product_sql = "SELECT products.id,products.product_name,products.price,products.progress,member.nickname,member.id AS 'partner_id' FROM masarudoh.products INNER JOIN masarudoh.member ON products.exhibitor = member.id WHERE products.id = " . $id;
  // $partner = '出品者：' .;
}
elseif($request == 'bought') {  //購入済
  $h2 = '購入済';
  $product_sql = "SELECT products.id,products.product_name,products.price,products.progress,member.nickname FROM masarudoh.products INNER JOIN masarudoh.member ON products.exhibitor = member.id WHERE products.id = " . $id;
}


// 商品情報取得
$product_info = array();
try {
  $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
  $mysqli->set_charset('utf8');
  $result = $mysqli->query($product_sql);
  while($row = $result->fetch_assoc()) {
    $product_info[] = $row;
  }
} catch (Exception $e) {
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit;
  }
}
$mysqli -> close();
// 金額にカンマを追加
for($i = 0; $i < count($product_info); ++$i) {
  $product_info[$i]['price'] = number_format((int)$product_info[$i]['price']);
}

// 取引相手の情報を加工
if($request == 'exhibition') {  //出品中
  $partner = '購入者：' . $product_info[0]['nickname'] . '&nbsp;さん';
  $message = '現在、この商品を購入中です。<br>出品者に入金を行ってください。';
  $button = '入金を行ったことを、出品者に通知する';
}
elseif($request == 'trading') {   //取引中
  $partner = '購入者：' . $product_info[0]['nickname'] . '&nbsp;さん';
  // 進捗度で表示を変える
  if($product_info[0]['progress'] == 1) {   //入金待
    $message = '現在、購入者からの入金待ちです。<br>購入者から、商品の代金が入金されるのをお待ちください。';
  }
  elseif($product_info[0]['progress'] == 2) {  //発送指示
    $message = '購入者から、入金が通知されました。<br>入金が確認できたら、商品を発送して,下のボタンを押してください。';
    $button = '入金が確認できたので、商品を発送した';
  }
  elseif($product_info[0]['progress'] == 3) { //受取確認待
    $message = '現在、この商品を発送中です。<br>購入者から、受取の確認が通知されるまで、お待ちください。';
  }
  else {
    $message = '';
  }
}
elseif($request == 'sold') {  //売却済 取引完了でprogressを9にする
  $partner = '購入者：' . $product_info[0]['nickname'] . '&nbsp;さん';
  $message = 'この商品は、既に取引を完了しています。';
}
elseif($request == 'buying') {  //購入中
  $partner = '出品者：' . $product_info[0]['nickname'] . '&nbsp;さん';

  // 進捗度で表示を変える
  if($product_info[0]['progress'] == 1) { //入金指示
    $message = '現在、この商品を購入中です。<br>出品者に入金を行ってください。';
    $button = '入金を行ったことを、出品者に通知する';
  }
  elseif($product_info[0]['progress'] == 2) { //発送待
    $message = '現在出品者に、入金済みです。<br>出品者から、商品の発送されるのをお待ちください。';
  }
  elseif($product_info[0]['progress'] == 3) { //受取確認指示 
    $message = '現在、この商品は発送中です。<br>商品が到着したら、出品者に、商品が到着した旨を通知してください。';
    $button = '商品が到着したことを、出品者に通知する';
  }
  elseif($product_info[0]['progress'] == 4) {
    $message = '';
  }
  else {
    $message = '';
  }
}
elseif($request == 'bought') {  //購入済
  $partner = '出品者：' . $product_info[0]['nickname'] . '&nbsp;さん';
  $message = 'この商品は、既に取引を完了しています。';
}

require_once '../view/header.php';
require_once '../view/trading.php';
require_once '../view/footer.php';
