<?php 
ob_start();
$page="Product";
include_once('dbconn.php');
include_once('header.php');
if(isset($_REQUEST['product'])){
  $product=$_REQUEST['product'];
  $sqlproduct="select * from tblproduct where id=$product";
  $resultproduct=mysqli_query($conn,$sqlproduct) or die(mysqli_error($conn));
  $rowproduct=mysqli_fetch_assoc($resultproduct);
  // Add to Cart Process.
  if(isset($_POST['addtocart'])){
    if(!isset($_SESSION['user'])){
    header('location:login.php?product='.$product); 
    }
    else{
    if(!(isset($_POST['size']))){
    $productsize="No Size"; 
    }else {
    $productsize=$_POST['size'];
    }
    $productqty=$_POST['qty'];
    $userid=$_SESSION['user'];
    echo $product.$productsize.$productqty;
    $sqlinsertcart="insert into tblcart values('',$product,$userid,'$productsize','$productqty',curdate())";
    $test=mysqli_query($conn,$sqlinsertcart) or die(mysqli_error($conn));
    if($test){
    header('location:product-page.php?product='.$product);
    }}
  }

}
else {
  header('location:index.php');
}
?> 

<!-- BREADCRUMB -->
  <div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active"><?php echo $rowproduct['producttitle']; ?></li>
      </ul>
    </div>
  </div><br><br>
    <!-- /BREADCRUMB -->
  
  <!-- CONTAIN START -->
  <?php echo '
  <section class="pt-50">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-5 mb-xs-30">
          <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native"> <a href="#"><img src="img/products/'.$rowproduct['productprimaryimage'].'" alt="'.$rowproduct['producttitle'].'"></a> 
            <a href="#"><img src="img/products/'.$rowproduct['productimage1'].'" alt="'.$rowproduct['producttitle'].'"></a> 
            <a href="#"><img src="img/products/'.$rowproduct['productimage2'].'" alt="'.$rowproduct['producttitle'].'"></a> 
            <a href="#"><img src="img/products/'.$rowproduct['productimage3'].'" alt="'.$rowproduct['producttitle'].'"></a> 
          </div>
        </div>
        <div class="col-md-7 col-sm-7">
          <div class="row">
            <div class="col-xs-12">
              <div class="product-detail-main">
                <div class="product-item-details">
                  <h1 class="product-item-name">'.$rowproduct['producttitle'].'</h1>
                    <div class="product-rating" style="margin-top:10px">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o empty"></i>
              </div><br>
                  <div class="price-box"> <span class="price fa fa-rupee-sign">'.$rowproduct['productofferprice'].'</span> <del class="price old-price fa fa-rupee-sign">'.$rowproduct['productprice'].'</del> </div>
                  <div class="product-info-stock-sku">
                  <form action="#" method="post">
                    <div>
                      <label style="font-size:20px">Availability: </label>
                      <span class="info-deta">';if($rowproduct['producttotalunits']>=1){ echo 'In stock'; } else { echo 'Out of Stock'; } echo '</span> </div>
                    
                  <p style="max-height:20ch; overflow:hidden;">'.$rowproduct['productdescription'].'</p>
                  '; 
                  if($rowproduct['psid']==1){ echo ' '; }
                    else{
                      $sqlsize="select * from tblsizechart where id=".$rowproduct['psid'];
                      $resultsize=mysqli_query($conn,$sqlsize) or die(mysqli_error($conn)); 
                      $rowsize=mysqli_fetch_assoc($resultsize);
                      $sizearray=explode(',',$rowsize['size']);
                      $i=0; 
                    echo '
                    <div class="product-size select-arrow mb-20 mt-30">
                    <label>Size</label>
                    <select class="selectpicker form-control" id="select-by-size" name="size" required>
                    <option value=""> Select Size </option>'; 
                      while(!empty($sizearray[$i])){
                        echo '
                      <option value="'.$sizearray[$i].'">'.$sizearray[$i].'</option>
                            '; 
                        $i++;
                    }
                      echo '
                      </select>
                  </div>';
                    } 
                      ?>
                    <div class="mb-40"><br><br>
                    <div class="product-qty"> 
                        <label for="qty">Qty:</label>
                        <div class="custom-qty">
                          <input type="number" class="input-text qty" title="Qty" value="1" min="1" max="<?php echo $rowproduct['producttotalunits']; ?>" name="qty">
                        </div>
                    </div>
                    <div>
                           <button type="submit" title="Add to Cart" class="btn-black" name="addtocart"><span></span>Add to Cart</button>
                     </div>
                  </div>
          
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> <br><br>
  <section class="ptb-50">
    <div class="container">
      <div class="product-detail-tab">
        <div class="row">
          <div class="col-md-12">
            <div id="tabs">
              <ul class="nav nav-tabs">
                <li><a class="tab-Description selected" title="Description">Description</a></li>
              </ul>
            </div>
            <div id="items">
              <div class="tab_content">
                <ul>
                  <li>
                    <div class="items-Description selected gray-bg">
                      <div class="Description"> 
                        <?php echo $rowproduct['productdescription']; ?>
                      </div>
                    </div>
                  </li>
                
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><br><br>

  <!-- CONTAINER END --> 
<?php include_once('footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    //To send CategoryId and receiving Subcategories IN ADDPRODUCT
    $('#select-by-size').on("change",function () {
        var size = $(this).find('option:selected').val();
        var product= <?php echo $rowproduct['id']; ?>;
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "size="+size+','+product,
            success: function (response) {
                console.log(response);
                $(".product-qty").html(response);
            },
        });
    });
  });
</script>