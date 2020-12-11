<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
session_start();
if(isset($_SESSION['name'])){
    include'headerafter.php';?>
   <div class="container">
				<div class="row">
					
				<?php
				include_once'categoryClass.php';
				$item=new  category ();
                $pro=$item-> getcatName();
				$rs=mysqli_fetch_assoc($pro);
				echo'<h2 class="text-center" style="margin:20px 0 20px 0">'.$rs['categoryName'].'</h2>';
				include_once'itemsclass.php';
				$item=new items();
				$it=$item->getByCatId();
				while($row=mysqli_fetch_assoc($it)){
					
					
				
				  echo '<div class="col-sm-6 col-md-4 col-xs-12 ">';
            echo '<div class="thumbnail" style="width:300px; height:400px">';
             echo '<span>'.($row['price'] - $row['discount']).'$</span>';
            echo'<img src="uploades/i'. $row['itemID'].'.jpg" class="img-responsive img-thumbnail center-block imgshow"style="width:300px; height:200px" >';
            echo '<div class="caption">';
			echo '<center>';
            echo '<h3  ><a href="singleitem.php?id='.$row['itemID'].'" style="color:rgb(121, 85, 72);">'.$row['ItemName'].'</a><h3>';
            echo '<h4>Price: ' .$row['price'].'<h4>';
             echo '<div class="date"> Discount: ' .$row['discount'].'</div>';
			 for($i=0;$i<$row['rate'];$i++){
				echo'<i class="fa fa-star"></i>';
			 }
			 for($i=0;$i<5-$row['rate'];$i++){
				echo'<i class="fa fa-star-o "></i>';
			 }
			 echo'<br><a href="#" class="btn btn-success" style="margin-top:10px">Add to cart</a>';
			 echo '</center>';
             echo '</div>';
            echo '</div>';
            echo '</div>';
				}
				?>
	</div>
			  </div>
   
              <?php
    
    
    
}else{
    
  header('location:login.php');
 
    
}
		
	
