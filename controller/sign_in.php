<?php
  session_start();

  $prof = array('nickname' => '',           /* ニックネーム */
                'password' => '',           /* パスワード */
                'lastname_kanji' => '',     /* 姓　漢字 */
                'name_kanji' => '',         /* 名　漢字 */
                'lastname_kana' => '',      /* 姓　カナ */
                'name_kana' => '',          /* 名　カナ */
                'zip1' => '',               /* 郵便番号１ */
                'zip2' => '',               /* 郵便番号２ */
                'prefecture' => '',         /* 都道府県 */
                'municipality' => '',       /* 市区町村 */
                'after_ad' => '',           /* 以降の住所 */
                'telnum' => '',             /* 電話番号 */
                'mail' => '',               /* メールアドレス */
                'mail2' => '', );           /* 確認用メールアドレス */

  $err_msg = array();

  if (!empty($_POST) && isset($_POST['state']) && $_POST['state'] == 'confirm') {
    foreach ($prof as $key => $value) {
      $prof[$key] = $_POST[$key];
    }

    //nickname check
    if ($prof['nickname'] == '') {
      $err_msg['nickname'] = 'ニックネームを入力してください。';
    }

    // password check
    if ($prof['password'] == '') {
      $err_msg['password'] = 'パスワードを入力してください。';
    }

    // lastname_kanji check
    if ($prof['lastname_kanji'] == '') {
      $err_msg['lastname_kanji'] = '苗字（漢字）を入力してください。';
    }

    // name_kanji check
    if ($prof['name_kanji'] == '') {
      $err_msg['name_kanji'] = '名前（漢字）を入力してください。';
    }

    // lastname_kana check
    if ($prof['lastname_kana'] == '') {
      $err_msg['lastname_kana'] = '苗字（カナ）を入力してください。';
    }
    /* ひらがなで入力された場合、カタカナに変換する */
    if(preg_match('/[^ァ-ヶー]/u',$prof['lastname_kana'])){
      $prof['lastname_kana'] = mb_convert_kana($prof['lastname_kana'], "C");
    }

    // name_kana check
    if ($prof['name_kana'] == '') {
      $err_msg['name_kana'] = '名前（カナ）を入力してください。';
    }
    /* ひらがなで入力された場合、カタカナに変換する */
    if(preg_match('/[^ァ-ヶー]/u',$prof['name_kana'])){
      $prof['name_kana'] = mb_convert_kana($prof['name_kana'], "C");
    }

    // address check
    if ($prof['zip1'] == '' && $prof['zip2'] == '') {
      $err_msg['zip'] = '郵便番号を入力してください。';
    }
    if (!(preg_match("/[0-9]/", $prof['after_ad']))) {
      $err_msg['after_ad'] = '住所を最後まで入力してください。';
    }

    // phone check
    if ($prof['telnum'] == '') {
      $err_msg['telnum'] = '電話番号を入力してください。';
    }
    elseif (!is_numeric($prof['telnum'])) {
      $err_msg['telnum'] = 'TELは数値で入力してください。';
    }

    // mail check
    if ($prof['mail'] == '') {
      $err_msg['mail'] = 'メールアドレスを入力してください。';
    }
    elseif (strpos($prof['mail'], '@') === false) {
      $err_msg['mail'] = '正しい形式で入力してください。';
    }

    // mail2 check
    if ($prof['mail2'] == '') {
      $err_msg['mail2'] = '確認用メールアドレスを入力してください。';
    }
    elseif (!($prof['mail'] == $prof['mail2'])) {
      $err_msg['mail2'] = 'メールアドレスが違います。';
    }

    // 入力内容に誤りがない場合は確認画面へ遷移
    if (count($err_msg) == 0) {
      $_SESSION['prof'] = $prof;
      header("Location: sign_in_check.php");
      exit;
    }

  }

  // 「入力画面に戻る」を押された場合
  elseif (!empty($_SESSION) && isset($_SESSION['prof']) && isset($_POST['state']) && $_POST['state'] == 'back') {
    $prof = $_SESSION['prof'];
    $prof['password'] = '';  /* 戻ったときはパスワードだけリセット */

    // 再度入力しるためにセッションを削除
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();
  }


  require_once '../view/sign_in.php';

 ?>
