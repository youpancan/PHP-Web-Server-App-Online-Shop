<?php
require_once 'dbconnection.php';
require_once 'Category.class.php';
?>
<html>
<h1>Please add details</h1>
<div style="width: 300px; height: 150px; background-color: ; border: 2px solid black">
	<div style="margin-left: 50px; margin-top: 20px">
		<form action="#" method="post" >
			Category Name: <input type="text" name="catname" /><br><br>
        	<input type="submit" name="submit" value="submit" />   
		</form> 	
	</div>
	<br>
</div>
</html>
<?php
                     
                    if(isset($_REQUEST['submit'])){
                        try{
                            
      
                                $Category = new Category();
                                
                                $catname=$_POST['catname'];
                                
                                $Category->setCatname($catname);
                                
                                $result = $Category->create($connection);
                                
                                if($result == true)
                                {
                                    
                                    echo "category added";
                                }
                            
                            
                        }
                        catch (PDOException $e)
                        {
                            echo "Error : ".$e->getMessage();
                        }
                       
                    }
?>

