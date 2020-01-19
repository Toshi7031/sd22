$(function() {
  const help = $('.help');
  const help_area = $('.help_area');
  // const toggle_class_name = 'hidden';
  
  help.on("click", function() {
    help_area.slideToggle();
  });
});
