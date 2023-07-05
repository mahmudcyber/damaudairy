<?php session_start(); ?>




<hr class="divider">
<h2 class="header">Payment details</h2>
<div class="row">
		<!-- accepted payments column -->
		<div class="col-md-3">
			
			</div>
		<div class="col-md-6">
		<p >

			<div class=" rounded"  role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<div class="modal-header">
							<span class="gatway">
								<img src="admin/build/images/visa.png" alt="Visa">
								<img src="admin/build/images/mastercard.png" alt="Mastercard">
								<img src="admin/build/images/american-express.png" alt="American Express">
								<img src="admin/build/images/paypal.png" alt="Paypal">
							</span>
							<h2><span class="symbol font-weight-bold">NGN </span><?php   echo number_format($_SESSION['totalamount']); ?></h2>
					</div>
					<div class="modal-body">
						<div class="form">
							<form>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<h5 class="text-muted small-font"> Credit card number:</h5>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" minlenght="4" maxlength="4" placeholder="0000" required="" name="firstnumber" id="firstnumber" />
										<label for="error" class="text-danger" id="firstnumber_info" style="display: none;"></label>
									</div>                                             
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" minlenght="4" maxlength="4" placeholder="0000" required="" name="secondnumber" id="secondnumber" />
										<label for="error" class="text-danger" id="secondnumber_info" style="display: none;"></label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" minlenght="4" maxlength="4" placeholder="0000" required="" name="thirdnumber" id="thirdnumber" />
										<label for="error" class="text-danger" id="thirdnumber_info" style="display: none;"></label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" minlenght="4" maxlength="4" placeholder="0000" required="" name="fourthnumber" id="fourthnumber"/>
										<label for="error" class="text-danger" id="fourthnumber_info" style="display: none;"></label>
									</div>
								</div>
								<br>
								<div class="row ">
									<div class="col-md-3 col-sm-3 col-xs-3">
										<span class="help-block text-muted small-font"> Expiry Month</span>
										<input type="text" class="form-control" placeholder="MM" required="" maxlength="2" name="expirymonth" id="expirymonth"/>
										<label for="error" class="text-danger" id="expirymonth_info" style="display: none;"></label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<span class="help-block text-muted small-font">  Expiry Year</span>
										<input type="text" class="form-control" placeholder="YY" required="" maxlength="2" name="expiryyear" id="expiryyear"/>
										<label for="error" class="text-danger" id="expiryyear_info" style="display: none;"></label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<span class="help-block text-muted small-font">  CCV</span>
										<input type="text" class="form-control" placeholder="CCV" required="" maxlength="3" name="cvv" id="cvv"/>
										<label for="error" class="text-danger" id="cvv_info" style="display: none;"></label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3"><br>
										<img src="admin/build/images/creditcard..png" class="img-rounded" required="" width="30" height="39"/>
									</div>
								</div>
								<br>
								<div class="row ">
									<div class="col-md-4 col-sm-4 col-xs-4">
										<input type="text" class="form-control" placeholder="Deliver To" required=""  name="deliveryto" id="deliveryto"/>
										<label for="error" class="text-danger" id="deliveryto_info" style="display: none;"></label>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4">
										<input type="text" class="form-control" placeholder="Delivery contact" required=""  name="deliverycontact" id="deliverycontact" maxlength="11"/>
										<label for="error" class="text-danger" id="deliverycontact_info" style="display: none;"></label>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4">
										<input type="text" class="form-control" placeholder="Delivery address" required=""  name="deliveryaddress" id="deliveryaddress"/>
										<label for="error" class="text-danger" id="deliveryaddress_info" style="display: none;"></label>
									</div>
									
								</div>  
												
							</div>
						
						</div>         
					<div class="modal-footer" >
						<button type="button" class="btn btn-default small" id="checkout" name="checkout"><i class="fa fa-money"></i> Checkout</button><a href="cart.php" class="btn btn-warning small" > Cancel</a>
					</div>
					</form>
					</div>
				</div>
			</div>
		</p>
		</div>
		<div class="col-md-3">
			
		</div>
		
		
		
	</div>
	<!-- /.row -->
	
</div>


<!--end container-->


         

<script>

