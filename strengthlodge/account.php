<?php 
ob_start();

$page="Account";

include_once 'dbconnection.php';
include_once 'Userdetails.Class.php';

include_once('header.php');
if(isset($_SESSION['user'])){
$userid=$_SESSION['user'];
$sql="select * from tbluser where id=$userid";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));  
$row=mysqli_fetch_assoc($result);
// To handle Submission of Account Details
try{
    
    if(isset($_POST['submit']))
    {
        $userdetails = new UserDetails();
        
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $address=$_POST['address'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $pincode=$_POST['pincode'];
        
        $userdetails->setUserfname($fname);
        $userdetails->setUserlname($lname);
        $userdetails->setUseremail($email);
        $userdetails->setUserphone($number);
        $userdetails->setUseraddress($address);
        $userdetails->setUserstate($state);
        $userdetails->setUsercity($city);
        $userdetails->setUserpincode($pincode);
        
        $result = $userdetails->update($connection);
        
        if($result == true)
        {
            
            echo "<script>alert('Account is Registered. Login to start Your session.');</script>";
            header('location:index.php?success= New account successfully created');
        }
        else{
            echo "<script>alert('Invalid username and password');</script>";
        }
    }
    
}
catch (PDOException $e)
{
    echo "Error : ".$e->getMessage();
}
//   if(isset($_REQUEST['submit'])){
//     $fname=$_POST['fname'];
//     $lname=$_POST['lname'];
//     $email=$_POST['email'];
//     $number=$_POST['number'];
//     $address=$_POST['address'];
//     $state=$_POST['state'];
//     $city=$_POST['city'];
//     $pincode=$_POST['pincode'];
//     $sqlupdateuser="update tbluser set userfname='$fname', userlname='$lname', useremail='$email', userphone='$number', useraddress='$address', userstate='$state', usercity='$city', userpincode='$pincode' where id=$userid";
//     $test=mysqli_query($conn,$sqlupdateuser) or die(mysqli_error($conn));
//     if($test){
//       $profileupdate=TRUE;
//     }
//   }


}
else{
  header('location:login.php');
}
?> 
<head>
<style type="text/css">



.dark-bg h1, .dark-bg h2, .dark-bg h3, .dark-bg h4, .dark-bg h5, .dark-bg h6, .dark-bg p {
  color: #fff;
}
.dark-bg {
  background: #30323A;
  color: #fff;
}


/* - Form Style */

.full select {
  width: 100%;
}
.main-form textarea {
  max-width: 100%;
}
.main-form input, .main-form textarea, .main-form select {
  background: #fff;
  padding: 8px 15px;
  width: 100%;
  border: 1px solid #aaa;
}
.main-form input[type="radio"]{
  background: #fff;
  padding: 8px 15px;
  width: 0px;
  position: static;
  margin-left: 3px;
}
.check-box label {
  color: #222;
  display: inline;
  font-size: 15px;
  font-weight: 400;
}
.checkout-section .check-box input[type="checkbox"] {
  margin: 5px 0 0;
  min-height: 1px;
}

.items-Reviews .main-form input, .items-Reviews .main-form textarea {
  border: none;
}
.checkout-section .input-box {
  margin-bottom: 23px;
}
.checkout-content .heading-part{
  border: 0px;
}
.check-box span {
  display: inline-block;
  float: left;
  height: 18px;
  margin-right: 2px;
  width: 18px;
  z-index: 0;
}
.check-box.left-side {
  margin-top: 10px;
}
.forgot-password {
  color: #0040a5;
  text-decoration: underline;
  font-weight: 600;
  display: inline-block;
}
.contact-info .p-0 {
  border-right: 1px solid #e1e1e1;
}
.contact-info .p-0:last-child {
  border: medium none;
}


/* Checkout Page CSS Start */

