<?php
session_start();
if(!isset($_POST['page'])){
    echo '<script>window.location="login.php";</script>';
    exit;
}
require_once("connection/connectDB.php");

////////////////////
//validating input//
////////////////////

function validate_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}/*end validation*/
 

$page = $_POST['page'];

if(isset($_SESSION['username'])){
	$username_session = $_SESSION['user_id'];

}

if ($page == "login") {

 $username  = Validate_input($_POST["login_username"]);
 $password  = md5(Validate_input($_POST["login_password"]));

 $check_user = mysqli_query($conn, "SELECT user_id, username, category FROM user   where username = '$username' and password = '$password'");
 if (mysqli_num_rows($check_user) >0) {
 	$rows = mysqli_fetch_array($check_user);
	 	
 	if ($rows[2] == 0) {
		$_SESSION['user_id'] = $rows[1];
		$_SESSION['category'] = $rows[2];
		echo "<script>window.location='admin/index.php'</script>";
 	}elseif ($rows[2] == 1) {
		$_SESSION['user_id'] = $rows[1];
		$_SESSION['category'] = $rows[2];
		echo "<script>window.location='admin/index.php'</script>";
 	}else {
			$QUERYuser = mysqli_query($conn, "SELECT customer_id, customer_name FROM customer  where user_id = '$rows[0]'");
			if (mysqli_num_rows($QUERYuser) >0) {
				$userrow = mysqli_fetch_array($QUERYuser);
				$_SESSION['user_id'] = $userrow[0];
				$_SESSION['username'] = $userrow[1];

				echo "<script>window.location='index.php'</script>";
			}
	}
 }else{
 	echo '<div class="alert alert-danger">Incorrect Username/Password</div>';
 }
}/**end */


/***************************************/
/***************add customer***************/
	/***************************************/

	if($page == "add_customer"){
        
        $customer_id = mt_rand();
		$fullname = validate_input($_POST["fullname"]);
		$email = validate_input($_POST["email"]);
		$contact = validate_input($_POST["contact"]);
		$gender = validate_input($_POST["gender"]);
		$address = validate_input($_POST["address"]);
		$username = validate_input($_POST["username"]);
		$password = md5(validate_input($_POST["password"]));
		$status = 'active';
		
		/**********************check user exist************************/
		 
		// $check1 = mysqli_query($conn, "select user_id from user where username = '$username'");
		// if (mysqli_num_rows($check1)>0) {
		// 	echo 'exist';
		// 	exit;
		// }	
        
		$check = mysqli_query($conn, "select * from customer where customer_contact = '$contact' or customer_email = '$email' or customer_id = '$customer_id'");
		if (mysqli_num_rows($check)>0) {
			echo 'exist';
			exit;
		}		

		/****end check******/
	
		$userQuery = mysqli_query($conn, "INSERT INTO `user` VALUES ('','$username','$password','2')");
		if($userQuery){

			$user_id = mysqli_insert_id($conn);
			$insertQuery = mysqli_query($conn, "INSERT INTO customer VALUES ('$customer_id','$fullname','$email','$contact','$address','$gender','$status',NOW(),'$user_id')");
			if($insertQuery){
				echo 'success';			
			}else{
				echo 'failed';
			}
	
		}
	
		
	
	}/*end*/

	
/***************************************/
/***************forgot password***************/
	/***************************************/

	if($page == "forgot_password"){

		$email = validate_input($_POST["email"]);
		
		$check = mysqli_query($conn, "select * from customer where customer_email = '$email'");
		if (mysqli_num_rows($check)>0) {
			$row = mysqli_fetch_assoc($check);
			$_SESSION['reset_user'] = $row['user_id'];
			echo 'success';
			
		}		

		/****end check******/
	
	}/*end*/


/***************************************/
/***************reset password***************/
	/***************************************/

	if($page == "reset_password"){

		$new_password = md5(validate_input($_POST["new_password"]));
		$user_id = $_SESSION['reset_user'];
		
		$updateQuery = mysqli_query($conn, "update user set password = '$new_password' where user_id = '$user_id'");
		if($updateQuery){
			echo 'success';			
		}else{
			echo 'failed';
		}
	
	}/*end*/




