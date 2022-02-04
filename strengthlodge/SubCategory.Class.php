<?php
class SubCategory{
    private $catid;
    private $subcatname;
    private $sizeid;
    
    function __construct($catid=null, $subcatname=null, $sizeid=null)
    {
        $this->catid=$catid;
        $this->subcatname=$subcatname;
        $this->sizeid=$sizeid;
    }
    
    /**
     * @return mixed
     */
    public function getCatid()
    {
        return $this->catid;
    }

    /**
     * @return mixed
     */
    public function getSubcatname()
    {
        return $this->subcatname;
    }

    /**
     * @return mixed
     */
    public function getSizeid()
    {
        return $this->sizeid;
    }

    /**
     * @param mixed $catid
     */
    public function setCatid($catid)
    {
        $this->catid = $catid;
    }

    /**
     * @param mixed $subcatname
     */
    public function setSubcatname($subcatname)
    {
        $this->subcatname = $subcatname;
    }

    /**
     * @param mixed $sizeid
     */
    public function setSizeid($sizeid)
    {
        $this->sizeid = $sizeid;
    }

    public function Create($conn)
    {
        $catid= $this->catid;
        $subcatname= $this->subcatname;
        $sizeid= $this->sizeid;
        
        $sqlStmt="insert into tblsubcategory values('','$catid','$subcatname','$sizeid')";
        $result = $conn->exec($sqlStmt);
        return $result;
    }
}