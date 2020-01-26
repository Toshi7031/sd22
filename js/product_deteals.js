$(function() {
  const product_image = $('.product_image');
  var image_count = product_image.find('img').length;


  // スリックのオプションをつける
  if(image_count >= 2) {
    product_image.slick();
  }
});