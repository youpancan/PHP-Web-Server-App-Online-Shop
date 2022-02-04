<?php
require_once 'dbconnection.php';
require_once 'Goal.class.php';
?>
<html>
<h1>Please add details</h1>
<div style="width: 300px; height: 150px; background-color: ; border: 2px solid black">
	<div style="margin-left: 50px; margin-top: 20px">
		<form action="#" method="post" >
			Goal Name: <input type="text" name="goalname" /><br><br>
        	<input type="submit" name="submit" value="submit" />   
		</form> 	
	</div>
	<br>
</div>
</html>
<?php                 
                    if(isset($_REQUEST['submit'])){
                        try{
                            
      
                                $Goal = new Goal();
                                
                                $goalname=$_POST['goalname'];
                                
                                $Goal->setGoalname($goalname);
                                
                                $result = $Goal->create($connection);
                                
                                if($result == true)
                                {
                                    
                                    echo "Goal added";
                                }
                            
                            
                        }
                        catch (PDOException $e)
                        {
                            echo "Error : ".$e->getMessage();
                        }
                       
                    }
?>

