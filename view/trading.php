
  <section id="back">
    <p><a href="../controller/mypage_notification.php"><img src="../images/image_materials/arrow.png" width="100" alt="arrow"></a></p>
    <h2><?php echo $h2;?></h2>
  </section>

  <section id="main_area">
    <div class="product">
      <p><img src="../images/products/product_<?php echo $id;?>_1.jpg" alt="product"></p>
      <ul>
        <li><?php echo $product_info[0]['product_name'];?></li>
        <li>￥<?php echo $product_info[0]['price'];?></li>
        <li><?php echo $partner;?></li>
      </ul>
    </div>
    <div class="message">
      <p><?php echo $message;?></p>
      <form action="" method="get">
        <input type="hidden" name="product_id" value="<?php echo $product_info[0]['id'];?>">
        <input type="hidden" name="progress" value="<?php echo $product_info[0]['progress'];?>">
<?php if(isset($button)):?>
        <button class="button" type="submit" name="send" value="s"><?php echo $button;?></button>
<?php endif;?>
      </form>
    </div>
  </section>