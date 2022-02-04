<?php
class Product{
    private $pcid;
    private $pscid;
    private $producttitle;
    private $productdescription;
    private $productprice;
    private $productofferprice;
    private $producttotalunits;
    private $productprimaryimage;
    private $productimage1;
    private $productimage2;
    private $productimage3;
    private $psid;
    private $productquantities;
    private $brandid;
    private $goalid;
    
    function __construct($pcid=null, $pscid=null, $producttitle=null, $productdescription=null,
        $productprice=null,$productofferprice=null,$producttotalunits=null,$productprimaryimage=null,
        $productimage1=null, $productimage2=null, $productimage3=null, $psid=null
        , $productquantities=null, $brandid=null, $goalid=null)
    {
        $this->pcid=$pcid;
        $this->pscid=$pscid;
        $this->producttitle=$producttitle;
        $this->productdescription=$productdescription;
        $this->productprice=$productprice;
        $this->productofferprice=$productofferprice;
        $this->producttotalunits=$producttotalunits;
        $this->productprimaryimage=$productprimaryimage;
        $this->productimage1=$productimage1;
        $this->productimage2=$productimage2;
        $this->productimage3=$productimage3;
        $this->psid=$psid;
        $this->productquantities=$productquantities;
        $this->brandid=$brandid;
        $this->goalid=$goalid;
    }
    
    /**
     * @return mixed
     */
    public function getPcid()
    {
        return $this->pcid;
    }

    /**
     * @return mixed
     */
    public function getPscid()
    {
        return $this->pscid;
    }

    /**
     * @return mixed
     */
    public function getProducttitle()
    {
        return $this->producttitle;
    }

    /**
     * @return mixed
     */
    public function getProductdescription()
    {
        return $this->productdescription;
    }

    /**
     * @return mixed
     */
    public function getProductprice()
    {
        return $this->productprice;
    }

    /**
     * @return mixed
     */
    public function getProductofferprice()
    {
        return $this->productofferprice;
    }

    /**
     * @return mixed
     */
    public function getProducttotalunits()
    {
        return $this->producttotalunits;
    }

    /**
     * @return mixed
     */
    public function getProductprimaryimage()
    {
        return $this->productprimaryimage;
    }

    /**
     * @return mixed
     */
    public function getProductimage1()
    {
        return $this->productimage1;
    }

    /**
     * @return mixed
     */
    public function getProductimage2()
    {
        return $this->productimage2;
    }

    /**
     * @return mixed
     */
    public function getProductimage3()
    {
        return $this->productimage3;
    }

    /**
     * @return mixed
     */
    public function getPsid()
    {
        return $this->psid;
    }

    /**
     * @return mixed
     */
    public function getProductquantities()
    {
        return $this->productquantities;
    }

    /**
     * @return mixed
     */
    public function getBrandid()
    {
        return $this->brandid;
    }

    /**
     * @return mixed
     */
    public function getGoalid()
    {
        return $this->goalid;
    }

    /**
     * @param mixed $pcid
     */
    public function setPcid($pcid)
    {
        $this->pcid = $pcid;
    }

    /**
     * @param mixed $pscid
     */
    public function setPscid($pscid)
    {
        $this->pscid = $pscid;
    }

    /**
     * @param mixed $producttitle
     */
    public function setProducttitle($producttitle)
    {
        $this->producttitle = $producttitle;
    }

    /**
     * @param mixed $productdescription
     */
    public function setProductdescription($productdescription)
    {
        $this->productdescription = $productdescription;
    }

    /**
     * @param mixed $productprice
     */
    public function setProductprice($productprice)
    {
        $this->productprice = $productprice;
    }

    /**
     * @param mixed $productofferprice
     */
    public function setProductofferprice($productofferprice)
    {
        $this->productofferprice = $productofferprice;
    }

    /**
     * @param mixed $producttotalunits
     */
    public function setProducttotalunits($producttotalunits)
    {
        $this->producttotalunits = $producttotalunits;
    }

    /**
     * @param mixed $productprimaryimage
     */
    public function setProductprimaryimage($productprimaryimage)
    {
        $this->productprimaryimage = $productprimaryimage;
    }

    /**
     * @param mixed $productimage1
     */
    public function setProductimage1($productimage1)
    {
        $this->productimage1 = $productimage1;
    }

    /**
     * @param mixed $productimage2
     */
    public function setProductimage2($productimage2)
    {
        $this->productimage2 = $productimage2;
    }

    /**
     * @param mixed $productimage3
     */
    public function setProductimage3($productimage3)
    {
        $this->productimage3 = $productimage3;
    }

    /**
     * @param mixed $psid
     */
    public function setPsid($psid)
    {
        $this->psid = $psid;
    }

    /**
     * @param mixed $productquantities
     */
    public function setProductquantities($productquantities)
    {
        $this->productquantities = $productquantities;
    }

    /**
     * @param mixed $brandid
     */
    public function setBrandid($brandid)
    {
        $this->brandid = $brandid;
    }

    /**
     * @param mixed $goalid
     */
    public function setGoalid($goalid)
    {
        $this->goalid = $goalid;
    }
    public function Create($conn)
    {
        $pcid= $this->pcid;
        $pscid= $this->pscid;
        $producttitle= $this->producttitle;
        $productdescription= $this->productdescription;
        $productprice= $this->productprice;
        $productofferprice= $this->productofferprice;
        $producttotalunits= $this->producttotalunits;
        $productprimaryimage= $this->productprimaryimage;
        $productimage1= $this->productimage1;
        $productimage2= $this->productimage2;
        $productimage3= $this->productimage3;
        $psid= $this->psid;
        $productquantities= $this->productquantities;
        $brandid= $this->brandid;
        $goalid= $this->goalid;
        
        $sqlStmt="insert into tblproduct values('','$pcid','$pscid','$producttitle','$productdescription'
            ,'$productprice','$productofferprice','$producttotalunits','$productprimaryimage','$productimage1'
                ,'$productimage2','$productimage3','$psid','$productquantities','$brandid','$goalid')";
        $result = $conn->exec($sqlStmt);
        return $result;
    }

}