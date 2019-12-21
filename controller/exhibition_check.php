<?PHP
session_start();

require_once '../config/config.php';
require_once '../model/func/func.php';


//登録を押したとき
if(!empty($_POST) && $_POST['record'] === 'r'){
  $url = './finish.php';
  $sql = 'INSERT INTO db22.department(name,description,start_date,end_date,instructor_id) VALUES(?,?,?,?,?)';
  $input = array(
    'name'          => $_SESSION['name'],
    'description'   => $_SESSION['description'],
    'start_date'    => $_SESSION['start_date'],
    'end_date'      => $_SESSION['end_date'],
    'instructor_id' => $_SESSION['instructor_id'],
  );

  // $db_result = write_db($sql, $input);
  // if($db_result !== NULL) {
  //   $error_msg = $db_result;
  //   require_once '../tpl/error.php';
  // }

  // セッション削除
  if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
    $params['path'], $params['domain'], $params['secure'], $params['httponly']
    );
  }
  session_destroy();

  // リダイレクト
  redirect($url);
}

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

require_once '';