/****************** top list menu****************/
if($page == "fetch_menulist"){
	$listQuery = mysqli_query($conn, "select food_name from food");
		if(mysqli_num_rows($listQuery) > 0){
			while($row = mysqli_fetch_array($listQuery)){
				echo '<li data-filter=".'.$row[0].'">'.$row[0].'</li>';
				
			}
		}
}
// end

	
/*************************************************/
/****************fetch menus***************/
/*************************************************/

if($page == "fetch_menus"){
	$query = mysqli_query($conn, "select food_id, food_name, food_price, food_image, food_description from food where food_status = 'available'");
	if(mysqli_num_rows($query) > 0){
	while($row = mysqli_fetch_array($query)){
		$n = 1;
		echo '
				<div class="col-sm-6 col-lg-4 all ">
					<form action="process.php" method="POST">
						<div class="box">
							<div>
								<div class="img-box">
								<img class="rounded-circle" src="admin/'.$row[3].'" alt="">
								</div>
								<div class="detail-box">
								<h5>
									'.$row[1].'
								</h5>
								<p>
								'.$row[4].'
								</p>
								<div class="options">
									<h6>
									NGN '.$row[2].'
									</h6>
										<input type="hidden" id="page" name="page" value="addtocart">
										<input type="hidden" id="food_id" name="food_id" value="'.$row[0].'"  class="form-control-menu">
										<input type="hidden" id="food_name" name="food_name" value="'.$row[1].'" minlength="1" class="form-control-menu">
										<input type="hidden" id="food_price" name="food_price" value="'.$row[2].'" minlength="1" class="form-control-menu">
										<input type="number" id="quantity" name="quantity" value="1" min="1" class="form-control-menu">
									<button type="submit" class="btn btn-default1 rounded-circle" >
										<i class="fa fa-shopping-cart text-white " ></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		';
		}
	}

}
/**end***/


	
/*************************************************/
/****************addtocart ***************/
/*************************************************/

if($page == "addtocart"){
	$food_id = $_POST["food_id"];
	$food_name = $_POST["food_name"];
	$food_price = $_POST["food_price"];
	$quantity = $_POST["quantity"];
	$total_price = $food_price*$quantity;
	$discount = "";

	if(isset($_SESSION['username'])){

			/**********************check user exist************************/
		
		$check = mysqli_query($conn, "select * from cart where food_id = '$food_id' and order_by = '$username_session'");
		if (mysqli_num_rows($check)>0) {
			echo '<script>alert("Food already added to cart");
				window.location="index.php";</script>';

			exit;
		}

		if($quantity >= 50){
			$discount = (2/100)*$total_price;
			$total_price = $total_price - $discount;
		}

		$insertQuery = mysqli_query($conn, "insert into cart values('','$food_id','$username_session','$food_name','$quantity','$food_price','$discount','$total_price')");
		if($insertQuery){
			echo '<script>window.location="index.php";</script>';
			exit;
			
			}
	}
	else{
		echo '<script>window.location="login.php";</script>';
    	exit;
	}

	

}
/**end***/

	
/*************************************************/
/****************get_cartcount ***************/
/*************************************************/

