-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 1 月 27 日 08:13
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
CREATE DATABASE IF NOT EXISTS `masarudoh` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `masarudoh`;

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `thred_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'スレッドID',
  `comment_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'コメントID',
  `member_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT '会員ID',
  `comment` varchar(500) NOT NULL COMMENT 'コメント内容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`thred_id`, `comment_id`, `member_id`, `comment`) VALUES
(000001, 0000000001, 000001, 'test'),
(000001, 0000000002, 000003, 'test2'),
(000001, 0000000003, 000002, 'test3'),
(000001, 0000000004, 000003, 'sdfasdfasdfasdfasdfadsfsadfasdf'),
(000001, 0000000005, 000003, 'asfdasdfaufbiashdbfiashdf'),
(000001, 0000000006, 000002, 'fasdfasdfuhasbdufhb');

-- --------------------------------------------------------

--
-- テーブルの構造 `day_to_send`
--

DROP TABLE IF EXISTS `day_to_send`;
CREATE TABLE `day_to_send` (
  `id` int(11) NOT NULL,
  `day_to_send` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `day_to_send`
--

INSERT INTO `day_to_send` (`id`, `day_to_send`) VALUES
(1, '１～２日で発送'),
(2, '２～３日で発送'),
(3, '４～７日で発送');

-- --------------------------------------------------------

--
-- テーブルの構造 `large_product_categories`
--

DROP TABLE IF EXISTS `large_product_categories`;
CREATE TABLE `large_product_categories` (
  `id` int(2) NOT NULL,
  `large_product_category` varchar(64) DEFAULT NULL COMMENT '大カテゴリ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `large_product_categories`
--

INSERT INTO `large_product_categories` (`id`, `large_product_category`) VALUES
(1, 'レディース'),
(2, 'メンズ'),
(3, 'キッズ'),
(4, 'インテリア・住まい'),
(5, '家電'),
(6, 'ホビー・娯楽'),
(7, 'ハンドメイド');

-- --------------------------------------------------------

--
-- テーブルの構造 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL COMMENT 'id',
  `nickname` varchar(64) NOT NULL COMMENT 'ニックネーム',
  `real_name` varchar(100) NOT NULL COMMENT '本名',
  `kana_name` varchar(64) DEFAULT NULL COMMENT 'ふりがな',
  `password` varchar(64) NOT NULL COMMENT 'パスワード',
  `address1` varchar(255) NOT NULL COMMENT '住所１',
  `address2` varchar(255) DEFAULT NULL COMMENT '住所２',
  `address3` varchar(255) DEFAULT NULL COMMENT '住所３',
  `tel` varchar(20) NOT NULL COMMENT '電話番号',
  `email` varchar(255) NOT NULL COMMENT 'メールアドレス',
  `proceeds` int(10) NOT NULL DEFAULT 0 COMMENT '売上金',
  `point` int(10) NOT NULL DEFAULT 0 COMMENT 'ポイント',
  `delflag` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `member`
--

INSERT INTO `member` (`id`, `nickname`, `real_name`, `kana_name`, `password`, `address1`, `address2`, `address3`, `tel`, `email`, `proceeds`, `point`, `delflag`) VALUES
(1, 'いわっち', '岩渕　哲', NULL, 'asdfasdf', '富山県中新川郡立山町泊新3-15-7泊新シティ207', '福島県いわき市常磐水野谷町3-6-2ザ常磐水野谷町218', NULL, '0767990572', 'satoshi18879@sdfasdfa.com', 0, 0, 0),
(2, 'かな', '小嶋　夏南人', NULL, 'ta5Fbrke', '茨城県筑西市金丸4-7-4', '群馬県邑楽郡板倉町大曲4-11-7', NULL, '09077100842', 'Kanato_Ojima@kckfrhgy.jp', 0, 0, 0),
(3, 'yuki', '伊藤　雪乃', NULL, 'mPzUF8H2', '埼玉県三郷市彦川戸4-2-17', NULL, NULL, '08041894018', 'xsjkowtseipyyjyukino107@yuravgi.aps', 0, 0, 0),
(4, 'おばけ', '相良　和子', NULL, 'xwrkUHcH', '福島県いわき市常磐水野谷町3-6-2ザ常磐水野谷町218', NULL, NULL, '0244703897', 'Kazuko_Sagara@jgiv.pw', 0, 0, 0),
(5, 'J( `ー`)し', '杉田　隆志', NULL, 'v6ONS8Dz', '群馬県邑楽郡板倉町大曲4-11-7', NULL, NULL, '0276443124', '2341234@dfasdfadfa.com', 0, 0, 0),
(6, 'たんぽぽ', '板垣　菜世子', NULL, 'XHty-W3', '鳥取県西伯郡南部町倭3-20-5', NULL, NULL, '0859538205', 'nayokoitagaki@scxbun.zho', 0, 0, 0),
(7, 'たつじん', '望月　健蔵', NULL, 'xwrkUHcH', '福岡県福津市手光南2-16-9', NULL, NULL, '0943800424', 'rkfdvmfkenzou908@ofyxhixrs.pjpmj.ei', 0, 0, 0),
(8, 'osa', '白川　修', NULL, 'OfWhZtNU', '佐賀県,西松浦郡有田町,広瀬,1-8', NULL, NULL, '08091129620', 'osamu0586@tuwvfdtgv.wp.emp', 0, 0, 0),
(9, 'いむ', '井村　沙彩', NULL, 'B7TMnNjz', '栃木県宇都宮市野沢町2-6-12', NULL, NULL, '08029610325', 'aimura@pdefews.jlmrg.bjy', 0, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL COMMENT '通知ID',
  `member_id` int(11) NOT NULL COMMENT '会員ID',
  `notification` varchar(1000) NOT NULL COMMENT '通知内容',
  `date` date NOT NULL COMMENT '通知時刻'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `white_list` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `large_product_category_id`, `small_product_category_id`, `product_condition_id`, `postage_id`, `send_method`, `state_id`, `days_to_send`, `exhibition_date`, `acquisition_date`, `favourite`, `exhibitor`, `buyer`, `progress`, `images_count`, `shipping_address`, `white_list`) VALUES
(1, 'Nintendo Switch 本体 (ニンテンドースイッチ) Joy-Con(L) ネオンブルー/(R) ネオンレッド(バッテリー持続時間が長くなったモデル)', 32500, '未開封です。', 6, 30, 1, 1, 5, 27, 2, '2019-12-17', NULL, 0, 3, NULL, 0, 1, '', 0),
(2, '漢検漢字学習ステップ2級', 599, '「漢検2級漢字学習ステップ」\r\n定価: ￥ 1,320\r\n\r\n#本 #BOOK #参考書\r\n\r\n鉛筆の書き込みが少しあります。\r\n自宅保管の点ご了承ください。', 6, 29, 4, 1, 1, 28, 1, '2019-12-28', NULL, 0, 2, NULL, 0, 1, '', 0),
(3, 'Aquascutum トレンチコート ベージュ', 22500, 'アクアスキュータムのトレンチコートです^ ^\r\n\r\n裏地もチェック柄で定番アイテムの定番カラーですので、これからのシーズンにも活躍するかと思います。\r\n\r\n上質なアイテムですので\r\n是非お探しの方はご検討くださいませ。\r\n\r\n特筆する汚れなどはないかと思いますが、中古品ですので神経質な方はご遠慮下さい。\r\n\r\nsize 8\r\n\r\n着丈 83cm\r\n身幅 51cm\r\n袖丈 71cm\r\n\r\n素人による採寸ですので多少の誤差はご了承下さい。\r\n\r\n何か不明点などありましたらお気軽お問い合わせください^_^', 1, 1, 3, 1, 5, 14, 1, '2019-12-28', NULL, 0, 7, NULL, 0, 2, '', 0),
(4, 'Corniche by Tricker\'s サイドゴアブーツ', 15555, 'サイズ　7 1/2', 2, 38, 4, 1, 4, 41, 2, '2019-12-28', NULL, 0, 5, NULL, 0, 3, '', 0),
(5, '純正イヤホン iPhoneイヤホン', 1333, 'iPhone購入後、使用せずに収納しておりました\r\n\r\n新品未使用品です\r\n\r\n\r\n即購入可能', 5, 21, 1, 2, 3, 27, 2, '2020-01-24', NULL, 0, 1, NULL, 0, 1, NULL, 0),
(6, 'NIKE AIR MAX 97 OG QS エアマックス97 シルバーバレット', 26666, 'NIKE AIR MAX 97 OG QS\r\n\r\nサイズ\r\n28㎝、US10\r\n\r\n付属品\r\n黒タグ、箱、納品書\r\n\r\n全体的には綺麗ですが何ヶ所かキズ、汚れが目立つ所があります。また中のプリント剥がれアリです。\r\n中古品ですのでご理解ある方お願いします。\r\n他のサイトでも出品しているので購入がキャンセルになる可能性があるのでご注意下さい。\r\nご検討よろしくお願いします。\r\n\r\n\r\nお気軽に質問等して下さい。\r\n\r\nNIKE ナイキ\r\nAIR MAX \r\nair max 97\r\nシルバーバレット\r\n\r\n いいね! 0  不適切な商品の報告', 2, 38, 4, 2, 8, 14, 2, '2020-01-24', NULL, 0, 1, NULL, 0, 2, NULL, 0),
(7, 'DE25 シャネル Wホック折り財布 キャビアスキン ココマーク ピンク', 5499, '【商品説明】 \r\n縦 約10.5㎝ \r\n横 約11.5㎝\r\n厚さ 約2㎝   \r\n\r\n小銭入れ 1ヶ所 \r\n札入れ 1ヶ所 \r\nカード入れ 6ヶ所 \r\nポケット 2ヶ所   \r\n\r\n色…ピンク\r\n\r\n素材…レザー  \r\n\r\nシリアルシール…8841279\r\n\r\n【状態ランク】 \r\n状態ランク…C\r\n\r\nS…新品、未使用or未使用に近い \r\nA…目立った傷や汚れなし \r\nAB…目立った傷や汚れなしorやや傷や汚れあり \r\nBA…やや傷や汚れあり \r\nB…やや傷や汚れあり \r\nBC…やや傷や汚れあり \r\nC…傷や汚れあり \r\nD…全体的に状態が悪い  \r\n\r\n【商品詳細】 \r\n全体的に使用感、汚れがあります。\r\n特に角や小銭入れの汚れが目立ちます。\r\n写真でご確認お願い致します。\r\n傷や壊れた箇所等はありませんのでお使い頂くのに問題はないかと思います。\r\n\r\n画像にあります、付属品はすべて同梱致します。 ', 1, 3, 4, 1, 3, 6, 1, '2020-01-24', NULL, 0, 6, NULL, 0, 3, NULL, 0),
(8, '大谷翔平 プロ野球チップスカード', 1200, 'ご覧頂きありがとうございます。\r\nこちらは大谷翔平のルーキーイヤーのカードになります。\r\n貴重なカードだと思います。\r\nコレクションにどうですか？', 6, 38, 1, 1, 2, 34, 1, '2020-01-24', NULL, 0, 9, NULL, 0, 2, NULL, 0),
(9, 'ジラーチピカチュウ　ぬいぐるみ', 15000, '2年前に購入しました。\r\n希少です', 3, 10, 1, 2, 3, 20, 2, '2020-01-24', NULL, 0, 2, NULL, 0, 1, NULL, 0),
(10, 'ルイヴィトン　マーリボーンPM ダミエ　トートバッグ　N41215', 128500, '使い勝手の良いサイズ感で仕事や普段使い等、さまざまな場面で活躍すること間違い無しのトートバッグです。\r\n\r\n品番　N41215\r\n製造番号　DU4133\r\nサイズ　約W37-27×H24×D13cm\r\n\r\n\r\n金具に小傷が見られます。\r\n底鋲のメッキ剥げが見られます。\r\nハンドルに若干拠れが見られます。\r\n表面、内部は良好です。\r\n\r\n\r\n\r\n253187', 1, 38, 4, 2, 3, 25, 2, '2020-01-24', NULL, 0, 6, NULL, 0, 3, NULL, 0),
(11, 'apple mac 純正テンキー付きキーボード', 6500, 'mac miniに接続して3年ほど使用してました\r\n日本語仕様\r\n有線接続\r\nキレイに拭き上げてらくらくメルカリ便にて\r\n発送いたします\r\n箱、付属品はなく写真に写ってるものが全てになります\r\nこちらの環境で認識、キー動作に問題ないことを確認済み\r\n\r\n中古品ですので神経質な方の購入はご遠慮願います\r\n\r\n検索\r\nアップル\r\nマック\r\nkey board', 5, 22, 5, 1, 3, 8, 1, '2020-01-24', NULL, 0, 2, NULL, 0, 1, NULL, 0),
(12, 'レディース リュック 防犯 防水 軽量', 2580, 'ウィンターセール実施中!!\r\n通常5750円→2580円\r\n(値引き交渉はご遠慮ください)\r\n\r\n1～4枚目の写真がお送りする品です。\r\n\r\nコメント不要、即購入OKです。\r\n\r\n【軽量防水素材】上質的なナイロンを使いましたので　日常の雨や汚れをしっかり防ぐことができます。また、素材自体が軽いため、他の同じタイプのリュックより軽いです。\r\n【優れるデザイン】リュックの上でイヤホン専用穴が付き、音楽を聴くなど便利です。ファスナーはスムーズに開け閉めるこてができて、うまく噛み合っています。高品質の金具を使い、耐久性が優れています。\r\n【便利な収納力】メインポケットと小物ポケットを合理的に配置しています。書類や雑誌、iPadやスマホ、折り畳み傘や長財布などお荷物の多い方も安心の容量です。全体的なサイズは縦33cm×横31cm×マチ14cm。ストラップの長さを調節でき,女の子とピッタリなサイズです、日常用品など楽々収納できます、学生から社会人まで幅広い年齢層でご利用いただけます。\r\n\r\n#人気のレディースリュックはコチラ', 1, 38, 1, 1, 4, 28, 1, '2020-01-24', NULL, 0, 8, NULL, 0, 1, NULL, 0),
(13, 'NAUTICAノーティカ マルチカラー ナイロンジャケット トリコロール', 6180, 'NAUTICAノーティカ マルチカラー ナイロンジャケット トリコロール a1187\r\n \r\n \r\n \r\n【ブランド】\r\nNAUTICA\r\n \r\n \r\n \r\n【商品説明】\r\n凄くカッコイイアイテムが入荷しました♪\r\nNAUTICAのリコロールカラーのナイロンジャケットです♪\r\nカラーリングが凄くカッコよくないですか？\r\nこの1枚はスポーツMIXスタイル好きな方は、是非、お早目にお迎えに来て下さい♪\r\n売切れ間違いないのでお早目に！！\r\n \r\n \r\n秋冬物のアイテムがどんどん入荷しているのでそちらもチェックして下さい↓\r\n \r\n \r\n#BLUUDOG厳選秋冬物\r\n', 2, 1, 4, 2, 4, 1, 2, '2020-01-24', NULL, 0, 1, NULL, 0, 1, NULL, 0),
(14, 'TOMMY HILFIGER ボディバッグ', 4000, 'TOMMY HILFIGERのボディバッグです\r\n色はレッドです\r\nタグ付き未使用です\r\n値下げはできません', 2, 3, 1, 1, 0, 0, 0, '2020-01-24', NULL, 0, 4, NULL, 0, 1, NULL, 0),
(15, 'WALTHAM K18 18K ウォルサム レディース 腕時計 ヴィンテージ', 55500, 'プロフィール必読でお願い致します。\r\n読んでないと思われる方のコメント等\r\nトラブル防止の為削除、ブロックいたします。\r\nご購入と同時に注意事項に同意したと見なします。\r\n\r\n当店の扱うブランド品は質店にて\r\n鑑定済みの確実本物のみとなります\r\nのでご安心してご購入ください。\r\n\r\n当方「プロ」ではございません。\r\n届いてから「〜が違う」と言われましても\r\n困りますので必ずご理解ある方のみで\r\nお願い致します。\r\n\r\n■商品名\r\n\r\nWALTHAM K18 18K ウォルサム レディース 腕時計 ヴィンテージ\r\n\r\n■状態\r\n\r\n稼働品、ベルト傷汚れ等使用感ございます。\r\nパーツ類全て純正品です。\r\n\r\n中古品、素人検品の為、状態判断のジャッジが\r\n厳しい方はご遠慮ください。\r\n\r\n■付属\r\n\r\nなし', 1, 3, 4, 1, 4, 13, 1, '2020-01-24', NULL, 0, 1, NULL, 0, 1, NULL, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `product_condition`
--

DROP TABLE IF EXISTS `product_condition`;
CREATE TABLE `product_condition` (
  `id` int(11) NOT NULL COMMENT 'id',
  `product_condition` varchar(10) NOT NULL COMMENT '状態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `product_condition`
--

INSERT INTO `product_condition` (`id`, `product_condition`) VALUES
(1, '新品・未使用'),
(2, '未使用に近い'),
(3, '目立った傷や汚れなし'),
(4, 'やや傷や汚れあり'),
(5, '傷や汚れあり'),
(6, '全体的に状態が悪い');

-- --------------------------------------------------------

--
-- テーブルの構造 `send_method`
--

DROP TABLE IF EXISTS `send_method`;
CREATE TABLE `send_method` (
  `id` int(11) NOT NULL,
  `send_method` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `send_method`
--

INSERT INTO `send_method` (`id`, `send_method`) VALUES
(1, 'ゆうメール'),
(2, 'レターパック'),
(3, '普通郵便（定形、定形外）'),
(4, 'クロネコヤマト'),
(5, 'ゆうパック'),
(6, 'クリックポスト'),
(7, 'ゆうパケット'),
(8, '未定');

-- --------------------------------------------------------

--
-- テーブルの構造 `small_product_categories`
--

DROP TABLE IF EXISTS `small_product_categories`;
CREATE TABLE `small_product_categories` (
  `id` int(3) NOT NULL COMMENT 'id',
  `small_product_category` varchar(20) DEFAULT NULL COMMENT '小カテゴリ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `small_product_categories`
--

INSERT INTO `small_product_categories` (`id`, `small_product_category`) VALUES
(1, '服'),
(2, '帽子'),
(3, 'アクセサリー'),
(4, 'ベビー服'),
(5, 'キッズ服'),
(6, 'キッズ靴'),
(7, '子供用ファッション小物'),
(8, '外出・移動用品'),
(9, 'ベビー服・寝具・室内用品'),
(10, 'おもちゃ'),
(11, 'キッチン・食器'),
(12, 'ベッド・マットレス・寝具'),
(13, '机・いす'),
(14, '収納家具'),
(15, 'カーペット・ラグ・マット'),
(16, '照明'),
(17, '時計'),
(18, 'インテリア小物'),
(19, '季節・年中行事'),
(20, 'スマホ'),
(21, 'スマホアクセサリー'),
(22, 'PC・タブレット'),
(23, 'カメラ'),
(24, 'テレビ・映像機器'),
(25, 'オーディオ機器'),
(26, '美容・健康'),
(27, '冷暖房・空調'),
(28, '生活家電'),
(29, '本・DVD・音楽'),
(30, 'ゲーム'),
(31, 'スポーツ・レジャー'),
(32, 'アクセサリー(女性用)'),
(33, 'ファッション・小物'),
(34, 'アクセサリー・時計'),
(35, '日用品・インテリア'),
(36, '趣味・おもちゃ'),
(37, '素材・材料'),
(38, 'その他');

-- --------------------------------------------------------

--
-- テーブルの構造 `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` int(2) NOT NULL COMMENT 'id',
  `state` varchar(5) NOT NULL COMMENT '都道府県'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `states`
--

INSERT INTO `states` (`id`, `state`) VALUES
(1, '北海道'),
(2, '青森県'),
(3, '岩手県'),
(4, '宮城県'),
(5, '秋田県'),
(6, '山形県'),
(7, '福島県'),
(8, '茨城県'),
(9, '栃木県'),
(10, '群馬県'),
(11, '埼玉県'),
(12, '千葉県'),
(13, '東京都'),
(14, '神奈川県'),
(15, '新潟県'),
(16, '富山県'),
(17, '石川県'),
(18, '福井県'),
(19, '山梨県'),
(20, '長野県'),
(21, '岐阜県'),
(22, '静岡県'),
(23, '愛知県'),
(24, '三重県'),
(25, '滋賀県'),
(26, '京都府'),
(27, '大阪府'),
(28, '兵庫県'),
(29, '奈良県'),
(30, '和歌山県'),
(31, '鳥取県'),
(32, '島根県'),
(33, '岡山県'),
(34, '広島県'),
(35, '山口県'),
(36, '徳島県'),
(37, '香川県'),
(38, '愛媛県'),
(39, '高知県'),
(40, '福岡県'),
(41, '佐賀県'),
(42, '長崎県'),
(43, '熊本県'),
(44, '大分県'),
(45, '宮崎県'),
(46, '鹿児島県'),
(47, '沖縄県'),
(48, '未定');

-- --------------------------------------------------------

--
-- テーブルの構造 `thred`
--

DROP TABLE IF EXISTS `thred`;
CREATE TABLE `thred` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'スレッドID',
  `name` varchar(20) NOT NULL COMMENT '名前',
  `public_type` int(1) NOT NULL COMMENT '公開タイプ',
  `white_list` varchar(300) NOT NULL COMMENT 'ホワイトリスト'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `thred`
--

INSERT INTO `thred` (`id`, `name`, `public_type`, `white_list`) VALUES
(000001, 'テスト', 1, '000001000002000010'),
(000002, 'test2', 0, '');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`thred_id`,`comment_id`);

--
-- テーブルのインデックス `day_to_send`
--
ALTER TABLE `day_to_send`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `large_product_categories`
--
ALTER TABLE `large_product_categories`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`,`member_id`),
  ADD KEY `member_id` (`member_id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `product_condition`
--
ALTER TABLE `product_condition`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `send_method`
--
ALTER TABLE `send_method`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `small_product_categories`
--
ALTER TABLE `small_product_categories`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `thred`
--
ALTER TABLE `thred`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `day_to_send`
--
ALTER TABLE `day_to_send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `large_product_categories`
--
ALTER TABLE `large_product_categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルのAUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=10;

--
-- テーブルのAUTO_INCREMENT `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '通知ID', AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=16;

--
-- テーブルのAUTO_INCREMENT `product_condition`
--
ALTER TABLE `product_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=7;

--
-- テーブルのAUTO_INCREMENT `send_method`
--
ALTER TABLE `send_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルのAUTO_INCREMENT `small_product_categories`
--
ALTER TABLE `small_product_categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=39;

--
-- テーブルのAUTO_INCREMENT `states`
--
ALTER TABLE `states`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=49;

--
-- テーブルのAUTO_INCREMENT `thred`
--
ALTER TABLE `thred`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'スレッドID', AUTO_INCREMENT=3;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
