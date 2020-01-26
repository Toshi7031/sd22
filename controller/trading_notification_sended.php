<?php
session_start();

require_once '../config/config.php';
require_once '../model/func/func.php';
require_once '../model/login_check.php';

$title = 'まさる堂/取引ページ';
$css_file_name = "trading_notification_sended.css";
$js_file_name = "s";


require_once '../view/header.php';
require_once '../view/trading_notification_sended.php';
require_once '../view/footer.php';
