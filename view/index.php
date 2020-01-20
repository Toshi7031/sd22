<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>まさる堂/トップページ</title>
  <link href="./css/index.css" rel="stylesheet" type="text/css">
  <script src="./js/jquery-3.4.1.min.js"></script>
  <script src="./js/header.js"></script>
</head>

<body>
  <article>
    <header>
      <h1><a href="#"><img src="./images/image_materials/logo.png" width="308" height="77" alt="まさる堂ロゴ"></a></h1>
      <div class="header_search_area">
        <input type="text" name="search" placeholder="何かお探しですか？">
        <button>検索</button>
      </div>
      <div class="header_login_area">
        <?php if (isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) : ?>
          <p><a href="./controller/logout.php">ログアウト</a></p>
          <p><a href="./controller/mypage_notification.php">マイページ</a></p>
        <?php else : ?>
          <p><a href="./controller/login.php">ログイン</a></p>
          <p><a href="./controller/sign_in.php">新規会員登録</a></p>
        <?php endif; ?>
      </div>
    </header><!-- global_navi -->
    <nav>
      <ul>
        <li id="select_product_category">
          <p>商品ジャンル一覧</p>
          <div id="product_category_list">
            <p class="list_title">商品一覧</p>
            <p class="cancel_button"><span></span></p>
            <ul id="large_category_list">
              <li><a href="./controller/product_view.php?large_product_category=1">レディース</a></li>
              <li><a href="./controller/product_view.php?large_product_category=2">メンズ</a></li>
              <li><a href="./controller/product_view.php?large_product_category=3">キッズ</a></li>
              <li><a href="./controller/product_view.php?large_product_category=4">インテリア・住まい</a></li>
              <li><a href="./controller/product_view.php?large_product_category=5">家電</a></li>
              <li><a href="./controller/product_view.php?large_product_category=6">ホビー・娯楽</a></li>
              <li><a href="./controller/product_view.php?large_product_category=7">ハンドメイド</a></li>
            </ul>
            <div id="small_category_area">
              <ul class="small_category_list">
                <li><a href="./controller/product_view.php?large_product_category=1&small_product_category=1">服</a></li>
                <li><a href="./controller/product_view.php?large_product_category=1&small_product_category=2">帽子</a></li>
                <li><a href="./controller/product_view.php?large_product_category=1&small_product_category=3">アクセサリー</a></li>
                <li><a href="./controller/product_view.php?large_product_category=1&small_product_category=38">その他</a></li>
              </ul>
              <ul class="small_category_list">
                <li><a href="./controller/product_view.php?large_product_category=2&small_product_category=1">服</a></li>
                <li><a href="./controller/product_view.php?large_product_category=2&small_product_category=2">帽子</a></li>
                <li><a href="./controller/product_view.php?large_product_category=2&small_product_category=3">アクセサリー</a></li>
                <li><a href="./controller/product_view.php?large_product_category=2&small_product_category=38">その他</a></li>
              </ul>
              <ul class="small_category_list">
                <li><a href="./controller/product_view.php?large_product_category=3&small_product_category=4">ベビー服</a></li>
                <li><a href="./controller/product_view.php?large_product_category=3&small_product_category=5">キッズ服</a></li>
                <li><a href="./controller/product_view.php?large_product_category=3&small_product_category=6">キッズ靴</a></li>
                <li><a href="./controller/product_view.php?large_product_category=3&small_product_category=7">子供用ファッション小物</a></li>
                <li><a href="./controller/product_view.php?large_product_category=3&small_product_category=8">外出・移動用具</a></li>
                <li><a href="./controller/product_view.php?large_product_category=3&small_product_category=9">ベビー家具・寝具・室内用品</a></li>
                <li><a href="./controller/product_view.php?large_product_category=3&small_product_category=10">おもちゃ</a></li>
                <li><a href="./controller/product_view.php?large_product_category=3&small_product_category=38">その他</a></li>
              </ul>
              <ul class="small_category_list">
                <li><a href="./controller/product_view.php?large_product_category=4&small_product_category=11">キッチン・食器</a></li>
                <li><a href="./controller/product_view.php?large_product_category=4&small_product_category=12">ベッド・マットレス・寝具</a></li>
                <li><a href="./controller/product_view.php?large_product_category=4&small_product_category=13">机・いす</a></li>
                <li><a href="./controller/product_view.php?large_product_category=4&small_product_category=14">収納寝具</a></li>
                <li><a href="./controller/product_view.php?large_product_category=4&small_product_category=15">カーペット・ラグ・マット</a></li>
                <li><a href="./controller/product_view.php?large_product_category=4&small_product_category=16">照明</a></li>
                <li><a href="./controller/product_view.php?large_product_category=4&small_product_category=17">時計</a></li>
                <li><a href="./controller/product_view.php?large_product_category=4&small_product_category=18">インテリア小物</a></li>
                <li><a href="./controller/product_view.php?large_product_category=4&small_product_category=19">季節・年中行事</a></li>
                <li><a href="./controller/product_view.php?large_product_category=4&small_product_category=38">その他</a></li>
              </ul>
              <ul class="small_category_list">
                <li><a href="./controller/product_view.php?large_product_category=5&small_product_category=20">スマホ</a></li>
                <li><a href="./controller/product_view.php?large_product_category=5&small_product_category=21">スマホアクセサリー</a></li>
                <li><a href="./controller/product_view.php?large_product_category=5&small_product_category=22">PC・タブレット</a></li>
                <li><a href="./controller/product_view.php?large_product_category=5&small_product_category=23">カメラ</a></li>
                <li><a href="./controller/product_view.php?large_product_category=5&small_product_category=24">テレビ・映像機器</a></li>
                <li><a href="./controller/product_view.php?large_product_category=5&small_product_category=25">オーディオ機器</a></li>
                <li><a href="./controller/product_view.php?large_product_category=5&small_product_category=26">美容・健康</a></li>
                <li><a href="./controller/product_view.php?large_product_category=5&small_product_category=27">冷暖房・空調</a></li>
                <li><a href="./controller/product_view.php?large_product_category=5&small_product_category=28">生活家電</a></li>
                <li><a href="./controller/product_view.php?large_product_category=5&small_product_category=38">その他</a></li>
              </ul>
              <ul class="small_category_list">
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=29">本・DVD・音楽</a></li>
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=30">ゲーム</a></li>
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=31">スポーツ・レジャー</a></li>
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=38">その他</a></li>
              </ul>
              <ul class="small_category_list">
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=32">アクセサリー(女性)</a></li>
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=33">ファッション・小物</a></li>
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=34">アクセサリー・時計</a></li>
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=35">日用品・インテリア</a></li>
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=36">趣味・おもちゃ</a></li>
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=">素材・材料</a></li>
                <li><a href="./controller/product_view.php?large_product_category=6&small_product_category=38">その他</a></li>
              </ul>
            </div>
          </div>
        </li>
        <li id="select_bbs_category">
          <p>掲示板一覧</p>
          <div id="bbs_category_list">
            <p class="list_title">掲示板一覧</p>
            <p class="cancel_button"><span></span></p>
            <ul>
              <li><a href="">雑談</a></li>
              <li><a href="">ニュース・経済</a></li>
              <li><a href="">国内・海外旅行</a></li>
              <li><a href="">家庭菜園</a></li>
              <li><a href="">ボランティア</a></li>
              <li><a href="">登山</a></li>
              <li><a href="">囲碁・将棋</a></li>
              <li><a href="">温泉巡り</a></li>
              <li><a href="">ウォーキング・ジョギング</a></li>
              <li><a href="">社交ダンス</a></li>
              <li><a href="">ピアノ</a></li>
              <li><a href="">神社・仏閣巡り</a></li>
              <li><a href="">英会話</a></li>
              <li><a href="">音楽鑑賞</a></li>
              <li><a href="">サイクリング</a></li>
              <li><a href="">読書</a></li>
              <li><a href="">スポーツ観戦</a></li>
              <li><a href="">料理・お菓子作り</a></li>
              <li><a href="">動画</a></li>
              <li><a href="">写真</a></li>
            </ul>
          </div>
        </li>
        <li><a href="./controller/exhibition_sell.php">出品</a></li>
        <li><a href="">お問い合わせ</a></li>
      </ul>
    </nav><!-- top_navi -->
    <div id="branding">
      <!-- <h2></h2> -->
    </div><!-- branding -->
    <div id="contents_area">
      <h2>新着商品</h2>
      <?php if (count($products) !== 0) : ?>
        <ul>
          <?php foreach ($products as $value) : ?>
            <li class="products">
              <a href="./controller/product_deteals.php?id=<?php echo $value['id'] ?>">
                <ul>
                  <li class="product_img"><img src="./images/products/product_<?php echo $value['id'] ?>_1.jpg" width="180px" height="180px" alt=""></li>
                  <li class="product_name"><?php echo $value['product_name']; ?></li>
                  <li class="product_price">￥<?php echo $value['price']; ?></li>
                  <li class="favorite"><img src="./images/image_materials/hart.jpg" width="30" height="30" alt=""></li>
                </ul>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else : ?>
        <p><?php echo $error_msg; ?></p>
      <?php endif; ?>
    </div><!-- contents_area -->
    <footer>
      <div class="guide">
        <h3>ガイド</h3>
        <ul>
          <li><a href="">まさる堂ガイド</a></li>
          <li><a href="">よくあるご質問</a></li>
          <li><a href="">お問い合わせ</a></li>
        </ul>
      </div>
      <div class="about_of_masarudo">
        <h3>まさる堂について</h3>
        <ul>
          <li><a href="">会社概要</a></li>
          <li><a href="">プライバシーポリシー</a></li>
          <li><a href="">まさる堂利用規約</a></li>
          <li><a href="">特定商取引法に基づく表記</a></li>
          <li><a href="">古物営業法に基づく表記</a></li>
          <li><a href="">採用情報</a></li>
        </ul>
      </div>
      <div class="linsk">
        <h3>リンク</h3>
        <p><a href="">まさる堂ホームページ</a></p>
      </div>
      <div class="trade_mark">
        <p>まさる堂</p>
        <p>© Masarudo, Inc.</p>
      </div>
    </footer>
  </article>
  <!-- <script src="./js/index.js"></script> -->
</body>

</html>