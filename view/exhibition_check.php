  <section class="top">
    <p><a href="./exhibition_sell.php"><img src="../images/image_materials/arrow.png" width="40" alt="arrow"></a></p>
    <p>確認画面</p>
  </section>

  <section class="area" id="images">
    <ul>
<?php for($i=0; $i<count($image_name); ++$i): ?>
      <li><img src="../images/tmp/<?php echo $image_name[$i];?>" width="" height="" alt=""></li>
<?php endfor; ?>
<?php for($j=$i; $j<6; ++$j): ?>
      <li></li>
<?php endfor; ?>
    </ul>

    <p><strong>商品名</strong><span><?php echo $_SESSION['product_name'];?></span></p>
    <p><strong>商品の説明</strong><span><?php echo $_SESSION['description'];?></span></p>
    <p><strong>カテゴリー</strong><span><?php echo $fetch_datas['large_product_categories'];?>&nbsp;&gt;&nbsp;<?php echo $fetch_datas['product_category'];?></span></p>
    <p><strong>商品の状態</strong><span><?php echo $fetch_datas['product_condition'];?></span></p>
    <p><strong>配送の負担</strong><span><?php echo $postage;?></span></p>
    <p><strong>配送の方法</strong><span><?php echo $fetch_datas['send_method'];?></span></p>
    <p><strong>発送元の地域</strong><span><?php echo $fetch_datas['state'];?></span></p>
    <p><strong>発送までの日数</strong><span><?php echo $fetch_datas['days_to_send'];?></span></p>
    <p><strong>販売価格</strong><span><?php echo $_SESSION['price'];?>円</span></p>
    <p><strong>販売利益</strong><span><?php echo $profit;?>円</span></p>
  </section>

  <section class="sell">
    <form method="post">
      <button type="submit" name="exhibition" value="<?php echo $check;?>">出品する</button>
    </form>
  </section>