$(function() {
  const select_large_product_category = $('[name="large_product_categories"]');
  const select_small_product_category = $('[name="product_category_id"]');
  const input_price = $('.mny input');
  const span_commission_rate = $('#commission_rate span');
  const span_profit = $('#profit span');
  const pictures_input = $('.pictures input[type=file]');


  pictures_input.after('<span class="thumbnail"></span>');
  // アップロードするファイルを選択
  $('input[type=file]').change(function() {
    let input = $(this);
    let file = input.prop('files')[0];
    let thumbnail = input.next('span');

    // 画像以外は処理を停止
    if (! file.type.match('image.*')) {
      // クリア
      input.val('');
      thumbnail.html('');
      return;
    }
    // 画像表示
    let reader = new FileReader();
    reader.onload = function() {
      let img_src = $('<img>').attr('src', reader.result);
      thumbnail.html(img_src);
    }
    reader.readAsDataURL(file);
  });

  // カテゴリ選択時の処理
  // 大カテゴリを選択したとき
  select_large_product_category.change(function() {
    var large_product_category_id = select_large_product_category.val();

    if(large_product_category_id == 1 || large_product_category_id == 2) {
      select_small_product_category.prop('disabled', false);
      select_small_product_category.empty();
      select_small_product_category.append('<option value="0">選択してください</option>')
      .append('<option value="1">服</option>')
      .append('<option value="2">帽子</option>')
      .append('<option value="3">アクセサリー</option>')
      .append('<option value="38">その他</option>');
    }
    else if(large_product_category_id == 3) {
      select_small_product_category.prop('disabled', false);
      select_small_product_category.empty();
      select_small_product_category.append('<option value="0">選択してください</option>')
      .append('<option value="4">ベビー服</option>')
      .append('<option value="5">キッズ服</option>')
      .append('<option value="6">キッズ靴</option>')
      .append('<option value="7">子供用ファッション小物</option>')
      .append('<option value="8">外出・移動用品</option>')
      .append('<option value="9">ベビー家具・寝具・室内用品</option>')
      .append('<option value="10">おもちゃ</option>')
      .append('<option value="38">その他</option>');
    }
    else if(large_product_category_id == 4) {
      select_small_product_category.prop('disabled', false);
      select_small_product_category.empty();
      select_small_product_category.append('<option value="0">選択してください</option>')
      .append('<option value="11">キッチン・食器</option>')
      .append('<option value="12">ベッド・マットレス・寝具</option>')
      .append('<option value="13">机・イス</option>')
      .append('<option value="14">収納家具</option>')
      .append('<option value="15">カーペット・ラグ・マット</option>')
      .append('<option value="16">照明</option>')
      .append('<option value="17">時計</option>')
      .append('<option value="18">インテリア小物</option>')
      .append('<option value="19">季節・年中行事</option>')
      .append('<option value="38">その他</option>');
    }
    else if(large_product_category_id == 5) {
      select_small_product_category.prop('disabled', false);
      select_small_product_category.empty();
      select_small_product_category.append('<option value="0">選択してください</option>')
      .append('<option value="20">スマホ</option>')
      .append('<option value="21">スマホアクセサリー</option>')
      .append('<option value="22">PC・タブレット</option>')
      .append('<option value="23">カメラ</option>')
      .append('<option value="24">テレビ・映像機器</option>')
      .append('<option value="25">オーディオ機器</option>')
      .append('<option value="26">美容・健康</option>')
      .append('<option value="27">冷暖房・空調</option>')
      .append('<option value="28">生活家電</option>')
      .append('<option value="38">その他</option>');
    }
    else if(large_product_category_id == 6) {
      select_small_product_category.prop('disabled', false);
      select_small_product_category.empty();
      select_small_product_category.append('<option value="0">選択してください</option>')
      .append('<option value="29">本・DVD・音楽</option>')
      .append('<option value="30">ゲーム</option>')
      .append('<option value="31">スポーツ・レジャー</option>')
      .append('<option value="38">その他</option>');
    }
    else if(large_product_category_id == 7) {
      select_small_product_category.prop('disabled', false);
      select_small_product_category.empty();
      select_small_product_category.append('<option value="0">選択してください</option>')
      .append('<option value="32">アクセサリー（女性用）</option>')
      .append('<option value="33">ファッション・小物</option>')
      .append('<option value="34">アクセサリー・時計</option>')
      .append('<option value="35">日用品・インテリア</option>')
      .append('<option value="36">趣味・おもちゃ</option>')
      .append('<option value="37">素材・材料</option>')
      .append('<option value="38">その他</option>');
    }
    else {
      select_small_product_category.prop('disabled', true);
      select_small_product_category.empty();
      select_small_product_category.append('<option value="">選択できません</option>');
    }
    
  });

  // 値段を入力したとき
  input_price.on('input', function(event) {
    let value = input_price.val();
    let commission_rate = Math.round(value / 10);
    let profit = value - commission_rate;
    span_commission_rate.text(commission_rate);
    span_profit.text(profit);
  });
});