$("#checkout").click(()=>{
       
	   var valid = true;

	   const deliveryto = $("#deliveryto").val();
	   const deliverycontact = $("#deliverycontact").val();
	   const deliveryaddress = $("#deliveryaddress").val();
	   const firstnumber = $("#firstnumber").val();
	   const secondnumber = $("#secondnumber").val();
	   const thirdnumber = $("#thirdnumber").val();
	   const fourthnumber = $("#fourthnumber").val();
	   const expirymonth = $("#expirymonth").val();
	   const expiryyear = $("#expiryyear").val();
	   const cvv = $("#cvv").val();

	   const regEx_alphabet = /^[a-zA-Z ']*$/;
	   const regEx_alphabetnumeric = /^[a-zA-Z0-9 ,'.]*$/;
	   const regEx_tel = /^(?:0[789][0-9]{9})$/;
	   const regEx_numeric =  /^[0-9]*$/;
	
	   if (deliveryto.trim() == "") {
		   $("#deliveryto_info").html("This field is required!").show().fadeIn().fadeOut(5000);
		   $("#deliveryto").addClass("error_field");
		   valid = false;
	   } else if (!regEx_alphabet.test(deliveryto)){
		   $("#deliveryto_info").html("only characters are allow!").show().fadeIn().fadeOut(5000);
		   $("#deliveryto").addClass("error_field");
		   valid = false;
	   }
	   if (deliverycontact.trim() == "") {
		   $("#deliverycontact_info").html("This field is required!").show().fadeIn().fadeOut(5000);
		   $("#deliverycontact").addClass("error_field");
		   valid = false;
	   }else if (!regEx_tel.test(deliverycontact)){
		   $("#deliverycontact_info").html("invalid contact!").show().fadeIn().fadeOut(5000);
		   $("#deliverycontact").addClass("error_field");
		   valid = false;
	   } 
	   if (deliveryaddress.trim() == "") {
		   $("#deliveryaddress_info").html("This field is required!").show().fadeIn().fadeOut(5000);
		   $("#deliveryaddress").addClass("error_field");
		   valid = false;
	   }else if (!regEx_alphabetnumeric.test(deliveryaddress)){
		   $("#deliveryaddress_info").html("only alphanumeric characters are allow!").show().fadeIn().fadeOut(5000);
		   $("#deliveryaddress").addClass("error_field");
		   valid = false;
	   } if (firstnumber.trim() == "") {
		   $("#firstnumber_info").html("This field is required!").show().fadeIn().fadeOut(5000);
		   $("#firstnumber").addClass("error_field");
		   valid = false;
	   }else if (!regEx_numeric.test(firstnumber)){
		   $("#firstnumber_info").html("only numeric charcters are allow!").show().fadeIn().fadeOut(5000);
		   $("#firstnumber").addClass("error_field");
		   valid = false;
	   }
	   if (secondnumber.trim() == "") {
		   $("#secondnumber_info").html("This field is required!").show().fadeIn().fadeOut(5000);
		   $("#secondnumber").addClass("error_field");
		   valid = false;
	   }else if (!regEx_numeric.test(secondnumber)){
		   $("#secondnumber_info").html("only numeric charcters are allow!").show().fadeIn().fadeOut(5000);
		   $("#secondnumber").addClass("error_field");
		   valid = false;
	   }
	   if (thirdnumber.trim() == "") {
		   $("#thirdnumber_info").html("This field is required!").show().fadeIn().fadeOut(5000);
		   $("#thirdnumber").addClass("error_field");
		   valid = false;
	   }else if (!regEx_numeric.test(thirdnumber)){
		   $("#thirdnumber_info").html("only numeric charcters are allow!").show().fadeIn().fadeOut(5000);
		   $("#thirdnumber").addClass("error_field");
		   valid = false;
	   }
	   if (fourthnumber.trim() == "") {
		   $("#fourthnumber_info").html("This field is required!").show().fadeIn().fadeOut(5000);
		   $("#fourthnumber").addClass("error_field");
		   valid = false;
	   }else if (!regEx_numeric.test(fourthnumber)){
		   $("#fourthnumber_info").html("only numeric charcters are allow!").show().fadeIn().fadeOut(5000);
		   $("#fourthnumber").addClass("error_field");
		   valid = false;
	   }
	   if (expirymonth.trim() == "") {
		   $("#expirymonth_info").html("This field is required!").show().fadeIn().fadeOut(5000);
		   $("#expirymonth").addClass("error_field");
		   valid = false;
	   }else if (!regEx_numeric.test(expirymonth)){
		   $("#expirymonth_info").html("only numeric charcters are allow!").show().fadeIn().fadeOut(5000);
		   $("#expirymonth").addClass("error_field");
		   valid = false;
	   }
	   if (expiryyear.trim() == "") {
		   $("#expiryyear_info").html("This field is required!").show().fadeIn().fadeOut(5000);
		   $("#expiryyear").addClass("error_field");
		   valid = false;
	   }else if (!regEx_numeric.test(expiryyear)){
		   $("#expiryyear_info").html("only numeric charcters are allow!").show().fadeIn().fadeOut(5000);
		   $("#expiryyear").addClass("error_field");
		   valid = false;
	   }
	   if (cvv.trim() == "") {
		   $("#cvv_info").html("This field is required!").show().fadeIn().fadeOut(5000);
		   $("#cvv").addClass("error_field");
		   valid = false;
	   }else if (!regEx_numeric.test(cvv)){
		   $("#cvv_info").html("only numeric charcters are allow!").show().fadeIn().fadeOut(5000);
		   $("#cvv").addClass("error_field");
		   valid = false;
	   }
	   if (valid == false) {
		   $('.error_field').first().focus();
		   valid = false;
	   } else { 
		   
		   $.ajax({
		   url:'process.php',
		   data: 'page=onlinepayment' + '&deliveryto=' + deliveryto + '&deliverycontact=' + deliverycontact + '&deliveryaddress=' + deliveryaddress + '&firstnumber=' + firstnumber + '&secondnumber=' + secondnumber + '&thirdnumber=' + thirdnumber + '&fourthnumber=' + fourthnumber + '&expirymonth=' + expirymonth + '&expiryyear=' + expiryyear + '&cvv=' + cvv + '&datetime_delivery=' + datetime_delivery,
		   type: 'POST',						
		   success:function(result){	
			   
			   if (result == 'failed') {				
					   swal({
						   title: 'failed',
						   text: 'failed to checkout, please try again!',
						   icon: 'error'

					   });

			   }
			   else{
				   swal({
						   title: 'success',
						   text: 'payment successful',
						   icon: 'success'

					   });
				   
			            	
					}
					setTimeout(()=>{
						window.location="receipt.php?token="+result;
					},10000);
                   		     
                }
        });
    }
	

});
</script>