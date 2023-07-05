<?php 
require_once("connection/connectDB.php");

if(isset($_GET['token'])){
    $order_id = $_GET['token'];
    
       

?>

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

<body class="sub_page">

  <div class="hero_area">
        <!-- cart section -->
        <section class="receipt_section layout_padding" >
                    <!--start container-->
                <div class="container" id="main" style="border: 2px solid #ccc;">
                <div class="text-center">
                    <img src="images/damau-logo.png" alt="logo" srcset="" class="imag-circle">
                    <h1>Damau Dairy Milk Payment Receipt</h1>
                </div>
                    
                    <hr class="divider">
                    <ul style="list-style-type: none; font-weight: bold;">
                    <?php 
                    $orderQuery = mysqli_query($conn, " select o.order_id, o.discount, o.total_amount, o.order_date, c.customer_name from `order` as o join customer as c on o.order_by=c.customer_id where o.order_id = '$order_id'");
                    if(mysqli_num_rows($orderQuery) > 0){
                        $row = mysqli_fetch_assoc($orderQuery);
                        $date = date('Y M d, H:i:sa', strtotime($row['order_date']));
                            echo'
                        <li>Order ID: <span>'.$row['order_id'].'</span></li>
                        <li>Date : <span>'.$date.'</span></li>
                        <li>Issuedd To: <span>'.$row['customer_name'].'</span></li>
                    </ul>
                        <div id="table">
                            <table class="table  table-stripe table-hover table-bordered">
                                <thead>
                                   <tr>								
                                        <th>S/N</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody id="myorder-table">';
                    ?>
                                     <?php
                                    $orderDetailQuery = mysqli_query($conn, " select f.food_name, d.quantity, d.price_per_food, d.total_price from order_detail as d join food as f on d.food_id=f.food_id where order_id = '$order_id'");
                                    if(mysqli_num_rows($orderDetailQuery) > 0){
                                        $n = 1;
                                        while($row1 = mysqli_fetch_assoc($orderDetailQuery)){
                                            echo '
                                            <tr>	
                                                <td>'.$n.'</td>							
                                                <td>'.$row1['food_name'].'</td>
                                                <td>'.$row1['quantity'].'</td>
                                                <td>'.$row1['price_per_food'].'</td>
                                                <td>'.$row1['total_price'].'</td>
                                            </tr>
                                            ';

                                            $n++;
                                        }
                                    }?>
                                    
                                </tbody>
                                <div>
                                    <ul style="list-style-type: none; font-weight: bold;" class="float-right">
                                        <li>Discount : <span>NGN <?php echo $row['discount']?></span></li>
                                        <li>Total Due: <span>NGN <?php echo $row['total_amount']?></span></li>
                                        <hr class="divider">
                                    </ul>
                                </div>
                            </table>
                            
                        </div>
                       <div>
                        <button class="btn btn-default mb-4" onclick="window.print();" ><i class="fa fa-print"></i> Print</button>
                    </div>
                    
                    <?php
                            }
                        }
                    
                    ?>
                    </div>
                    <!--end container-->
                    
                </div>
            </section>
            
        </div>
 			
</body>

</html>
 
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

  <script>


  </script>