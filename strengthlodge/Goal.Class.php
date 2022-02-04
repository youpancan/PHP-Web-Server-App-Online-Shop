<?php
class Goal{
    private $goalname;
    
    function __construct($goalname=null)
    {
        $this->goalname=$goalname;
    }
    
    /**
     * @return mixed
     */
    public function getGoalname()
    {
        return $this->goalname;
    }
    
    public function setGoalname($goalname)
    {
        $this->goalname = $goalname;
    }
    
    public function Create($conn)
    {
        $goalname= $this->goalname;
        
        $sqlStmt="insert into tblgoal values('','$goalname')";
        $result = $conn->exec($sqlStmt);
        return $result;
    }
}