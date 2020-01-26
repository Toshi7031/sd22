<?php
/*--------------------------
データベースを配列変換
---------------------------*/
  require '../../config/config.php';
  $mysqli = new mysqli(HOST,DB_USER,DB_PASS,DB_NAME);
  $sql = "select day_to_send from day_to_send";
  $result = $mysqli -> query($sql);
  $array = $result -> fetch_all(MYSQLI_NUM);
  $mysqli -> close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  $array = [ <br>
  1 => <br>
<?php
  foreach($array as $data):
?>
'<?php echo $data[0]?>',<br>

<?php endforeach; ?>
];
</body>
</html>