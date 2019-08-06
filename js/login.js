$(function() {
  $("#login").on("click", function() {
    // console.log('click');
    let name = $('#login_form [name="name"]').val();
    let pass = $('#login_form [name="password"]').val();
    //デバッグ用
    console.log(name);
    console.log(pass);

    $.ajax({
      url: '../model/ajax/read_user_data.php',
      type: "POST",
      catch: false,
      dataType: 'json',
      data: {name, pass}
    })
      .done(function(data) {
        console.log(data.name);
        console.log(data.pass);
        // console.log(data[0]);
        // $('#error_mes_name').html(data.name);
        // $('#error_mes_pass').html(data.pass);
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      });
  });
});