.checkout-step {
  display: inline-block;
  width: 100%;
}
.checkout-step ul {
  display: table;
  margin: 0px auto 25px;
}
.checkout-step ul li {
  float: left;
  font-size: 15px;
  color: #fc3b3c;
  cursor: pointer;
}
.checkout-step ul li .step {
  float: left;
}
.checkout-step ul li .step .circle {
  background: #fc3b3c;
  color: #fff;
  display: inline-block;
  width: 32px;
  height: 32px;
  padding: 3px 11px;
  font-weight: 500;
  font-size: 16px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -o-border-radius: 50%;
  border-radius: 50%;
}
.checkout-step ul li .step .line {
  background: #fc3b3c none repeat scroll 0 0;
  float: left;
  height: 7px;
  margin: 12px -1px 12px 0;
  width: 65px;
}
.checkout-step ul li:first-child .step .line {
  -webkit-border-radius: 3px 0px 0px 3px;
  -moz-border-radius: 3px 0px 0px 3px;
  -o-border-radius: 3px 0px 0px 3px;
  border-radius: 3px 0px 0px 3px;
  width: 65px;
}
.checkout-step ul li:last-child .step .line {
  -webkit-border-radius: 0px 3px 3px 0px;
  -moz-border-radius: 0px 3px 3px 0px;
  -o-border-radius: 0px 3px 3px 0px;
  border-radius: 0px 3px 3px 0px;
  width: 65px;
  background: #222;
}
.checkout-step ul li span {
  color: #fc3b3c;
  display: inline-block;
  padding: 6px 15px 6px 6px;
  line-height: 20px;
}
.checkout-step ul li.step-done {
  color: #26537f;
}
.checkout-step ul li.active {
  color: #fc3b3c;
}
.checkout-step ul li.step-done .step .circle, .checkout-step ul li.step-done .step .line {
  background: #26537f;
}
.checkout-step ul li.active .step .circle, .checkout-step ul li.active .step .line {
  background: #fc3b3c;
}
.checkout-step li.active + li .circle, .checkout-step li.active + li + li .circle, .checkout-step li.active + li + li + li .circle, .checkout-step li.active + li .line, .checkout-step li.active + li + li .line, .checkout-step li.active + li + li + li .line {
  background: #222;
}
.checkout-step li.active + li span, .checkout-step li.active + li + li span, .checkout-step li.active + li + li + li span {
  color: #222;
}
.heading-bg h2.heading {
  padding: 8px 0px;
  border-bottom: 1px solid #f0f0f0;
}
.checkout-section h2.heading {
  font-family: "Raleway", sans-serif;
  letter-spacing: 0px;
  font-weight: 500;
}
.payment-option-box {
  padding: 20px;
  border: 1px solid #e1e1e1;
}
.payment-option-box-inner {
  padding: 20px;
  display: inline-block;
  width: 100%;
}
.payment-top-box {
  display: inline-block;
  width: 100%;
  margin-bottom: 20px;
}
.paypal-box {
  border: 1px solid #ddd;
  float: left;
  padding: 10px;
  position: relative;
  margin-left: 10px;
}
.paypal-top {
  background: #f5f5f5;
  position: absolute;
  top: -15px;
  left: 5px;
  padding: 0 10px;
}
/* Checkout Page CSS End */



/* Account Page CSS Start */
.account-tab > .tab-title-bg {
  display: inline-block;
  padding: 10px 15px;
  width: 100%;
}
.account-tab > span .sub-title {
  font-size: 18px;
}
.account-sidebar .sub-title span {
  background: url("../images/sprite.png") no-repeat scroll -98px -457px;
  display: inline-block;
  height: 21px;
  margin-bottom: -5px;
  width: 21px;
}
.account-sidebar.account-tab .account-tab-inner {
  padding: 0px;
  background: #f0f0f0 none repeat scroll 0 0;
}
.account-sidebar.account-tab > .tab-title-bg {
  padding: 12px 15px;
}
.account-sidebar ul {
  width: 100%;
}
.account-sidebar ul li {
  border-bottom: 1px solid #dcdcdc;
  position: relative;
}
.account-sidebar ul li:last-child {
  border-bottom: none;
}
.account-sidebar ul li a {
  padding: 8px 15px;
  display: inline-block;
  width: 100%;
}
.account-sidebar ul li a .fa {
  position: absolute;
  right: 15px;
  top: 12px;
  transition: all 0.4s ease 0s;
  -moz-transition: all 0.4s ease 0s;
  -webkit-transition: all 0.4s ease 0s;
  -o-transition: all 0.4s ease 0s;
}
.account-sidebar ul li a:hover {
  color: #26537f;
}
.account-sidebar ul li.active a, .account-sidebar ul li:hover a {
  color: #fff;
  background: grey none repeat scroll 0 0
}
.account-sidebar ul li.active a .fa, .account-sidebar ul li:hover a .fa {
  color: #fff;
  right: 0px;
}
.account-sidebar ul li.active a::after, .account-sidebar ul li:hover a::after {
  border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) grey;
  border-style: solid;
  border-width: 17px 22px 20px 15px;
  top: 0px;
  content: "";
  right: -36px;
  position: absolute;
}
.account-content { /* border: 1px solid #dbdbdb;  border-radius: 3px;*/
  padding: 0px 30px;
}
.account-content .heading-part{
  border: 0px;
}
.account-content .heading-section {
  display: inline-block;
  width: 100%;
}
.account-content .heading-section .heading {
  padding: 2px 0px;
}
.account-content .heading-section .common-btn {
  margin-top: -4px;
}
.account-content p, .address-box p {
  margin-bottom: 0px;
  margin-top: 5px;
}
.account-content hr {
  margin-top: 5px;
}
.address-box .inner-heading {
  margin-bottom: 10px;
}
/* Account Page CSS Start */






