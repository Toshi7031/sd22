<?PHP

session_start();

//configと関数呼び出し
require_once '../config/config.php';
require_once '../model/func/func.php';

$title = 'まさる堂/ログアウトページ';
$url = '../index.php';

if (!isset($_SESSION['login_id'])) {
	redirect($url);
}

// ログアウトボタンを押したとき
if (isset($_POST['yes_button'])) {
	$_SESSION = array();
	if (ini_get('session.use_cookies')) {
		$params = session_get_cookie_params();
		setcookie(
			session_name(),
			'',
			time() - 42000,
			$params['path'],
			$params['domain'],
			$params['secure'],
			$params['httponly']
		);
	}
	session_destroy();
	redirect($url);
} elseif(isset($_POST['no_button'])) {
	// 仮でindexにジャンプ 直前のページに戻りたい
	redirect($url);
}

//表示部の読み出し
require_once '../view/logout.php';
