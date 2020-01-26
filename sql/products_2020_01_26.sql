-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 1 月 26 日 13:36
-- サーバのバージョン： 10.3.20-MariaDB
-- PHP のバージョン: 7.4.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `masarudoh`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'id',
  `product_name` varchar(150) NOT NULL COMMENT '商品名',
  `price` int(7) NOT NULL COMMENT '希望価格',
  `description` varchar(1000) DEFAULT NULL COMMENT '商品説明',
  `large_product_category_id` int(3) NOT NULL COMMENT '大カテゴリid',
  `small_product_category_id` int(3) NOT NULL COMMENT '小カテゴリid',
  `product_condition_id` int(1) NOT NULL COMMENT '商品の状態',
  `postage_id` int(6) NOT NULL COMMENT '送料負担者',
  `send_method` int(2) NOT NULL COMMENT '配送方法',
  `state_id` int(1) NOT NULL COMMENT '発送元の地域',
  `days_to_send` int(2) NOT NULL COMMENT '発送までの日数',
  `exhibition_date` date NOT NULL COMMENT '出品日',
  `acquisition_date` date DEFAULT NULL COMMENT '購入日',
  `favourite` int(4) DEFAULT 0 COMMENT 'お気に入り数',
  `exhibitor` int(6) NOT NULL COMMENT '出品者',
  `buyer` int(6) DEFAULT NULL COMMENT '購入者',
  `progress` int(1) DEFAULT NULL COMMENT '取引の進捗',
  `images_count` int(2) DEFAULT NULL COMMENT '画像ファイル数',
  `shipping_address` varchar(300) DEFAULT NULL COMMENT '配送先',
  `white_list` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `large_product_category_id`, `small_product_category_id`, `product_condition_id`, `postage_id`, `send_method`, `state_id`, `days_to_send`, `exhibition_date`, `acquisition_date`, `favourite`, `exhibitor`, `buyer`, `progress`, `images_count`, `shipping_address`, `white_list`) VALUES
