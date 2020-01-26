$(function() {
  const product_image = $('.product_image');
  var image_count = product_image.find('img').length;


  // スリックのオプションをつける
  if(image_count >= 2) {
    product_image.slick({
      accessibility: true,
      autoplaySpeed: 5000,
      autoplay: true,
      prevArrow: '<button class="prev"><</button>',
      nextArrow: '<button class="next">></button>',

    });
  }
});