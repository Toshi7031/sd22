  <section id="main_area">
<?php if(!empty($product_info)): ?>
    <h2><?php echo $h2;?>の商品</h2>
    <ul>
<?php foreach($notification as $value): ?>
      <li class="product">
        <ul>
          <li><img src="../images/products/product_<?php echo $value['id']?>_1.jpg" alt=""></li>
          <li><?php echo $value['product_name']; ?></li>
          <li><?php echo $value['products.price']; ?></li>
          <li><?php echo $value['nickname']; ?></li>
        </ul>
      </li>
<?php endforeach; ?>
    </ul>
<?php else: ?>
    <p id="none_message">現在<?php echo $h2;?>の商品はありません</p>
<?php endif; ?>
  </section>