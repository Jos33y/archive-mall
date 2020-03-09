<?php
        $active ='Shop';
        include("includes/header.php");
?>
</nav>
</header>
<div id="content"><!-- content Begin -->
    <div class="container-fluid"><!-- container Begin -->
    <div class="row">
        <div class="col-sm-12"><!-- col-md-12 Begin -->
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb"><!-- breadcrumb Begin -->
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Showroom
                </li>
            </ol><!-- breadcrumb Finish -->
</nav>
        </div><!-- col-md-12 Finish -->
</div>

<?php
                     if(isset($_POST['search'])){

                        $word = $_POST['text'];
                
                        $get_products = "select * from products where product_title='$word'";
                
                        $run_products = mysqli_query($con, $get_products);
                
                        $count = mysqli_num_rows($run_products);
                
                        if($count==0){
                
                            echo "
                
                                <div class='box'>
                                        <h3> No Products Found </h3>
                                </div>
                            
                            ";
                
                        }else{
                
                            echo "
                            <div class='container row justify-content-center'>
                            
                            <h2 class='text-center'> Search result for '$word' </h2>
                            <br>
                            <br>
                      
                            </div>
                         
                            <div class='container'><!-- container begin -->
                            <div class='row'><!-- row begin -->
                ";
                        }
                       
                                
                
                        while($row_products= mysqli_fetch_array($run_products)){
                            
                            $pro_id = $row_products['product_id'];
                
                            $pro_title = $row_products['product_title'];
                
                            $pro_price = $row_products['product_price'];
                
                            $pro_img1 = $row_products['product_img1'];
                
                            $pro_label = $row_products['product_label'];
                
                        echo "
                             <td>
                             <div class='mix col-lg-3 col-md-6 new'>
                             <div class='product-item'>
                                 <figure>
                                 <img class='img-fluid' src='admin_area/product_images/$pro_img1' alt='product_image'>
                                 <div class='bache'>$pro_label </div>
                                 </figure>
                                 <div class='product-info'>
                                 <h6>$pro_title </h6>
                                 <p>&#8358;$pro_price</p>
                                 <a href='details.php?pro_id=$pro_id' class='site-btn btn-line'>ADD TO CART</a>
                                 </div>
                             </div>
                         </div>
                                    
                                        ";
                
                                        }
                                                        echo"  </div><!-- row finish -->
                                                        </div><!-- container-fluid finish -->
                                        
                                    </div>
                
                                            ";
                        
                    }
                     
                    ?>
            </div>
</div>
                
        </div><!-- col-sm-9 Finish -->

</div>        <!--row finish -->
    </div><!-- container Finish -->
</div><!-- content Finish -->

<?php

        include("includes/footer.php");

        ?>



   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>