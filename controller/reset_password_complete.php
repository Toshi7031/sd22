<?PHP

session_start();
require_once '../config/config.php';
require_once '../model/func/func.php';

//はじく処理
// if($_SESSION['changed_password'] !== true) {
//   redirect('../index.php');
// }
// $_SESSION['changed_password'] = false;

$css_file_name = 'reset_password_complete.css';

require_once '../view/reset_password_complete.php';