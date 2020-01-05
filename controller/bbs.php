<?php
//require
require_once'../config/config.php';
require_once'../model/func/func.php';
//変数宣言
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
$thred_id = str_pad(2,6,0,STR_PAD_LEFT);
$login_id = str_pad(1,6,0,STR_PAD_LEFT);
//getで表示する掲示板のIDを受け取る(if)
if(isset($_GET['thred_id'])){
  $thred_id = $_GET['thred_id'];
}
else{
  //受け取っていない場合は掲示板ホームへ送る
  //  header( "Location: ./bbs_list.php" ) ;
}
//ログインセッションから自分のIDを取り出し(if)
if(isset($_SESSION['login_id'])){
  $login_id = $_SESSION['login_id'];
}
else{
  //$login_id = null;
}
//データベース接続し、スレッドデータを取得
$thred = read_db('thred',$thred_colmun);
//public_typeを確認して1の場合はホワイトリストを確認
if($thred[$i -1]['public_type'] == 1){
  //ホワイトリストを6文字区切りで配列に入れる
  $array_white_list = str_split($thred[$thred_id -1]['white_list'],6);
  //配列の中に一致する会員IDが無い場合はbbs_list.phpに返す
  if(!in_array($login_id,$array_white_list)){
    //  header( "Location: ./bbs_list.php" ) ;
    echo 'ホワイトリストerr';
  }
}

//コメント内容を受取
$comments = read_db('comments',$comments_colmun);
//自分のトーク内容と相手のトーク内容を分ける
for($i = 0;$array_comments[$i];$i++){
  //ログインIDと照合し、配列に入れる
  if($login_id == $array_comments[$i]['member_id']){

  }
  else{
    echo '相手';
  }
}

//トーク内容を変数に入れる

//ajaxを利用して随時読み込み

  require_once '../view/bbs.php';
?>