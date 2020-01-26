$(document).ready(function(){
  $('.message button').click(function(){
      if(!confirm('取引相手に通知を送ってもよろしいですか？')){
          return false;
      }else{
          location.href = '#';
      }
  });
});