if($page == "get_cartcount"){
	if(isset($_SESSION['username'])){
		$countQuery = mysqli_query($conn, "select count(cart_id) as count from cart where order_by = '$username_session'");
		if (mysqli_num_rows($countQuery)>0) {
			$row = mysqli_fetch_array($countQuery);
			echo $row[0];
		}else{
			echo "0";
		}
	}else{
		echo '<script>window.location="login.php";</script>';
    	exit;
	}
}

	
/***************************************/
	/*********fetchcart**********/
	/***************************************/

	if($page == "fetch_cart"){
		echo'
		<table class="table  table-striped table-hover" id="datatable">
			<thead>
				<tr>
					<th>S/N</th>
					<th>Name</th>
					<th>Unit price</th>
					<th>Quantity</th>
					<th>Discount</th>
					<th>Total price</th>
					<th>Decrease Qty</th>
					<th>Increase Qty</th>
					<th>Drop</th>															
				</tr>
			</thead>   
			<tbody>';
		$query = mysqli_query($conn, "select * from cart where order_by = '$username_session'");
		if(mysqli_num_rows($query) > 0){
		$n = 1; $_SESSION['totalamount'] = 0; $_SESSION['discount'] = 0;
		while($row = mysqli_fetch_array($query)){
			$_SESSION['cart_id'] = $row[0];
			echo '
			<form action="">
				<tr>
					<td>'.$n.'</td>
					<td>'.$row[3].'</td>
					<td>'.number_format($row[5],2).'</td>
					<td>'.$row[4].'</td>
					<td>'.number_format($row[6],2).'</td>
					<td>'.number_format($row[7],2).'</td>
					<td><a href="javascript:void(0)" class="badge badge-warning" onclick="decreaseqty(\''.$row[0].'*'.$row[4].'*'.$row[5].'\')"><i class="fa fa-minus "></i></a>
					</td>
					<td><a href="javascript:void(0)" class="badge badge-primary" onclick="increaseqty(\''.$row[0].'*'.$row[4].'*'.$row[5].'\')"><i class="fa fa-plus"></i></a>
					</td>					
					<td><a href="javascript:void(0)" class="badge badge-danger" onclick="dropcart(\''.$row[0].'\')"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			</form>

			';
	
		$n++; $_SESSION['totalamount'] = $_SESSION['totalamount'] + $row[7];
				$_SESSION['discount'] = $_SESSION['discount'] + $row[6];
		} echo'</tbody>
		</table>
		<div>
			<h2 class="float-left">Total amount: <strong> NGN <span class="font-weight-bold">'.number_format($_SESSION['totalamount'],2).'</span></strong></h2>
			
			<button onclick="order();" class="btn btn-default float-right ml-4">
				<i class="fa fa-money text-white "> </i> Proceed with Order
			</button>
			<button onclick="emptycart();" class="btn btn-danger float-right">
				<i class="fa fa-trash-o text-white "> </i> Empty cart
			</button>
		</div>
		';
				}else{
	echo'<div class="alert alert-info">
	cart is empty!</div>';
	
	}
	}/*end*/


	/***************************************/
/***************increase qty***************/
	/***************************************/

	if($page == "increementqty"){

		$cart_id = validate_input($_POST["cart_id"]);
		$qty = validate_input($_POST["qty"]);
		$unitprice = validate_input($_POST["unitprice"]);
		$totalprice = $qty*$unitprice;
		$discount = "";

		if($qty >= 50){
			$discount = (2/100)*$totalprice;
			$totalprice = $totalprice - $discount;
		}

		$qtyQuery = mysqli_query($conn, "update cart set quantity='$qty',  discount='$discount', total_price = '$totalprice' where cart_id = '$cart_id'");
		if($qtyQuery){
			echo 'success';			
		}else{
			echo 'failed';
		}
	
	
	}/*end*/


	
	/***************************************/
/***************decrease qty***************/
	/***************************************/

	if($page == "decreementqty"){

		$cart_id = validate_input($_POST["cart_id"]);
		$qty = validate_input($_POST["qty"]);
		$unitprice = validate_input($_POST["unitprice"]);
		$totalprice = $qty*$unitprice;
		$discount = "";

		if($qty >= 50){
			$discount = (2/100)*$totalprice;
			$totalprice = $totalprice - $discount;
		}

		$qtyQuery = mysqli_query($conn, "update cart set quantity='$qty', discount='$discount', total_price = '$totalprice' where cart_id = '$cart_id'");
		if($qtyQuery){
			echo 'success';			
		}else{
			echo 'failed';
		}
	
	
	}/*end*/


	/***************************************/
