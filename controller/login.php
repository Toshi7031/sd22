<?PHP

session_start();

//configと関数呼び出し
require_once '../config/config.php';
require_once '../model/func/func.php';
$title = 'まさる堂/ログインページ';
$url = 'index.php';

if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {
  redirect($url);
}

$error_mes = array(
  'email' => '',
  'password' => '',
);

// ログインボタンを押したとき
if(isset($_POST['login']) && !empty($_POST['login'])){
  $input = array(
    'email' => (string)filter_input(INPUT_POST, 'email'),
    'password' => (string)filter_input(INPUT_POST, 'password'),
  );

  // エラーチェック
  if(empty($input['email'])){
    $error_mes['email'] = 'emailが空白です';
  }
  elseif(!mach_email($input['email'])) {
    $error_mes['email'] = 'メールアドレスに誤りがあります';
  }

  if(empty($input['password'])) {
    $error_mes['password'] = 'パスワードが空白です';
  }
  elseif(strlen($input['password']) > 64) {
    $error_mes['password'] = 'パスワードは64文字以内で入力してください';
  }

  // DBのデータと照合
  if(empty($error_mes['email']) && empty($error_mes['password'])) {
    $table = 'member';
    $colmun = 'id';
    $id = 0;
    $sql = "SELECT " . $table . "." .$colmun . " FROM masarudoh.member WHERE email = ?";
    try {
      $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
      $mysqli->set_charset('utf8');
      $stmt = $mysqli->prepare($sql);
      $stmt->bind_param('s', $input['email']);
      $result = $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($id);
      $stmt->fetch();
      $stmt->free_result();
      $mysqli->close();
    }
    catch(Exception $e) {
      // エラー処理
      exit;
    }

    if($id === 0) {
      $error_mes['email'] = 'メールアドレスまたは、パスワードに誤りがあります';
    }
  }

  // エラーなしで$_SESSION['login_flg']をtrueにする
  if(empty($error_mes['email']) && empty($error_mes['password'])) {
    $_SESSION['login_flg'] = true;
    $_SESSION['login_id'] = $id;
    // リダイレクト
    $url = '../index.php';
    redirect($url);
  }
}

//表示部の読み出し
require_once '../view/login.php';