<?php
session_start();
include_once'header.php';
if(isset($_COOKIE['userCookie'])){
	header('location:index.php');
}
?>
<!--content-->
<div class="container">
<?php
 if(isset($_POST['login'])){
	if(isset($_POST['chk'])){
	setcookie('userCookie',$_POST['txtname'],time()+24*60*60*365);	
		
	}
	include_once'usersclass.php';
	$user=new users();
	$name=$user->setemail($_POST['txtname']);
	$phone=$user->setphone($_POST['txtname']);
	$pass=$user->setpassword($_POST['txtpass']);
	
	$result=$user->login();
	if($row=mysqli_fetch_assoc($result)){
		$_SESSION['name']=$row['username'];
		$_SESSION['id']=$row['userID'];
		header('location:index.php');
		}else{
		echo '<div class="alert alert-danger">you must enter valid email or password or register</div>';
	}
	
		
		
	
 }
?>
        			
		<div class="account">
		<div class="account-pass">
		<div class="col-md-8 account-top">
			<form  method="post">
				
			<div> 	
				<span>Email</span>
				<input type="text" name="txtname"> 
			</div>
			<div> 
				<span >Password</span>
				<input type="password" name="txtpass">
			</div>
			<div>
				Remember me <input type="checkbox" name="chk">
				&nbsp;&nbsp;<a href="chkmail.php">forget your password</a>
			</div>
		
				
			
				<input type="submit" value="Login" name="login"> 
			</form>
		</div>
		

		<div class="col-md-4 left-account ">
			<?php
			include_once'itemsclass.php';
			$it=new items();
			$rs=$it->getitemWithDisc();
			if($row=mysqli_fetch_assoc($rs)){
			?>
			<a href="singleitem.php?id=<?php echo $row['itemID'] ?>"><img class="img-responsive " src="uploades/i<?php echo $row['itemID'].'.jpg' ?>" alt=""></a>
			<div class="five">
			<h2><?php echo $row['discount'] ?> %</h2><span>discount</span>
			</div>
			<a href="register.php" class="create">Create an account</a>
			<?php
			}
			?>
<div class="clearfix"> </div>
		</div>
	<div class="clearfix"> </div>
	</div>
	</div>

</div>

<!--//content-->

<?php include_once'footer.php';