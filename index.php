<?php
  require_once('header.php');  
?>
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
                      <a href="#menus" class="btn1">
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
                      <a href="#menus" class="btn1">
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
                      <a href="#menus" class="btn1">
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

  <!-- offer section -->

  <section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/choccolate3.jpeg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Chocolate Friday
                </h5>
                <h6>
                  <span>20%</span> Off
                </h6>
                
                <a href="#menus">
                  Order Now <i class="fa fa-shopping-cart"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/yoghurt4.jpeg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Tasty Days
                </h5>
                <h6>
                  <span>15%</span> Off
                </h6>
                <a href="#menus">
                  Order Now <i class="fa fa-shopping-cart"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <ul id="menulist" class="filters_menu">
        <!-- to be rendered by ajax -->
      </ul>

      <div class="filters-content">        
        <div class="row grid " id="menus">
       
         <!-- to be rendered via ajax -->
      
        </div>
      </div>
      
    
    </div>
  </section>
      
<!-- start register modal -->
<div class="modal rounded" id="registermodal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h2>Customer Sign-Up</h2>
          </div>
          <div class="modal-body">
            <div class="form">
              <form action="">
               <div class="row">
               <div class="col-lg-6">
                  <div class="form-group">
                    <label for="fullname" class="text-danger mb-0">*</label>
                    <input type="text" class="form-control error-field" placeholder="fullname" id="fullname" name="fullname">
                    <label for="error" id="fullname_info" class="text-danger"  style="display: none;"></label>
                  </div>
                  <div class="form-group"> 
                    <label for="email" class="text-danger mb-0">*</label>
                    <input type="text" class="form-control error-field" placeholder="email" id="email" name="email">
                  <label for="error" id="email_info" class="text-danger" style="display: none;"></label>
                    </div>
                  <div class="form-group"> 
                      <label for="contact" class="text-danger mb-0">*</label>
                      <input type="text" class="form-control error-field" placeholder="contact" id="contact" name="contact">
                      <label for="error" id="contact_info" class="text-danger" style="display: none;"></label>
                  </div>
                  <div class="form-group"> 
                        <label for="gender" class="text-danger mb-0">*</label>
                        <select  class="form-control error-field"  id="gender" name="gender">
                            <option value="default">select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <label for="error" class="text-danger" id="gender_info" style="display: none;"></label>
                    </div>                                 
               </div>

               <div class="col-lg-6">
                <div class="form-group"> 
                  <label for="address" class="text-danger mb-0">*</label>
                  <input type="address" class="form-control error-field" placeholder="address" id="address" name="address">
                  <label for="error" id="address_info" class="text-danger" style="display: none;"></label>
                </div>
                <div class="form-group"> 
                  <label for="username" class="text-danger mb-0">*</label>
                  <input type="text" class="form-control error-field" placeholder="username" id="username" name="username">
                  <label for="error" id="username_info" class="text-danger" style="display: none;"></label>
                </div>
                <div class="form-group">                  
                  <label for="password" class="text-danger mb-0">*</label>
                  <input type="password" class="form-control error-field" placeholder="password" id="password" name="password">
                  <label for="error" id="password_info" class="text-danger" style="display: none;"></label>
                </div>
                <div class="form-group">                  
                  <label for="confirm_password" class="text-danger mb-0">*</label>
                  <input type="confirm_password" class="form-control error-field" placeholder="confirm password" id="confirm_password" name="confirm_password">
                  <label for="error" id="confirm_password_info" class="text-danger" style="display: none;"></label>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-default" id="register" name="register">Register</button>
                </div>
               </div>
               </div>

              </form>
            </div>
          </div>
          <div class="modal-footer">
              <!-- <p>Already have account: <a href="javascript: void(0)" data-target="#loginmodal" class="login" data-toggle="modal">Login here...</a></p> -->
          </div>
        </div>
      </div>
    </div>
    <!-- modal end -->

  <?php
  require_once('footer.php');  
?>

<script>

  let  fetchmenulist = (()=>{
	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=fetch_menulist',
		success: function(result){
			$('#menulist').html(result);
		}
	});

}); fetchmenulist(); 


let  fetchmenus = (()=>{
	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=fetch_menus',
		success: function(result){
			$('#menus').html(result);
		}
	});

}); fetchmenus(); 



