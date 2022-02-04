<?php 
ob_start();
$page="Cart";
include_once('dbconn.php');
include_once('header.php');
if(isset($_SESSION['user'])){
  $userid=$_SESSION['user'];
  $sqlfullcart="select * from tblcart where uid=$userid";
  $resultfullcart=mysqli_query($conn,$sqlfullcart) or die(mysqli_error($conn));
}
else{
  header('location:login.php');
}
?>  
    <!-- BREADCRUMB -->
  <div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Shopping Cart </li>
      </ul>
    </div>
  </div>
    <!-- /BREADCRUMB -->
  
  <!-- CONTAIN START -->
  <section class="ptb-50">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 mb-xs-30">
          <div class="cart-item-table commun-table">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody >
                    <?php 
                    $fulltotal=0;
                      while($rowfullcart=mysqli_fetch_assoc($resultfullcart)){
                        $sqlcartproduct="select * from tblproduct where id=".$rowfullcart['pid'];
                        $resultcartproduct=mysqli_query($conn,$sqlcartproduct) or die(mysqli_error($conn));
                        $rowcartproduct=mysqli_fetch_assoc($resultcartproduct);
                        echo '<tr>
                    <td><div class="product-image product-image-small"><a href="product-page.php?product='.$rowcartproduct['id'].'">
                      <img alt="'.$rowcartproduct['producttitle'].'" src="img/products/'.$rowcartproduct['productprimaryimage'].'"></a></div></td>
                    <td><div class="product-title"> <a href="product-page.php?product='.$rowcartproduct['id'].'">'.$rowcartproduct['producttitle'].'</a> </div>
                    </td>
                    <td><div class="base-price price-box"> $'.$rowcartproduct['productofferprice'].'</span> </div></td>
                    <td class="center">';
                    if($rowfullcart['size']=="No Size"){}
                      else {
                        echo 
                        $rowfullcart['size'];
                    }
                     echo 
                  '</td>
                    <td class="center">
                    '.$rowfullcart['qty'].' 
                    </td>
                    <td><div class="total-price price-box">  $';
                    $subtotal=$rowfullcart['qty']*$rowcartproduct['productofferprice'];
                    echo $subtotal.'</span> </div></td>
                    <td><i title="Remove Item From Cart" data-value="'.$rowfullcart['id'].'" class="fa fa-trash cart-remove-item" id="deletecartproduct"></i></td>
                  </tr>
                        ';
                      $fulltotal+=$subtotal;
                      }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="mtb-30">
        <div class="row">
          <div class="col-sm-12">
            <div class="cart-total-table commun-table">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Cart Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Item(s) Subtotal</td>
                      <td><div class="price-box">  $<?php 
                      echo $fulltotal;
                      ?>.00</span> </div></td>
                    </tr>
                    <tr>
                      <td>Shipping</td>
                      <td><div class="price-box">   $ 10.00</span> </div></td>
                    </tr>
                    <tr>
                      <td><b>Amount Payable</b></td>
                      <td><div class="price-box"> <b> $<?php $Totalamount=$fulltotal+10; echo $Totalamount;?>.00</b></span> </div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="mb-30">
        <div class="row">
          <div class="col-sm-6">
            <div class="mt-30"> <a href="shop.php" class="btn btn-black"><span><i class="fa fa-angle-left"></i></span> Continue Shopping</a> </div>
          </div>
          <div class="col-sm-6">
            <div class="mt-30 right-side float-none-xs"> <a href="checkout-2.php" class="btn btn-black">Proceed to checkout<span> <i class="fa fa-angle-right"></i></span></a> </div>
          </div>
        </div>
      </div>
      
      <hr>
    </div>
  </section><?php include_once('footer.php');?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#deletecartproduct").click(function(){
      var deletecartid=$(this).data('value');
      console.log(deletecartid);
      $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "deletecartid="+deletecartid,
            success: function (response) {
                location.reload();
            },
        });
    });
  });

</script>