<?PHP
session_start();

require_once '../config/config.php';
require_once '../model/func/func.php';
require_once '../model/login_check.php';

// テスト用
// $_SESSION['login_id'] = 1;

$title = 'まさる堂/マイページ';
$css_file_name = 'mypage.css';
$js_file_name = 'a';
$request = '';
$nick_name = '';
$sql = "SELECT nickname FROM member WHERE id = " . $_SESSION['login_id'];
// ニックネーム取得
try {
  $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
  $mysqli->set_charset('utf8');
  $result = $mysqli->query($sql);
  $nick_name = $result->fetch_row();
} catch (Exception $e) {
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit;
  }
}
$mysqli -> close();

// 値受取
if(!empty($_GET['request'])) {
  $request =  (string)filter_input(INPUT_GET, 'request');
}

// 判別
if($request == 'exhibition') {  //出品中
  $sql = "SELECT products.id, products.product_name, products.price, member.nickname FROM products INNER JOIN member ON products.exhibitor = member.id WHERE products.exhibitor = " . $_SESSION['login_id'] . " AND products.progress = 0";
  $h2 = '出品中';
}
elseif($request == 'trading') {   //取引中
  $sql = "SELECT products.id, products.product_name, products.price, member.nickname FROM products INNER JOIN member ON products.exhibitor = member.id WHERE products.exhibitor = " . $_SESSION['login_id'] . " AND products.progress BETWEEN 1 AND 8";
  $h2 = '取引中';
}
elseif($request == 'sold') {  //売却済 取引完了でprogressを9にする
  $sql = "SELECT products.id, products.product_name, products.price, member.nickname, products.acquisition_date FROM products INNER JOIN member ON products.exhibitor = member.id WHERE products.exhibitor = " . $_SESSION['login_id'] . " AND products.progress = 9";
  $h2 = '売却済';
}
elseif($request == 'buying') {  //購入中
  $sql = "SELECT products.id, products.product_name, products.price, member.nickname FROM products INNER JOIN member ON products.buyer = member.id WHERE products.buyer = " . $_SESSION['login_id'] . " AND products.progress BETWEEN 2 AND 8";
  $h2 = '購入中';
}
elseif($request == 'bought') {  //購入済
  $sql = "SELECT products.id, products.product_name, products.price, member.nickname FROM products INNER JOIN member ON products.buyer = member.id WHERE products.buyer = " . $_SESSION['login_id'] . " AND products.progress = 9";
  $h2 = '購入済';
}


//DBから商品情報を取得
$product_info = array();
try {
  $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
  $mysqli->set_charset('utf8');
  $result = $mysqli->query($sql);
  while($row = $result->fetch_assoc()) {
    $product_info[] = $row;
  }
} catch (Exception $e) {
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit;
  }
}
$mysqli -> close();

// 金額にカンマを追加
for($i = 0; $i < count($product_info); ++$i) {
  $product_info[$i]['price'] = number_format((int)$product_info[$i]['price']);
}

require_once '../view/header.php';
require_once '../view/mypage_side.php';
require_once '../view/mypage_product.php';
require_once '../view/footer.php';