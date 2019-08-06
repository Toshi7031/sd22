<?php
  session_start();
  require_once '../../config/config.php';
  require_once _FUNC_FILE;

  //値受け取り
  $input = array(
    'name' => (string)filter_input(INPUT_POST, 'name'),
    'pass' => (string)filter_input(INPUT_POST, 'pass'),
  );

  //$nameの種類判別
  // $name_category = 
  //sql組み立て
  $sql = "SELECT * FROM sample_user";

  //データベースから行を検索
  // $row = execute_sql($sql);

  $_SESSION['login_flg'] = true;
  
  //結果を表示 後で正式なデータを返すように修正
  echo json_encode($input);
  exit;