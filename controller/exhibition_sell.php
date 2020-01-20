<?PHP

session_start();
require_once '../config/config.php';
require_once '../model/func/func.php';

// 初期化
$title = 'まさる堂/出品ページ';
$css_file_name = 'exhibition_sell.css';
$js_file_name = 'exhibition_sell.js';
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
$input = array(
  'product_name' => '',
  'large_product_categories' => '',
  'large_product_category_id' => '',
  'small_product_category_id' => '',
  'product_condition_id' => '',
  'postage_id' => '',
  'send_method' => '',
  'state_id' => '',
  'days_to_send' => '',
  'price' => '',
);
$description = '';

// 送信ボタンを押したとき
if(!empty($_POST['check'])) {
  // 画像処理
  $tmp_names = array();
  $i = 0;
  for($i = 0; $i < count($_FILES['image']['tmp_name']); ++$i) {
    if(empty($_FILES['image']['tmp_name'][$i])) {
      continue;
    }
    $file_size = getimagesize($_FILES['image']['tmp_name'][$i]);
    if(!($file_size['mime'] == "image/jpeg" || $file_size['mime'] == "image/png")) {
      $error_mes['image'] = 'JPEGもしくはPNG以外のファイルが選択されています。';
      $error_flg = true;
      break;
    }

    //リサイズ
    if($file_size['mime'] == "image/jpeg") {
      $src = imagecreatefromjpeg($_FILES['image']['tmp_name'][$i]);
    }
    else {
      $src = imagecreatefrompng($_FILES['image']['tmp_name'][$i]);
    }
    $width = $file_size[0];
    $height = $file_size[1];
    $max_width = 400;
    $max_height = 400;
    $ratio = $width / $height;
    
    if($max_width < $width && $max_height < $height) {
      if($width < $height) {
        $width = $width * ($max_height / $height);
        $height = $max_height;
      }
      elseif($height < $width) {
        $height = $height * ($max_width / $width);
        $width = $max_width;
      }
      else {
        $width = $max_width;
        $height = $max_height;
      }
    }
    elseif($max_width < $width) {
      $height = $height * ($max_width / $width);
      $width = $max_width;
    }
    elseif($max_height < $height) {
      $width = $width * ($max_height / $height);
      $height = $max_height;
    }
    else {
      // どちらも小さい場合
      // $width = $width;
    }

    $dst = imagecreatetruecolor($width, $height);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, (int)$width, (int)$height, $file_size[0], $file_size[1]);

    // 移動
    $tmp_name = random_string(10);
    $image_path = '../images/tmp/' . $tmp_name;
    $result =  move_uploaded_file($_FILES['image']['tmp_name'][$i], $image_path);
    if($result !== true) {
      //エラー処理
      $error_mes['image'] = '画像のアップロード中にエラーが発生しました。';
      $error_flg = true;
      break;
    }
    chmod($image_path, 0644);
    $tmp_names[] = $tmp_name;

    imagedestroy($src);
    imagedestroy($dst);
  }

  // 値受取
  foreach($input as $key => $value) {
    $input[$key] = (string)filter_input(INPUT_POST, $key);
  }  
  $description = (string)filter_input(INPUT_POST, 'description');
  
  $error_flg = false;
  // エラーチェック
  // 空白チェック
  foreach($input as $key => $value) {
    if($input[$key] == '') {
      $error_flg = true;
    }
  }
  // 文字数チェック
  if(strlen($input['product_name']) > 400) {
    $error_flg = true;
  }
  if(strlen($description) > 1000) {
    $error_flg = true;
  }
  
  // 数値チェック
  if(!is_numeric($input['product_category_id'])) {
    $error_flg = true;
  }
  if(!is_numeric($input['product_condition_id'])) {
    $error_flg = true;
  }
  if(!is_numeric($input['postage_id'])) {
    $error_flg = true;
  }
  if(!is_numeric($input['send_method'])) {
    $error_flg = true;
  }
  if(!is_numeric($input['state_id'])) {
    $error_flg = true;
  }
  if(!is_numeric($input['price'])) {
    $error_flg = true;
  }

  // 入力値チェック
  if(!(1 <= $input['product_category_id'] && $input['product_category_id'] <= 38)) {
    $error_flg = true;
  }
  if(!(1 <= $input['product_condition_id'] && $input['product_condition_id'] <= 6)) {
    $error_flg = true;
  }
  if(!(1 <= $input['postage_id'] && $input['postage_id'] <= 2)) {
    $error_flg = true;
  }
  if(!(1 <= $input['send_method'] && $input['send_method'] <= 8)) {
    $error_flg = true;
  }
  if(!(1 <= $input['state_id'] && $input['state_id'] <= 48)) {
    $error_flg = true;
  }
  if(!(1 <= $input['days_to_send'] && $input['days_to_send'] <=3)) {
    $error_flg = true;
  }
  if(!(300 <= $input['price'] && $input['price'] <= 300000)) {
    $error_flg = true;
  }

  // エラーなしで確認画面へ
  if($error_flg === false){
    $url = './exhibition_check.php';
    foreach($input as $key => $value) {
      $_SESSION[$key] = $input[$key];
    }
    $_SESSION['description'] = $description;
    $_SESSION['tmp_name'] = $tmp_names;
    redirect($url);
  }
}

// 戻って来たとき
if(isset($_POST['back'])){
  foreach($input as $key => $value) {
    $input[$key] = $_SESSION[$key];
  }
  $description = $_SESSION['description'];
}

require_once '../view/header.php';
require_once '../view/exhibition_sell.php';
require_once '../view/footer.php';