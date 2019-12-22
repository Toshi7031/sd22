<?php

/**
 * エスケープ処理をする関数
 *
 * @param string $s エスケープしたい文字列
 * @return Response エスケープされた文字列
 */
function h($s)
{
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}


/**
 * リダイレクトをする関数
 * exitも含んでいる
 *
 * @param string $url リダイレクト先のurl
 */
function redirect($url)
{
  header('HTTP/1.1 301 Moved Permanently');
  header("Location: $url");
  exit;
}


/**
 * ランダムな文字列を出力する関数
 *
 * @param int $length 出力したい文字数
 * @return Response ランダムな文字列
 */
function random_string(int $length)
{
  if ($length > 35) {
    $length = 1;
  }
  $length = 36 - (int) $length;
  return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), $length);
}


/**
 * 渡された文字列がメールアドレスかをチェックする関数
 *
 * @param string $address チェックしたい文字列
 * @return bool メールアドレスの場合はtrue 違う場合はfalse
 */
function mach_email(string $address)
{
  if (filter_var($address, FILTER_VALIDATE_EMAIL)) {
    return true;
  }
  if (strpos($address, '@docomo.ne.jp') !== false || strpos($address, '@ezweb.ne.jp') !== false) {
    $pattern = '/^([a-zA-Z])+([a-zA-Z0-9\._-])*@(docomo\.ne\.jp|ezweb\.ne\.jp)$/';
    if (preg_match($pattern, $address) === 1) {
      return true;
    }
  }
  return false;
}

/**
 * 渡された文字列をすべて*にする関数
 *
 * @param string $password 変換したい文字列
 * @return Response すべて*になった文字列
 */
function wrap_password(string $password)
{
  return str_repeat('*', strlen($password));
}


/**
 * データベースにレコードを書き込む関数
 *
 * @param string $table テーブル名
 * @param array  $colmun データを挿入するカラム
 * @param array  $post_info 挿入するデータ
 * @param string $colmun データを挿入するカラム
 * @param string $post_info 挿入するデータ
 */
function write_db(string $table, $colmun, $post_info) {
  $cnt = 1;
  $colmuns = '';
  $questions = '?';

  if(is_array($post_info)){
    $colmun = array_values($post_info); //連想配列を普通の配列に変換
    $post_info = array_values($post_info);  //同上
    $cnt = count($post_info);
    $colmuns = $colmun[0];

    // データ型を生成
    $type = substr(gettype($post_info[0]), 0, 1);
    for($i = 1; $i < $cnt; ++$i){
      $type .= substr(gettype($post_info[$i]), 0, 1);
    }

    //プリペアドステートメントを作成するための変数生成
    for($i = 1; $i < $cnt; ++$i) {
      $colmuns .= ',' . $colmun[$i];
      $questions .= ',?';
    }
  }
  else {
    $colmuns = $colmun;
    // データ型を生成
    $type = substr(gettype($post_info[0]), 0, 1);
  }

  // sqlを生成(プリペアドステートメント)
  $sql = "INSERT INTO " . DB_NAME . "." . $table .  " (" . $colmuns . ") VALUES (". $questions .")";

  $cn = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME);
  //接続失敗時エラーコードを返却
  if(mysqli_connect_errno($cn)){
    return $error_code = '201';
  }
  mysqli_set_charset($cn, 'utf8');
  mysqli_begin_transaction($cn);
  try{
    $stmt = mysqli_prepare($cn, $sql);
    mysqli_stmt_bind_param($stmt, $type, ...$post_info);
    mysqli_execute($stmt);
  }
  catch(Exception $e){
    mysqli_rollback($cn);
    mysqli_close($cn);
    return $error_code = '201';
  }
  mysqli_commit($cn);
  mysqli_close($cn);

  return;
}


/**
 * データベースからレコードを取得する関数
 *
 * @param string $table テーブル名
 * @param array $colmun カラム名
 * @param string $colmun カラム名
 * @return array $rows 取得したレコードの二次元配列
 */
function read_db(string $table, $colmun = '') {
  $rows = array();
  $cnt = 1;
  $colmuns = '';

  // カラムが配列の場合
  if(is_array($colmun)){
    $colmun = array_values($colmun); //連想配列を普通の配列に変換
    $cnt = count($colmun);

    for($i = 1; $i < $cnt; ++$i) {
      $colmuns .= $colmun[$i];
    }
  }
  else {
    $colmuns = $colmun;
  }

  $sql = "SELECT " . $colmuns . " FROM " . DB_NAME . "." . $table;

  $cn = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME);

  //接続失敗時エラーコードを返却
  if(mysqli_connect_errno($cn)){
    return $error_code = '201';
  }

  mysqli_set_charset($cn, 'utf8');
  $result =  mysqli_query($cn, $sql);  
  
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  mysqli_close($cn);
  return $rows;
}


/**
 * データベースのdelflagを1にする関数
 *
 * @param string $table テーブル名
 */
function stand_delflag($table, $id){
  $sql = "UPDATE " . DB_PASS . "." . $table . " SET delflag = 1 WHERE id = ?";
  $cn = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME);

  //接続失敗時エラーコードを返却
  if(mysqli_connect_errno($cn)){
    return $error_code = '202';
  }

  mysqli_set_charset($cn, 'utf8');

  mysqli_begin_transaction($cn);
  try{
    $stmt = mysqli_prepare($cn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_execute($stmt);
  }
  catch(Exception $e){
    mysqli_rollback($cn);
    mysqli_close($cn);
    return $error_code = '202';
  }
  mysqli_commit($cn);

  mysqli_close($cn);
  return;
}
