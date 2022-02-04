<?php
ob_start();
$page="Checkout";
include_once('dbconn.php');
include_once('header.php');
if(isset($_SESSION['user'])){
  $userid=$_SESSION['user'];
  if(isset($_POST['paymentsubmit'])){
    $paymentmethod=$_POST['payment_type'];
    $ordernumber=time()."-".rand(000,999);
    $sqluser="select * from tbluser where id=$userid";
    $resultuser=mysqli_query($conn,$sqluser) or die(mysqli_error($conn));
    $rowuser=mysqli_fetch_assoc($resultuser);
    $sqlcart="select * from tblcart where uid=$userid";
    $resultcart=mysqli_query($conn,$sqlcart) or die($conn);
    while($rowcart=mysqli_fetch_assoc($resultcart)){
      $pid=$rowcart['pid'];
      $sqlproduct="select * from tblproduct where id=$pid";
      $resultproduct=mysqli_query($conn,$sqlproduct) or die(mysqli_error($conn));
      $rowproduct=mysqli_fetch_assoc($resultproduct);
      $size=$rowcart['size'];
      $qty=$rowcart['qty'];
      $price=$qty*$rowproduct['productofferprice'];
      $status="Ordered";
      $sqlorder="insert into tblorder values('',$userid,$pid,'$status','$size',$qty,'$paymentmethod',curdate(),$price,'$ordernumber')";
      $test=mysqli_query($conn,$sqlorder) or die(mysqli_error($conn));
      $sqlcartdelete="delete from tblcart where id=".$rowcart['id'];
     $test=mysqli_query($conn,$sqlcartdelete) or die(mysqli_error($conn));
    }
   header("location:order-complete.php?order=$ordernumber");
  }
}
else {
  header("location:login.php");
}
?> 
  
 <!-- BREADCRUMB -->
  <div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li>Checkout</li>
      </ul>
    </div>
  </div><br>
    <!-- /BREADCRUMB -->
  
  <!-- CONTAIN START -->
  <section class="checkout-section ptb-50">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="checkout-step mb-40">
            <ul>
              <li> <a href="checkout-2.php">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">1</div>
                </div>
                <span>Shipping</span> </a> </li>
              <li> <a href="order-overview.php">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">2</div>
                </div>
                <span>Order Overview</span> </a> </li>
              <li class="active"> <a href="payment.php">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">3</div>
                </div>
                <span>Payment</span> </a> </li>
              <li> <a href="order-complete.php">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">4</div>
                </div>
                <span>Order Complete</span> </a> </li>
              <li>
                <div class="step">
                  <div class="line"></div>
                </div>
              </li>
            </ul>
            <hr>
          </div>
          <div class="checkout-content">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part align-center">
                  <h2 class="heading">Select a payment method</h2>
                </div>
              </div>
            </div>
          <form action="#" method="post">
            <div class="row">
              <div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2">
                <div class="payment-option-box mb-30">
                  <div class="payment-option-box-inner gray-bg">
                    <div class="payment-top-box">
                      <div class="radio-box left-side"> <span>
                        <input type="radio" id="cash" value="COD" name="payment_type" required>
                        </span>
                        <label for="cash">Would you like to pay by Cash on Delivery?</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="right-side float-none-xs"> 
                  <button class="btn btn-black" type="submit" name="paymentsubmit">Place Order<span> <i class="fa fa-angle-right"></i></span></button>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  
<?php include_once('footer.php'); ?> 