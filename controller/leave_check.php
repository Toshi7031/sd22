<?php
  require_once '../config/config.php';

  // $login = $SESSION['login_id'];
  $login = 12;

  if (!empty($_POST) && isset($_POST['no'])) {  /* いいえ */
    header('location:../view/index.php');
    exit;
  }


  if (!empty($_POST) && isset($_POST['yes'])) {  /* はい */

    $cn = mysqli_connect(HOST,DB_USER,DB_PASS,DB_NAME);
    mysqli_set_charset($cn,'utf8');

    // $sql = "SELECT id FROM member WHERE nickname = '".$login."';";
    // $res = mysqli_query($cn,$sql);
    // $row = mysqli_fetch_assoc($res);
    // var_dump($row);
    // echo $row['id'];

    $sql_up = "UPDATE member SET delflag = 1 WHERE id = '".$login."';";
    mysqli_query($cn, $sql_up);

    mysqli_close($cn);


    header('location:./leave_complete.php');
    exit;
  }

  require_once '../view/leave_check.php';

 ?>