</style>
</head>
  <br><br>
  <!-- CONTAIN START -->
  <section class="checkout-section ptb-50">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="account-sidebar account-tab mb-xs-30">
            <div class="dark-bg tab-title-bg">
              <div class="">
                <div class="sub-title"><span></span> My Account</div>
              </div>
            </div>
            <div class="account-tab-inner">
              <ul class="account-tab-stap">
                <li id="step1" class="active"> <a href="javascript:void(0)">My Dashboard<i class="fa fa-angle-right"></i> </a> </li>
                <li id="step2"> <a href="javascript:void(0)">Account Details<i class="fa fa-angle-right"></i> </a> </li>            
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-8">
          <div id="data-step1" class="account-content" data-temp="tabdata">
            <div class="row">
              <div class="col-xs-12">
                <?php
                  if(isset($profileupdate)){
                    echo '
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Updated!</strong> Your Account Information is Successfully Updated.
                </div>';
                  }
                  if(isset($wrongpassword)){
                  echo '
                <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Failed!</strong> Entered Password is Wrong.
                </div>';
                  }elseif(isset($matchpassword)){
                    echo '
                <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Failed!</strong> Entered Password Did Not Match.
                </div>';
                  }elseif(isset($changedpassword)){
                    echo '
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Changed!</strong> Your password is changed.
                </div>';
                  }
                ?>
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">Account Dashboard</h2>
                </div>
              </div>
            </div>

            <div class="m-0">
              <div class="row">
                <div class="col-xs-12 mb-20">
                  <div class="heading-part">
                    <h3 class="sub-heading">Account Information</h3>
                  </div>
                  <hr>
                </div>
                <div class="col-sm-12">
                  <div class="cart-total-table address-box commun-table">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Shipping Address</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if($row['useraddress']==""){
                          echo 
                          '<tr><td>
                          <div class="account-tab-inner">
                            <ul class="account-tab-stap">
                              <li id="step2"> 
                              <a href="javascript:void(0)"> Enter Shipping Address</a>
                              </li>
                            </ul>
                          </div>
                            </tr></td>
                          ';
                          }
                          else {
                           echo '<tr>
                            <td><ul>
                                <li class="inner-heading"> <b>'.$row['userfname'].' '.$row['userlname'].'</b> </li>
                                <li>
                                  <p>'.$row['useraddress'].',</p>
                                </li>
                                <li>
                                  <p>'.$row['userstate'].','.$row['usercity'].','.$row['userpincode'].'.</p>
                                </li>
                                <li>
                                  <p>India</p>
                                </li>
                              </ul></td>
                          </tr>'; 
                          }

                          ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="data-step2" class="account-content" data-temp="tabdata" style="display:none">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">Account Details</h2>
                </div>
              </div>
            </div>
            <div class="m-0">
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
                          <option value=" ">Select a Provice or territory</option>
                          <option value="Alberta">Alberta</option>
                          <option value="British Columbia">British Columbia</option>
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
                    <div class="col-xs-12">
                      <button class="btn btn-black" type="submit" name="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  
<?php include_once('footer.php'); ?> 
<script type="text/javascript">
  $(document).ready(function(){
    $("#deleteorder").click(function(){
      var deleteorderid=$(this).data('value');
      console.log(deleteorderid);
      $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "deleteorderid="+deleteorderid,
            success: function (response) {
                location.reload();
            },
        });
    });
  });

</script>





