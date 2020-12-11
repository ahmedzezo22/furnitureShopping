<?php
session_start();
if(isset($_SESSION['name'])){
include_once 'headerAfter.php';
}else{
	include_once'header.php';
}

			if(isset($_GET['search'])){
				include_once'itemsclass.php';
				$it=new items();
				$it->setitem($_GET['a']);
				$r=$it->getAllitems();
				echo '<div class="container">';
				while($row=mysqli_fetch_assoc($r)){
				  echo '<div class="col-sm-6 col-md-4 col-xs-12 ">';
            echo '<div class="thumbnail" style="width:300px; height:400px;margin-top:30px">';
             echo '<span>'.($row['price'] - $row['discount']).'$</span>';
            echo'<img src="uploades/i'. $row['itemID'].'.jpg" class="img-responsive img-thumbnail center-block imgshow"style="width:300px; height:200px" >';
            echo '<div class="caption">';
			echo '<center>';
            echo '<h3  ><a href="singleitem.php?id='.$row['itemID'].'" style="color:rgb(121, 85, 72);">'.$row['ItemName'].'</a><h3>';
            echo '<h4>Price: ' .$row['price'].'<h4>';
             echo '<div class="date"> Discount: ' .$row['discount'].'</div>';
			 for($i=0;$i<$row['rate'];$i++){
				echo'<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
</svg>&nbsp;';
			 }
			 echo'<br><a href="#" class="btn btn-success" style="margin-top:10px">Add to cart</a>';
			 echo '</center>';
             echo '</div>';
            echo '</div>';
            echo '</div>';
				}
			
			}
			echo '</div>';
			?>

			
	