<?php
   class database{
    var $con;
    public function __construct(){
        $this->con=mysqli_connect("localhost","root","","furniture");
    }
    //to insert update delete
    public function RunDml($stmt){
        if(!mysqli_query($this->con,$stmt)){
            return mysqli_error($this->con);
        }else{
            return 'ok';
        }
    }
    //to search
    public function getData($select){
        $result=mysqli_query($this->con,$select);
        return $result;
    }
   }
?>