let cartcount =  (()=>{
	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=get_cartcount',
		success: function(result){
			$('#cartcount').html(result);
		}
	});
});cartcount();



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


   
$("#register").click(()=>{

        var valid = true;
    
        let fullname = $("#fullname").val();
        let email = $("#email").val();
        let contact = $("#contact").val();
        let address = $("#address").val();
        let gender = $("#gender").val();
        let username = $("#username").val();
        let password = $("#password").val();
        let confirm_password = $("#confirm_password").val();

        let regEx_alphabet = /^[a-zA-Z ',.]*$/;
        let regEx_alphabetnumeric = /^[a-zA-Z0-9 ,'.]*$/;
        let regEx_tel = /^(?:0[789][0-9]{9})$/;
        let regEx_email =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/;
    
       if (fullname.trim() == "") {
         $("#fullname_info").html("This field is required!").show().fadeIn().fadeOut(5000);
         $("#fullname").addClass("error_field");
         valid = false;
       } else if (!regEx_alphabet.test(fullname)){
         $("#fullname_info").html("only alphabetic value is allow!").show().fadeIn().fadeOut(5000);
         $("#fullname").addClass("error_field");
         valid = false;
       }
       if (contact.trim() == "") {
         $("#contact_info").html("This field is required!").show().fadeIn().fadeOut(5000);
         $("#contact").addClass("error_field");
         valid = false;
       }else if (!regEx_tel.test(contact)){
         $("#contact_info").html("invalid contact!").show().fadeIn().fadeOut(5000);
         $("#contact").addClass("error_field");
         valid = false;
       } 
       if (email.trim() == "") {
         $("#email_info").html("This field is required!").show().fadeIn().fadeOut(5000);
         $("#email").addClass("error_field");
         valid = false;
       }else if (!regEx_email.test(email)){
         $("#email_info").html("invalid email!").show().fadeIn().fadeOut(5000);
         $("#email").addClass("error_field");
         valid = false;
       } if (address.trim() == "") {
         $("#address_info").html("This field is required!").show().fadeIn().fadeOut(5000);
         $("#address").addClass("error_field");
         valid = false;
       }else if (!regEx_alphabetnumeric.test(address)){
         $("#address_info").html("only alphanumeric value is allow!").show().fadeIn().fadeOut(5000);
         $("#address").addClass("error_field");
         valid = false;
       }
      if (gender.trim() == "default") {
         $("#gender_info").html("This field is required!").show().fadeIn().fadeOut(5000);
         $("#gender").addClass("error_field");
         valid = false;
       }
       if (username.trim() == "") {
         $("#username_info").html("This field is required!").show().fadeIn().fadeOut(5000);
         $("#username").addClass("error_field");
         valid = false;
       }
       if (password.trim() == "") {
         $("#password_info").html("This field is required!").show().fadeIn().fadeOut(5000);
         $("#password").addClass("error_field");
         valid = false;
       }else if (password.length < 6) {
          $("#password_info").html('password most be atleast 6 charcter long!').show().fadeIn().fadeOut(5000);
          $("#password").addClass("error-field");
          valid = false;

      }
       if (confirm_password.trim() == "") {
         $("#confirm_password_info").html("This field is required!").show().fadeIn().fadeOut(5000);
         $("#confirm_password").addClass("error_field");
         valid = false;
       }
       if (password != confirm_password) {
         $("#error_msg").html("both password mmust be the same!").show().fadeIn().fadeOut(5000);
         $("#password").addClass("error_field");
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
         url:'process.php',
         data: 'page=add_customer' + '&fullname=' + fullname + '&contact=' + contact + '&email=' + email + '&address=' + address + '&gender=' + gender + '&password=' + password + '&username=' + username,
         type: 'POST',						
         success:function(result){	
                  //  alert(result);
              if (result == 'exist') {				
               swal({
                 title: 'exist',
                 text: 'customer already added, please try again!',
                 icon: 'error'
   
               });
   
           }
           else if (result == 'failed') {				
               swal({
                 title: 'failed',
                 text: 'failed to save customer, please try again!',
                 icon: 'error'
   
               });
   
           }
           else if(result == 'success') {
               swal({
                 title: 'success',
                 text: 'customer saved successfully!',
                 icon: 'success'
   
               });
             
               window.location="login.php";
                   }
                 
             }
         });
       }
   
       });
</script>