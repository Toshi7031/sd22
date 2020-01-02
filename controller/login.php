<?PHP

session_start();

//configと関数呼び出し
require_once '../config/config.php';
require_once '../model/func/func.php';

$title = 'まさる堂/ログインページ';
$url = 'index.php';

// ログインボタンを押したとき


  // エラーチェック



  // 空白チェック





  // エラーなしで$_SESSION['login_flg']をtrueに、$_SESSION['login_id']にIDを記述



//表示部の読み出し
require_once '../view/header.php';
require_once '../view/s_sell.php';
require_once '../view/footer.php';