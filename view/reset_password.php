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
      <h2>パスワードの再設定</h2>
      <p>パスワードは半角英数字で、8文字以上64文字以内で設定してください。</p>
      <form action="" method="post">
        <table>
          <tr>
            <td>新しいパスワードを入力してください</td>
          </tr>
          <tr>
            <td>
              <span id="check1"><?php echo $error_msg['check1']; ?></span><br />
              <input type="password" name="check1" value="<?php echo $input['check1']; ?>" placeholder="新しいパスワード">
            </td>
          </tr>
          <tr>
            <td>確認のため、もう一度新しいパスワードを入力してください</td>
          </tr>
          <tr>
            <td>
              <span id="check2"><?php echo $error_msg['check2']; ?></span><br />
              <input type="password" name="check2" value="<?php echo $input['check2']; ?>" placeholder="もう一度入力してください">
            </td>
          </tr>
          <tr>
            <td><button type="submit" name="change" value="c">パスワードを変更する</button></td>
          </tr>
        </table>
      </form>
    </section>
    <footer></footer>
  </article>
  <?php if (file_exists('../js/' . $js_file_name)) : ?>
    <script src="../js/<?php echo $js_file_name; ?>"></script>
  <?php endif; ?>
</body>

</html>