<?php 
include_once('dbconn.php');
  // To Return Size Quantity in
  if(isset($_POST['size'])){
  $sizestring = $_POST['size'];
  $array=explode(',',$sizestring);
  $size=$array[0];
  $productid=$array[1];
  if($size==""){
  	echo '<label for="qty">Qty:</label>
              <div class="custom-qty">
                <input type="number" class="input-text qty" title="Qty" value="1" min="1" max="1" name="qty">
              </div>';
  }
  else {
  $sqlsizechart="select * from tblsizechart where id=(select psid from tblproduct where id=$productid)";
  $resultsizechart=mysqli_query($conn,$sqlsizechart) or die(mysqli_error($conn));
  $rowsizechart=mysqli_fetch_assoc($resultsizechart);
  $sizearray=explode(',',$rowsizechart['size']);
  $i=0;
  while(!empty($sizearray[$i])){
  	if($size==$sizearray[$i]){
  		break;
  	}
  	$i++;
  }
  $sqlproduct="select * from tblproduct where id=".$productid;
  $resultproduct=mysqli_query($conn,$sqlproduct) or die(mysqli_error($conn));
  $rowproduct=mysqli_fetch_assoc($resultproduct);
  $quantityarray=explode(',',$rowproduct['productquantities']);
  echo '
  					<label for="qty">Qty:</label>
                        <div class="custom-qty"><input type="number" min="1" max="'.$quantityarray[$i].'" value="1" class="input-text qty" name="qty"> </input>
                        </div>';
  }
  }
  // To Handle Delete Request from Dropdown Cart
  if(isset($_POST['cartid'])){
  	session_start();
  	$userid=$_SESSION['user'];
  	$cartid=$_POST['cartid'];
  	$sqldeletecart="delete from tblcart where (id=$cartid AND uid=$userid)";
  	$test=mysqli_query($conn,$sqldeletecart) or die(mysqli_error($conn));
  	if(isset($_SESSION['user'])){
                $userid=$_SESSION['user'];
                $sqlcartcount='select count(*) from tblcart where uid='.$userid;
                $resultcartcount=mysqli_query($conn,$sqlcartcount)or die(mysqli_error($conn)); 
                $rowcount=mysqli_fetch_row($resultcartcount); 
                $sqlcart="select * from tblcart where uid=$userid order by id desc limit 2";
                $resultcart=mysqli_query($conn,$sqlcart) or die(mysqli_error($conn));
              echo '
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <div class="header-btns-icon">
                  <i class="fa fa-shopping-cart"></i>
                  <span class="qty">';if(isset($rowcount['0'])) { echo '('.$rowcount['0'].')'; }echo '</span>
                </div>
                <strong style="line-height:40px; font-size:16px"class="text-uppercase">My Cart <i class="fa fa-caret-down"></i></strong>
               </a>';
              if(isset($_SESSION['user'])){
                echo '<div class="custom-menu">
                <div id="shopping-cart"> 
                <div class="shopping-cart-list">';
                     $i=1;
                    while($rowcart=mysqli_fetch_assoc($resultcart)){
                      $sqlcartproduct="select * from tblproduct where id=".$rowcart['pid'];
                      $resultcartproduct=mysqli_query($conn,$sqlcartproduct) or die(mysqli_error($conn));
                      $rowcartproduct=mysqli_fetch_assoc($resultcartproduct);
                      echo '<div class="product product-widget">
                      <div class="product-thumb">
                        <a href="product-page.php?product='.$rowcart['pid'].'"><img style="width:70px" src="img/products/'.$rowcartproduct['productprimaryimage'].'"></a>
                      </div>
                      <div class="product-body">
                        <h3 class="product-price"><span class="qty"> <i class="fas fa-rupee-sign"></i> '.$rowcartproduct['productofferprice'].'</span></h3>
                        <h2 class="product-name"><a href="product-page.php?product='.$rowcart['pid'].'">'.$rowcartproduct['producttitle'].'</a></h2>
                      </div><a data-value="'.$rowcart['id'].'" id="delete-small-cart'.$i.'">
                      <button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                    </div>
                        ';
                    $i++;
                    }
                  }
                   echo '</div><div class="shopping-cart-btns">
                    <a href="cart.php"><button class="main-btn">View Cart</button></a>
                    <a href="checkout-2.php"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
                  </div> ';
                }         else
                    {
                   echo'<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <div class="header-btns-icon">
                  <i class="fa fa-shopping-cart"></i>
                  <span class="qty">0</span>
                </div>
                <strong id="login4" style="line-height:40px; font-size:16px"class="text-uppercase">My Cart <i class="fa fa-caret-down"></i></strong>
              </a>
              ';
                  } 
  }
// To Handle Delete function from main Cart
  if(isset($_POST['deletecartid'])){
  	session_start();
  	$userid=$_SESSION['user'];
  	$deleteid=$_POST['deletecartid'];
  	$sqldelete="delete from tblcart where (id=$deleteid AND uid=$userid)";
  	$test=mysqli_query($conn,$sqldelete) or die(mysqli_error($conn));
  	echo "success";
  }
// To Handle Delete function from Order
  if(isset($_POST['deleteorderid'])){
    session_start();
    $userid=$_SESSION['user'];
    $deleteid=$_POST['deleteorderid'];
    $sqldelete="delete from tblorder where (id=$deleteid AND uid=$userid)";
    $test=mysqli_query($conn,$sqldelete) or die(mysqli_error($conn));
    echo "success";
  }
// To Handle Show per Page 
  if(isset($_POST['showperpage'])){
    $perpage=$_POST['showperpage'];
    $results_per_page=$perpage;
  }

?>