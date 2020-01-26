<?PHP
session_start();

//configと関数呼び出し
require_once './config/config.php';
require_once './model/func/func.php';

$products = array();
$error_msg = '';
$view_count = 15;
$sql = "SELECT MAX(id) FROM products";

//データベースから新着商品を15件取ってくる処理
try {
  $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
  $mysqli->set_charset('utf8');
  $result = $mysqli->query($sql);
  $end_id = $result->fetch_row();
  $end_id < 15 ? $start_id = 0 : $start_id = (int) $end_id[0] - $view_count;
  $result->free();
   $sql = "SELECT id,product_name,price FROM products WHERE progress = 0  ORDER BY id DESC LIMIT 9";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_assoc()) {
    $products[] = $row;
  }
  $mysqli->close();
} catch (Exception $e) {
  $error_msg = '商品の読み込み中にエラーが発生しました。';
}

// 金額にカンマを追加
for($i = 0; $i < count($products); ++$i) {
  $products[$i]['price'] = number_format((int)$products[$i]['price']);
}

//表示部の読み出し
require_once './view/index.php';