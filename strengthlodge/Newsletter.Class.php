<?php
class Newsletter{
    private $email;
    
    function __construct($email=null)
    {
        $this->email=$email;
    }
    
    
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function Create($conn)
    {
        $email= $this->email;
        
        $sqlStmt="insert into tblsubscribe values('','$email','Subscribed')";
        $result = $conn->exec($sqlStmt);
        return $result;
    }
}