<!doctype html>
<html lang="ja">

<head>
  <meta http-equiv="content-Type" content="text/html;charset=UTF-8">
  <title>まさる堂/登録確認画面</title>
  <link rel="stylesheet" href="../css/sign_in_check.css" type="text/css">
</head>

<body>

  <header>
    <p><img src="../images/image_materials/logo.png" width="250" alt="まさる堂ロゴ"></p>
  </header>

  <div id="input">

    <h1>確認画面</h1>

    <p class="word">ニックネーム <span><?php echo $prof['nickname']; ?></span></p>
    <p class="word">パスワード <span><?php echo $prof['password']; ?></span></p>
    <p class="word">姓　漢字 <span><?php echo $prof['lastname_kanji']; ?></span></p>
    <p class="word">名　漢字 <span><?php echo $prof['name_kanji']; ?></span></p>
    <p class="word">姓　カナ <span><?php echo $prof['lastname_kana']; ?></span></p>
    <p class="word">名　カナ <span><?php echo $prof['name_kana']; ?></span></p>
    <p class="word">住所 <span>〒 <?php echo $prof['zip1'] . '-' . $prof['zip2']; ?><br> <!-- zip code -->
        <?php echo $prof['prefecture'] . $prof['municipality']; ?><br> <!-- 都道府県,市区町村 -->
        <?php echo $prof['after_ad']; ?></span></p> <!-- 残りの住所 -->
    <p class="word">電話番号 <span><?php echo $prof['telnum']; ?></span></p>
    <p class="word">メールアドレス <span><?php echo $prof['mail']; ?></span></p>

    <form action="./sign_in.php" method="post">
      <button type="submit" name="state" value="back">戻る</button>
    </form>
    <form action="./sign_in_complete.php" method="post">
      <button type="submit" name="state" value="entry">登録する</button>
    </form>

  </div> <!-- input -->

  <footer></footer>

</body>

</html>