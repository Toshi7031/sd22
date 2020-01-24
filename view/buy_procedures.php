<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="../css/<?php echo $css_file_name ?>">
</head>
<body>
  <article id="wrapp">
    <section id="procedures_header">
      <img src="../images/image_materials/arrow.png" width="111" height="110" alt="">
      <p>購入手続き</p>
    </section><!-- procedures_header -->
    <form action="" method="get">
      <section id="about_of_product">
        <ul>
          <li class="image"><img src="../images/products/product_<?php echo $product_id ?>_1.jpg" width="200" height="200" alt="">
          </li>
          <li class="name"><?php echo $array_product[0]['product_name'] ?></li>
          <li class="carriage"><?php echo $postage ?></li>
          <li class="value"><?php  echo $array_product[0]['price'] ?>円</li>
        </ul>
      </section>

      <section id="use_cash">
        <div class="use_proceeds">
          <p>売上金の使用</p>
          <p>売上金：<?php echo $array_member[0]['proceeds'] ?>円</p>
          <p><a href="">売上金でポイントを購入</a></p>
        </div><!-- use_proceeds -->
        <div class="use_point">
          <p>ポイントの使用</p>
          <p>所持ポイント：<?php echo $array_member[0]['point'] ?></p>
          <input type="number" name="" class="input_point">
        </div><!-- use_point -->
      </section>
      <section id="payment">
        <div class="terms_of_payment">
              <p>支払い方法</p>
          <p>
            <select name="method_payment">
              <option value="cash">代金引換&nbsp;決済手数料：100円</option>
              <option value="bank">銀行振込&nbsp;決済手数料：0円</option>
              <option value="card">クレジットカード決済&nbsp;決済手数料：0円</option>
            </select>
          </p>
        </div><!-- use_proceeds -->
        <div class="payment_amount">
          <p>支払い金額</p>
          <p><?php echo $array_product[0]['price'] ?>円</p>
        </div><!-- use_point -->
      </section>

      <section id="delivery_destination">
        <p>配送先</p>
        <p>
            <select name="shipping_address">
              <?php for($count = 0 ; $array_address[$count] ;$count++): ?>
                <option value="<?php echo $count ?>"><?php echo $array_address[$count] ?></option>
              <?php endfor; ?>
            </select>
        </p>
      </section>
      <div class="submit">
        <p>※配送先に間違いはありませんか？</p>
        <p><button type="submit" name="submit">購入する</button></p>
      </div>
  </form>
  </article><!-- wrapp -->
</body>

</html>