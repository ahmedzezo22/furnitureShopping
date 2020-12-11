<?php
include_once"databaseClass.php";
include_once"interface.php";
class category extends database implements operation{
    var $categoryID ;
    var $categoryName;
    public function setCatId($id){
        $this->categoryID;
    }
    public function setCatName($name){
        $this->categoryName;
    }
    public function getID(){
        return $this->categoryID;
    }
    public function getName(){
        return $this->categoryName;
    }
    public function getAll(){
        $result=parent::getData("SELECT * FROM category ORDER BY categoryID DESC");
        return $result;
    }
     public function add(){}
    public function delete(){}
    public function update(){}
    public function getcat(){}
 //$productId=$_GET['catId'];
 public function getcatNAME(){
   $z=parent::getData("SELECT * FROM category WHERE categoryID=".$_GET['catId']." ");
   return $z;
}
    
}



?>