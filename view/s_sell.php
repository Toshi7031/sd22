    <form method="post">
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

      <p class="ten"><a href="s_tenplate.html">テンプレート</a></p>

      <p class="green">商品名と説明</p>
      <section class="area">
        <p>商品名</p>
        <input class="one" type="text" name="name" placeholder="（必須、400文字まで）">
        <p>商品の説明</p>
        <textarea rows="6" cols="185" name="description" placeholder="（任意、1000文字まで）
  （色、素材、重さ、定価、注意点など）

  例：2010年頃に1万円で購入したジャケットです。
  ライトグレーで傷はありません。合わせやすいのでおすすめです。"></textarea>
      </section>

      <p class="green">商品の詳細</p>
      <section class="area">
        <p>
          <span>カテゴリー</span><span>（必須）</span>
          <select name="product_categories">
            <option value="">選択してください</option>
            <option value=""></option>
            <option value="">選択してください</option>
            <option value="">選択してください</option>
            <option value="">選択してください</option>
            <option value="">選択してください</option>
            <option value="">選択してください</option>
            <option value="">選択してください</option>
          </select>
        </p>
        <p>
          <span>商品の状態</span><span>（必須）</span>
          <select name="product_condition">
            <option value="">選択してください</option>
          </select>
        </p>
      </section>

      <p class="green">配送について</p>
      <section class="area">
        <p>
          <span>配送の負担</span><span>（必須）</span>
          <select name="pay">
            <option value="">選択してください</option>
            <option value="self">送料込み（出品者負担）</option>
            <option value="partner">着払い（購入者負担）</option>
          </select>
        </p>
        <p>
          <span>配送の方法</span><span></span>
          <select name="send_method">
            <option value="">選択してください</option>
            <option value="1">ゆうメール</option>
            <option value="2">レターパック</option>
            <option value="3">普通郵便（定形、定形外）</option>
            <option value="4">クロネコヤマト</option>
            <option value="5">ゆうパック</option>
            <option value="6">クリックポスト</option>
            <option value="7">ゆうパケット</option>
            <option value="8">未定</option>
          </select>
        </p>
        <p>
          <span>発送元の地域</span><span></span>
          <select name="states">
            <option value="">選択してください</option>
            <option value="1">北海道</option>
            <option value="2">青森県</option>
            <option value="3">岩手県</option>
            <option value="4">宮城県</option>
            <option value="5">秋田県</option>
            <option value="6">山形県</option>
            <option value="7">福島県</option>
            <option value="8">茨城県</option>
            <option value="9">栃木県</option>
            <option value="10">群馬県</option>
            <option value="11">埼玉県</option>
            <option value="12">千葉県</option>
            <option value="13">東京都</option>
            <option value="14">神奈川県</option>
            <option value="15">新潟県</option>
            <option value="16">富山県</option>
            <option value="17">石川県</option>
            <option value="18">福井県</option>
            <option value="19">山梨県</option>
            <option value="20">長野県</option>
            <option value="21">岐阜県</option>
            <option value="22">静岡県</option>
            <option value="23">愛知県</option>
            <option value="24">三重県</option>
            <option value="25">滋賀県</option>
            <option value="26">京都府</option>
            <option value="27">大阪府</option>
            <option value="28">兵庫県</option>
            <option value="29">奈良県</option>
            <option value="30">和歌山県</option>
            <option value="31">鳥取県</option>
            <option value="32">島根県</option>
            <option value="33">岡山県</option>
            <option value="34">広島県</option>
            <option value="35">山口県</option>
            <option value="36">徳島県</option>
            <option value="37">香川県</option>
            <option value="38">愛媛県</option>
            <option value="39">高知県</option>
            <option value="40">福岡県</option>
            <option value="41">佐賀県</option>
            <option value="42">長崎県</option>
            <option value="43">熊本県</option>
            <option value="44">大分県</option>
            <option value="45">宮崎県</option>
            <option value="46">鹿児島県</option>
            <option value="47">沖縄県</option>
            <option value="48">未定</option>
          </select>
        </p>
        <p>
          <span>発送までの日数</span><span></span>
          <select name="send">
            <option value="">選択してください</option>
            <option value="12">１～２日で発送</option>
            <option value="23">２～３日で発送</option>
            <option value="47">４～７日で発送</option>
          </select>
        </p>
      </section>

      <p class="green">販売価格（300～9,999,999）</p>
      <section class="mny">
        <p><span>￥</span><input type="number" name="price" placeholder="300" min="300"></p>
      </section>

      <section class="area">
        <p>販売手数料<span>-</span></p>
        <p>販売利益<span>-</span></p>
      </section>

      <p class="out"><button type="submit" name="check" value="c">出品する</button></p>
    </form>