<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>まさる堂/パスワード変更</title>
  <link href="../css/<?php echo $css_file_name; ?>" rel="stylesheet" type="text/css">
  <script src="../js/jquery-3.4.1.min.js"></script>
</head>

<body>
  <article>
    <header>
      <h1><a href="../index.php"><img src="../images/image_materials/logo.png" alt="まさる堂ロゴ"></a></h1>
    </header>
    <section id="main_area">
      <h2>パスワードをお忘れの方</h2>
      <p>登録されているメールアドレスを入力してください。パスワード再設定のご案内をお送りします。</p>
      <p>メールアドレス</p>
      <form action="" method="post">
        <input type="email" name="email" placeholder="登録されているメールアドレス"><br><span></span>
        <button type="submit">送信する</button>
      </form>
    </section>
    <footer>
      <p><a href="./login.php">ログイン画面に戻る</a></p>
      <p><a href="../index.php">トップに戻る</a></p>
    </footer>
  </article>
<?php if(file_exists('../js/'.$js_file_name)): ?>
  <script src="../js/<?php echo $js_file_name;?>"></script>
<?php endif; ?>
</body>
</html>