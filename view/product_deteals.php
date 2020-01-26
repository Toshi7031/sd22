    <div id="main_area">
      <ul class="product_image">
        <?php for($count = 1 ; $array_product[0]['images_count'] >= $count ; $count++): ?>
        <li><img src="../images/products/product_<?php echo $product_id ?>_<?php echo $count ?>.jpg" width="400px" height="400px"
          alt=""></li>
        <?php endfor; ?>
        </ul>
      <h2>商品名</h2>
      <!-- お気に入りを削除
        <div class="reaction">
        <ul>
          <li>☆お気に入り</li>
          <li>0</li>
        </ul>
      </div>
     -->
      <div class="product_description">
        <h3>商品の説明</h3>
        <p><?php echo $array_product[0]['description'] ?></p>
      </div>
      <div class="product_information">
        <h3>商品の情報</h3>
        <table>
          <tr>
            <th>カテゴリー</th>
            <td><?php echo $large_product_categories[$array_product[0]['large_product_category_id']] ?>&nbsp;&gt;&nbsp;<?php echo $small_product_categories[$array_product[0]['small_product_category_id']] ?></td>
          </tr>
          <tr>
            <th>商品の詳細</th>
            <td><?php echo $product_condition[$array_product[0]['product_condition_id']] ?></td>
          </tr>
          <tr>
            <th>配送料の負担</th>
            <td><?php $array_product[0]['postage_id'] == 0 ? print '送料込み(出品者負担)' : print '送料別(購入者負担)'?></td>
          </tr>
          <tr>
            <th>配送の方法</th>
            <td><?php echo $send_method[$array_product[0]['send_method']] ?></td>
          </tr>
          <tr>
            <th>発送元の地域</th>
            <td><?php echo $states[$array_product[0]['state_id']] ?></td>
          </tr>
          <tr>
            <th>発送までの日数</th>
            <td><?php echo $days_to_send[$array_product[0]['days_to_send']] ?></td>
          </tr>
          <tr>
            <th>出品日</th>
            <td><?php echo $array_product[0]['exhibition_date'] ?></td>
          </tr>
        </table>
      </div>
      <div class="exhibitor">
        <h3>出品者</h3>
        <ul>
          <li><img src="../images/icons/<?php echo $array_product[0]['exhibitor'] ?>.jpg" width="220" height="220" alt=""></li>
          <li><?php echo $array_exhibitor[0]['nickname'] ?></li>
        </ul>
      </div>
      <div class="related_goods">
        <h3>関連商品</h3>
        <ul>
          <li class="goods">
            <ul>
              <li><img src="../images/products/61Yyhwxq32L._AC_SL1200_.jpg" width="200px" height="200px" alt=""></li>
              <li>￥1000</li>
            </ul>
          </li>
          <li class="goods">
            <ul>
              <li><img src="../images/products/61Yyhwxq32L._AC_SL1200_.jpg" width="200px" height="200px" alt=""></li>
              <li>￥1000</li>
            </ul>
          </li>
          <li class="goods">
            <ul>
              <li><img src="../images/products/61Yyhwxq32L._AC_SL1200_.jpg" width="200px" height="200px" alt=""></li>
              <li>￥1000</li>
            </ul>
          </li>
          <li class="goods">
            <ul>
              <li><img src="../images/products/61Yyhwxq32L._AC_SL1200_.jpg" width="200px" height="200px" alt=""></li>
              <li>￥1000</li>
            </ul>
          </li>
          <li class="goods">
            <ul>
              <li><img src="../images/products/61Yyhwxq32L._AC_SL1200_.jpg" width="200px" height="200px" alt=""></li>
              <li>￥1000</li>
            </ul>
          </li>
          <li class="goods">
            <ul>
              <li><img src="../images/products/61Yyhwxq32L._AC_SL1200_.jpg" width="100px" height="100px" alt=""></li>
              <li>￥1000</li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="fixed_area">
        <p>1300円</p>
        <p><a href="./buy_procedures.html">購入する</a></p>
      </div>
    </div>