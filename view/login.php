<!doctype html>
<html lang="ja">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>まさる堂/ログイン</title>
  <link rel="stylesheet" href="../css/login.css" type="text/css">
  <script src="../js/jquery-3.4.1.min.js"></script>
</head>

<body>
  <article>
    <header>
      <p><a href="./index.html"><img src="../images/image_materials/logo.png" width="250" alt="まさる堂ロゴ"></a></p>
    </header>

    <h1>ログイン</h1>

    <div id="input_area">
      <form action="" method="post">
        <p>メールアドレス<span><?php echo $error_mes['email']; ?></span></p>
        <p><input type="text" name="email" value="<?php echo h($input['email']);?>"></p>
        <p>パスワード<span><?php echo $error_mes['password']; ?></span></p>
        <!-- <p><input type="password" name="password"></p> -->
        <p><input type="password" name="password" value="asdfasdf"></p>
        <button type="submit" name="login" value="l">ログイン</button>
      </form>

      <p class="help">お困りですか？</p>
      <!-- <div class="help_area hidden"> -->
        <ul class="help_area">
          <li><a href="">ログインIDを忘れた</a></li>
          <li><a href="">パスワードを忘れた</a></li>
          <li><a href="./sign_in.php">新規会員登録</a></li>
        </ul>
      <!-- </div> -->
    </div><!-- input -->

    <footer>
      <p><a href="../index.php">まさる堂トップへ戻る</a></p>
    </footer>
  </article>
  <script src="../js/login.js"></script>
</body>

</html>