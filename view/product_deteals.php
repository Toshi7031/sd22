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
            <td>家電&nbsp;&gt;&nbsp;PC・タブレット</td>
          </tr>
          <tr>
            <th>商品の詳細</th>
            <td>新品、未使用</td>
          </tr>
          <tr>
            <th>配送料の負担</th>
            <td>送料込（出品者負担）</td>
          </tr>
          <tr>
            <th>配送の方法</th>
            <td>未定</td>
          </tr>
          <tr>
            <th>発送元の地域</th>
            <td>大阪府</td>
          </tr>
          <tr>
            <th>発送までの日数</th>
            <td>1~2日で発送</td>
          </tr>
          <tr>
            <th>出品日</th>
            <td>test</td>
          </tr>
        </table>
      </div>
      <div class="exhibitor">
        <h3>出品者</h3>
        <ul>
          <li><img src="../images/icons/yjimage.jpeg" width="220" height="220" alt=""></li>
          <li>出品者名</li>
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