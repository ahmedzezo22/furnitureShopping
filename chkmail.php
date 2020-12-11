<?php
include_once'header.php';
?>



<div class="container">
    <h1 class="text-center" style="margin-top:30px">Confirm your Email to restore password</h1><br>
<?php
if(isset($_POST['btn'])){
    include_once'usersclass.php';
    $us=new users();
    $email=$us->setemail($_POST['email']);
    $rs=$us->getByEmail();
    if($row=mysqli_fetch_assoc($rs)){
        
        require_once "src/PHPMailer.php";
                            require_once "src/Exception.php";
                            require_once "src/SMTP.php";
                            require_once "vendor/autoload.php";
                                
                                $mail = new  PHPMailer\PHPMailer\PHPMailer();
        
                                $mail->IsSMTP();
                                //$mail->SMTPDebug = 1;
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure = 'ssl';
                                $mail->Host = "smtp.gmail.com";
                                $mail->Port =  465; // or587
                                $mail->IsHTML(true);
    
                                $mail->Username = "ahmedelmajek2000@gmail.com";
                                $mail->Password = "ahmedmandoo";
    
                                $mail->setFrom('ahmedelmajek2000@gmail.com','furnitures');
                           
                                $mail->addAddress($row['email'], "furniture");
                                $mail->Subject = 'Forget Password';
                                $id=$row["userID"];
                                $mail->Body = "Dear Mr/Mrs ".$row['username']."<br/>http://localhost/fu/updatepsw.php?uid=$id";
                              
                                if(!$mail->send()) {
                                  echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                }
                                else{
                                    
                                    echo("<div class='alert alert-success'> Check Your Email </div>");
                                    header('refresh:5;url=login.php');
                                } 

    }else{
        echo'<center>';
        echo '<div class="btn btn-danger">sorry this email incorrect or invalid</div>';
          echo'</center>';
    }

   
}
?>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
    <form  method="post" class="text-center">
        <div>
        <input type="text" name="email" class="form-control" style="margin: 100px 0 10px 0" placeholder="Enter your email">
        </div>
        <input type="submit" name="btn" class="btn btn-primary" value="confirm" style="margin-bottom: 20px">
    </form>
        </div>
      </div>
    
    
</div>


<?php include_once'footer.php'?>










<?php


?>