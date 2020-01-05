<?php

  require_once '../config/config.php';

  session_start();

  if (empty($_SESSION) || isset($SESSION['prof'])) {
    header('location:./sign_in_complete.php');
    exit;
  }

  // 入力内容の取得
  $prof = $_SESSION['prof'];

  $kanji   = $prof['lastname_kanji'].$prof['name_kanji'];
  $kana    = $prof['lastname_kana'].$prof['name_kana'];
  $address = $prof['prefecture'].$prof['municipality'].$prof['after_ad'];

  $cn = mysqli_connect(HOST,DB_USER,DB_PASS,DB_NAME);
  mysqli_set_charset($cn,'utf8');

  $sql = "INSERT INTO member(nickname,real_name,kana_name,password,address1,tel,email)
          VALUES('".$prof['nickname']."','".$kanji."','".$kana."','".$prof['password']."','".$address."','".$prof['telnum']."','".$prof['mail']."')";
  mysqli_query($cn, $sql);

  mysqli_close($cn);

  require_once '../view/sign_in_complete.php';


 ?>
