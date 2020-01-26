$(function () {
  const select_product_category = $('#select_product_category');
  const product_category_list = $('#product_category_list');
  const select_bbs_category = $('#select_bbs_category');
  const bbs_category_list = $('#bbs_category_list');
  const cancel_button = $('nav .cancel_button');

  select_product_category.click(function () {
    product_category_list.fadeIn(500);
  });

  select_bbs_category.click(function() {
    bbs_category_list.fadeIn(500);
    return false;
  })

  cancel_button.click(function () {
    product_category_list.fadeOut(500);
    bbs_category_list.fadeOut(500);
    return false;
  });
});
