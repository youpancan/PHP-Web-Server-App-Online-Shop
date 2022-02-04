<?php
require_once 'dbconnection.php';
require_once 'Size.class.php';
?>
<html>
<h1>Please add details</h1>
<div style="width: 300px; height: 150px; background-color: ; border: 2px solid black">
	<div style="margin-left: 50px; margin-top: 20px">
		<form action="#" method="post" >
			  Enter new size details: <input type="text" name="size" /><br><br>
        	<input type="submit" name="submit" value="submit" />   
		</form> 	
	</div>
	<br>
</div>
</html>
<?php                 
                    if(isset($_REQUEST['submit'])){
                        try{
                            
      
                                $Size = new Size();
                                
                                $size=$_POST['size'];
                                
                                $Size->setSize($size);
                                
                                $result = $Size->create($connection);
                                
                                if($result == true)
                                {
                                    
                                    echo "size added";
                                }
                            
                            
                        }
                        catch (PDOException $e)
                        {
                            echo "Error : ".$e->getMessage();
                        }
                       
                    }
?>

