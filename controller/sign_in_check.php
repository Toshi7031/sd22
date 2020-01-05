<?php

  session_start();

  if (empty($_SESSION) || isset($SESSION['prof'])) {
    header('location:./sign_in.php');
    exit;
  }

  // 入力内容の取得
  $prof = $_SESSION['prof'];

  // 「表示されている内容で登録」を押された場合
  if (!empty($_POST) && isset($_POST['state']) && $_POST['state'] == 'entry') {
    header('location:./sign_in_complete.php');
    exit;
  }

  require_once '../view/sign_in_check.php';

 ?>
