<?php
include_once('header.php');
?>

<!DOCTYPE html>
<html>
	<!-- HOME -->
	<div id="home">
		<!-- home wrap -->
		<div class="home-wrap">
			<!-- home slick -->
			<div id="home-slick">
				<!-- banner -->
				<div class="banner banner-1"><img src="img/banner/1530960749-5050img-slide1.jpg" ></div>
				<div class="banner banner-2"><img src="img/banner/1530962203-6393img-slide2.jpg" ></div>
				<div class="banner banner-3"><img src="img/banner/1530962214-8279img-slide3.jpg" ></div>
				<!-- /banner -->
			</div>
			<!-- /home slick -->
		</div>
		<!-- /home wrap -->
	</div><br><br>
	<!-- /HOME -->



	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Trending Now</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->
	
                
				<!-- Product Slick -->
				<div class="col-md-12 col-sm-8 col-xs-8">
					<div class="row">
						
						<div id="product-slick-1" class="product-slick">
							<!-- Product Single -->
							<?php 
				              $sqltrending="select * from tblproduct order by rand() limit 4";
				              $resulttrending=mysqli_query($conn,$sqltrending) or die(mysqli_error($conn));
				              while($rowtrending=mysqli_fetch_assoc($resulttrending)){
                		echo '<div class="product product-single" > 
								<div class="product-thumb">
									<a href="product-page.php?product='.$rowtrending['id'].'"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button></a>
									<img src="img/products/'.$rowtrending['productprimaryimage'].'" alt="'.$rowtrending['producttitle'].'">
								</div>
								<div class="product-body">
									<h3 class="product-price">$ '.$rowtrending['productofferprice'] .'<del class="product-old-price"> $ '.$rowtrending['productprice'].'</del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="product-page.php?product='.$rowtrending['id'].'">'.$rowtrending['producttitle'].'</a></h2>
								</div>
							</div>';
              }
              ?></div>
					</div>
				</div>  
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
            			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Best Sellers </h2>
					</div>
				</div>
				<!-- section title -->
                
				<!-- Product Single -->
				 <?php 
              $sqlseller="select * from tblproduct order by rand() limit 4";
              $resultseller=mysqli_query($conn,$sqlseller) or die(mysqli_error($conn));
              while($rowseller=mysqli_fetch_assoc($resultseller)){
                echo '
				<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
								<div class="product-thumb">		
									<a href="product-page.php?product='.$rowseller['id'].'"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button></a>
									 <img src="img/products/'.$rowseller['productprimaryimage'].'" alt="'.$rowseller['producttitle'].'">
								</div>
								<div class="product-body">
										<h3 class="product-price">$ '.$rowseller['productofferprice'].'<del class="product-old-price"> $'.$rowseller['productprice'].'</del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
								<h2 class="product-name"><a href="product-page.php?product='.$rowseller['id'].'">'.$rowseller['producttitle'].'</a></h2>
								</div>
							</div>
				</div>
				   ';
              }
              ?>
				<!-- /Product Single -->

				
			</div>
			
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
     
<?php
include_once('footer.php');
?>
</body>
</html>