$(function() {
  $("#login").on("click", function() {
    let name = $('#login_form [name="name"]').val();
    let pass = $('#login_form [name="password"]').val();
    //デバッグ用
    // console.log(name);
    // console.log(pass);

    $.ajax({
      url: "../model/ajax/read_user_data.php",
      type: "POST",
      catch: false,
      dataType: "json",
      data: { name, pass }
    })
      .done(function(data) {
        //デバッグ用
        console.log(data.name);
        console.log(data.pass);
        //正式な処理を追加する
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      });
  });
});
