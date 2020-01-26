<?php
/*---------------------------------------------
掲示板
---------------------------------------------*/

//require
require_once'../model/func/func.php';
require_once'../config/config.php';

/*---------------------------------------------
変数宣言
---------------------------------------------*/

// session_start();
$css_file_name = 'bbs.css';
//テスト用変数
$_GET['thred_id'] = 1;
$_SESSION['login_id'] = 2;


/*---------------------------------------------
sql作成
---------------------------------------------*/

//thred情報のsql作成
$thred_sql = 'SELECT id,name,public_type,white_list FROM thred';
$comments_sql = 'SELECT thred_id,comment_id,member_id,comment FROM comments';

/*---------------------------------------------
データベース接続
---------------------------------------------*/

$mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);

$result  = $mysqli -> query($thred_sql);
$array_thred = $result -> fetch_all(MYSQLI_ASSOC);

$result = $mysqli -> query($comments_sql);
$array_comments = $result -> fetch_all(MYSQLI_ASSOC);

$mysqli -> close();

/*---------------------------------------------
値受取
---------------------------------------------*/

//getで表示する掲示板のIDを受け取る(if)
if(isset($_GET['thred_id'])){
  $thred_id = $_GET['thred_id'];
}
else{
  //受け取っていない場合は掲示板ホームへ送る
  //  header( "Location: ./bbs_list.php" ) ;
  echo 'ID受取なし';
}

//ログインセッションから自分のIDを取り出し(if)
if(isset($_SESSION['login_id'])){
  $login_id = $_SESSION['login_id'];
}
else{
  $login_id = null;
}

/*---------------------------------------------
エラー処理
---------------------------------------------*/


/*---------------------------------------------
配列処理
---------------------------------------------*/

//コメントしているユーザIDを取り出して配列に挿入
for($i = 0;$comments[$i]['member_id'];$i++){
  $participant[] = "{$comments[$i]['member_id']}";
}
//配列に入っている重複している会員IDを統一化
var_dump($participant);
$participant = array_unique($participant);
//where文に挿入するためxxxxx,xxxxx,xxxxxという形にする(for)
$str_participant = "$participant[0]";
for($i = 1 ; $participant[$i] ; $i++){
  $str_participant .= ",{$participant[$i]}";
}
//sql文に追加
$sql = "SELECT id,nickname FROM member WHERE id in({$str_participant})";
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
for($i = 0 ; $comments[$i];$i++){
  if($login_id == $comments[$i]['member_id']){
    $talk[$i] = [
      'class' => 'me',
      'member_id' => $comments[$i]['member_id'],
      'name' => '',
      'comment' => $comments[$i]['comment'],
    ];
  }
  else{
    $talk[$i] = [
      'class' => 'you',
      'member_id' => $comments[$i]['member_id'],
      'name' => $array_participant[(int)$comments[$i]['member_id']],
      'comment' => $comments[$i]['comment'],
    ];
  }
}
require_once '../view/bbs.php';

?>