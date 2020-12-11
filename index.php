<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
session_start();
if(isset($_SESSION['name'])){
include_once'headerAfter.php';
}else{
	include_once'header.php';
}

?>
<!--content-->
              <div class="container">
				<h2 class="text-center" style="margin:20px 0 20px 0">Featured PRODUCTS</h2>
				
				<div class="row">
					
				<?php
				include_once'itemsclass.php';
				$item=new items();
				$it=$item->getAll();
				 
				while($row=mysqli_fetch_assoc($it)){
	
				  echo '<div class="col-sm-6 col-md-4 col-xs-12 ">';
            echo '<div class="thumbnail" style="width:300px; height:450px">';
             echo '<span>'.($row['price'] - $row['discount']).'$</span>';
			 if(file_exists('uploades/i'. $row['itemID'].'.jpg')){
            echo'<img src="uploades/i'. $row['itemID'].'.jpg" class="img-responsive img-thumbnail center-block imgshow"style="width:300px; height:200px" >';
			 }else{
				echo'<img src="uploades/avatar.jpg"  style="border-radius:50%;width: 200px;height:200px;margin-bottom: 10px" class="pimg">';

			 }
			echo '<div class="caption">';
			echo '<center>';
            echo '<h3  ><a href="singleitem.php?id='.$row['itemID'].'" style="color:rgb(121, 85, 72);">'.$row['ItemName'].'</a><h3>';
            echo '<h4>Price: ' .$row['price'].'<h4>';
             echo '<div class="date"> Discount: ' .$row['discount'].'</div>';
			 for($i=0;$i<$row['rate'];$i++){
				echo '<i class="fa fa-star"></i>';}
				for($i=0;$i<5-$row['rate'];$i++){
					echo '<i class="fa fa-star-o"></i>';
				}

			 
			 if(isset($_SESSION['name'])){
				echo '<form method="post">';
			 echo'<br><input type="submit" name="cart'.$row['itemID'].'" value="Add to cart" class="btn btn-success" style="display:block;margin-top:10px">';
			 echo '</form>';
			 }else{
			 echo'<br><a href="login.php" class="btn btn-success" style="margin-top:10px">Add to cart</a>';
								
			 }
			 
			 if(isset($_POST['cart'.$row['itemID'].''])){
				include_once 'cartclass.php';
				
				$t=new cart();
				$t->setitem($row['itemID']);
				$t->setprice($row['price']);
				$s=$t->add();
				if($s=='ok'){
					echo'<div class="alert alert-success" style=width:200px;>item Added</div>';
					header('REFRESH:3');
				}else{
					echo 'no';
				}
				
			 }
			 /* inline sql
			  *include_once'databaseclass.php';
				$db=new database();
        $z=$db->RunDml("INSERT INTO cart VALUES('default','".$row['price']."','1','".$row['price']."','".$_SESSION['id']."','".$row['itemID']."')");
				if($z=='ok'){
			  * 
			 */
				echo '</center>';
             echo '</div>';
            echo '</div>';
            echo '</div>';
				
				}
			
			 
				?>
	</div>
			  </div>
	

<?php include_once'footer.php'?>

