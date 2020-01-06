<?PHP

session_start();
require_once '../config/config.php';
require_once '../model/func/func.php';

// 初期化
$css_file_name = 'forget_password.css';
$js_file_name = 'forget_password.js';

if(!empty($_POST['email'])) {
  //値受取
  $email = (string)filter_input(INPUT_POST, 'email');
  $error_flg = false;
  
  // エラーチェック
  if($email == '') {
    $error_flg = true;
  }
  if(!mach_email($email)) {
    $error_flg = true;
  }

  // エラーがないとき DBにemailを照合
  if($error_flg === false) {
    $table = 'member';
    $colmun = 'email';
    $row = 0;
    $sql = "SELECT " . $colmun . " FROM masarudoh.member WHERE email = ?";
    $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
    $mysqli->set_charset('utf8');
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    $row = $stmt->num_rows();
    $stmt->free_result();
    $mysqli->close();

    if($row === 0) {
      $error_flg = true;
    }
  }

  if($error_flg === false) {
    // メール送信の処理

    // リダイレクト
    $url = './sended_email.php';
    redirect($url);
  }

}


require_once '../view/forget_password.php';