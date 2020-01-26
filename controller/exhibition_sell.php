<?PHP
session_start();

require_once '../config/config.php';
require_once '../model/func/func.php';
require_once '../model/login_check.php';

// 初期化
$title = 'まさる堂/出品ページ';
$css_file_name = 'exhibition_sell.css';
$js_file_name = 'exhibition_sell.js';
$error_mes = array(
  'image' => '',
  'product_name' => '',
  'large_product_category_id' => '',
  'small_product_category_id' => '',
  'product_condition_id' => '',
  'postage_id' => '',
  'send_method' => '',
  'state_id' => '',
  'days_to_send' => '',
  'price' => '',  
);
$error_mes['description'] = '';
foreach($error_mes as $key => $value) {
  $input[$key] = '';
}
$description = '';

// 送信ボタンを押したとき
if(!empty($_POST['check'])) {
  // 画像処理
  $tmp_names = array();
  $i = 0;
  $image_emmpty_cnt = 0;
  for($i = 0; $i < count($_FILES['image']['tmp_name']); ++$i) {
    if(empty($_FILES['image']['tmp_name'][$i])) {
      $image_emmpty_cnt++;
      if(6 <= $image_emmpty_cnt) {
        $error_mes['image'] = '画像を1枚以上投稿してください。';
      }  
      continue;
    }

    // 画像のエラーチェック
    $file_size = getimagesize($_FILES['image']['tmp_name'][$i]);
    if(!($file_size['mime'] == "image/jpeg" || $file_size['mime'] == "image/png")) {
      $error_mes['image'] = 'ファイル形式がJPGもしくはPNG以外のファイルが選択されています。';
      break;
    }

    // 移動
    $tmp_name = random_string(10);
    $image_path = '../images/tmp/' . $tmp_name;
    $result =  move_uploaded_file($_FILES['image']['tmp_name'][$i], $image_path);
    if($result !== true) {
      //エラー処理
      $error_mes['image'] = '画像のアップロード中にエラーが発生しました。';
      break;
    }
    chmod($image_path, 0744);
    $tmp_names[] = $tmp_name;
  }

  // 値受取
  foreach($input as $key => $value) {
    $input[$key] = (string)filter_input(INPUT_POST, $key);
  }
  $description = (string)filter_input(INPUT_POST, 'description');
  
  $error_flg = false;
  // エラーチェック
  // 空白チェック
  if(empty($input['product_name'])) {
    $error_mes['product_name'] = '商品名を入力してください';
  }
  if(empty($description)) {
    $error_mes['description'] = '商品の説明を入力してください';
  }
  if(empty($input['large_product_category_id'])) {
    $error_mes['large_product_category_id'] = '商品のカテゴリを選択してください';
  }
  if(empty($input['small_product_category_id'])) {
    $error_mes['small_product_category_id'] = '商品のカテゴリを選択してください';
  }
  if(empty($input['product_condition_id'])) {
    $error_mes['product_condition_id'] = '商品の状態を選択してください';
  }
  if(empty($input['postage_id'])) {
    $error_mes['postage_id'] = '配送料の負担者を選択してください';
  }
  if(empty($input['price'])) {
    $error_mes['price'] = '販売価格を入力してください';
  }

  // 文字数チェック
  if(mb_strlen($input['product_name']) > 400) {
    $error_mes['product_name'] = '商品名は400文字以内で入力してください';
  }
  if(mb_strlen($description) > 1000) {
    $error_mes['description'] = '商品に説明は1000文字以内で入力してください';
  }
  
  // 数値チェック
  if(!is_numeric($input['large_product_category_id'])) {
    $error_mes['large_product_category_id'] = '商品のカテゴリを選択してください';
  }
  if(!is_numeric($input['small_product_category_id'])) {
    $error_mes['small_product_category_id'] = '商品のカテゴリを選択してください';
  }
  if(!is_numeric($input['product_condition_id'])) {
    $error_mes['product_condition_id'] = '商品の状態を選択してください';
  }
  if(!is_numeric($input['postage_id'])) {
    $error_mes['postage_id'] = '配送料の負担者を選択してください';
  }
  if(!is_numeric($input['send_method'])) {
    $error_mes['send_method'] = '配送の方法を選択してください';
  }
  if(!is_numeric($input['state_id'])) {
    $error_mes['state_id'] = '発送元の地域を選択してください';
  }
  if(!is_numeric($input['days_to_send'])) {
    $error_mes['days_to_send'] = '発送までの日数を選択してください';
  }
  if(!is_numeric($input['price'])) {
    $error_mes['price'] = '販売価格を入力してください';
  }

  // 入力値チェック
  if(!(1 <= $input['large_product_category_id'] && $input['large_product_category_id'] <= 38)) {
    $error_mes['large_product_category_id'] = '商品のカテゴリを選択してください';
  }
  if(!(1 <= $input['small_product_category_id'] && $input['small_product_category_id'] <= 38)) {
    $error_mes['small_product_category_id'] = '商品のカテゴリを選択してください';
  }
  if(!(1 <= $input['product_condition_id'] && $input['product_condition_id'] <= 6)) {
    $error_mes['product_condition_id'] = '商品の状態を選択してください';
  }
  if(!(1 <= $input['postage_id'] && $input['postage_id'] <= 2)) {
    $error_mes['postage_id'] = '配送料の負担者を選択してください';
  }
  // if(!(1 <= $input['send_method'] && $input['send_method'] <= 8)) {
  //   $error_mes['send_method'] = '配送の方法を選択してください';
  // }
  // if(!(1 <= $input['state_id'] && $input['state_id'] <= 48)) {
  //   $error_mes['state_id'] = '発送元の地域を選択してください';
  // }
  // if(!(1 <= $input['days_to_send'] && $input['days_to_send'] <=3)) {
  //   $error_mes['days_to_send'] = '発送までの日数を選択してください';
  // }
  if(!(300 <= $input['price'] && $input['price'] <= 300000)) {
    $error_mes['price'] = '販売価格は300円以上、300,000円以内で入力してください';
  }

  $error_flg = false;
  foreach($error_mes as $key => $value) {
    if(!empty($error_mes[$key])) {
      $error_flg = true;
    }
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


// テストデータ
$input['product_name'] = 'iPad Air 2 Wi-Fiモデル 64GB silver';
$input['large_product_category_id'] = '5';
$input['product_condition_id'] = '1';
$input['postage_id'] = '1';
$input['send_method'] = '3';
$input['state_id'] = '27';
$input['days_to_send'] = '2';
$input['price'] = '21800';
$description = '購入してからほとんど使っていない為バッテリーの劣化はほぼないです。

ケースと保護フィルムをつけたままお渡しします。

付属品はLightningと箱のみです。';

// option追加
if($input['large_product_category_id'] == 1 || $input['large_product_category_id'] == 2) {
  $option = array(
    '<option value="0">選択してください</option>',
    '<option value="1">服</option>',
    '<option value="2">帽子</option>',
    '<option value="3">アクセサリー</option>',
    '<option value="38">その他</option>',
  );
}
elseif($input['large_product_category_id'] == 3) {
  $option = array(
    '<option value="0">選択してください</option>',
    '<option value="4">ベビー服</option>',
    '<option value="5">キッズ服</option>',
    '<option value="6">キッズ靴</option>',
    '<option value="7">子供用ファッション小物</option>',
    '<option value="8">外出・移動用品</option>',
    '<option value="9">ベビー家具・寝具・室内用品</option>',
    '<option value="10">おもちゃ</option>',
    '<option value="38">その他</option>',
  );
}
elseif($input['large_product_category_id'] == 4) {
  $option = array(
    '<option value="0">選択してください</option>',
    '<option value="11">キッチン・食器</option>',
    '<option value="12">ベッド・マットレス・寝具</option>',
    '<option value="13">机・イス</option>',
    '<option value="14">収納家具</option>',
    '<option value="15">カーペット・ラグ・マット</option>',
    '<option value="16">照明</option>',
    '<option value="17">時計</option>',
    '<option value="18">インテリア小物</option>',
    '<option value="19">季節・年中行事</option>',
    '<option value="38">その他</option>',
  );
}
elseif($input['large_product_category_id'] == 5) {
  $option = array(
    '<option value="20">スマホ</option>',
    '<option value="21">スマホアクセサリー</option>',
    '<option value="22" selected>PC・タブレット</option>',
    '<option value="23">カメラ</option>',
    '<option value="24">テレビ・映像機器</option>',
    '<option value="25">オーディオ機器</option>',
    '<option value="26">美容・健康</option>',
    '<option value="27">冷暖房・空調</option>',
    '<option value="28">生活家電</option>',
    '<option value="38">その他</option>',
  );
}
elseif($input['large_product_category_id'] == 6) {
  $option = array(
    '<option value="0">選択してください</option>',
    '<option value="29">本・DVD・音楽</option>',
    '<option value="30">ゲーム</option>',
    '<option value="31">スポーツ・レジャー</option>',
    '<option value="38">その他</option>',    
  );
}
elseif($input['large_product_category_id'] == 6) {
  $option = array(
    '<option value="0">選択してください</option>',
    '<option value="32">アクセサリー（女性用）</option>',
    '<option value="33">ファッション・小物</option>',
    '<option value="34">アクセサリー・時計</option>',
    '<option value="35">日用品・インテリア</option>',
    '<option value="36">趣味・おもちゃ</option>',
    '<option value="37">素材・材料</option>',
    '<option value="38">その他</option>',
  );
}


require_once '../view/header.php';
require_once '../view/exhibition_sell.php';
require_once '../view/footer.php';