<?php
include_once'databaseclass.php';
include_once'interface.php';
class design extends database implements operation{
   var $id; 
  var $itemname; 
 var $description; 
var $price ;
var $datecreated; 
var $userID;
var $catId;
public function setId($Id){
    $this->id=$Id;
}
public function setItem($i){
    $this->itemname=$i;
}
public function setdescription($des){
    $this->description=$des;
}
public function setprice($price){
    $this->price=$price;
}
public function setdate($d){
    $this->datecreated=$d;
}
public function setuser($user){
    $this->userID=$user;
}
public function setcatId($c){
    $this->catId=$c;
}
public function getId(){
    return $this->id;
}
public function getitem(){
    return $this->itemname;
}
public function getdesc(){
    return $this->description;
}
public function getprice(){
    return $this->price;
}
public function getdate(){
    return $this->datecreated;
}
public function getuser(){
    return $this->userID;
}
public function getcat(){
    return $this->catId;
}
public function add(){
    $z=parent::RunDml('INSERT INTO design VALUES("default","'.$this->getitem().'","'.$this->getdesc().'","'.$this->getprice().'",now(),"'.$_SESSION['id'].'","'.$this->getcat().'")');
    return $z;
}
    public function delete(){} 
    public function update(){}
    public function getAll(){}

}

?> 