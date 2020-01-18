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
          <div id="category_list">
            <p>商品一覧</p>
            <p class="cancel_button">×</p>
            <ul id="large_category_list">
              <li>レディース</li>
              <li>メンズ</li>
              <li>キッズ</li>
              <li>インテリア・住まい</li>
              <li>家電</li>
              <li>ホビー・娯楽</li>
              <li>ハンドメイド</li>
            </ul>
            <div id="small_category_area">
              <ul class="small_category_list">
                <li>服</li>
                <li>帽子</li>
                <li>アクセサリー</li>
                <li>その他</li>
              </ul>
              <ul class="small_category_list">
                <li>服</li>
                <li>帽子</li>
                <li>アクセサリー</li>
                <li>その他</li>
              </ul>
              <ul class="small_category_list">
                <li>ベビー服</li>
                <li>キッズ服</li>
                <li>キッズ靴</li>
                <li>子供用ファッション小物</li>
                <li>外出・移動用具</li>
                <li>ベビー家具・寝具・室内用品</li>
                <li>おもちゃ</li>
                <li>その他</li>
              </ul>
              <ul class="small_category_list">
                <li>キッチン・食器</li>
                <li>ベッド・マットレス・寝具</li>
                <li>机・いす</li>
                <li>収納寝具</li>
                <li>カーペット・ラグ・マット</li>
                <li>照明</li>
                <li>時計</li>
                <li>インテリア小物</li>
                <li>季節・年中行事</li>
                <li>その他</li>
              </ul>
              <ul class="small_category_list">
                <li>スマホ</li>
                <li>スマホアクセサリー</li>
                <li>PC・タブレット</li>
                <li>カメラ</li>
                <li>テレビ・映像機器</li>
                <li>オーディオ機器</li>
                <li>美容・健康</li>
                <li>冷暖房・空調</li>
                <li>生活家電</li>
                <li>その他</li>
              </ul>
              <ul class="small_category_list">
                <li>本・DVD・音楽</li>
                <li>ゲーム</li>
                <li>スポーツ・レジャー</li>
                <li>その他</li>
              </ul>
              <ul class="small_category_list">
                <li>アクセサリー(女性)</li>
                <li>ファッション・小物</li>
                <li>アクセサリー・時計</li>
                <li>日用品・インテリア</li>
                <li>趣味・おもちゃ</li>
                <li>素材・材料</li>
                <li>その他</li>
              </ul>
            </div>
          </div>
        </li>
        <li><a href="">掲示板一覧</a></li>
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