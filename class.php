<?php
include_once "databaseclass.php";
class working extends database implements operation
{
    var $coID;	
    var $co_name;	
    var $Area;	
    var $street;	
    var $Building_no;	
    var $email;	
    var $password;
    var $phone;
    public function SetCoID($coId)
    {
        $this->coID =$coId ;
    }
    public function SetCoName($co_Name)
    {
        $this->co_name =$co_Name;
    }
    public function SetArea($area)
    {
        $this->Area =$area;
    }
    public function SetStreet($street)
    {
        $this->street =$street;
    }
    public function SetBuildingNo($buildno)
    {
        $this->Building_no =$buildno;
    }
    public function SetEmail($email)
    {
        $this->email = $email;
    }
    public function SetPassword($password)
    {
        $this->password = $password;
    }
    public function SetPhone($phone)
    {
        $this->phone = $phone;
    }
    public function GetCoID()
    {
       return $this->coID;
    }
    public function GetCoName()
    {
        return $this->co_name;
    }
    public function GetEmail()
    {
        return $this->email;
    }
    public function GetPassword()
    {
        return $this->password;
    }
    public function GetArea()
    {
        return $this->Area;
    }
    public function GetBuildingNo()
    {
        return $this->Building_no;
    }
    public function GetStreet()
    {
        return $this->street;
    }
    public function GetPhone()
    {
        return $this->phone;
    }
    public function AddWorkingSpace()
    {
        $ad = parent::RunDML("insert into workingspace values(Default,'".$this->GetCoName()."','".$this->GetBuildingNo()."','".$this->GetStreet()."','".$this->GetArea()."','".$this->GetEmail()."','".$this->GetPassword()."','".GetPhone()."')");
        return $ad;
    }
    public function Update()
    {
        $ad = parent::RunDML("update workingspace set name='".$this->GetName()."',email='".$this->GetEmail()."',password='".$this->GetPassword()."',phone='".$this->GetPhone()."',address='".$this->GetAddress()."' where coID='".$_SESSION["id"]."'");
        return $ad;
    }
    public function Delete()
    {
        $ad = parent::RunDML("delete from workingspace where coID = '".$_SESSION["id"]."'" );
        return $ad;
    }
    public function GetAll()
    {

    }
    public function WorkingSpaceLogin()
    {
       $result = parent::GetData("select * from workingspace where email ='".$this->GetEmail()."' and password = '".$this->GetPassword()."' ");
       return $result;    
    }
    public function GetWorkingSpaceByID()
    {
       $result = parent::GetData("select * from workingspace where (coID ='".$_SESSION["id"]."')");
       return $result;    
    }
    public function GetWorkingSpaceByIDPass()
    {
       $result = parent::GetData("select * from workingspace where (coID ='".$_GET["uid"]."')");
       return $result;    
    }
    public function GetWorkingSpaceByEmail()
    {
       $result = parent::GetData("select * from workingspace where (email = '".$this->GetEmail()."')");
       return $result;    
    }
}
?>