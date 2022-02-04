<?php
require_once 'dbconnection.php';
require_once 'Brand.class.php';
?>
<html>
<h1>Please add details</h1>
<div style="width: 300px; height: 150px; background-color: ; border: 2px solid black">
	<div style="margin-left: 50px; margin-top: 20px">
		<form action="#" method="post" >
			Brand Name: <input type="text" name="brandname" /><br><br>
        	<input type="submit" name="submit" value="submit" />   
		</form> 	
	</div>
	<br>
</div>
</html>
<?php                 
                    if(isset($_REQUEST['submit'])){
                        try{
                            
      
                                $Brand = new Brand();
                                
                                $brandname=$_POST['brandname'];
                                
                                $Brand->setBrandname($brandname);
                                
                                $result = $Brand->create($connection);
                                
                                if($result == true)
                                {
                                    
                                    echo "Brand added";
                                }
                            
                            
                        }
                        catch (PDOException $e)
                        {
                            echo "Error : ".$e->getMessage();
                        }
                       
                    }
?>

