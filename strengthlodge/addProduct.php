<?php
require_once 'dbconnection.php';
require_once 'Product.class.php';
?>
<html>
<h1>Please add details</h1>
<div style="width: 500px; height: 750px; background-color: ; border: 2px solid black">
	<div style="margin-left: 50px; margin-top: 20px">
		<form action="#" method="post" >
			  Enter pcid: <input type="text" name="pcid" /><br><br>
			  Enter pscid: <input type="text" name="pscid" /><br><br>
			  Enter product title: <input type="text" name="producttitle" /><br><br>
			  Enter product description: <input type="text" name="productdescription" /><br><br>
			  Enter product price: <input type="text" name="productprice" /><br><br>
			  Enter product offer price: <input type="text" name="productofferprice" /><br><br>
			  Enter product total units: <input type="text" name="producttotalunits" /><br><br>
			  Enter product primary image: <input type="text" name="productprimaryimage" /><br><br>
			  Enter product image1: <input type="text" name="productimage1" /><br><br>
			  Enter product image2: <input type="text" name="productimage2" /><br><br>
			  Enter product image3: <input type="text" name="productimage3" /><br><br>
			  Enter psid: <input type="text" name="psid" /><br><br>
			  Enter product quantities: <input type="text" name="productquantities" /><br><br>
			  Enter brand id: <input type="text" name="brandid" /><br><br>
			  Enter goal id: <input type="text" name="goalid" /><br><br>
        	<input type="submit" name="submit" value="submit" />   
		</form> 	
	</div>
	<br>
</div>
</html>
<?php                 
                    if(isset($_REQUEST['submit'])){
                        try{
                            
      
                                $Product = new Product();
                                
                                $pcid=$_POST['pcid'];                               
                                $pscid=$_POST['pscid'];
                                $producttitle=$_POST['producttitle'];
                                $productdescription=$_POST['productdescription'];
                                $productprice=$_POST['productprice'];
                                $productofferprice=$_POST['productofferprice'];
                                $producttotalunits=$_POST['producttotalunits'];
                                $productprimaryimage=$_POST['productprimaryimage'];
                                $productimage1=$_POST['productimage1'];
                                $productimage2=$_POST['productimage2'];
                                $productimage3=$_POST['productimage3'];
                                $psid=$_POST['psid'];
                                $productquantities=$_POST['productquantities'];
                                $brandid=$_POST['brandid'];
                                $goalid=$_POST['goalid'];
                                
                                $Product->setPcid($pcid);
                                $Product->setPscid($pscid);
                                $Product->setProducttitle($producttitle);
                                $Product->setProductdescription($productdescription);
                                $Product->setProductprice($productprice);
                                $Product->setProductofferprice($productofferprice);
                                $Product->setProducttotalunits($producttotalunits);
                                $Product->setProductprimaryimage($productprimaryimage);
                                $Product->setProductimage1($productimage1);
                                $Product->setProductimage2($productimage2);
                                $Product->setProductimage3($productimage3);
                                $Product->setPsid($psid);
                                $Product->setProductquantities($productquantities);
                                $Product->setBrandid($brandid);
                                $Product->setGoalid($goalid);
                                
                                
                                $result = $Product->create($connection);
                                
                                if($result == true)
                                {
                                    
                                    echo "Product added";
                                }
                            
                            
                        }
                        catch (PDOException $e)
                        {
                            echo "Error : ".$e->getMessage();
                        }
                       
                    }
?>

