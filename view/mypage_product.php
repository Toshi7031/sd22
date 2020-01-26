    <section id="main_area">
<?php if(!empty($product_info)): ?>
      <h2><?php echo $h2;?>の商品</h2>
      <ul>
<?php foreach($product_info as $value): ?>
        <li class="product">
          <a href="./trading.php?id=<?php echo $value['id']?>&request=<?php echo $request?>">
            <ul>
              <li class="img"><img src="../images/products/product_<?php echo $value['id']?>_1.jpg" alt=""></li>
              <li class="product_name"><?php echo $value['product_name']; ?></li>
              <li class="price">￥<?php echo $value['price']; ?></li>
            </ul>
          </a>
        </li>
<?php endforeach; ?>
      </ul>
<?php else: ?>
      <h2 id="none_message"><?php echo $h2;?>の商品</h2>
      <p>現在<?php echo $h2;?>の商品はありません</p>
<?php endif; ?>
    </section>
  </div>