/***************crop cart***************/
	/***************************************/

	if($page == "dropcart"){

		$cart_id = validate_input($_POST["cart_id"]);

		
		$cartQuery = mysqli_query($conn, "delete from cart where cart_id = '$cart_id'");
		if($cartQuery){
			echo 'success';			
		}else{
			echo 'failed';
		}
	
	
	}/*end*/

	
	/***************************************/
/***************empty cart***************/
	/***************************************/

	if($page == "emptycart"){
		
		$cartQuery = mysqli_query($conn, "delete from cart where order_by = '$username_session'");
		if($cartQuery){
			echo 'success';			
		}else{
			echo 'failed';
		}
	
	
	}/*end*/

	
	
// /*************************************************/
// /****************payment ondelivery***************/
// /*************************************************/

	if($page == "ondelivery"){
		$order_id = strtoupper(uniqid());
		$datetime_delivery = $_POST['datetime_delivery'];
		$deliveryto = $_POST['deliveryto'];
		$deliverycontact = $_POST['deliverycontact'];
		$deliveryaddress = $_POST['deliveryaddress'];

		$cartQuery = mysqli_query($conn, "select * from cart where order_by = '$username_session'");
		if(mysqli_num_rows($cartQuery) > 0){

			$totalamount = $_SESSION['totalamount'];
			$discount = $_SESSION['discount'];

			$orderQuery = mysqli_query($conn, "insert into `order` values('$order_id','$username_session','$discount','$totalamount',NOW(),'active','unpaid','$datetime_delivery')");
			if($orderQuery){
				while($cartrow = mysqli_fetch_array($cartQuery)){
					$orderDetailQuery = mysqli_query($conn, "insert into order_detail values('','$order_id', '$cartrow[1]','$cartrow[4]','$cartrow[5]','$cartrow[7]')");			
				}
				mysqli_query($conn, "insert into delivery values('','$order_id', '','$deliveryto','$deliverycontact','$deliveryaddress','undelivered','')");
				$cartQuery = mysqli_query($conn, "delete from cart where order_by = '$username_session'");
				// unset($_SESSION['totalamount']);
				echo $order_id;
			}else{
				echo 'failed';
			}
		}
	
	} 
	// end

	
// /*************************************************/
// /****************payment online***************/
// /*************************************************/

if($page == "onlinepayment"){
	$order_id = strtoupper(uniqid());

	$firstnumber = $_POST['firstnumber'];
	$secondnumber = $_POST['secondnumber'];
	$thirdnumber = $_POST['thirdnumber'];
	$fourthnumber = $_POST['fourthnumber'];
	$deliveryto = $_POST['deliveryto'];
	$deliverycontact = $_POST['deliverycontact'];
	$deliveryaddress = $_POST['deliveryaddress'];
	$expirymonth = $_POST['expirymonth'];
	$expiryyear = $_POST['expiryyear'];
	$cvv = $_POST['cvv'];
	$datetime_delivery = $_POST['datetime_delivery'];
	$cardnumber = $firstnumber.$secondnumber.$thirdnumber.$fourthnumber;
	

	$cartQuery = mysqli_query($conn, "select * from cart where order_by = '$username_session'");
	if(mysqli_num_rows($cartQuery) > 0){

		$totalamount = $_SESSION['totalamount'];
		$discount = $_SESSION['discount'];
		$orderQuery = mysqli_query($conn, "insert into `order` values('$order_id','$username_session','$discount','$totalamount',NOW(),'active','unpaid','$datetime_delivery')");
		if($orderQuery){
			while($cartrow = mysqli_fetch_array($cartQuery)){
				$orderDetailQuery = mysqli_query($conn, "insert into order_detail values('','$order_id', '$cartrow[1]','$cartrow[4]','$cartrow[5]','$cartrow[7]')");			
			}
			
			$paymentQuery = mysqli_query($conn, "insert into payment values('','$order_id', '$totalamount','$username_session',NOW(),'online')");

			if($paymentQuery){
				$payment_id = mysqli_insert_id($conn);
				$cardQuery = mysqli_query($conn, "insert into creditcard values('','$cardnumber', '$cvv','$expirymonth','$expiryyear','$payment_id')");
				if($cardQuery){	
					$deliveryQuery = mysqli_query($conn, "insert into delivery values('','$order_id', '','$deliveryto','$deliverycontact','$deliveryaddress','undelivered','')");
					if($deliveryQuery){
						$cartQuery = mysqli_query($conn, "delete from cart where order_by = '$username_session'");
						unset($_SESSION['totalamount']);
						unset($_SESSION['discount']);
						$orderQuery = mysqli_query($conn, "update `order` set payment_status= 'paid' where order_id = '$order_id' ");
						echo $order_id;
					}else{
						echo 'failed';
					}
				}
			}
		}
			
	}

}
// end


