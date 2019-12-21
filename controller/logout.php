<?PHP

session_start();

//configと関数呼び出し
require_once '../config/config.php';
require_once '../model/func/func.php';

$title = 'まさる堂/ログアウトページ';
$url = 'index.php';

// ログアウトボタンを押したとき

  //$_SESSION['login_flg']をfalseにする


//表示部の読み出し
require_once '../view/header.php';
require_once '../view/s_sell.php';
require_once '../view/footer.php';