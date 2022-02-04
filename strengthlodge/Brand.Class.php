<?php
class Brand{
    private $brandname;
    
    function __construct($brandname=null)
    {
        $this->brandname=$brandname;
    }
    /**
     * @return mixed
     */
    public function getBrandname()
    {
        return $this->brandname;
    }
    
    public function setBrandname($brandname)
    {
        $this->brandname = $brandname;
    }
    
    public function Create($conn)
    {
        $brandname= $this->brandname;
        
        $sqlStmt="insert into tblbrand values('','$brandname')";
        $result = $conn->exec($sqlStmt);
        return $result;
    }
}