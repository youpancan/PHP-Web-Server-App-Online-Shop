<?php
require_once 'dbconnection.php';
require_once 'SubCategory.class.php';
?>
<html>
<h1>Please add details</h1>
<div style="width: 300px; height: 250px; background-color: ; border: 2px solid black">
	<div style="margin-left: 50px; margin-top: 20px">
		<form action="#" method="post" >
			  Enter category id: <input type="text" name="catid" /><br><br>
			  Enter Sub category name: <input type="text" name="subcatname" /><br><br>
			  Enter size id: <input type="text" name="sizeid" /><br><br>
        	<input type="submit" name="submit" value="submit" />   
		</form> 	
	</div>
	<br>
</div>
</html>
<?php                 
                    if(isset($_REQUEST['submit'])){
                        try{
                            
      
                                $SubCategory = new SubCategory();
                                
                                $catid=$_POST['catid'];                               
                                $subcatname=$_POST['subcatname'];
                                $sizeid=$_POST['sizeid'];
                                
                                $SubCategory->setCatid($catid);
                                $SubCategory->setSubcatname($subcatname);
                                $SubCategory->setSizeid($sizeid);
                                
                                $result = $SubCategory->create($connection);
                                
                                if($result == true)
                                {
                                    
                                    echo "SubCategory added";
                                }
                            
                            
                        }
                        catch (PDOException $e)
                        {
                            echo "Error : ".$e->getMessage();
                        }
                       
                    }
?>

