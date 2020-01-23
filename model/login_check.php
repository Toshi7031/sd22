<?PHP
  if(!isset($_SESSION['login_id'])) {
    redirect('./login.php');
  }
  if(empty($_SESSION['login_id'])) {
    redirect('./login.php');
  }