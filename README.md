# sd22
11班
まさる堂のフリマサイト


#  ファイル構成
```
index.php
│
├ config                    config.phpが入っているフォルダ
├ controller                ここに処理のファイルを置く
│                           ここからviewにあるhtml部を呼び出す
├ css                       cssのフォルダ
├ images ─┌ icons           ユーザーアイコン
│         ├ image_materials 素材フォルダ
│         └ products        商品画像
├ js                        javascriptフォルダ
├ model ─ func ─ func.php   関数をまとめたファイル
├ scss                      scssのフォルダ
├ sql                       sqlのフォルダ
└ view                      html部が入ったフォルダ
```



# 作業分担
## - 峯松
- 購入
  - s_sell.php
  - s_sell.js
  - s_check.php
- 取引
  - controller/negotiate.php
  - view/negotiate.php
  - negotiate.js
- マイページ
  - controller/mypage.php
  - view/mypage.php
- ログイン
  - log_in.js
- 登録
  - sign_in_check.js
- パスワード変更
  - controller/change_password.php
  - view/change_password.php
  - change_password.css
  - controller/change_check.php
  - view/change_check.php
  - change_check.css
  - controller/change_complete.php
  - view/change_complete.php
  - change_complete.css
- その他修正


## - 松井
- 掲示板
  - bbs.php
  - bbs.css
  - bbs.js
  - bbs_list.php
  - bbs_list.css
  - bbs_list.js
  - new_bbs.php
  - new_bbs.css
  - new_bbs.js
- 商品一覧/詳細
  - product_deteals.php
  - product_view.php
- 購入
  - buy_procedures.php
  - buy_procedures.js
  - controller/buy_complete.php
  - view/buy_complete.php


## - 松原
- 登録
  - controller/sign_in.php
  - view/sign_in.php
  - sign_in.css
  - sign_in_check.php
  - sign_in_check.css
  - sign_in_complete.php
  - sign_in_complete.css
- ログイン/ログアウト
  - view/login.php
  - login.css
  - view/logout.php
  - logout.css
- 退会
  - controller/leave_reason.php
  - view/leave_reason.php
  - leave_reason.css
  - controller/leave_check.php
  - view/leave_check.php
  - leave_check.css
  - controller/leave_complete.php
  - view/leave_complete.php
  - leave_complete.css


##  上原
- 新着商品読み込み
  - index.php
- ログイン/ログアウト
  - controller/login.php
  - controller/logout.php


# 作業全体の注意事項
  - 他人が作業しているファイルを書き換える場合は、以下の手順を取る
    - 1.書き換えるファイルと、どこを書き換えるかを、相手に伝える
    - 2.↑を受け取ったら、一旦、Gitにプッシュ、マージを行ってから、書き換えの許可を出す
    - 3.許可を受け取ったら、書き換える

# コーディング時の注意事項
  - 1.inputタグのnameは、対応するカラム名と同じにする
  - 2.インデントは半角スペース２つ
  - 3.コメントは適宜つける


# メモ
  - 共通部分(ヘッダーとフッター)は別のファイルに分けてある
    - ヘッダーにはタイトルと、cssのファイル名を、フッターにはjsのファイル名を変数で埋め込んである
    - body直下の要素はarticle

  - viewのhtmlファイルを複製してphpファイルを作成すること
    (cssの変更があった場合にhtmlで動作確認するため)

    商品テーブルの進捗状況
    0 : 出品
    1 : 購入申請
    2 : 代金受取
    3 : 商品発送
    4 : 商品到着確認
    5 : (評価)
    9 : 取引終了