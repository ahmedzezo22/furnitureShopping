<?php
session_start();
if(isset($_SESSION['name'])){
include_once('headerafter.php');
}
?>
<!--<div class="container">
   <!--
    if(isset($_POST['calc'])){
        include_once'designClass.php';
        
        $d=new design();
        $d->setItem($_POST['txtitem']);
        $d->setdescription($_POST['desc']);
        $d->setprice($_POST['price']);
        $d->setcatId($_POST['cat']);
        $img=$_FILES['file']['name'];
        $imgSize=$_FILES['file']['size'];
        $imgTemp=$_FILES['file']['tmp_name'];
        $imgdir='uploades/';
        $r=rand(100,10000);
        $dir=$_SESSION['id'].'sd'.$r;
        $fdir=$imgdir.$dir .'.jpg';
        move_uploaded_file($imgTemp,$fdir);
        $result=$d->add();
        if($result=='ok'){
		echo '<div class=" btn btn-success col-md-6 col-md-offset-3" style="margin-bottom:20px;font-weight:bold;color:#000;font-size:15px">your item added  successfully</div>';
		header('refresh:3;url=index.php');
		exit();
	
  }
        else{
            echo 'wrong';
        }
    }
    
    
    
    ?>
       <form  method="post" enctype="multipart/form-data">
      <div class="col-md-6 register-top-grid col-md-offset-3">
	<h3>Add Design</h3>
	 <div>
	    <span>ItemName</span>
	    <input type="text" name="txtitem" required> 
	</div>
	 <div>
             <span>Description</span>
             <input type="text" name="desc" > 
                </div>
		<div>
		  <span>price</span>
		  <input type="text" name="price" required> 
		</div>
		 <div>
		 <!--<span>discount</span>
		<input type="text" name="txtdisc"placeholder="Enter discount if exist" required> 
		</div>-->
         <!--<div>
		 <span>category</span>
		<select name="cat" class="form-control">
           /*
									include_once'categoryClass.php';
									$cat=new category();
									$result=$cat->getAll();
									
									while($row=mysqli_fetch_assoc($result)){
									?>	
										
        </select>
		</div>
          <span>image</span>
		<input type="file" name="file" class="form-control" > 
		</div>
		  <div>
		 <input type="submit" value="Add now" class="form-control bt btn-primary" style="margin-top:20px;margin-bottom: 10px;padding:4px" name="calc">
		</div>
		<div class="clearfix"> </div>
	</form>
	</div>

</div>
</div>
</div>
 **/
 -->
			 <div class="container">
			<h2 class="text-center" style="margin:20px 0 20px 0">special Designs</h2>
				<div class="row">
			<?php
			include_once'databaseclass.php';
			$db=new database();
			$it=$db->getData('select * from design ');
			while($row=mysqli_fetch_assoc($it)){
	
				  echo '<div class="col-sm-6 col-md-4 col-xs-12 ">';
            echo '<div class="thumbnail" style="width:300px; height:450px">';
             echo '<span>'.$row['price']. '$</span>';
			 if(file_exists('uploades/s'. $row['id'].'.jpg')){
            echo'<img src="uploades/s'. $row['id'].'.jpg" class="img-responsive img-thumbnail center-block imgshow"style="width:300px; height:200px" >';
			 }else{
				echo'<img src="uploades/avatar.jpg"  style="border-radius:50%;width: 200px;height:200px;margin-bottom: 10px" class="pimg">';

			 }
			echo '<div class="caption">';
			echo '<center>';
            echo '<h3  ><a href="#" style="color:rgb(121, 85, 72);">'.$row['itemname'].'</a><h3>';
            echo '<h4>Price: ' .$row['price'].'<h4>';
			echo '</div>';
			 echo '</div>';
            echo '</div>';
			}
			
			
			?>
			
				</div>
			 <div class="clearfix"></div>
			 </div>
			 <?php
			 include_once'footer.php';
			 
			 ?>