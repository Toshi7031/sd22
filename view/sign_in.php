<!doctype html>
<html lang="ja">
  <head>
    <meta http-equiv="content-Type" content="text/html;charset=UTF-8">
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script src="../js/ajaxzip3.js" charset="UTF-8"></script>
    <title>まさる堂/新規登録</title>
    <link rel="stylesheet" href="../css/sign_in.css" type="text/css">
  </head>
  <body>

    <header>
      <p><a href="./index.html"><img src="../images/image_materials/logo.png" width="250" alt="まさる堂ロゴ"></a></p>
    </header>

    <div id="input">
      <h1>新規会員登録</h1>

      <form action="./sign_in.php" method="post">
      <table>

        <tr>
          <td colspan="2" class="word">ニックネーム</td>
        </tr>
        <tr>
          <td colspan="2" class="box"> <input type="text" name="nickname" value="<?php echo $prof['nickname']; ?>"> </td>
        </tr>
        <tr>
          <td colspan="2" class="err">
            <?php  if (!empty($err_msg['nickname'])) {
                    echo $err_msg['nickname'];
                   }  ?>
           </td>
        </tr>

        <tr>
          <td colspan="2" class="word">パスワード</td>
        </tr>
        <tr>
          <td colspan="2" class="box"> <input type="password" name="password" value="<?php echo $prof['password']; ?>"> </td>
        </tr>
        <tr>
          <td colspan="2" class="err">
            <?php  if (!empty($err_msg['password'])) {
                    echo $err_msg['password'];
                   }  ?>
           </td>
        </tr>

        <tr>
          <td class="word">姓　漢字</td>
          <td class="word">名　漢字</td>
        </tr>
        <tr>
          <td class="box"> <input type="text" name="lastname_kanji" value="<?php echo $prof['lastname_kanji']; ?>"> </td>
          <td class="box"> <input type="text" name="name_kanji" value="<?php echo $prof['name_kanji']; ?>"> </td>
        </tr>
        <tr>
          <td class="err">
            <?php  if (!empty($err_msg['lastname_kanji'])) {
                    echo $err_msg['lastname_kanji'];
                   }  ?>
           </td>
           <td class="err">
             <?php  if (!empty($err_msg['name_kanji'])) {
                     echo $err_msg['name_kanji'];
                    }  ?>
            </td>
        </tr>

        <tr>
          <td class="word">姓　カナ</td>
          <td class="word">名　カナ</td>
        </tr>
        <tr>
          <td class="box"> <input type="text" name="lastname_kana" value="<?php echo $prof['lastname_kana']; ?>"> </td>
          <td class="box"> <input type="text" name="name_kana" value="<?php echo $prof['name_kana']; ?>"> </td>
        </tr>
        <tr>
          <td class="err">
            <?php  if (!empty($err_msg['lastname_kana'])) {
                    echo $err_msg['lastname_kana'];
                   }  ?>
           </td>
           <td class="err">
             <?php  if (!empty($err_msg['name_kana'])) {
                     echo $err_msg['name_kana'];
                    }  ?>
            </td>
        </tr>

        <tr>
          <td colspan="2" class="word">住所</td>
        </tr>

        <tr>
          <td colspan="2" class="ad_word">郵便番号:　<span>（半角数字）</span></td>
        </tr>
        <tr>
          <td colspan="2" class="ad_box"> <input type="text" name="zip1" maxlength="3" value="<?php echo $prof['zip1']; ?>"> - <input type="text" name="zip2" onKeyUp="AjaxZip3.zip2addr('zip1','zip2','prefecture','municipality','after_ad');" maxlength="4" value="<?php echo $prof['zip2']; ?>"> </td>
        </tr>
        <tr>
          <td colspan="2" class="ad_err">
            <?php  if (!empty($err_msg['zip'])) {
                    echo $err_msg['zip'];
                   }  ?>
           </td>
        </tr>

        <tr>
          <td colspan="2" class="ad_word">都道府県:</td>
        </tr>
        <tr>
          <td colspan="2" class="ad_box"> <input type="text" name="prefecture" value="<?php echo $prof['prefecture']; ?>"> </td>
        </tr>

        <tr>
          <td colspan="2" class="ad_word">市区町村:</td>
        </tr>
        <tr>
          <td colspan="2" class="ad_box"> <input type="text" name="municipality" value="<?php echo $prof['municipality']; ?>"> </td>
        </tr>

        <tr>
          <td colspan="2" class="ad_word">番地以降:</td>
        </tr>
        <tr>
          <td colspan="2" class="ad_box"> <input type="text" name="after_ad" value="<?php echo $prof['after_ad']; ?>"> </td>
        </tr>
        <tr>
          <td colspan="2" class="ad_err">
            <?php  if (!empty($err_msg['after_ad'])) {
                    echo $err_msg['after_ad'];
                   }  ?>
           </td>
        </tr>

        <tr>
          <td colspan="2" class="word">電話番号　<span>（半角数字ハイフンなし）</span></td>
        </tr>
        <tr>
          <td colspan="2" class="box"> <input type="text" name="telnum" value="<?php echo $prof['telnum']; ?>"> </td>
        </tr>
        <tr>
          <td colspan="2" class="err">
            <?php  if (!empty($err_msg['telnum'])) {
                    echo $err_msg['telnum'];
                   }  ?>
           </td>
        </tr>

        <tr>
          <td colspan="2" class="word">メールアドレス</td>
        </tr>
        <tr>
          <td colspan="2" class="box"> <input type="text" name="mail" value="<?php echo $prof['mail']; ?>"> </td>
        </tr>
        <tr>
          <td colspan="2" class="err">
            <?php  if (!empty($err_msg['mail'])) {
                    echo $err_msg['mail'];
                   }  ?>
           </td>
        </tr>

        <tr>
          <td colspan="2">確認のためにもう一度</td>
        </tr>
        <tr>
          <td colspan="2" class="box"> <input type="text" name="mail2" value="<?php echo $prof['mail2']; ?>"> </td>
        </tr>
        <tr>
          <td colspan="2" class="err">
            <?php  if (!empty($err_msg['mail2'])) {
                    echo $err_msg['mail2'];
                   }  ?>
           </td>
        </tr>

      </table>
    </div>

      <p class="send"><button type="submit" name="state" value="confirm">確認する</button></p>
    </form>

    <footer></footer>

  </body>
</html>
