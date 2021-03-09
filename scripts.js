$(document).ready(function () {
  $("#form").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "form-regist.php",
      data: $(this).serialize(),
      success: function (request) {
        if (request == "true") {
          $("#form").hide();
          $('#error-message').remove(); 
          var newElems = $("<h3 id='error-message'>Success</h3>");
          newElems.css("color", "green");
          $(".container").prepend(newElems);
        } else {
          $('#error-message').remove(); 
          var newElems = $("<h3 id='error-message'>Error</h3>");
          newElems.css("color", "red");
          $(".container").prepend(newElems);
        }
      },
    });
  });
});