/***************************************/
	/*********fetch myorders**********/
	/***************************************/

	if($page == "fetch_myorders"){
		$orderQuery = mysqli_query($conn, "select * from `order` where order_by = '$username_session'");
		if(mysqli_num_rows($orderQuery) > 0){
			$n = 1; 
			while($row = mysqli_fetch_array($orderQuery)){
				$data = $row[0].'*'.$row[6];
				$deliveryQuery = mysqli_query($conn, "select delivery_status from delivery where order_id = '$row[0]'");
				$time = date('Y M d H:i:sa', strtotime($row[3]));
				if(mysqli_num_rows($deliveryQuery) > 0){
					$devs = mysqli_fetch_array($deliveryQuery);
					echo '<tr>
					<td>'.$n.'</td>
					<td>'.$row[1].'</td>
					<td>'.$row[2].'</td>
					<td>'.$row[3].'</td>
					<td>'.$time.'</td>
					<td>'.$devs[0].'</td>
					<td><a href="javascript:;"  onclick="vieworder(\''.$data.'\')" class="badge badge-primary "><i class="fa fa-eye"></i></a>
					</td>
				</tr>';
				}else{
					echo '<tr>
					<td>'.$n.'</td>
					<td>'.$row[1].'</td>
					<td>'.$row[2].'</td>
					<td>'.$row[3].'</td>
					<td>'.$time.'</td>
					<td>undelivered</td>
					<td><a href="javascript:;"  onclick="vieworder(\''.$data.'\')" class="badge badge-primary "><i class="fa fa-eye"></i></a>
					</td>
				</tr>';
				}

			$n++;
			}echo '</table>';
		}else{
			echo'<div class="alert alert-danger">
			No order recorded!</div>';

	}
}/*end*/


