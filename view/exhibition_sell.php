    <form method="post" enctype="multipart/form-data">
      <p class="green">商品画像</p>
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
      <section class="area" id="description_area">
        <p>商品名</p>
        <input class="one" type="text" name="product_name" value="<?php echo $input['product_name'];?>" placeholder="（必須、400文字まで）">
        <p>商品の説明</p>
        <textarea rows="6" cols="185" name="description" value="<?php echo $description;?>" placeholder="（任意、1000文字まで）
  （色、素材、重さ、定価、注意点など）

  例：2010年頃に1万円で購入したジャケットです。
  ライトグレーで傷はありません。合わせやすいのでおすすめです。"></textarea>
      </section>

      <p class="green">商品の詳細</p>
      <section class="area">
        <p>
          <span>カテゴリー</span><span>（必須）</span>
          <select name="large_product_categories">
            <option value="0">選択してください</option>
            <option value="1"<?php $input['large_product_categories']==1?' selected':'';?>>レディース</option>
            <option value="2"<?php $input['large_product_categories']==2?' selected':'';?>>メンズ</option>
            <option value="3"<?php $input['large_product_categories']==3?' selected':'';?>>キッズ</option>
            <option value="4"<?php $input['large_product_categories']==4?' selected':'';?>>インテリア・住まい</option>
            <option value="5"<?php $input['large_product_categories']==5?' selected':'';?>>家電</option>
            <option value="6"<?php $input['large_product_categories']==6?' selected':'';?>>ホビー・娯楽</option>
            <option value="7"<?php $input['large_product_categories']==7?' selected':'';?>>ハンドメイド</option>
          </select>
        </p>
        <p>
          <span></span><span></span>
          <select name="product_category_id" disabled>
            <option value="">選択できません</option>
          </select>
        </p>
        <p>
          <span>商品の状態</span><span>（必須）</span>
          <select name="product_condition_id">
            <option value="0">選択してください</option>
            <option value="1"<?php $input['product_condition_id']==1?' selected':'';?>>新品・未使用</option>
            <option value="2"<?php $input['product_condition_id']==2?' selected':'';?>>未使用に近い</option>
            <option value="3"<?php $input['product_condition_id']==3?' selected':'';?>>目立った傷や汚れなし</option>
            <option value="4"<?php $input['product_condition_id']==4?' selected':'';?>>やや傷や汚れあり</option>
            <option value="5"<?php $input['product_condition_id']==5?' selected':'';?>>傷や汚れあり</option>
            <option value="6"<?php $input['product_condition_id']==6?' selected':'';?>>全体的に状態が悪い</option>
          </select>
        </p>
      </section>

      <p class="green">配送について</p>
      <section class="area">
        <p>
          <span>配送の負担</span><span>（必須）</span>
          <select name="postage_id">
            <option value="0">選択してください</option>
            <option value="1"<?php $input['postage_id']==1?' selected':'';?>>送料込み（出品者負担）</option>
            <option value="2"<?php $input['postage_id']==2?' selected':'';?>>着払い（購入者負担）</option>
          </select>
        </p>
        <p>
          <span>配送の方法</span><span></span>
          <select name="send_method">
            <option value="0">選択してください</option>
            <option value="1"<?php $input['send_method']==1?' selected':'';?>>ゆうメール</option>
            <option value="2"<?php $input['send_method']==2?' selected':'';?>>レターパック</option>
            <option value="3"<?php $input['send_method']==3?' selected':'';?>>普通郵便（定形、定形外）</option>
            <option value="4"<?php $input['send_method']==4?' selected':'';?>>クロネコヤマト</option>
            <option value="5"<?php $input['send_method']==5?' selected':'';?>>ゆうパック</option>
            <option value="6"<?php $input['send_method']==6?' selected':'';?>>クリックポスト</option>
            <option value="7"<?php $input['send_method']==7?' selected':'';?>>ゆうパケット</option>
            <option value="8"<?php $input['send_method']==8?' selected':'';?>>未定</option>
          </select>
        </p>
        <p>
          <span>発送元の地域</span><span></span>
          <select name="state_id">
            <option value="0">選択してください</option>
            <option value="1"<?php $input['state_id']==1?' selected':'';?>>北海道</option>
            <option value="2"<?php $input['state_id']==2?' selected':'';?>>青森県</option>
            <option value="3"<?php $input['state_id']==3?' selected':'';?>>岩手県</option>
            <option value="4"<?php $input['state_id']==4?' selected':'';?>>宮城県</option>
            <option value="5"<?php $input['state_id']==5?' selected':'';?>>秋田県</option>
            <option value="6"<?php $input['state_id']==6?' selected':'';?>>山形県</option>
            <option value="7"<?php $input['state_id']==7?' selected':'';?>>福島県</option>
            <option value="8"<?php $input['state_id']==8?' selected':'';?>>茨城県</option>
            <option value="9"<?php $input['state_id']==9?' selected':'';?>>栃木県</option>
            <option value="10"<?php $input['state_id']==10?' selected':'';?>>群馬県</option>
            <option value="11"<?php $input['state_id']==11?' selected':'';?>>埼玉県</option>
            <option value="12"<?php $input['state_id']==12?' selected':'';?>>千葉県</option>
            <option value="13"<?php $input['state_id']==13?' selected':'';?>>東京都</option>
            <option value="14"<?php $input['state_id']==14?' selected':'';?>>神奈川県</option>
            <option value="15"<?php $input['state_id']==15?' selected':'';?>>新潟県</option>
            <option value="16"<?php $input['state_id']==16?' selected':'';?>>富山県</option>
            <option value="17"<?php $input['state_id']==17?' selected':'';?>>石川県</option>
            <option value="18"<?php $input['state_id']==18?' selected':'';?>>福井県</option>
            <option value="19"<?php $input['state_id']==19?' selected':'';?>>山梨県</option>
            <option value="20"<?php $input['state_id']==20?' selected':'';?>>長野県</option>
            <option value="21"<?php $input['state_id']==21?' selected':'';?>>岐阜県</option>
            <option value="22"<?php $input['state_id']==22?' selected':'';?>>静岡県</option>
            <option value="23"<?php $input['state_id']==23?' selected':'';?>>愛知県</option>
            <option value="24"<?php $input['state_id']==24?' selected':'';?>>三重県</option>
            <option value="25"<?php $input['state_id']==25?' selected':'';?>>滋賀県</option>
            <option value="26"<?php $input['state_id']==26?' selected':'';?>>京都府</option>
            <option value="27"<?php $input['state_id']==27?' selected':'';?>>大阪府</option>
            <option value="28"<?php $input['state_id']==28?' selected':'';?>>兵庫県</option>
            <option value="29"<?php $input['state_id']==29?' selected':'';?>>奈良県</option>
            <option value="30"<?php $input['state_id']==30?' selected':'';?>>和歌山県</option>
            <option value="31"<?php $input['state_id']==31?' selected':'';?>>鳥取県</option>
            <option value="32"<?php $input['state_id']==32?' selected':'';?>>島根県</option>
            <option value="33"<?php $input['state_id']==33?' selected':'';?>>岡山県</option>
            <option value="34"<?php $input['state_id']==34?' selected':'';?>>広島県</option>
            <option value="35"<?php $input['state_id']==35?' selected':'';?>>山口県</option>
            <option value="36"<?php $input['state_id']==36?' selected':'';?>>徳島県</option>
            <option value="37"<?php $input['state_id']==37?' selected':'';?>>香川県</option>
            <option value="38"<?php $input['state_id']==38?' selected':'';?>>愛媛県</option>
            <option value="39"<?php $input['state_id']==39?' selected':'';?>>高知県</option>
            <option value="40"<?php $input['state_id']==40?' selected':'';?>>福岡県</option>
            <option value="41"<?php $input['state_id']==41?' selected':'';?>>佐賀県</option>
            <option value="42"<?php $input['state_id']==42?' selected':'';?>>長崎県</option>
            <option value="43"<?php $input['state_id']==43?' selected':'';?>>熊本県</option>
            <option value="44"<?php $input['state_id']==44?' selected':'';?>>大分県</option>
            <option value="45"<?php $input['state_id']==45?' selected':'';?>>宮崎県</option>
            <option value="46"<?php $input['state_id']==46?' selected':'';?>>鹿児島県</option>
            <option value="47"<?php $input['state_id']==47?' selected':'';?>>沖縄県</option>
            <option value="48"<?php $input['state_id']==48?' selected':'';?>>未定</option>
          </select>
        </p>
        <p>
          <span>発送までの日数</span><span></span>
          <select name="days_to_send">
            <option value="0">選択してください</option>
            <option value="1"<?php $input['days_to_send']==1?' selected':'';?>>１～２日で発送</option>
            <option value="2"<?php $input['days_to_send']==2?' selected':'';?>>２～３日で発送</option>
            <option value="3"<?php $input['days_to_send']==3?' selected':'';?>>４～７日で発送</option>
          </select>
        </p>
      </section>

      <p class="green">販売価格（300￥～300,000￥）</p>
      <section class="mny">
        <p><span>￥</span><input type="number" name="price" value="<?php echo $input['price'];?>" placeholder="300" min="300" max="300000"></p>
      </section>

      <section class="area">
        <p id="commission_rate">販売手数料<span>-</span></p>
        <p id="profit">販売利益<span>-</span></p>
      </section>

      <p class="out"><button type="submit" name="check" value="c">出品する</button></p>
    </form>