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
        <?php endif; ?>
      </div>
    </header><!-- global_navi -->
    <nav>
      <ul>
        <li><a href="">商品ジャンル一覧</a></li>
        <li><a href="">掲示板一覧</a></li>
        <li><a href="./s_sell.php">出品</a></li>
        <li><a href="">お問い合わせ</a></li>
      </ul>
    </nav><!-- top_navi -->
    <div id="branding">
      <h2><img src="./images/image_materials/branding_01.jpg" width="700" height="350" alt=""></h2>
    </div><!-- branding -->
    <div id="contents_area">
      <h2>新着商品</h2>
<?php if(count($products) !== 0):?>
      <ul>
<?php foreach($products as $value):?>
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
<?php endforeach;?>
      </ul>
<?php else:?>
      <p><?php echo $error_msg;?></p>
<?php endif;?>
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