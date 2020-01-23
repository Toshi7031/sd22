<?PHP
session_start();

require_once '../config/config.php';
require_once '../model/func/func.php';
require_once '../model/login_check.php';

$title = 'まさる堂/出品ページ';
$css_file_name = 'exhibition_check.css';
$js_file_name = '';


//登録を押したとき
if(isset($_POST['exhibition']) && $_POST['exhibition'] == $_SESSION['check']){
  $date = new DateTimeImmutable();
  $colmun = array(
    'product_name',
    'price',
    'description',
    'large_product_category_id',
    'small_product_category_id',
    'product_condition_id',
    'postage_id',
    'send_method',
    'state_id',
    'days_to_send',
    'exhibition_date',
    'exhibitor',
    'images_count',
  );
  $post_info = array(
    'product_name' => $_SESSION['product_name'],
    'price' => (int)$_SESSION['price'],
    'description' => $_SESSION['description'],
    'large_product_category_id' => (int)$_SESSION['large_product_category_id'],
    'small_product_category_id' => (int)$_SESSION['small_product_category_id'],
    'product_condition_id' => (int)$_SESSION['product_condition_id'],
    'postage_id' => (int)$_SESSION['postage_id'],
    'send_method' => (int)$_SESSION['send_method'],
    'state_id' => (int)$_SESSION['state_id'],
    'days_to_send' => (int)$_SESSION['days_to_send'],
    'exhibition_date' => $date -> format('Y/m/d H:i:s'),
    // 'exhibitor' => 2, //テストとして格納
    'exhibitor' => $_SESSION['login_id'], //本番はログインIDを格納
    'images_count' => (int)count($_SESSION['tmp_name']),
  );

  // 商品の通し番号を取得
  $product_id = get_product_id();
  $product_id = $product_id[0];
  ++$product_id;

  // 画像を本フォルダに移動
  for($i = 0; $i < $post_info['images_count']; ++$i) {
    $file_info = getimagesize('../images/products/product_3_2');
    if($file_info['mine'] == 'image/jpeg') {
      $extention = 'jpg';
    }
    else {
      $extention = 'png';
    }
    $image_name = PRODUCT_IMAGE_UPLOAD_PATH . 'product_' . (string)$product_id . '_' . (string)($i + 1) . '.' . $extention;
    try {
      if(!rename('../images/tmp/' . $_SESSION['tmp_name'][$i], $image_name)) {
        throw new RuntimeException('画像のアップロード中にエラーが発生しました。');
      }
    }
    catch(RuntimeException $e) {
      $error_msg = $e->getMessage();
      echo $error_msg;
      break;
    }
  }

  // DBに書き込み
  $sql_result = write_db('products', $colmun, $post_info);
  if($sql_result !== NULL) {
    $error_msg = $db_result;
    exit;
    // require_once '../tpl/error.php';
  }

  // セッション削除
  if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
    $params['path'], $params['domain'], $params['secure'], $params['httponly']
    );
  }
  session_destroy();

  // リダイレクト
  $url = './exhibition_confirm.php';
  redirect($url);
}

//postされたidをDBに照合
$fetch_datas = array(
  'large_product_categories' => array(
    'id' => (int)$_SESSION['large_product_categories'],
    'sql' => "SELECT large_product_categories.large_product_category FROM masarudoh.large_product_categories WHERE id = ?",
  ),
  'product_category' => array(
    'id' => (int)$_SESSION['product_category_id'],
    'sql' => "SELECT small_product_categories.small_product_category FROM masarudoh.small_product_categories WHERE id = ?",
  ),
  'product_condition' => array(
    'id' => (int)$_SESSION['product_condition_id'],
    'sql' => "SELECT product_condition.product_condition FROM masarudoh.product_condition WHERE id = ?",
  ),
  'send_method' => array(
    'id' => (int)$_SESSION['send_method'],
    'sql' => "SELECT send_method.send_method FROM masarudoh.send_method WHERE id = ?",
  ),
  'state' => array(
    'id' => (int)$_SESSION['state_id'],
    'sql' => "SELECT states.state FROM masarudoh.states WHERE id = ?",
  ),
  'days_to_send' => array(
    'id' => (int)$_SESSION['days_to_send'],
    'sql' => "SELECT day_to_send.day_to_send FROM masarudoh.day_to_send WHERE id = ?",
  ),
);

$mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit;
}
$mysqli->set_charset('utf8');
foreach($fetch_datas as $key => $value) {
  $stmt = $mysqli->prepare($value['sql']);
  $stmt->bind_param('i', $value['id']);
  $stmt->execute();
  $stmt->bind_result($fetch_datas[$key]);
  $stmt->fetch();
  $stmt->free_result();
}
$mysqli -> close();

// 画像のファイル名を受け取る
$image_name = $_SESSION['tmp_name'];

// その他変数用意
if($_SESSION['postage_id']) {
  $postage = '送料込み（出品者負担）';
}
else {
  $postage = '着払い（購入者負担）';
}
$profit = intval($_SESSION['price'] * 0.9);   //販売利益計算
$check = random_string(8);  //DB書き込み処理に入るための割符
$_SESSION['check'] = $check;  //割符を$_SESSIONに保存

require_once '../view/header.php';
require_once '../view/exhibition_check.php';
require_once '../view/footer.php';