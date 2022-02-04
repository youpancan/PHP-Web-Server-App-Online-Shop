<?php
class Size{
    private $size;
    
    function __construct($size=null)
    {
        $this->size=$size;
    }
    
    
    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }
    
    public function setSize($size)
    {
        $this->size = $size;
    }
    
    public function Create($conn)
    {
        $size= $this->size;
        
        $sqlStmt="insert into tblsizechart values('','$size')";
        $result = $conn->exec($sqlStmt);
        return $result;
    }
}