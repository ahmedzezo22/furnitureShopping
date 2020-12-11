<?php
include_once'databaseclass.php';
include_once'interface.php';
class items extends database implements operation{
var $itemID;
var $ItemName; 
var $price; 
var $status; 
var $discount; 
 var $productID;

public function setitem($s){
 $this->ItemName=$s;
}
public function getitem(){
 return $this->ItemName;
}
    public function add(){}
    public function delete(){}
    public function update(){}
       public function getAll(){
        $result=parent::getData("SELECT * FROM items ORDER BY itemID DESC");
        return $result;
    }
    public function selectItemById(){
        $result=parent::getData("SELECT * FROM items WHERE itemID='".$_GET['id']."'");
        return $result;
    }
    public function getByCatId(){
     $z=parent::getData("SELECT * FROM `items`  WHERE productID='".$_GET['catId']."' ");
     return $z;
    }
    public function getAllitems(){
        $result=parent::getData("SELECT * FROM `items` WHERE ItemName LIKE '%".$this->getitem()."%'");
        return $result;

}
 public function getitemWithDisc(){
        $result=parent::getData("SELECT * FROM `items` WHERE discount=25");
        return $result;

}
//public function getcatName(){
 //$productId=$_GET['catId'];
  // $z=parent::getData("SELECT * FROM category INNER JOIN items WHERE  items.productID='".$_GET['catId']."'AND category.categoryID=items.productId");
   //return $z;
//}

}
?>