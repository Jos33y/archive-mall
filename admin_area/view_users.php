<?php      

if(!isset($_SESSION['email'])){

   echo "<script>window.open('https://e-acez.com/sign-in.php', '_self')</script>";

}else{

?>



<div class="row"><!-- row Begin for Breadcrumb -->
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Users

            </li>
        </ol>
    </div>
</div><!--row Finish -->

<div class="row"><!-- row Begin for Panel and view products -->
        <div class="col-lg-12 ">    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-tags"></i> View Users 
                    </h3>
                </div>
                <?php 
        $b_name = "archivemall";
   $i=0;
//$get_customer_info = "select * from customer_info where business_name = '$b_name'";

$get_customer_info = "select * from user_db where business_name = '$b_name'";

$run_customer_info = mysqli_query($conn, $get_customer_info);

while($row_customer_info=mysqli_fetch_array($run_customer_info)){

     $admin_id = $row_customer_info['user_id'];

     $first_name = $row_customer_info['first_name'];

     $last_name = $row_customer_info['last_name'];
     
     $image = $row_customer_info['profile_image'];

     $email = $row_customer_info['email'];

     $phone_no = $row_customer_info['phone_number'];

     $address = $row_customer_info['address'];

     $state = $row_customer_info['state'];      
     
     $country = $row_customer_info['country'];   

     $i++;

?>
                <div class="panel-body"><!--Panel Body Begin to view products -->
                <div class="text-center">
                    <h4 style="font-weight: 600;"> User <?php echo $i; ?> </h4>
                </div>
                    <div class="table-responsive"><!--table responsive begin -->
                        <table class="table table-striped table-borderless table-hover"><!--table Begin -->

                            <thead> 
                                <tr>
                                    <th>Full Name </th>
                                    <td> <h5><?php echo $first_name . " " . $last_name ; ?></h5></td>                                                                                                                                                                                                                                              
                                </tr>
                                <tr>
                                    <th>Image </th>
                                    <td> <img src="admin_images/<?php echo $image; ?>" width="100" height="100"> </td>
                                </tr>
                                <tr>
                                    <th>E-mail </th>
                                    <td> <?php echo $email; ?> </td>
                                </tr>
                                <tr>
                                    <th>Phone No </th>
                                    <td> <?php echo $phone_no; ?>  </td>
                                </tr>
                                <tr>
                                     <th>Address </th>
                                     <td><?php echo $address; ?></td>
                                </tr>
                                <tr>
                                     <th>State </th>  
                                     <td> <?php echo $state; ?> </td> 
                                </tr>
                                <tr>
                                    <th>Country </th> 
                                    <td> <?php echo $country; ?> </td> 
                                    
                                </tr>                      
                            </thead>

                        </table><!--table Finish -->
                    </div><!--table responsive Finish -->
                </div><!--Panel Body Finish to view products -->
                <?php } ?>
            </div>
        </div>
</div>

</body>
</html>

<?php } ?> 

