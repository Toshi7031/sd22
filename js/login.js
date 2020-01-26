$(function() {
  const help = $('.help');
  // const toggle_class_name = 'hidden';

  help.on("click", function() {
    $('.bbs_contents li').slideToggle();
  });
});
