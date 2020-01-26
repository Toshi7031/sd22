<?php
  session_start();
  $css_file_name = 'list_bbs.css';
  $title = '掲示板一覧';
  require '../config/config.php';
  /*-----------------------------
  データ取り出し
  ----------------------------------*/
  if(isset($_SESSION['login_id'])){
    $login_id = $_SESSION['login_id'];
  }
  else{
    $login_id = 0;
  }
  //公開かホワイトリストに入っているかの判断
  $sql = "SELECT id,name,public_type,white_list,genre FROM thred WHERE white_list IN(0,{$login_id})";
  if(isset($_GET['genre'])){
    $sql .= "AND genre = {$_GET['genre']}";
  }
  $mysqli = new mysqli(HOST,DB_USER,DB_PASS,DB_NAME);
  $result = $mysqli -> query($sql);
  $mysqli -> close();
  //配列に変換
  $array_thred = $result -> fetch_all(MYSQLI_ASSOC);
  /*-----------------------------
  データ取り出し
  ----------------------------------*/
  require '../view/header.php';
  require '../view/bbs_list.php';
  require '../view/footer.php';
?>