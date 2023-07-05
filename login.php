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

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/2.png" alt="">
    </div>
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
  <div class="col-lg-7">
      <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    
                    <h1>
                     Damau Dairy Milk
                    </h1>
                    <p>
                      Your Satisfaction is our priority.
                    </p>
                    <div class="btn-box">
                      <a href="javascript:;" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                  <h1>
                     Damau Dairy Milk
                    </h1>
                    <p>
                      Your Satisfaction is our priority.
                    </p>
                    <div class="btn-box">
                      <a href="javascript:;" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                  <h1>
                     Damau Dairy Milk
                    </h1>
                    <p>
                      Your Satisfaction is our priority.
                    </p>
                    <div class="btn-box">
                      <a href="javascript:;" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>
  <div class="col-lg-5">
    
  <!-- book section -->
  <section class="book_section layout_padding bg-white rounded p-2">
    <div class="container ">
      <div class="heading_container">
        <h2 class="p-3 ">
          Login
        </h2>
      </div>
      <div class="form_container p-3">
              <form action="">
                <div id="msg"></div>
                <div class="form-group">
                  <label for="username" class="text-danger mb-0">*</label>
                  <input type="text" class="form-control error-field" placeholder="username" id="login_username" name="login_username">
                  <label for="error" id="login_username_info" class="text-danger" style="display: none;" ></label>
                </div>
                <div class="form-group">
                  <label for="password" class="text-danger mb-0">*</label>
                  <input type="password" class="form-control error-field" placeholder="password" id="login_password" name="login_password">
                  <label for="error" id="login_password_info" class="text-danger" style="display: none;" ></label>
                </div>
                <div class="form-group">
                  <button type="button" name="login" id="login" class="btn btn-default">Login</button>
                  <span class="not-register text-info"><a href="register.php">Don't have account? register here...</a></span>
                   <span class="not-register text-info"><a href="reset-password.php">Forget password?</a></span>
                </div>
              </form>
            </div>
    </div>
  </section>
  <!-- end book section -->

  </div>
</div>
</div>
  </div>


  <!-- footer section -->
 <?php include("footer.php"); ?>


 <script>
   $("#login").click(function() {

var valid = true;

$("#login_username").removeClass("error-field");
$("#login_password").removeClass("error-field");

let login_username = $("#login_username").val();
let login_password = $("#login_password").val();            

if (login_username.trim() == "") {
    $("#login_username_info").html('username is required!').show().fadeIn().fadeOut(5000);
    $("#login_username").addClass("error-field");
    valid = false;

}
if (login_password.trim() == "") {
    $("#login_password_info").html('password is required!').show().fadeIn().fadeOut(3000);
    $("#login_password").addClass("error-field");
    valid = false;

} else if (login_password.length < 6) {
    $("#login_password_info").html('password most be atleast 6 charcter long!').show().fadeIn().fadeOut(3000);
    $("#login_password").addClass("error-field");
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
        data: 'page=login' + '&login_username=' + login_username + '&login_password=' + login_password,
        success: function(result) {
          // alert(result);
            $("#msg").html(result).fadeIn().fadeOut(10000);
        }
    });
}

}); 
 </script>