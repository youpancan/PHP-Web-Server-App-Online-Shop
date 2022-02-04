<?php
class Category{
    private $catname;
    
    function __construct($catname=null)
    {
        $this->catname=$catname;
    }
    
    
    /**
     * @return mixed
     */
    public function getCatname()
    {
        return $this->catname;
    }

    public function setCatname($catname)
    {
        $this->catname = $catname;
    }
    
    public function Create($conn)
    {
        $catname= $this->catname;
        
        $sqlStmt="insert into tblcategory values('','$catname')";
        $result = $conn->exec($sqlStmt);
        return $result;
    }
}