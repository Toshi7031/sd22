$(function() {
  const select_product_category = $('#select_product_category');   
  const category_list = $('#category_list');
  const cancel_button = $('nav .cancel_button');

  select_product_category.click(function() {
    category_list.fadeIn(500);
    return false;
  });
  
  cancel_button.click(function() {
    category_list.fadeOut(500);
    return false;
  });

  //掲示板リストも同様の処理
});
