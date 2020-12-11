
<!-- start all countries in selectbox -->

<!-- end select box -->


<?php

session_start();
include_once 'headerAfter.php';
?>

<?php

	include_once'usersclass.php';
	$user=new users();
	$us=$user->selectById();
	$row=mysqli_fetch_assoc($us);
    ?>

<div class=" container">
    <?php 
	 if(isset($_POST['calc'])){
	include_once'usersclass.php';
	$user=new users();
    $name=$user->setName($_POST['txtname']);
    $email=$user->setemail($_POST['txtmail']);
	$country=$user->setcountry($_POST['co']);
	$phone=$user->setphone($_POST['txtphone']);
	$pass=$user->setpassword($_POST['txtpass']);
    $img=$_FILES['file']['name'];
    $img_tmp=$_FILES['file']['tmp_name'];
    $imgSize=$_FILES['file']['size'];
    $dir='uploades/';
    $image=$_SESSION['id'];
    $fdir=$dir.$image.'.jpg';
    move_uploaded_file($img_tmp,$fdir);
	$result=$user->update();
	if($result==='ok'){
		header('location:profile.php');
		exit();
	
  }
  
        
        
     }?>
	
<div class=" register">
     <form  method="post" enctype="multipart/form-data">
      <div class="col-md-6 register-top-grid col-md-offset-3">
	<h3>Personal infomation</h3>
    <div>
	    <span>userName</span>
	    <input type="text" name="txtname" value="<?php echo $row['username']?>"> 
	</div>
	 <div>
             <span>E-mail</span>
             <input type="email" name="txtmail" value="<?php echo $row['email']?>"> 
                </div>
		<div>
		  <span>password</span>
		  <input type="password" name="txtpass"  value="<?php echo $row['password']?>"> 
		</div>
		 <div>
		 <span>phone</span>
		<input type="text" name="txtphone" value="<?php echo $row['phone']?>"> 
		</div>
		 <div>
		   <span>country</span>
		   <select class="selectpicker countrypicker form-control2" data-flag="true" name="co"  value="<?php echo $row['country']?>"></select>
		</div>
         <div>
		 <span>image</span>
		<input type="file" name="file" class="form-control" > 
		</div>
		 <input type="submit" value="Update" class="form-control bt btn-primary" style="margin-bottom:20px;padding:4px;margin-top:20px" name="calc">
		</div>
		<div class="clearfix"> </div>
	</form>
	</div>
    </div>
   </div>
   
    <link rel="stylesheet" href="//unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css" type="text/css" />
  <link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />

  <script src="//unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
  <script src="//unpkg.com/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="//unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
  <script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
  

 
  <script src="js/main.js"> </script>
 
<script>
    $('.countrypicker').countrypicker();
  </script>

<?php include_once'footer.php' ?>