
<?php
            include_once 'databaseclass.php';
            include_once'interface.php';
            class users extends database implements operation{
            var $userID; 
            var $username; 
            var $email; 
            var $password; 
            var $country; 
            var $phone;

           public function getUserID(){
            return $this->userID;
           }
           public function getName(){
            return $this->username;
           }
           public function getemail(){
            return $this->email;
           }
           public function getcountry(){
            return $this->country;
           }
        public function getphone(){
            return $this->phone;
           }

         public function getpassword(){
            return $this->password;
           }
        public function setName($name){
            $this->username=$name;
        }
       public function setID($id){
        $this->userID=$id;
       }
       public function setemail($email){
        $this->email=$email;
       }
       public function setpassword($pass){
        $this->password=$pass;
       }
        public function setcountry($co){
        $this->country=$co;
       }
        public function setphone($phone){
        $this->phone=$phone;
       }
       public function add(){
       $z= parent::RunDml('INSERT INTO users VALUES("default","'.$this->getName().'","'.$this->getemail().'","'.$this->getpassword().'","'.$this->getcountry().'","'.$this->getphone().'")');
       return $z;
       }
       public function login(){
         $z=parent::getData("SELECT * FROM users WHERE (email='".$this->getemail()."' OR phone='".$this->getphone()."') && password='".$this->getpassword()."'");
       return $z;
       
       }
       public function selectById(){
            $result=parent::getData("SELECT * FROM users WHERE userID='".$_SESSION['id']."'");
            return $result;
       }
    public function delete(){
             $z=parent::RunDml("DELETE FROM users WHERE userID ='".$_SESSION['id']."'");
       return $z; 
        
    }
    public function update(){
            
            $z=parent::RunDml("UPDATE users set username='".$this->getName()."', email='".$this->getemail()."', password='".$this->getpassword()."',country='".$this->getcountry()."',phone='".$this->getphone()."' WHERE userID ='".$_SESSION['id']."'");
       return $z; 
    }
     public function selectById2(){
            $result=parent::getData("SELECT * FROM users WHERE userID='".$_GET['uid']."'");
            return $result;
       }
     public function updatePsw(){
            
            $z=parent::RunDml("UPDATE users set password='".$this->getpassword()."' WHERE userID='".$_GET['uid']."'");
            return $z;
    }
    public function getAll(){}
    public function getByEmail(){
        $z=parent::getData("SELECT * FROM users WHERE email='".$this->getemail()."'");
        return $z;
    }
}