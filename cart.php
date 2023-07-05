<?php include "header1.php";
 ?>

  <!-- cart section -->
  <section class="cart_section layout_padding">
            <!--start container-->
		<div class="container" id="main">
          <div>
            <a style="margin-left: 4px" class="btn btn-default m-l-20"  title=" place order" href="index.php"><span class="fa fa-plus-circle "></span> Continue order</a>
          </div>
            <hr class="divider">
            <h2 class="header">My Cart</h2>
                <div id="table" class="display-table">

                </div>
          
        <!--end container-->
    </div>
  </section>
  <!-- end cart section -->
  	
		<!-- start login modal -->
		<div class="modal rounded" id="paymenttypemodal" role="dialog">
			<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<span class="gatway">
						<img src="admin/build/images/visa.png" alt="Visa">
						<img src="admin/build/images/mastercard.png" alt="Mastercard">
						<img src="admin/build/images/american-express.png" alt="American Express">
						<img src="admin/build/images/paypal.png" alt="Paypal">
					</span>
					<h2>Payment type</h2>
				</div>
				<div class="modal-body">
				<div class="form">
				<form>                           
					<div class="form-group"> 
					<label for="datetime_delivery" class=" mb-0">Payment method <span class="text-danger">*</span> </label>
						<select type="text" class="form-control error_field" placeholder="paymenttype" id="paymenttype" name="paymenttype">
							<option value="default">select payment method</option>
							<option value="online">Pay online</option>
							<option value="ondelivery">Pay On-delivery</option>
						</select>
						<label for="error" class="text-danger" id="paymenttype_info" style="display: none;"></label>
					</div>
					<div class="form-group"> 
						<label for="datetime_delivery" class=" mb-0">Delivery DateTime <span class="text-danger">*</span> </label>
						<input type="datetime-local" class="form-control error_field"  id="datetime_delivery" name="datetime_delivery">							
						<label for="error" class="text-danger" id="datetime_delivery_info" style="display: none;"></label>
					</div>
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
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="proceed" name="proceed"><i class="fa fa-money"></i> proceed</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>

				</div> 
				</form>
				
			</div>
			</div>
		</div>
		<!-- modal end -->

  <?php include("footer.php"); ?>

  <script>

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


    // fetch cart
function fetchcart(){
	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=fetch_cart',
		success: function(result){
			$('.display-table').html(result);
		}
	});

}fetchcart(); 

// quantity increement
let increaseqty = ((a)=>{
	let data = a.split('*');
	let cart_id = data[0];
	let unitprice = data[2];
	let qty = 1 + Number(data[1]);
	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=increementqty' + '&cart_id=' + cart_id + '&qty=' + qty + '&unitprice=' + unitprice,
		success: function(result){
			fetchcart();
		}
	});
});


// quantity decreement
let decreaseqty = ((a)=>{
	let data = a.split('*');
	let cart_id = data[0];
	let unitprice = data[2];
	let qty = Number(data[1]) - 1;
	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=decreementqty' + '&cart_id=' + cart_id + '&qty=' + qty + '&unitprice=' + unitprice,
		success: function(result){
			fetchcart();
		}
	});
});



// drop cart
let dropcart = ((a)=>{
	let cart_id = a;
	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=dropcart' + '&cart_id=' + cart_id,
		success: function(result){
			fetchcart();
		}
	});
});

// empty cart
let emptycart = (()=>{

	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=emptycart',
		success: function(result){
			fetchcart();
		}
	});
});

let order = (()=>{
	$('#paymenttypemodal').modal({backdrop:'static'});	

 });  

 let datetime_delivery = '';

$('#proceed').click(()=>{
	let valid = true;
		
	let paymenttype = $("#paymenttype").val();
	let datetime_delivery = $("#datetime_delivery").val();
	let deliveryto = $("#deliveryto").val();
	let deliverycontact = $("#deliverycontact").val();
	let deliveryaddress = $("#deliveryaddress").val();

	let regEx_alphabetnumeric = /^[a-zA-Z0-9 ,'.]*$/;
	let regEx_tel = /^(?:0[789][0-9]{9})$/;
	let regEx_numeric =  /^[0-9]*$/;
	let regEx_alphabet = /^[a-zA-Z ']*$/;


	if (paymenttype.trim() == "default") {
		$("#paymenttype_info").html("please select payment type!").show().fadeIn().fadeOut(5000);
		valid = false;
	}if (datetime_delivery.trim() == "") {
		$("#datetime_delivery_info").html("please this field is required!").show().fadeIn().fadeOut(5000);
		valid = false;
	} 
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
	}
	if (valid == false) {
			$('.error_field').first().focus();
			valid = false;
	} else { 
		if (paymenttype === "ondelivery"){
			$.ajax({	
				url: 'process.php',
				type: 'POST',
				data: 'page=ondelivery' + '&datetime_delivery=' + datetime_delivery + '&deliveryto=' + deliveryto + '&deliverycontact=' + deliverycontact + '&deliveryaddress=' + deliveryaddress,
				success: function(result){
					// alert(result);
					if (result == 'failed') {				
						swal({
							title: 'failed',
							text: 'failed to make order, please try again!',
							icon: 'error'

						});

					}
					else {
						swal({
							title: result,
							text: 'copy your order reference number above and keep it with you for payment',
							icon: 'success'

						});
						
					}
					$('#paymenttypemodal').modal('hide');	
					fetchcart();
					cartcount();
							
				} 
				
			});
				
		}else if(paymenttype === "online"){
			$('#paymenttypemodal').modal('hide');	
			$("#main").load('onlinepayment.php');
		}	    
	
	}
});


  </script>