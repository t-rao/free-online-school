
$(function() {
  //get the form
  var form = $("#form-01");
  //Get the message Div
  var formMessages = $("#form-messages");
  $(form).submit(function(event){
      event.preventDefault();
      // serialize the for data
      var formData = $(form).serialize();

      $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: formData
    })
    .done(function(response) {
        // Make sure that the formMessages div has the 'success' class.
        $(formMessages).removeClass('error');
        $(formMessages).addClass('success');

        // Set the message text.

        $("#myModal").modal();
        $(formMessages).text(response);
        $("#form-01").trigger("reset");
        // Clear the form.

        $('#name1').val('');
        $('#email1').val('');

        setTimeout(function() {
            $('#myModal').modal('hide');
        }, 5000);
    })
    .fail(function(data) {
        // Make sure that the formMessages div has the 'error' class.
        $(formMessages).removeClass('success');
        $(formMessages).addClass('error');
        $("#myModal").modal();
        $("#form-01").trigger("reset");
        // Set the message text.
        if (data.responseText !== '') {
            $(formMessages).text(data.responseText);
        } else {
            $(formMessages).text('Oops! An error occured and your message could not be sent.');
        }

        setTimeout(function() {
            $('#myModal').modal('hide');
        }, 5000);
    });


  })
});



$(function() {
  //get the form
  var form = $("#form-02");
  //Get the message Div
  var formMessages = $("#form-messages");
  $(form).submit(function(event){
      event.preventDefault();
      // serialize the for data
      var formData = $(form).serialize();

      $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: formData
    })
    .done(function(response) {
        // Make sure that the formMessages div has the 'success' class.
        $(formMessages).removeClass('error');
        $(formMessages).addClass('success');

        // Set the message text.

        $("#myModal").modal();
        $(formMessages).text(response);
        $("#form-02").trigger("reset");
        // Clear the form.

        $('#name').val('');
        $('#email').val('');

        setTimeout(function() {
            $('#myModal').modal('hide');
        }, 5000);
    })
    .fail(function(data) {
        // Make sure that the formMessages div has the 'error' class.
        $(formMessages).removeClass('success');
        $(formMessages).addClass('error');
        $("#myModal").modal();
        $("#form-02").trigger("reset");
        // Set the message text.
        if (data.responseText !== '') {
            $(formMessages).text(data.responseText);
        } else {
            $(formMessages).text('Oops! An error occured and your message could not be sent.');
        }

        setTimeout(function() {
            $('#myModal').modal('hide');
        }, 5000);
    });


  })
});
