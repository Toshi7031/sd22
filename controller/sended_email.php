<?PHP

session_start();
require_once '../config/config.php';
require_once '../model/func/func.php';

$css_file_name = 'sended_email.css';

//はじく処理



require_once '../view/sended_email.php';