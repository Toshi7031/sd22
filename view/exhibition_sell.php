<script>
<?php if($input['small_product_category_id']==''):?>
  var small_product_category_id = '';
<?php else:?>
  var large_product_category_id = <?php echo $input['large_product_category_id']?>;
  var small_product_category_id = <?php echo $input['small_product_category_id']?>;
<?php endif;?>
</script>
    <form method="post" enctype="multipart/form-data">
      <p class="green">
        商品画像<span>（1枚以上必須）</span><span class="error_mes"><?php echo $error_mes['image'];?></span>
      </p>
      <section class="pictures">
        <ul>
          <li><span>1</span><input type="file" name="image[]"></li>
          <li><span>2</span><input type="file" name="image[]"></li>
          <li><span>3</span><input type="file" name="image[]"></li>
          <li><span>4</span><input type="file" name="image[]"></li>
          <li><span>5</span><input type="file" name="image[]"></li>
          <li><span>6</span><input type="file" name="image[]"></li>
        </ul>
      </section>

      <!-- <a class="ten"><a href="">テンプレート</a></p> -->

      <p class="green">商品名と説明</p>
      <section id="description_area">
        <ul>
          <li>商品名<span class="error_mes"><?php echo $error_mes['product_name'];?></span></li>
          <li><input class="one" type="text" name="product_name" value="<?php echo $input['product_name'];?>" placeholder="（必須、400文字まで）"></li>
        </ul>
        <ul>
          <li>商品の説明<span class="error_mes"><?php echo $error_mes['description'];?></span></li>
          <li>
            <textarea rows="6" cols="185" name="description" value="<?php echo $description;?>" placeholder="（任意、1000文字まで）
  （色、素材、重さ、定価、注意点など）

  例：2010年頃に1万円で購入したジャケットです。
  ライトグレーで傷はありません。合わせやすいのでおすすめです。"></textarea>
          </li>
        </ul>
      </section>

      <p class="green">商品の詳細</p>
      <section class="area">
        <ul>
          <li>大カテゴリー</li>
          <li>（必須）</li>
          <li>
            <select name="large_product_category_id">
              <option value="0">選択してください</option>
              <option value="1"<?php $input['large_product_category_id']==1?print' selected':print'';?>>レディース</option>
              <option value="2"<?php $input['large_product_category_id']==2?print' selected':print'';?>>メンズ</option>
              <option value="3"<?php $input['large_product_category_id']==3?print' selected':print'';?>>キッズ</option>
              <option value="4"<?php $input['large_product_category_id']==4?print' selected':print'';?>>インテリア・住まい</option>
              <option value="5"<?php $input['large_product_category_id']==5?print' selected':print'';?>>家電</option>
              <option value="6"<?php $input['large_product_category_id']==6?print' selected':print'';?>>ホビー・娯楽</option>
              <option value="7"<?php $input['large_product_category_id']==7?print' selected':print'';?>>ハンドメイド</option>
            </select><br>
            <span class="error_mes"><?php echo $error_mes['large_product_category_id'];?></span>
          </li>
        </ul>
        <ul>
          <li>小カテゴリー</li>
          <li>（必須）</li>
          <li>
            <select name="small_product_category_id" disabled>
              <option value="">大カテゴリを選択してください</option>
            </select><br>
            <span class="error_mes"><?php echo $error_mes['small_product_category_id'];?></span>
          </li>
        </ul>
        <ul>
          <li>商品の状態</li>
          <li>（必須）</li>
          <li>
            <select name="product_condition_id">
              <option value="0">選択してください</option>
              <option value="1"<?php $input['product_condition_id']==1?print' selected':print'';?>>新品・未使用</option>
              <option value="2"<?php $input['product_condition_id']==2?print' selected':print'';?>>未使用に近い</option>
              <option value="3"<?php $input['product_condition_id']==3?print' selected':print'';?>>目立った傷や汚れなし</option>
              <option value="4"<?php $input['product_condition_id']==4?print' selected':print'';?>>やや傷や汚れあり</option>
              <option value="5"<?php $input['product_condition_id']==5?print' selected':print'';?>>傷や汚れあり</option>
              <option value="6"<?php $input['product_condition_id']==6?print' selected':print'';?>>全体的に状態が悪い</option>
            </select><br>
            <span class="error_mes"><?php echo $error_mes['product_condition_id'];?></span>
          </li>
        </ul>
      </section>

      <p class="green">配送について</p>
      <section class="area">
        <ul>
          <li>配送料の負担</li>
          <li>（必須）</li>
          <li>
            <select name="postage_id">
              <option value="0">選択してください</option>
              <option value="1"<?php $input['postage_id']==1?print' selected':print'';?>>送料込み（出品者負担）</option>
              <option value="2"<?php $input['postage_id']==2?print' selected':print'';?>>着払い（購入者負担）</option>
            </select><br>
            <span class="error_mes"><?php echo $error_mes['postage_id'];?></span>
          </li>
        </ul>
        <ul>
          <li>配送の方法</li>
          <li></li>
          <li>
            <select name="send_method">
              <option value="0">選択してください</option>
              <option value="1"<?php $input['send_method']==1?print' selected':print'';?>>ゆうメール</option>
              <option value="2"<?php $input['send_method']==2?print' selected':print'';?>>レターパック</option>
              <option value="3"<?php $input['send_method']==3?print' selected':print'';?>>普通郵便（定形、定形外）</option>
              <option value="4"<?php $input['send_method']==4?print' selected':print'';?>>クロネコヤマト</option>
              <option value="5"<?php $input['send_method']==5?print' selected':print'';?>>ゆうパック</option>
              <option value="6"<?php $input['send_method']==6?print' selected':print'';?>>クリックポスト</option>
              <option value="7"<?php $input['send_method']==7?print' selected':print'';?>>ゆうパケット</option>
              <option value="8"<?php $input['send_method']==8?print' selected':print'';?>>未定</option>
            </select><br>
            <span class="error_mes"><?php echo $error_mes['send_method'];?></span>
          </li>
        </ul>
        <ul>
          <li>発送元の地域</li>
          <li></li>
          <li>
            <select name="state_id">
              <option value="0">選択してください</option>
              <option value="1"<?php $input['state_id']==1?print' selected':print'';?>>北海道</option>
              <option value="2"<?php $input['state_id']==2?print' selected':print'';?>>青森県</option>
              <option value="3"<?php $input['state_id']==3?print' selected':print'';?>>岩手県</option>
              <option value="4"<?php $input['state_id']==4?print' selected':print'';?>>宮城県</option>
              <option value="5"<?php $input['state_id']==5?print' selected':print'';?>>秋田県</option>
              <option value="6"<?php $input['state_id']==6?print' selected':print'';?>>山形県</option>
              <option value="7"<?php $input['state_id']==7?print' selected':print'';?>>福島県</option>
              <option value="8"<?php $input['state_id']==8?print' selected':print'';?>>茨城県</option>
              <option value="9"<?php $input['state_id']==9?print' selected':print'';?>>栃木県</option>
              <option value="10"<?php $input['state_id']==10?print' selected':print'';?>>群馬県</option>
              <option value="11"<?php $input['state_id']==11?print' selected':print'';?>>埼玉県</option>
              <option value="12"<?php $input['state_id']==12?print' selected':print'';?>>千葉県</option>
              <option value="13"<?php $input['state_id']==13?print' selected':print'';?>>東京都</option>
              <option value="14"<?php $input['state_id']==14?print' selected':print'';?>>神奈川県</option>
              <option value="15"<?php $input['state_id']==15?print' selected':print'';?>>新潟県</option>
              <option value="16"<?php $input['state_id']==16?print' selected':print'';?>>富山県</option>
              <option value="17"<?php $input['state_id']==17?print' selected':print'';?>>石川県</option>
              <option value="18"<?php $input['state_id']==18?print' selected':print'';?>>福井県</option>
              <option value="19"<?php $input['state_id']==19?print' selected':print'';?>>山梨県</option>
              <option value="20"<?php $input['state_id']==20?print' selected':print'';?>>長野県</option>
              <option value="21"<?php $input['state_id']==21?print' selected':print'';?>>岐阜県</option>
              <option value="22"<?php $input['state_id']==22?print' selected':print'';?>>静岡県</option>
              <option value="23"<?php $input['state_id']==23?print' selected':print'';?>>愛知県</option>
              <option value="24"<?php $input['state_id']==24?print' selected':print'';?>>三重県</option>
              <option value="25"<?php $input['state_id']==25?print' selected':print'';?>>滋賀県</option>
              <option value="26"<?php $input['state_id']==26?print' selected':print'';?>>京都府</option>
              <option value="27"<?php $input['state_id']==27?print' selected':print'';?>>大阪府</option>
              <option value="28"<?php $input['state_id']==28?print' selected':print'';?>>兵庫県</option>
              <option value="29"<?php $input['state_id']==29?print' selected':print'';?>>奈良県</option>
              <option value="30"<?php $input['state_id']==30?print' selected':print'';?>>和歌山県</option>
              <option value="31"<?php $input['state_id']==31?print' selected':print'';?>>鳥取県</option>
              <option value="32"<?php $input['state_id']==32?print' selected':print'';?>>島根県</option>
              <option value="33"<?php $input['state_id']==33?print' selected':print'';?>>岡山県</option>
              <option value="34"<?php $input['state_id']==34?print' selected':print'';?>>広島県</option>
              <option value="35"<?php $input['state_id']==35?print' selected':print'';?>>山口県</option>
              <option value="36"<?php $input['state_id']==36?print' selected':print'';?>>徳島県</option>
              <option value="37"<?php $input['state_id']==37?print' selected':print'';?>>香川県</option>
              <option value="38"<?php $input['state_id']==38?print' selected':print'';?>>愛媛県</option>
              <option value="39"<?php $input['state_id']==39?print' selected':print'';?>>高知県</option>
              <option value="40"<?php $input['state_id']==40?print' selected':print'';?>>福岡県</option>
              <option value="41"<?php $input['state_id']==41?print' selected':print'';?>>佐賀県</option>
              <option value="42"<?php $input['state_id']==42?print' selected':print'';?>>長崎県</option>
              <option value="43"<?php $input['state_id']==43?print' selected':print'';?>>熊本県</option>
              <option value="44"<?php $input['state_id']==44?print' selected':print'';?>>大分県</option>
              <option value="45"<?php $input['state_id']==45?print' selected':print'';?>>宮崎県</option>
              <option value="46"<?php $input['state_id']==46?print' selected':print'';?>>鹿児島県</option>
              <option value="47"<?php $input['state_id']==47?print' selected':print'';?>>沖縄県</option>
              <option value="48"<?php $input['state_id']==48?print' selected':print'';?>>未定</option>
            </select><br>
            <span class="error_mes"><?php echo $error_mes['state_id'];?></span>
          </li>
        </ul>
        <ul>
          <li>発送までの日数</li>
          <li></li>
          <li>
            <select name="days_to_send">
              <option value="0">選択してください</option>
              <option value="1"<?php $input['days_to_send']==1?print' selected':print'';?>>１～２日で発送</option>
              <option value="2"<?php $input['days_to_send']==2?print' selected':print'';?>>２～３日で発送</option>
              <option value="3"<?php $input['days_to_send']==3?print' selected':print'';?>>４～７日で発送</option>
            </select><br>
            <span class="error_mes"><?php echo $error_mes['days_to_send'];?></span>
          </li>
        </ul>
      </section>

      <p class="green">販売価格（￥300～￥300,000）</p>
      <section class="mny">
        <p>
          <span>￥</span><input type="number" name="price" value="<?php echo $input['price'];?>" placeholder="￥300 ~ ￥300,000" min="300" max="300000"><br />
          <span class="error_mes"><?php echo $error_mes['price'];?></span>
        </p>
      </section>

      <section class="area result">
        <p id="commission_rate">販売手数料<span>￥0</span></p>
        <p id="profit">販売利益<span>￥0</span></p>
      </section>

      <p class="out"><button type="submit" name="check" value="c">出品する</button></p>
    </form>