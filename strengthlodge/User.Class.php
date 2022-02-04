<?php
class User{
    private $id;
    private $userfname;
    private $userlname;
    private $useremail;
    private $userpassword;
    private $userphone;
    private $useraddress;
    private $userpincode;
    private $usercity;
    private $userstate;
    
    function __construct($id=null, $userfname=null, $userlname=null, $useremail=null,
        $userpassword=null,$userphone=null,$useraddress=null,$userpincode=null,
        $usercity=null, $userstate=null)
    {
        $this->id=$id;
        $this->userfname=$userfname;
        $this->userlname=$userlname;
        $this->useremail=$useremail;
        $this->userpassword=$userpassword;
        $this->userphone=$userphone;
        $this->useraddress=$useraddress;
        $this->userpincode=$userpincode;
        $this->usercity=$usercity;
        $this->userstate=$userstate;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserfname()
    {
        return $this->userfname;
    }

    /**
     * @return string
     */
    public function getUserlname()
    {
        return $this->userlname;
    }

    /**
     * @return string
     */
    public function getUseremail()
    {
        return $this->useremail;
    }

    /**
     * @return string
     */
    public function getUserpassword()
    {
        return $this->userpassword;
    }

    /**
     * @return string
     */
    public function getUserphone()
    {
        return $this->userphone;
    }

    /**
     * @return string
     */
    public function getUseraddress()
    {
        return $this->useraddress;
    }

    /**
     * @return string
     */
    public function getUserpincode()
    {
        return $this->userpincode;
    }

    /**
     * @return string
     */
    public function getUsercity()
    {
        return $this->usercity;
    }

    /**
     * @return string
     */
    public function getUserstate()
    {
        return $this->userstate;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $userfname
     */
    public function setUserfname($userfname)
    {
        $this->userfname = $userfname;
    }

    /**
     * @param string $userlname
     */
    public function setUserlname($userlname)
    {
        $this->userlname = $userlname;
    }

    /**
     * @param string $useremail
     */
    public function setUseremail($useremail)
    {
        $this->useremail = $useremail;
    }

    /**
     * @param string $userpassword
     */
    public function setUserpassword($userpassword)
    {
        $this->userpassword = $userpassword;
    }

    /**
     * @param string $userphone
     */
    public function setUserphone($userphone)
    {
        $this->userphone = $userphone;
    }

    /**
     * @param string $useraddress
     */
    public function setUseraddress($useraddress)
    {
        $this->useraddress = $useraddress;
    }

    /**
     * @param string $userpincode
     */
    public function setUserpincode($userpincode)
    {
        $this->userpincode = $userpincode;
    }

    /**
     * @param string $usercity
     */
    public function setUsercity($usercity)
    {
        $this->usercity = $usercity;
    }

    /**
     * @param string $userstate
     */
    public function setUserstate($userstate)
    {
        $this->userstate = $userstate;
    }


    
    public function Create($conn)
    {
        $username = $this->userfname;
        $email= $this->useremail;
        $passwd= $this->userpassword;
        $contact= $this->userphone;
        
        $sqlStmt="insert into tbluser(userfname,useremail,userpassword
          ,userphone) values ('$username','$email','$passwd','$contact')";
        $result = $conn->exec($sqlStmt);
        return $result;
    }
}

 