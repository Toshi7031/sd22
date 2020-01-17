<?php
//require
require_once'../config/config.php';
require_once'../model/func/func.php';
//変数宣言
// session_start();
$css_file_name = 'bbs.css';
$thred_colmun = [
  'id',
  'name',
  'public_type',
  'white_list',
];
$comments_colmun = [
  'thred_id',
  'comment_id',
  'member_id',
  'comment',
];
//テスト用変数
$_GET['thred_id'] = str_pad(1,6,0,STR_PAD_LEFT);
$_SESSION['login_id'] = str_pad(1,6,0,STR_PAD_LEFT);
//getで表示する掲示板のIDを受け取る(if)
if(isset($_GET['thred_id'])){
  $thred_id = $_GET['thred_id'];
}
else{
  //受け取っていない場合は掲示板ホームへ送る
  //  header( "Location: ./bbs_list.php" ) ;
  echo 'empty thred_id';
}

//ログインセッションから自分のIDを取り出し(if)
if(isset($_SESSION['login_id'])){
  $login_id = $_SESSION['login_id'];
}
else{
  $login_id = null;
}
//データベース接続し、スレッドデータを取得
$thred = read_db('thred',$thred_colmun);
//$thredのカラムの主キーをthred_idに変更する
$thred = array_column($thred,null,'id');
//public_typeを確認して1の場合はホワイトリストを確認
if($thred[$thred_id]['public_type'] == 1){
  //ホワイトリストを6文字区切りで配列に入れる
  $array_white_list = str_split($thred[$thred_id]['white_list'],6);
  //配列の中に一致する会員IDが無い場合はbbs_list.phpに返す
  if(!in_array($login_id,$array_white_list)){
    //  header( "Location: ./bbs_list.php" ) ;
    echo 'ホワイトリストerr';
  }
}

//コメント内容を受取
$comments = read_db('comments',$comments_colmun);

//コメントしているユーザIDを取り出して配列に挿入
for($i = 0;$comments[$i]['member_id'];$i++){
  $participant[] = "{$comments[$i]['member_id']}";
}
//配列に入っている重複している会員IDを統一化
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