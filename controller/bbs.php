<?php
/*---------------------------------------------
掲示板
---------------------------------------------*/
session_start();

//require
require_once'../model/func/func.php';
require_once'../config/config.php';

/*---------------------------------------------
値受取
---------------------------------------------*/

//getで表示する掲示板のIDを受け取る(if)
if(isset($_GET['id'])){
  $thred_id = $_GET['id'];
}
else{
  //受け取っていない場合は掲示板ホームへ送る
   header( "Location: ../index.php" ) ;
}

//ログインセッションから自分のIDを取り出し(if)
if(isset($_SESSION['login_id'])){
  $login_id = $_SESSION['login_id'];
}
else{
  $login_id = 0;
}

/*---------------------------------------------
sql作成
---------------------------------------------*/

//thred情報のsql作成
$thred_sql = 'SELECT id,name,public_type,white_list FROM thred WHERE id = '.$thred_id.'';
$comments_sql = 'SELECT thred_id,comment_id,member_id,comment FROM comments WHERE thred_id = '.$thred_id.'';

/*---------------------------------------------
データベース接続
---------------------------------------------*/

$mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);

$result  = $mysqli -> query($thred_sql);
$array_thred = $result -> fetch_all(MYSQLI_ASSOC);
$result = $mysqli -> query($comments_sql);
$mysqli -> close();
$array_comments = $result -> fetch_all(MYSQLI_ASSOC);
/*---------------------------------------------
配列処理
---------------------------------------------*/

//コメントしているユーザIDを取り出して配列に挿入
for($i = 0;$array_comments[$i]['member_id'];$i++){
  $array_participant[] = "{$array_comments[$i]['member_id']}";
}
//配列に入っている重複している会員IDを統一化
$array_participant = array_unique($array_participant);
//一つの文字列化
foreach($array_participant as $participant){
  if($participant === reset($array_participant)){
    $str = "$participant";
  }
    $str.= ",$participant";
}


//sql文に追加
$sql = "SELECT id,nickname FROM member WHERE id in({$str})";
//DB接続
$mysqli = new mysqli(HOST,DB_USER,DB_PASS,DB_NAME);
$mysqli -> set_charset("utf8");
$result = $mysqli -> query($sql);
$mysqli -> close();

//ユーザ情報を配列に挿入
$array_participant = $result -> fetch_all(MYSQLI_ASSOC);
//ユーザIDを主キーとした配列に変換
$array_participant = array_column($array_participant,'nickname','id');
//自分のトーク内容と相手のトーク内容を分け,配列に挿入
for($i = 0 ; $array_comments[$i];$i++){
  if($login_id == $array_comments[$i]['member_id']){
    $talk[$i] = [
      'class' => 'me',
      'member_id' => $array_comments[$i]['member_id'],
      'name' => '',
      'comment' => $array_comments[$i]['comment'],
    ];
  }
  else{
    $talk[$i] = [
      'class' => 'you',
      'member_id' => $array_comments[$i]['member_id'],
      'name' => $array_participant[(int)$array_comments[$i]['member_id']],
      'comment' => $array_comments[$i]['comment'],
    ];
  }
}
require_once '../view/bbs.php';

?>