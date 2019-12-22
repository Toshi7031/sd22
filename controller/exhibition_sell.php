<?PHP

session_start();
require_once '../config/config.php';
require_once '../model/func/func.php';

$title = 'まさる堂/出品ページ';
$css_file_name = 's_sell.css';
$js_file_name = 's_sell.js';
$tables = array(
  'product_categories',
  'product_condition',
  'states',
);
$colmun = array(
  'product_category',
  'product_condition',
  'state',
);

// 送信ボタンを押したとき
if(!empty($_POST['check'])) {
  // 初期化
  $input = array(
    'name' => '',
    'small_product_categories' => '',
    'product_condition' => '',
    'pay' => '',
    'send_method' => '',
    'states' => '',
    'send_duration' => '',
    'price' => '',
  );
  
  // 値受取
  foreach($input as $key => $value) {
    $input[$key] = (string)filter_input(INPUT_POST, $key);
  }
  // $input['name'] = (string)filter_input(INPUT_POST, 'name');
  // $input['small_product_categories'] = (string)filter_input(INPUT_POST, 'small_product_categories');
  // $input['product_condition'] = (string)filter_input(INPUT_POST, 'product_condition');
  // $input['pay'] = (string)filter_input(INPUT_POST, 'pay');
  // $input['send_method'] = (string)filter_input(INPUT_POST, 'send_method');
  // $input['states'] = (string)filter_input(INPUT_POST, 'states');
  // $input['send_duration'] = (string)filter_input(INPUT_POST, 'send_duration');
  // $input['price'] = (string)filter_input(INPUT_POST, 'send_duration');
  
  $description = (string)filter_input(INPUT_POST, 'description');
  $error_flg = false;
  echo '<pre>';
  var_dump($input);
  echo '</pre>';

  // エラーチェック
  // 空白チェック
  foreach($input as $key => $value) {
    if($input[$key] == '') {
      $error_flg = true;
    }
  }
  // 文字数チェック
  if(strlen($input['name']) > 400) {
    $error_flg = true;
  }
  if(strlen($description) > 1000) {
    $error_flg = true;
  }
  
  // 数値チェック
  if(!is_numeric($input['small_product_categories'])) {
    $error_flg = true;
  }
  if(!is_numeric($input['product_condition'])) {
    $error_flg = true;
  }
  if(!is_numeric($input['pay'])) {
    $error_flg = true;
  }
  if(!is_numeric($input['send_method'])) {
    $error_flg = true;
  }
  if(!is_numeric($input['states'])) {
    $error_flg = true;
  }
  if(!is_numeric($input['price'])) {
    $error_flg = true;
  }

  // 入力値チェック
  if($input['price'] > 300000) {
    $error_flg = true;
  }

  // エラーなしで確認画面へ
  if($error_flg === false){
    $url = './exhibition_check.php';
    $_SESSION['name'] = $input['name'];
    $_SESSION['description'] = $description;
    $_SESSION['small_product_categories'] = $input['small_product_categories'];
    $_SESSION['product_condition'] = $input['product_condition'];
    $_SESSION['pay'] = $input['pay'];
    $_SESSION['send_method'] = $input['send_method'];
    $_SESSION['states'] = $input['states'];
    $_SESSION['send_duration'] = $input['send_duration'];
    $_SESSION['price'] = $input['price'];
    redirect($url);
  }
}

// 戻って来たとき
if(isset($_POST['back'])){
  $input['name']    = $_SESSION['name'];
  $input['profile'] = $_SESSION['profile'];
}

// $categories = read_db($tables[0], $colmun[0]);
// $conditions = read_db($tables[1], $colmun[1]);

require_once '../view/header.php';
require_once '../view/exhibition_sell.php';
require_once '../view/footer.php';