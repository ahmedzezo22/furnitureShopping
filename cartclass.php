<?php
include_once'databaseclass.php';
include_once'interface.php';
class cart extends database implements operation{
   var $id;
var $price; 
var $qty; 
var $total; 
var $userID; 
var $itemID;
public function setprice($s){
   $this->price=$s;
}
public function getprice(){
  return $this->price;
}
public function settotal($t){
   $this->total=$t;
}
public function gettotal(){
   return $this->total;
}
public function setitem($i){
   $this->itemID=$i;
}
public function getitem(){
  return $this->itemID;
}
public function setQty($Q){
   $this->qty=$Q;
}
public function getqty(){
   return $this->qty;
}


 public function getAll(){
   $result=parent::getData("SELECT count(*) AS COUNT FROM cart WHERE userID=".$_SESSION['id']."");
    return $result;
 
 }
 public function getTotalPrice(){
    $result=parent::getData("SELECT SUM(total) AS total FROM cart WHERE userID=".$_SESSION['id']."");
    return $result;
 
 }
    public function delete(){}
    public function update(){}
   public function add(){
      $z=parent::RunDml("INSERT INTO cart VALUES('default','".$this->getprice()."','1','".$this->getprice()."','".$_SESSION['id']."','".$this->getitem()."')");
      return $z;
    }
    // add quantity
     public function addQt(){
      $z=parent::RunDml("INSERT INTO cart VALUES('default','".$this->getprice()."','".$this->getqty()."',('".$this->getprice(). "'*'".$this->getqty()."') ,'".$_SESSION['id']."','".$this->getitem()."')");
      return$z;
    }
}


?>