(1, 'Nintendo Switch 本体 (ニンテンドースイッチ) Joy-Con(L) ネオンブルー/(R) ネオンレッド(バッテリー持続時間が長くなったモデル)', 32500, '未開封です。', 6, 30, 1, 1, 5, 27, 2, '2019-12-17', NULL, 0, 3, NULL, 1, 1, '', 0),
(2, '漢検漢字学習ステップ2級', 599, '「漢検2級漢字学習ステップ」\r\n定価: ￥ 1,320\r\n\r\n#本 #BOOK #参考書\r\n\r\n鉛筆の書き込みが少しあります。\r\n自宅保管の点ご了承ください。', 6, 29, 4, 1, 1, 28, 1, '2019-12-28', NULL, 0, 2, NULL, 1, 1, '', 0),
(3, 'Aquascutum トレンチコート ベージュ', 22500, 'アクアスキュータムのトレンチコートです^ ^\r\n\r\n裏地もチェック柄で定番アイテムの定番カラーですので、これからのシーズンにも活躍するかと思います。\r\n\r\n上質なアイテムですので\r\n是非お探しの方はご検討くださいませ。\r\n\r\n特筆する汚れなどはないかと思いますが、中古品ですので神経質な方はご遠慮下さい。\r\n\r\nsize 8\r\n\r\n着丈 83cm\r\n身幅 51cm\r\n袖丈 71cm\r\n\r\n素人による採寸ですので多少の誤差はご了承下さい。\r\n\r\n何か不明点などありましたらお気軽お問い合わせください^_^', 1, 1, 3, 1, 5, 14, 1, '2019-12-28', NULL, 0, 7, NULL, 1, 2, '', 0),
(4, 'Corniche by Tricker\'s サイドゴアブーツ', 15555, 'サイズ　7 1/2', 2, 38, 4, 1, 4, 41, 2, '2019-12-28', NULL, 0, 5, NULL, 1, 3, '', 0),
(5, '純正イヤホン iPhoneイヤホン', 1333, 'iPhone購入後、使用せずに収納しておりました\r\n\r\n新品未使用品です\r\n\r\n\r\n即購入可能', 5, 21, 1, 2, 3, 27, 2, '2020-01-24', NULL, 0, 1, NULL, 1, 1, NULL, 0),
(6, 'NIKE AIR MAX 97 OG QS エアマックス97 シルバーバレット', 26666, 'NIKE AIR MAX 97 OG QS\r\n\r\nサイズ\r\n28㎝、US10\r\n\r\n付属品\r\n黒タグ、箱、納品書\r\n\r\n全体的には綺麗ですが何ヶ所かキズ、汚れが目立つ所があります。また中のプリント剥がれアリです。\r\n中古品ですのでご理解ある方お願いします。\r\n他のサイトでも出品しているので購入がキャンセルになる可能性があるのでご注意下さい。\r\nご検討よろしくお願いします。\r\n\r\n\r\nお気軽に質問等して下さい。\r\n\r\nNIKE ナイキ\r\nAIR MAX \r\nair max 97\r\nシルバーバレット\r\n\r\n いいね! 0  不適切な商品の報告', 2, 38, 4, 2, 8, 14, 2, '2020-01-24', NULL, 0, 1, NULL, 1, 2, NULL, 0),
(7, 'DE25 シャネル Wホック折り財布 キャビアスキン ココマーク ピンク', 5499, '【商品説明】 \r\n縦 約10.5㎝ \r\n横 約11.5㎝\r\n厚さ 約2㎝   \r\n\r\n小銭入れ 1ヶ所 \r\n札入れ 1ヶ所 \r\nカード入れ 6ヶ所 \r\nポケット 2ヶ所   \r\n\r\n色…ピンク\r\n\r\n素材…レザー  \r\n\r\nシリアルシール…8841279\r\n\r\n【状態ランク】 \r\n状態ランク…C\r\n\r\nS…新品、未使用or未使用に近い \r\nA…目立った傷や汚れなし \r\nAB…目立った傷や汚れなしorやや傷や汚れあり \r\nBA…やや傷や汚れあり \r\nB…やや傷や汚れあり \r\nBC…やや傷や汚れあり \r\nC…傷や汚れあり \r\nD…全体的に状態が悪い  \r\n\r\n【商品詳細】 \r\n全体的に使用感、汚れがあります。\r\n特に角や小銭入れの汚れが目立ちます。\r\n写真でご確認お願い致します。\r\n傷や壊れた箇所等はありませんのでお使い頂くのに問題はないかと思います。\r\n\r\n画像にあります、付属品はすべて同梱致します。 ', 1, 3, 4, 1, 3, 6, 1, '2020-01-24', NULL, 0, 6, NULL, 1, 3, NULL, 0),
(8, '大谷翔平 プロ野球チップスカード', 1200, 'ご覧頂きありがとうございます。\r\nこちらは大谷翔平のルーキーイヤーのカードになります。\r\n貴重なカードだと思います。\r\nコレクションにどうですか？', 6, 38, 1, 1, 2, 34, 1, '2020-01-24', NULL, 0, 9, NULL, 1, 2, NULL, 0),
(9, 'ジラーチピカチュウ　ぬいぐるみ', 15000, '2年前に購入しました。\r\n希少です', 3, 10, 1, 2, 3, 20, 2, '2020-01-24', NULL, 0, 2, NULL, 1, 1, NULL, 0),
(10, 'ルイヴィトン　マーリボーンPM ダミエ　トートバッグ　N41215', 128500, '使い勝手の良いサイズ感で仕事や普段使い等、さまざまな場面で活躍すること間違い無しのトートバッグです。\r\n\r\n品番　N41215\r\n製造番号　DU4133\r\nサイズ　約W37-27×H24×D13cm\r\n\r\n\r\n金具に小傷が見られます。\r\n底鋲のメッキ剥げが見られます。\r\nハンドルに若干拠れが見られます。\r\n表面、内部は良好です。\r\n\r\n\r\n\r\n253187', 1, 38, 4, 2, 3, 25, 2, '2020-01-24', NULL, 0, 6, NULL, 1, 3, NULL, 0),
(11, 'apple mac 純正テンキー付きキーボード', 6500, 'mac miniに接続して3年ほど使用してました\r\n日本語仕様\r\n有線接続\r\nキレイに拭き上げてらくらくメルカリ便にて\r\n発送いたします\r\n箱、付属品はなく写真に写ってるものが全てになります\r\nこちらの環境で認識、キー動作に問題ないことを確認済み\r\n\r\n中古品ですので神経質な方の購入はご遠慮願います\r\n\r\n検索\r\nアップル\r\nマック\r\nkey board', 5, 22, 5, 1, 3, 8, 1, '2020-01-24', NULL, 0, 2, NULL, 1, 1, NULL, 0),
(12, 'レディース リュック 防犯 防水 軽量', 2580, 'ウィンターセール実施中!!\r\n通常5750円→2580円\r\n(値引き交渉はご遠慮ください)\r\n\r\n1～4枚目の写真がお送りする品です。\r\n\r\nコメント不要、即購入OKです。\r\n\r\n【軽量防水素材】上質的なナイロンを使いましたので　日常の雨や汚れをしっかり防ぐことができます。また、素材自体が軽いため、他の同じタイプのリュックより軽いです。\r\n【優れるデザイン】リュックの上でイヤホン専用穴が付き、音楽を聴くなど便利です。ファスナーはスムーズに開け閉めるこてができて、うまく噛み合っています。高品質の金具を使い、耐久性が優れています。\r\n【便利な収納力】メインポケットと小物ポケットを合理的に配置しています。書類や雑誌、iPadやスマホ、折り畳み傘や長財布などお荷物の多い方も安心の容量です。全体的なサイズは縦33cm×横31cm×マチ14cm。ストラップの長さを調節でき,女の子とピッタリなサイズです、日常用品など楽々収納できます、学生から社会人まで幅広い年齢層でご利用いただけます。\r\n\r\n#人気のレディースリュックはコチラ', 1, 38, 1, 1, 4, 28, 1, '2020-01-24', NULL, 0, 8, NULL, 1, 1, NULL, 0),
(13, 'NAUTICAノーティカ マルチカラー ナイロンジャケット トリコロール', 6180, 'NAUTICAノーティカ マルチカラー ナイロンジャケット トリコロール a1187\r\n \r\n \r\n \r\n【ブランド】\r\nNAUTICA\r\n \r\n \r\n \r\n【商品説明】\r\n凄くカッコイイアイテムが入荷しました♪\r\nNAUTICAのリコロールカラーのナイロンジャケットです♪\r\nカラーリングが凄くカッコよくないですか？\r\nこの1枚はスポーツMIXスタイル好きな方は、是非、お早目にお迎えに来て下さい♪\r\n売切れ間違いないのでお早目に！！\r\n \r\n \r\n秋冬物のアイテムがどんどん入荷しているのでそちらもチェックして下さい↓\r\n \r\n \r\n#BLUUDOG厳選秋冬物\r\n', 2, 1, 4, 2, 4, 1, 2, '2020-01-24', NULL, 0, 1, NULL, 1, 1, NULL, 0),
(14, 'TOMMY HILFIGER ボディバッグ', 4000, 'TOMMY HILFIGERのボディバッグです\r\n色はレッドです\r\nタグ付き未使用です\r\n値下げはできません', 2, 3, 1, 1, 0, 0, 0, '2020-01-24', NULL, 0, 4, NULL, 1, 1, NULL, 0),
(15, 'WALTHAM K18 18K ウォルサム レディース 腕時計 ヴィンテージ', 55500, 'プロフィール必読でお願い致します。\r\n読んでないと思われる方のコメント等\r\nトラブル防止の為削除、ブロックいたします。\r\nご購入と同時に注意事項に同意したと見なします。\r\n\r\n当店の扱うブランド品は質店にて\r\n鑑定済みの確実本物のみとなります\r\nのでご安心してご購入ください。\r\n\r\n当方「プロ」ではございません。\r\n届いてから「〜が違う」と言われましても\r\n困りますので必ずご理解ある方のみで\r\nお願い致します。\r\n\r\n■商品名\r\n\r\nWALTHAM K18 18K ウォルサム レディース 腕時計 ヴィンテージ\r\n\r\n■状態\r\n\r\n稼働品、ベルト傷汚れ等使用感ございます。\r\nパーツ類全て純正品です。\r\n\r\n中古品、素人検品の為、状態判断のジャッジが\r\n厳しい方はご遠慮ください。\r\n\r\n■付属\r\n\r\nなし', 1, 3, 4, 1, 4, 13, 1, '2020-01-24', NULL, 0, 1, NULL, 1, 1, NULL, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=16;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
