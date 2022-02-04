<?php 
ob_start();
$page="Checkout";
include_once('dbconn.php');
include_once('header.php');
if(isset($_SESSION['user'])){
  // To  update User Account Information
  $userid=$_SESSION['user'];
  $sql="select * from tbluser where id=$userid";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));  
  $row=mysqli_fetch_assoc($result);
  if(isset($_REQUEST['submit'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $number=$_POST['number'];
  $address=$_POST['address'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $pincode=$_POST['pincode'];
  $sqlupdateuser="update tbluser set userfname='$fname', userlname='$lname', useremail='$email', userphone='$number', useraddress='$address', userstate='$state', usercity='$city', userpincode='$pincode' where id=$userid";
  $test=mysqli_query($conn,$sqlupdateuser) or die(mysqli_error($conn));
  if($test){
    header("location:order-overview.php");
  }
}
}
else{
  header('login.php');
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
  <section class="checkout-section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="checkout-step mb-40">
            <ul>
              <li class="active"> <a href="checkout-2.php">
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
              <li> <a href="payment.php">
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
          <div class="checkout-content" >
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part align-center">
                  <h2 class="heading">Please fill up your Shipping details</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2">
                <form class="main-form full" action="#" method="post">
                <div class="mb-20">
                  <div class="row">
                    <div class="col-xs-12 mb-20">
                      <div class="heading-part">
                        <h3 class="sub-heading">Shipping Address</h3>
                      </div>
                      <hr>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" required name="fname" placeholder="First Name" value="<?php echo $row['userfname']; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="lname" required placeholder="Last Name" value="<?php echo $row['userlname']; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="email" name="email" required placeholder="Email Address" value="<?php echo $row['useremail']; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="number" required placeholder="Contact Number" value="<?php echo $row['userphone']; ?>">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Shipping Address" name="address" value="<?php echo $row['useraddress']; ?>">
                        <span>Please provide the number and street.</span> </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="country" value="Canada" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6" style="height: 65px">
                      <div class="input-box">
                        <select name="state" id="shippingstateid">
                          <?php 
                          if($row['userstate']!=""){
                          echo '<option value="'.$row['userstate'].'" selected>'.$row['userstate'].'</option>'; } ?>
                          <option value=" ">Select a Province</option>
                          <option value="Alberta">Alberta</option>
                          <option value="Manitoba">Manitoba</option>
                          <option value="New Brunswick">New Brunswick</option>
                          <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                          <option value="Northwest Territories">Northwest Territories</option>
                          <option value="Nova Scotia">Nova Scotia</option>
                          <option value="Nunavut">Nunavut</option>
                          <option value="Ontario">Ontario</option>
                          <option value="Prince Edward Island">Prince Edward Island</option>
                          <option value="Quebec">Quebec</option>
                          <option value="Saskatchewan">Saskatchewan</option>
                          <option value="Yukon">Yukon</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" required name="city" placeholder="Enter City" value="<?php echo $row['usercity']; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" required name="pincode" placeholder="Postcode/zip" value="<?php echo $row['userpincode']; ?>">
                      </div>
                    </div>
                    <div class="col-xs-12 ">
                      <button class="btn btn-black" type="submit" name="submit">Next</button>
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
  </section>
  <!-- CONTAINER END --> 
  
<?php include_once('footer.php'); ?> 