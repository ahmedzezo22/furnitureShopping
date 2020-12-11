<?php
include_once'databaseclass.php';
include_once'interface.php';
class comments extends database implements operation{
    var $id;
    var $comment;
    var $status;
    var $userID;
    var $itemId;

    public function setID($id){
        $this->id=$id;
    }
  
  /*  public function setstatus($s){
        $this->status=$s;
    }
    public function setuser($u){
        $this->userID=$u;
    }
    public function setitem($i){
        $this->itemId=$i;
    }*/
    public function getId(){
        return $this->id;
    }
    public function getcomment(){
        return $this->comment;
    }
      public function setcomment($c){
        $this->comment=$c;
    }
  /*  public function getstatus(){
        return $this->status;
    }
    public function getuser(){
        return $this->userID;
    }
    public function getitem(){
        return $this->itemId;
    }*/
     public function add(){
        
        $z=parent::RunDml('INSERT INTO comments VALUES("default","'.$this->getcomment().'","1",'.$_SESSION['id'].','.$_GET['id'].')');
        return $z;
     }
    public function delete(){}
    public function update(){}
    public function getAll(){
        $result=parent::getData('SELECT * FROM comments INNER JOIN users WHERE users.userID=comments.userID AND itemId="'.$_GET['id'].'" ORDER BY id DESC');
        return $result;
    }
     public function get(){
   $result=parent::getData("SELECT count(*)  FROM comments");
    return $result;
 
 }
   
    
    
}


?>