<?PHP
//*************************
//課題No.00
//作成日:2019//
//作成者:峯松康二
//クラス:IH-12A-905
//*************************

session_start();
require_once './config/config.php';
require_once _FUNC_FILE;


//funcファイルが読み込めているかのテスト
$mail = 'abc@de.com';
$result = mach_email($mail);
echo '<pre>';
var_dump($result);
echo '</pre>';

require_once './view/index.php';