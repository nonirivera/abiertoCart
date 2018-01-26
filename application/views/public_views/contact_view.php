<div class="container">  
  <div class="jumbotron">
    <p class="lead">abrietoCart <i class="fa fa-copyright" aria-hidden="true"></i> 2017</p>
    <div class="row">
      <div class="col-md-6">
        <strong>We are located at</strong>
        <p class="text-primary">88 Hilltop E. Mejia St. Bagong Ilog, Pasig City</p>
      </div>
      <div class="col-md-6">
        <strong>Give us a call</strong>
        <p class="text-primary">Mobile Number: +63 995 164 6934</p>
        <p class="text-primary">Landline Number: +02 671 66 47</p>
      </div>
    </div>
  </div>

  <form class="form-horizontal" id="contactForm" action="<?= base_url() . 'shop/contactsubmit'; ?>" method="post">
    <fieldset>
    <legend>Hit us up a message!</legend>
    <div id="the-message"></div>
    <div class="form-group">
      <label for="fullname" class="col-lg-2 control-label">Your Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <label for="emailaddress" class="col-lg-2 control-label">Your Email Address</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="emailaddress" name="emailaddress" placeholder="Email Address">
      </div>
    </div>
    <div class="form-group">
      <label for="formmessage" class="col-lg-2 control-label">Your Message</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="formmessage" name="formmessage"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary" id="contactBtn">Send Message</button>
        <button type="reset" class="btn btn-default">Cancel</button>
      </div>
    </div>
    </fieldset>
  </form>
</div>

<script type="text/javascript">
$('#contactForm').submit(function(e) {
  var me = $(this);

  $.ajax({
    url: me.attr('action'),
    type: 'post',
    data: me.serialize(),
    dataType: 'json',
    success: function(response) {
      if (response.success == true) {
        // show success message, remove error class, and disable form inputs
        $('#the-message').append('<div class="alert alert-success">Your message has been successfully submitted!</div>');
        $('.form-group').removeClass('has-error')
                .removeClass('has-success');
        $('.text-danger').remove();
        $("#contactForm input").prop("disabled", true);
        $("#contactForm #formmessage").prop("disabled", true);
        $("#contactForm #contactBtn").prop("disabled", true);
      }
      else {
        $.each(response.messages, function(key, value) {
          var element = $('#' + key);
          
          element.closest('div.form-group')
          .removeClass('has-error')
          .addClass(value.length > 0 ? 'has-error' : 'has-success')
          .find('.text-danger')
          .remove();
          
          element.after(value);
        });
      }
    }
  });
  return false;
});
</script>