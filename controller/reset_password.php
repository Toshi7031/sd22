<?PHP

session_start();
require_once '../config/config.php';
require_once '../model/func/func.php';

// メール実装後にコメントアウト
// if(empty($_SESSION['login_id'])) {
//   $_SESSION['login_id'] = (string)filter_input(INPUT_GET, 'login_id');
// }
$_SESSION['login_id'] = 1;

// 初期化
$css_file_name = 'reset_password.css';
$js_file_name = 'reset_password.js';
$error_msg = array(
  'check1' => '',
  'check2' => '',
);
$input = array(
  'check1' => '',
  'check2' => '',
);

if(!empty($_POST['change'])) {
  //値受取
  $input = array(
    'check1' => filter_input(INPUT_POST, 'check1'),
    'check2' => filter_input(INPUT_POST, 'check2'),
  );
  $len = strlen($input['check1']);

  // エラーチェック
  if($input['check1'] == '') {
    $error_msg['check1'] = 'パスワードが空白です';
  }
  elseif (!preg_match('/^[\w]+$/', $input['check1'])) {
    $error_msg['check1'] = 'パスワードは半角英数字で入力してください';
  }
  elseif($len < 8) {
    $error_msg['check1'] = 'パスワードは8文字以上で入力してください';
  }
  elseif(64 < $len) {
    $error_msg['check1'] = 'パスワードは64文字以内で入力してください';
  }

  if($input['check2'] == '') {
    $error_msg['check2'] = '確認欄が空白です';
  }
  elseif($input['check1'] != $input['check2']) {
    $error_msg['check2'] = 'パスワードが一致しません';
  }

  // エラーメッセージがないとき DBに書き込んでジャンプ
  if(empty($error_msg['check1']) && empty($error_msg['check2'])) {
    $table = 'member';
    $colmun = 'password';
    $row = 0;
    $sql = "UPDATE " . $table . " SET " . $colmun . " = ? WHERE id = " . $_SESSION['login_id'];
    try {
      $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
      $mysqli->set_charset('utf8');
      $stmt = $mysqli->prepare($sql);
      $stmt->bind_param('s', $input['check1']);
      $stmt->execute();
      $stmt->free_result();
      $mysqli->close();
    }
    catch(Exception $e) {
      // エラー処理を追加予定
      exit;
    }
    // リダイレクト
    $url = './reset_password_complete.php';
    $_SESSION['changed_password'] = true;
    redirect($url);
  }
}

end:
require_once '../view/reset_password.php';