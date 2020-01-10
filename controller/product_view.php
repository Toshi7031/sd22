<?php
  //変数宣言
  $title = '商品一覧';
  $css_file_name = 'product_view.css';
  $product_limit = 2; //テスト用に2に宣言
  if(isset($_GET['next_page']||isset($_GET['']))
  $page = 0
  //test
  $_GET['search'] = '漢　習';
  //値受取(if)
  if(isset($_GET['search'])){
    //検索ワードが送信されていれば変数に代入
    $search = $_GET['search'];
/*----------------------------------------------------
$search配列処理
----------------------------------------------------*/
    //全角スペースが入っている場合は半角スペースに変換
    $search = mb_convert_kana($search, 'as', 'UTF-8');
    // 両サイドのスペースを消す
    $search = trim($search);
    // 改行、タブをスペースへ
    $search = preg_replace('/[\n\r\t]/', '', $search);
    // 複数スペースを一つへ
    $search = preg_replace('/\s(?=\s)/', '', $search);
    //スペース区切りで配列に挿入
    $search = explode(' ',$search);
/*----------------------------------------------------
sql文作成
----------------------------------------------------*/
    //sqlベース作成
    $sql = 'SELECT id,product_name,price FROM products WHERE ';
    //検索条件部分作成
    foreach($search as $word){
      //$sqlに追記
      $sql .= "product_name LIKE'%{$word}%'";
      if($word != end($search)){
        $sql .= ' AND ';
      }
    }
   //ページ区切りにする為、取り出し位置と個数を指定

  }
  require '../view/header.php';
  require '../view/product_view.php';
  require '../view/footer.php';
?>