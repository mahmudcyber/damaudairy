<?php include "header1.php";
// session_start();
// echo $_SESSION['username'];

?>

  <!-- cart section -->
  <section class="cart_section layout_padding">
            <!--start container-->
		<div class="container" id="main">
          <div>
            <a style="margin-left: 4px" class="btn btn-default m-l-20"  title=" place order" href="index.php"><span class="fa fa-plus-circle "></span> Continue order</a>
          </div>
            <hr class="divider">
            <h2 class="header">My Order</h2>
                <div id="table">
					<table class="table  table-stripe table-hover">
						<thead>
							<tr>								
								<th>S/N</th>
								<th>Order by</th>
								<th>Discount</th>
								<th>Total amount</th>
								<th>Order date</th>
								<th>Delivery status</th>
								<th>View</th>		
							</tr>
						</thead>
						<tbody id="myorder-table">

						</tbody>
					</table>
                </div>
          
        <!--end container-->
    </div>
  </section>
  <!-- end cart section -->
  	
		<!-- Modal -->
		<div class="modal rounded" id="orderdetailmodal" role="dialog">
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-header d-flex justify-content-between">
							<i class="fa fa-close" data-dismiss="modal"></i>
							<h2>
								<i class="fa fa-shopping-cart"></i> Order Details.
							</h2>
						</div>
						<div class="modal-body">
							<section class="content order_detail">
								                                          
							</section>
						</div>
					</div>
				</div>
			</div> <!-- end of modal -->				
    </div>

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


// fetch paidorder
let fetchpaidorder = (()=>{
	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=fetch_myorders',
		success: function(result){
			$('#myorder-table').html(result);
		}
	});

}); fetchpaidorder();


let vieworder = ((a)=>{
	let data = a.split('*');
	let order_id = data[0];
	let expdate = data[1];

	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=fetch_orderdetails' + '&order_id=' + order_id + '&expdate=' + expdate,
		success: function(result){
			$('#orderdetailmodal').modal({backdrop: 'static'});
			$('.order_detail').html(result);
		}
	});

});


  </script>