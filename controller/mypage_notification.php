<?PHP
session_start();

require_once '../config/config.php';
require_once '../model/func/func.php';

// テスト用
$_SESSION['login_id'] = 1;

$title = 'まさる堂/マイページ';
$css_file_name = 'mypage.css';
$js_file_name = '';

// 通知
$notification = array();
$sql = "SELECT notification.notification FROM masarudoh.notification WHERE member_id = " . $_SESSION['login_id'] . " ORDER BY id DESC";
try {
  $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
  $mysqli->set_charset('utf8');
  $result = $mysqli->query($sql);
  while($row = $result->fetch_assoc()) {
    $notification[] = $row;
  }
} catch (Exception $e) {
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit;
  }
}
$mysqli -> close();

if(count($notification) === 0) {
  $notification[0]['notification'] = 'お知らせはまだ届いていません。'; 
}

require_once '../view/header.php';
require_once '../view/mypage_side.php';
require_once '../view/mypage_notification.php';
require_once '../view/footer.php';