/***************************************/
	/*********fetch orderdetails**********/
	/***************************************/

	if($page == "fetch_orderdetails"){
		$order_id = $_POST['order_id'];
		$expdate = $_POST['expdate'];

			echo'
			<!-- title row -->
			<!-- info row -->
			<div class="row invoice-info mb-5">';
			$paymentQuery = mysqli_query($conn, "select * from payment as p join delivery as d on p.order_id = d.order_id where p.order_id = '$order_id'");
			if(mysqli_num_rows($paymentQuery) > 0){
				$dpay = mysqli_fetch_assoc($paymentQuery);
				$payment_date = date('Y M d, H:i:sa', strtotime($dpay['payment_date']));
				$delivery_date = date('Y M d, H:i:sa', strtotime($dpay['delivery_date']));
				$expdate = date('Y M d, H:i:sa', strtotime($expdate));

				echo '<div class="col-sm-6 invoice-col">
				<h2> Payment</h2>
					<div>
						<div><strong>Status:</strong><span class="status small">  Paid</span></div>
						<div><strong>Amount:</strong><span class="amount small">  '.$dpay['amount'].'</span></div>
						<div><strong>Type:</strong><span class="type small">  '.$dpay['payment_type'].'</span></div>
						<div><strong>Date:</strong><span class="date small">  '.$payment_date.'</span></div>
						<div><strong>Paid by:</strong><span class="paidby small">  '.$dpay['paid_by'].'</span></div>					
					</div>

				</div>
				<!-- /.col -->
				<div class="col-sm-6 invoice-col">
				<h2>Delivery</h2>
					<div><strong>Status:</strong><span class="status small">  '.$dpay['delivery_status'].'</span></div>
					<div><strong>Deliver by:</strong><span class="deliverby small">  '.$dpay['deliver_by'].'</span></div>
					<div><strong>Deliver to:</strong><span class="deliverto small">  '.$dpay['deliver_to'].'</span></div>
					<div><strong>Contact:</strong><span class="contact small">  '.$dpay['delivery_contact'].'</span></div>
					<div><strong>Address:</strong><span class="address small">  '.$dpay['delivery_address'].'</span></div>
					<div><strong>Actual delivery date:</strong><span class="actualddate small">'.$expdate.'</span></div>
					<div><strong>Delivery date:</strong><span class="deliverydate small">  '.$delivery_date.'</span></div>

				</div>
				<!-- /.col -->';
			}else{
				echo'
					<div class="col-sm-6 invoice-col">
						Payment: unpaid
					</div>
					<div class="col-sm-6 invoice-col">
						Delivery: undelivered
					</div>
				';
			}
		echo'</div>
			<!-- /.row -->

			<!-- Table row -->
			
				<div class="  table">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>S/N</th>
						<th>Food</th>
						<th>Quantity</th>
						<th>Price per food</th>
						<th>Total price</th>
					</tr>
					</thead>
					<tbody>';
					$orderDetailQuery = mysqli_query($conn, "select * from order_detail where order_id = '$order_id'");
					
					if(mysqli_num_rows($orderDetailQuery) > 0){
						$n = 1;
						while($row = mysqli_fetch_assoc($orderDetailQuery)){
							$food_id = $row['food_id'];
							$foodQuery = mysqli_query($conn, "select * from food where food_id = '$food_id'");
							$foodrow = mysqli_fetch_assoc($foodQuery);
							echo'<tr>
							<td>'.$n.'</td>
							<td>'.$foodrow['food_name'].'</td>
							<td>'.$row['quantity'].'</td>
							<td>'.$row['price_per_food'].'</td>
							<td>'.$row['total_price'].'</td></tr>';
							$n++;
						}
					}

					echo '</tbody>
				</table>
								
			</div>

	
			';
}/*end*/



	
/***************************************/
	/*********review*********/
	/***************************************/
	if($page == "customer_review"){
		$comment = mysqli_real_escape_string($conn,$_POST['comment']);
		$user_id = $_SESSION['user_id'];


		$insert = mysqli_query($conn, "insert into review values('', '$comment', '$user_id', NOW())");
		if($insert){
			echo 'success';
		}else{
			echo 'failed';
		}	
	
	}/*end*/


	
/***************************************/
	/*********fetch review*********/
	/***************************************/
	if($page == "fetch_customer_review"){

		$query = mysqli_query($conn, "select * from review");
		if(mysqli_num_rows($query) > 0){
		   while($row = mysqli_fetch_assoc($query)){
			$time = date('d M Y, h:ia', strtotime($row['date']));
			if($row['customer_id'] != 'admin'){
				$id = $row['customer_id'];
				$selectQuery = mysqli_query($conn, "select customer_name from customer where customer_id = '$id'");
				if(mysqli_num_rows($selectQuery)>0){
					$row_name = mysqli_fetch_assoc($selectQuery);
				
			   echo '
			   <!-- customer container -->
			   <div id="customer-container" class="mt-2">
				   <div class="customer-id float-left mr-2"> '.$row_name['customer_name'].'<span class="date-time"> ('.$time.')</span></div>
				   <div class="customer-review"> '.$row['review'].'</div>
			   </div>';
			   }
			}
			else{
				echo '
			   <!-- admin container -->
			   <div id="admin-container" class="mt-2">
					<div class="admin-id float-right"> Admin <span class="date-time"> ('.$time.')</span></div>
					<div class="admin-review ">'.$row['review'].'</div> 
			   </div>  
			   ';
			}
		   }
		}
	}/*end*/





