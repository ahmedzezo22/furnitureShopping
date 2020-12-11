<?php
session_start();
include_once 'headerAfter.php';


?>

<!--content-->
   <div class=" container">
       <div class=" register">
	<?php

	include_once'usersclass.php';
	$user=new users();
	$us=$user->selectById();
	$row=mysqli_fetch_assoc($us);
    ?>

       <div class="row">
           <div class="col-md-8 register-top-grid col-md-offset-2">
	      <h3 class="text-center" style="margin-bottom: 20px">Personal infomation</h3>
		  <?php
		  $img=$_SESSION['id'];
		  
		  if (file_exists('uploades/'.$img.'.jpg')) {
          	echo'<img src="uploades/'.$img.'.jpg"  style="border-radius:50%;width: 200px;height:200px;margin-left: 250px;margin-bottom: 10px" class="pimg">';


   }else{
echo'<img src="uploades/avatar.jpg"  style="border-radius:50%;width: 200px;height:200px;margin-left: 250px;margin-bottom: 10px" class="pimg">';
 
}
?>
         <table class="table table-striped table-bordered">
          <thead>
            <tr>
           <th scope="col">Name</th>
          <th scope="col" colspan="2" class="text-center"><?php echo $row['username']?></th>
          </tr>
       </thead>
     <tbody>
       <tr>
      <th scope="col">Email</th>
      <th scope="col" colspan="2" class="text-center"><?php echo $row['email']?></th>
    </tr>
    <tr>
      <th scope="col">Password</th>
      <th scope="col" colspan="2" class="text-center"><?php echo $row['password']?></th>
    </tr>
    <tr>
      <th scope="col">Phone</th>
      <th scope="col" colspan="2" class="text-center"><?php echo $row['phone']?></th>
    </tr>
     <tr>
      <th scope="col">Country</th>
      <th scope="col" colspan="2" class="text-center"><?php echo $row['country']?></th>
    </tr>
     <tr><td colspan="2" style="text-align:center"><a href="edit.php" name="btnedit" class="btn btn-danger" style="width:75%">
Edit Profile <a>
</td></tr>

  </tbody>
     
    </table>
           </div>
         <div class="col-md-3">
           </div>
         </div>

           
      	 <div class="clearfix"> </div>

</div>
</div>
      
 <?php
    
 
?>
 <script>
    $('.countrypicker').countrypicker();
  </script>

<?php include_once'footer.php'?> 