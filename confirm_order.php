<?php
session_start();

$active = 'Account';

include("includes/dbcon.php");
include("functions/functions.php");

?>

<?php 
$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$firstname = $row_customer['firstname'];

$lastname = $row_customer['lastname'];

$customer_email = $row_customer['customer_email'];

$customer_phone = $row_customer['customer_phone'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Archive Mall</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://kit.fontawesome.com/dcfefef11a.js"></script>
 

   <!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
   
    <!-- Stylesheets -->

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
  	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	  <link rel="stylesheet" type="text/css" href="css/flaticon.css"/>
	  <link rel="stylesheet" href="css/slicknav.min.css"/>
	  <link rel="stylesheet" href="css/jquery-ui.min.css"/>
	  <link rel="stylesheet" href="css/owl.carousel.min.css"/>
	  <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="styles/style.css"/>

</head>


<body>
  <!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
      
        <!-- Header Section -->
      <header class="header-section">
            <div class="top-header-top">
          <div class="header-top">
                 
              <div class="row justify-content-center">
                <div class="col-lg-2 text-center text-lg-left">
                  <!-- logo -->
                  <a href="./index.php" class="site-logo">             
                 
                  <span class="logo-head">Archive Mall </span>
                  </a>
                </div>
                  <div class="col-xl-6 col-lg-5">
                  <form  method="POST" class="header-search-form" action="search.php" >
                      <input type="text" name="text" placeholder="Search on Archive Mall...">
                      <button type="submit" name="search"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-5">
                <div class="user-panel">
                  <div class="up-item">
                    <i class="fa fa-user"></i>
                    <?php 
                
                if(!isset($customer_email)){

                    echo  "<a href='customer_login.php'> Sign In or</a> <a href='customer_register.php'> Sign Up</a>";
                  }else{
                    echo "<a href='logout.php'> Log Out </a>";
       
                }
                
               ?>
                </li>
                   
                  </div>
                  <div class="up-item">
                    <div class="shopping-card">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                      <span><?php items(); ?></span>
                    </div>
                    <a href="cart.php">Cart</a>
                  </div>
                </div>
              </div>
              </div>
       
			</div>
    </div> 
    
    <nav class="navbar navbar-dark navbar-expand-md  sticky-top">
        <div class="container-fluid">     

            <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon my-toggler "></span>
              </button>
              <div class="collapse navbar-collapse"></div>

              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
                      <li class="nav-item <?php if($active=='Home') echo'active'; ?>"><a class="nav-link" href="index.php" >Home</a></li>
                      <li class="nav-item dropdown <?php if($active=='Shop') echo'active';?>">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" data-target="#showroom"
                      aria-haspopup="true" aria-expanded="false">
                                  Showroom
                                </a>
                                <ul id="showroom" class="dropdown-menu">
                                  <li>
                                    <a  class='dropdown-item' href='showroom.php'>Showroom </a>
                                  </li>
                                  <?php getPCats(); ?>
                               </ul>                                                                             
                              </li>
                    <li class="nav-item <?php if($active=='Account') echo'active'; ?>">
                          <?php        
                             if(!isset($_SESSION['customer_email'])){

                                    echo  "<a class='nav-link' href='customer/my_account.php'> My Account</a>";

                                  }else{
                                    echo "<a class='nav-link' href='customer/my_account.php?my_orders'> My Account </a>";
                      
                                }

                              ?>

                    </li>

                      <li class="nav-item"><a class="nav-link <?php if($active=='Shopping Cart') echo'active';?>" href="cart.php" >Shopping Cart</a></li>
                     
                      <li class="nav-item"><a class="nav-link <?php if($active=='Contact Us') echo'active'; ?>" href="contactus.php" >Contact Us</a></li>
                     
                    </ul>
                              </div> 
        </div>
    </nav>
      </header>

<div id="content"><!-- content Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row checkout justify-content-center">
        <div class="col-md-8"><!-- col-sm-9 Begin -->
        <?php

                $ip_add = getRealIpUser();

                $select_cart ="select * from cart where ip_add='$ip_add'";

                $run_cart = mysqli_query($con, $select_cart);

                $count =mysqli_num_rows($run_cart);

            ?>      

<div class="box"><!-- box Begin -->

<form method="post"><!--form Begin -->

<div class="box-header"><!-- box-header Begin -->

    <h6><strong> <i class="fa fa-check-circle"></i> Confirm Order</strong></h6>

    <p class="lead"> Save Transaction reference for Payment Confirmation </p>

</div><!-- box-header Finish -->

      <div class="form-group"><!--form-group Begin -->

            <label for="email" class="control-label"> Email: </label>

            <input type="text" name="c_email" class="form-control" placeholder="Email " value="<?php echo $customer_email; ?>" readonly>

        </div><!--form-group Finish -->

        <div class="form-group"><!--form-group Begin -->


        <div class="table-responsive"><!-- table Responsive Begin -->

                        <table class="table"><!-- table Begin -->

                            <thead><!-- Thead Begin -->
                            
                                <tr>

                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Size</th>         
                                    <th>Amount</th>
                            
                                </tr>
                            </thead><!-- Thead Finish -->

                            <tbody><!-- tbody Begin -->

                            <?php

                            
                                                    $total =0;

                                            while($row_cart = mysqli_fetch_array($run_cart)){

                                            $pro_id = $row_cart['p_id'];

                                            $pro_size = $row_cart['size'];

                                            $pro_qty = $row_cart['quantity'];

                                            $get_products = "select * from products where product_id='$pro_id'";

                                            $run_products = mysqli_query($con, $get_products);

                                            while($row_products=mysqli_fetch_array($run_products)){

                                                $product_title = $row_products['product_title'];

                                                $sub_total = $row_products['product_price']*$pro_qty;

                                                $total += $sub_total;
                                
                            ?>

                                <tr>
                                    <td>
                                        <a href="details.php?pro_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>                          
                                    </td>      

                                    <td>                           
                                    <?php echo $pro_qty; ?>                            
                                    </td> 

                                    <td>                           
                                    <?php echo $pro_size; ?>                             
                                    </td>   

                                    <td>
                                    &#8358;<?php echo $sub_total; ?>                           
                                    </td>    

                                        
                                
                                </tr>
                            
                            <?php } }?>
                            </tbody><!-- tbody Finish -->

                            <tfoot><!-- tfoot Begin -->

                            <tr><!-- tr Begin -->
                                <th colspan="3">Total</th>
                                <th>&#8358; <?php echo $total; ?>  </th>

                            </tr><!-- tr Finish -->

                            </tfoot><!-- tfoot Finish -->

                        </table><!-- table Finish -->

                        </div><!-- table-responsive Finish -->
                        
                        </div><!--form-group Finish -->
   
        <div class="text-center"><!--text-center Begin -->

        <script src="https://js.paystack.co/v1/inline.js"></script>
                            <button type="button" name="pay_now" class="site-btn btn-full" style="margin-bottom: 10vh;" onclick="payWithPaystack()">
                            <i class="fa fa-user-md"></i>   Pay Now
                            </button>
                        </div><!--text-center Finish -->
                                

    </form><!-- Form  Finish -->

</div>
        </div>

</div>

</div>
                            
<?php

        include("includes/footer.php");

        ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>


<script>
  function payWithPaystack(data){
    var handler = PaystackPop.setup({
      key: 'pk_test_6915e45b1bb5261b2fd67ea798081b572cb74753',
      email: '<?php echo $customer_email; ?>',
      amount: <?php echo $total . '00'; ?>,
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "<?php echo $customer_phone; ?>"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
          window.open('orders.php', '_self')
      },
      onClose: function(){
          alert('Transaction Cancelled');
      }
    });
    handler.openIframe();
  }
</script>



