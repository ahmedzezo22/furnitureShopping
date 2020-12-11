<?php
include_once'header.php';
?>



<div class="container">
   
    <?php
    include_once'usersclass.php';
    $user=new users();
    $result=$user->selectById2();
    if($row=mysqli_fetch_assoc($result)){
         echo'<h1 class="text-center" style="margin-top:30px">welcome <span style="color:#fc906e">'.$row['username'].'</span> to update password </h1><br>';
    }
    
    
    
    ?>
    
    
    <?php
    if(isset($_POST['btn'])){
        include_once'usersclass.php';
        $us=new users();
        $psw=$us->setpassword($_POST['pass']);
        $rs=$us->updatePsw();
        if($rs=='ok'){
            echo'<center>';
             echo '<div class="btn btn-danger">Your password updated successfully</div>';
             echo'</center>';
             header('refresh:4;url=login.php');
        }
    }
    
    
    ?>
    <?php
    
    ?>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
    <form  method="post" class="text-center">
        <div>
        <input type="password" name="pass" class="form-control" style="margin: 100px 0 10px 0" placeholder="Enter New password">
        </div>
        <input type="submit" name="btn" class="btn btn-primary" value="update" style="margin-bottom: 20px">
    </form>
        </div>
      </div>
    
    
</div>