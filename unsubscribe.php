<?php
session_start();
include_once'usersclass.php';
$user=new users();
$us=$user->delete();
unlink('uploades/'.$_SESSION['id'].'.jpg');
if($us==='ok'){
    header('location:logout.php');
}

?>           

			  