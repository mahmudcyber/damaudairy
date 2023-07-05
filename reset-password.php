<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="mahmudcyber" />
  <link rel="shortcut icon" href="images/damau-logo.png" type="">

  <title> Damau Dairy Milk</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body style="background-color: #0171a5;">

  <div class="hero_area">
     <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              <img src="images/damau-logo.png" alt="logo" class="img-fluid rounded-circle" width="80" height="80">
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <div class="container">
      <div class="row ">
        <div class="col-lg-3"> </div>
        <div class="col-lg-6">
          <!-- forgot password section -->
          <section class="book_section layout_padding bg-white rounded p-2" id="forgot-password-box">
            <div class="container ">
              <div class="heading_container">
                <h2 class="p-3 ">
                  Forgot Password
                </h2>
              </div>
              <div class="form_container p-3">
                <form action="">
                  <div id="msg"></div>
                  <div class="form-group">
                    <label for="email" class="text-danger mb-0">*</label>
                    <input type="email" class="form-control error-field" placeholder="enter your email" id="email" name="email" required>
                    <label for="error" id="email_info" class="text-danger" style="display: none;" ></label>
                  </div>
                 
                  <div class="form-group mt-5">
                    <button type="button" name="forgot-password" id="forgot-password" class="btn btn-default">Forgot Password</button>
                  </div>
                </form>
              </div>
            </div>
          </section>
          <!-- end forgot password section -->

          <!-- reset password section -->
          <section class="book_section layout_padding bg-white rounded p-2" id="reset-password-box" style="display: none;">
            <div class="container ">
              <div class="heading_container">
                <h2 class="p-3 ">
                  Reset Password
                </h2>
              </div>
              <div class="form_container p-3">
                <form action="">
                  <div id="msg"></div>
                  <div class="form-group">
                    <label for="new_password" class="text-danger mb-0">*</label>
                    <input type="password" class="form-control error-field" placeholder="new password" id="new_password" name="new_password">
                    <label for="error" id="new_password_info" class="text-danger" style="display: none;" ></label>
                  </div>
                  <div class="form-group">
                    <label for="confirm_password" class="text-danger mb-0">*</label>
                    <input type="password" class="form-control error-field" placeholder="confirm password" id="confirm_password" name="confirm_password">
                    <label for="error" id="confirm_password_info" class="text-danger" style="display: none;" ></label>
                  </div>
                  <div class="form-group">
                    <button type="button" name="reset-password" id="reset-password" class="btn btn-default">Reset password</button>
                  </div>
                </form>
              </div>
            </div>
          </section>
          <!-- end reset password section -->
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>
</div>


  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script> -->
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <!-- <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script> -->
  <!-- nice select -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script> -->
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <script src="js/sweetalert.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>


<script>
$("#forgot-password").click(function() {

  var valid = true;

  $("#email").removeClass("error-field");

  let email = $("#email").val();

  let regEx_email =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/;
    
  if (email.trim() == "") {
    $("#email_info").html("This field is required!").show().fadeIn().fadeOut(5000);
    $("#email").addClass("error_field");
    valid = false;
  }else if (!regEx_email.test(email)){
    $("#email_info").html("invalid email!").show().fadeIn().fadeOut(5000);
    $("#email").addClass("error_field");
    valid = false;
  }
  if (valid == false) {
    $(".error-field").css({
        'border-width': '1px',
        'border-style': 'solid',
        'border-color': 'red'
    }).first().focus();
    valid = false;

} else {
    $.ajax({
        url: "process.php",
        type: "POST",
        data: 'page=forgot_password' + '&email=' + email,
        success: function(result) {
          // alert(result);
          if(result == 'success'){
            $("#forgot-password-box").hide();
            $("#reset-password-box").show();
          }
          else{				
            swal({
              title: 'Not match',
              text: 'Password not match with any record!',
              icon: 'error'

            });
   
           }
        }
    });
}

}); 

$("#reset-password").click(function() {

  var valid = true;

  $("#new_password").removeClass("error-field");
  $("#confirm_password").removeClass("error-field");

  let new_password = $("#new_password").val();
  let confirm_password = $("#confirm_password").val();
    
  if (new_password.trim() == "") {
    $("#new_password_info").html("This field is required!").show().fadeIn().fadeOut(5000);
    $("#new_password").addClass("error_field");
    valid = false;
  }else if (new_password.length < 6) {
    $("#new_password_info").html('password most be atleast 6 charcter long!').show().fadeIn().fadeOut(5000);
    $("#new_password").addClass("error-field");
    valid = false;
  }
  if (confirm_password.trim() == "") {
    $("#confirm_password_info").html("This field is required!").show().fadeIn().fadeOut(5000);
    $("#confirm_password").addClass("error_field");
    valid = false;
  }
  if (new_password != confirm_password) {
    $("#confirm_password_info").html("both password must be the same!").show().fadeIn().fadeOut(5000);
    $("#confirm_password").addClass("error_field");
    valid = false;
  }
  if (valid == false) {
    $(".error-field").css({
        'border-width': '1px',
        'border-style': 'solid',
        'border-color': 'red'
    }).first().focus();
    valid = false;

} else {
    $.ajax({
        url: "process.php",
        type: "POST",
        data: 'page=reset_password' + '&new_password=' + new_password,
        success: function(result) {
          // alert(result);
          if(result == 'success'){
            swal({
                 title: 'success',
                 text: 'Password reste successfully!',
                 icon: 'success'
   
               });
             
               setInterval(() => {
                window.location="login.php";
               }, 3000);
          }
          else{				
            swal({
              title: 'failed',
              text: 'failed to reset password, try again please!',
              icon: 'error'

            });
   
           }
        }
    });
}

}); 
 </script>