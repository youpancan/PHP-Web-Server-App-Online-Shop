<?php
ob_start();
include_once('dbconn.php');
session_start();
$error;
if(isset($_REQUEST['error']))
{
  $error="Invalid Username or Password";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Strength Lodge </title>


	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
  <link rel="stylesheet" href="fonts/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="fonts/css/fontawesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/styles.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


  <!-- new html linking -->
  <link rel="stylesheet" type="text/css" href="css/fotorama.css">
  <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
  <link rel="shortcut icon" href="img/icon.png">

  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript">stLight.options({publisher: "074821ed-063e-4ae5-bad9-3e26ecf249f3"}); </script>

</head>

<body>

<div class="container" >
  <!-- Modal -->
  <div class="modal fade" id="mysignup">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <!-- Modal content-->
 <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Sign up</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well">
                          <form id="loginForm" method="POST" action="mysignup.php" novalidate="novalidate">
                          	   <div class="form-group">
                                     <div class="input-group">
                                      <div class="input-group-addon"><span <i class="fas fa-user"></i></span></div><input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter your username" placeholder="username">
                                  </div>
                                
                              </div>
                              <div class="form-group">
                                 
                                     <div class="input-group">
                                      <div class="input-group-addon"><span <i class="fas fa-envelope"></i></span></div><input type="text" class="form-control" id="email" name="email" value="" required="" title="Please enter your username" placeholder="example@gmail.com">
                                  </div>
                                  <span class="help-block"></span>
                              </div>
                                         <div class="form-group">
                                
                                     <div class="input-group">
                                      <div class="input-group-addon"><span <i class="fa fa-phone" aria-hidden="true"></i></span></div><input class="form-control" name="contact" id="contact" placeholder="Enter Mobile Number">
                                  </div>
                                  
                              </div>
                                <div class="form-group">
                                
                                     <div class="input-group">
                                      <div class="input-group-addon"><span <i class="fas fa-lock"></i></span></div><input class="form-control" name="password" id="passwd" type="password" placeholder="Enter Password">
                                  </div>
                                  
                              </div>
                  
                              <input type="submit" class="btn btn-block" name="submit" style="background-color: #7C7A7A;color: white">
                            
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
    </div>
  </div> 
</div> 
<!--container end.//-->




<div class="container">

  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
 <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Login</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well">
                          <form id="loginForm" method="POST" action="mylogin.php" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">Email</label>
                                     <div class="input-group">
                                      <div class="input-group-addon"><span <i class="fas fa-envelope"></i></span></div><input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                  </div>
                                  <span class="help-block"></span>
                              </div>
                                <div class="form-group">
                                
                                     <div class="input-group">
                                      <div class="input-group-addon"><span <i class="fas fa-lock"></i></span></div><input class="form-control" name="password" id="passwd" type="password" placeholder="Enter Password">
                                  </div>
                                  
                              </div>
                              <input type="submit" value="Login" name="submit" class="btn btn-block" style="background-color: #7C7A7A;color: white">
                                      <?php
                                    if(isset($error))
                                      {
                                        echo '<p style="color:red; text-align:center;">'.$error.'</p>';
                                      }
                                      ?>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>

                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
    </div>
  </div> 
</div>
<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Buy Authentic & Stay Healthy</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="about.php">About </a></li>
						<li><a href="contact.php">Contact </a></li>
				  </ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="index.php">
						    <img src="img/logo.jpg" height="80px" width="auto" style="margin-top: -30px ">
						</a>

					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
					    <div class="search-container">
                 <form action="search.php" method="post">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                 </form>
              </div>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
				        <!-- Account -->

            <li class="header-cart dropdown default-dropdown">
              <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                <?php

                if(isset($_SESSION['user'])) {                  
                            $sql="select * from tbluser where id='".$_SESSION['user']."'";
                          $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));  
                          $row=mysqli_fetch_assoc($result);
                        echo '<div class="header-btns-icon">
                  <i class="fas fa-user"></i>
                </div><strong class="text-uppercase" style="line-height:40px; font-size:16px">'. $row['userfname'].' <i class="fa fa-caret-down"></i></strong>
              </div><ul class="custom-menuaccount">
                <li><a href="logout.php" ><i class="fa fa-unlock-alt"></i> Logout</a></li>
              </ul> 
            </li>
            ';
          }
          else
          {
            echo '
                  <div class="header-btns-icon">
                  <i class="fas fa-user"></i>
                </div>
                <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
              </div>
              <a id="login" class="text-uppercase">Login</a> / <a id="signup"  class="text-uppercase">join</a>
              <ul class="custom-menuaccount">

              </ul> 
            </li>

            ';
          }
            ?>
            <!-- /Account -->
            <!-- Cart -->
            <li class="header-cart dropdown default-dropdown" id="custom-cart-dropdown">
              <?php 
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
                }
                  
             
               
                               else
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
                ?>
            </li>
            <!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->
	<!-- NAVIGATION -->
	          

  <div id="navigation">
		<!-- container -->
		
    <div class="container">

			<div id="responsive-nav">
	

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="index.php"><i class="fas fa-home"></i></a></li>
					<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Shop By Goal <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menuaccount">
                <?php
                $sqlgoal='select * from tblgoal';
                $resultgoal=mysqli_query($conn,$sqlgoal)or die(mysqli_error($conn));
                 while($rowgoal=mysqli_fetch_assoc($resultgoal)){
                echo '<li><a href="goal.php?goal='.$rowgoal['id'].'">'.$rowgoal['goalname'].'</a></li>';
                }
                ?>
						 </ul>
						</li>
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Categories <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								
									
											 <?php 
                      // Displaying Categories in Header
                        $sqlcategory="select * from tblcategory";
                        $resultcat=mysqli_query($conn,$sqlcategory) or die(mysqli_error($conn));
                      
                        echo '<div class="row">';
                        while($rowcategory=mysqli_fetch_assoc($resultcat))
                        {
                          // Displaying Category
                              if($rowcategory['catname']=='')
                              {
                                echo '</div><br><div class="row">';
                              }
                                   echo '<div class="col-md-3">
                                <ul class="list-links">
                              <li ><h3 class="list-links-title">'.$rowcategory['catname'].'
                                </h3></li>'; 
                          $sqlsubcategory="select * from tblsubcategory where catid=".$rowcategory['id'];
                          $resultsub=mysqli_query($conn,$sqlsubcategory) or die(mysqli_error($conn));                          
                          // Displaying Sub Category
                          while($rowsubcategory=mysqli_fetch_assoc($resultsub))
                          {
                            
                            $sqlproductcount="select count(*) from tblproduct where pscid=".$rowsubcategory['id'];
                            $resultproductcount=mysqli_query($conn,$sqlproductcount) or die(mysqli_error($conn));
                            $rowcount=mysqli_fetch_row($resultproductcount);
                            echo '<li><a href="shop.php?category='.$rowsubcategory['id'].'">';
                            if($rowcount['0']==0){
                            echo '<span class="label label-warning">'.$rowcount['0'].'</span>';
                            }elseif($rowcount['0']<=4){
                            echo '<span class="label label-primary">'.$rowcount['0'].'</span>';
                            }elseif($rowcount['0']>4){
                            echo '<span class="label label-success">'.$rowcount['0'].'</span>';
                            }

                            echo '&nbsp;&nbsp;&nbsp;'.$rowsubcategory['subcatname'].'</a></li>';
                          }
                          echo '</li>
                          </ul>
                    <hr class="hidden-md hidden-lg">
                  </div>';                       
                        }
                      ?>
							</div>
						</li>
						

					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->
</body>
</html>