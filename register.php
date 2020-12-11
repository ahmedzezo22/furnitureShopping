
<?php
include_once 'header.php';

?>
<!-- start all countries in selectbox -->

  <link rel="stylesheet" href="//unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css" type="text/css" />
  <link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />

  <script src="//unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
  <script src="//unpkg.com/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="//unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
  <script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
  

<!-- end select box -->

<!--content-->
<div class=" container">
	
	
<div class=" register">
	<?php
  if(isset($_POST['calc'])){
	include_once'usersclass.php';
	$user=new users();
	$name=$user->setName($_POST['txtname']);
	$email=$user->setemail($_POST['txtmail']);
	$country=$user->setcountry($_POST['co']);
	$phone=$user->setphone($_POST['txtphone']);
	$pass=$user->setpassword($_POST['txtpass']);
	$formError=array();
	$rs=$user->getByEmail();
	$count=mysqli_num_rows($rs);
	
	
	if($count==1){
		$formError[]= '<div class=" btn btn-success col-md-6 col-md-offset-3" style="margin-bottom:20px;font-weight:bold;color:#000;font-size:15px">sorry this email exist</div>';
	}if(empty($formError)){
	$result=$user->add();
	if($result==='ok'){
		echo '<div class=" btn btn-success col-md-6 col-md-offset-3" style="margin-bottom:20px;font-weight:bold;color:#000;font-size:15px">you register successfully</div>';
		header('refresh:3;url=login.php');
		exit();
	
  }
  }
  }
  if(isset($formError)){
  foreach($formError as $error){
	echo $error."<br>";
  }
  }
  ?>
	
   <form  method="post">
      <div class="col-md-6 register-top-grid col-md-offset-3">
	<h3>Personal infomation</h3>
	 <div>
	    <span>userName</span>
	    <input type="text" name="txtname" required> 
	</div>
	 <div>
             <span>E-mail</span>
             <input type="email" name="txtmail" required> 
                </div>
		<div>
		  <span>password</span>
		  <input type="password" name="txtpass" required> 
		</div>
		 <div>
		 <span>phone</span>
		<input type="text" name="txtphone" required> 
		</div>
		 <div>
		   <span>country</span>
		   <select class="selectpicker countrypicker" data-flag="true" name="co" ></select>
		</div>
		  <div>
		 <input type="submit" value="Register" class="form-control bt btn-primary" style="margin-top:20px;margin-bottom: 10px;padding:4px" name="calc">
		</div>
		<div class="clearfix"> </div>
	</form>
	</div>

</div>
</div>

<!--//content-->

		 <script>
    $('.countrypicker').countrypicker();
  </script>
<?php include_once'footer.php'?> 