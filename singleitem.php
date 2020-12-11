<?php
session_start();
if(isset($_SESSION['name'])){
	include_once'headerAfter.php';
}else{
	include_once'header.php';
}


?>
	<!-- grow -->
		<div class="product">
			<div class="container">
				
				<div class="product-price1">
				<div class="top-sing">
				<div class="col-md-7 single-top">	
						<div class="flexslider">
	
					
			  <ul class="slides">
				<?php
				include_once'itemsclass.php';
				$item=new items();
				$rs=$item->selectItemById();
				if($row=mysqli_fetch_assoc($rs)){
				?>
			
			    <li data-thumb="uploades/i<?php echo $row['itemID'] ?>.jpg">
						
			        <div class="thumb-image"> <img src="uploades/i<?php echo $row['itemID'] ?>.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <li data-thumb="uploades/si<?php echo $row['itemID'] ?>.jpg">
			         <div class="thumb-image"> <img src="uploades/si<?php echo $row['itemID'] ?>.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <li data-thumb="uploades/sia<?php echo $row['itemID'] ?>.jpg">
			       <div class="thumb-image"> <img src="uploades/sia<?php echo $row['itemID'] ?>.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li> 
				 <li data-thumb="uploades/sib<?php echo $row['itemID'] ?>.jpg">
			       <div class="thumb-image"> <img src="uploades/sib<?php echo $row['itemID'] ?>.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			  </ul>
		</div>
				

	<div class="clearfix"> </div>
<!-- slide -->
          </div>
				</div>
				</div>

						<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>

$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
                       
					<div class="col-md-5 single-top-in simpleCart_shelfItem">
						<div class="single-para ">
						<h4><?php echo $row['ItemName'] ?></h4>
							<div class="star-on">
								
								<div class="views">
									<a href="#">
										1 customer review
									</a>
									
								</div>
							<div class="clearfix"> </div>
							</div>
							
							<h5 class="item_price"><?php echo $row['price']-$row['discount']?>$</h5>
							<p><?php echo $row['description']?></p>
							<form method="post">
							<?php
							if(isset($_SESSION['id'])){
								echo '<span style="color:#000;font-weight:bold">Quantity</span> <input type="number" value="1"name="qty" class="text-center" style="margin-bottom:20px"><br>';
								echo'<input type="submit" class="btn btn-success"name="add" value="ADD TO CART">';
								
								}else{
							echo'<input type="submit" class="btn btn-danger" disabled value="ADD TO CART">';
							

								}
								echo '</form>';
								if(isset($_POST['add'])){
				include_once 'cartclass.php';				
				$t=new cart();
				$t->setitem($row['itemID']);
				$t->setprice($row['price']);
				$t->setQty($_POST['qty']);
				$s=$t->addQt();
				if($s=='ok'){
					echo'<div class="alert alert-success" style="width:200px;margin-top:20px">item Added</div>';
				}else{
					echo 'no';
				}
				
			 }
									?>
                                  <form method="post">
								<textarea name="c" required placeholder="Leave you comment" style="width: 403px; height: 40px;margin-top: 20px;line-height: 33px;"></textarea>
								<?php if(isset($_SESSION['name'])){
									echo'<input type="submit" name="sub" value="Add comment" class="btn btn-primary">';
								}else{
						 	echo'<input type="submit" name="sub" value="Add comment" class="btn btn-primary" disabled>';

								}?>
								
                                        </form>



								<?php
								if(isset($_POST['sub'])){
                                  include_once'commentsClass.php';
									$ob=new comments();
									$ob->setcomment($_POST['c']);
									$result=$ob->add();
									if($result==='ok'){
										echo '<div class="alert alert-success" style="margin-top:10px">thanks for your comment</div>';
									}else{
										echo 'no';
									}
								}
?>
							
						</div>
					</div>
					
				<div class="clearfix"> </div>
				<h1 class="text-center" style="margin-top:20px">Our customer comments </h1>
				<?php
				if(isset($_SESSION['name'])){
				include_once'commentsClass.php';
				$co=new comments();
				$r=$co->getAll();
				while($row=mysqli_fetch_assoc($r)){
					echo'<div class="text-center alert alert-success"style="margin-top:20px">'.$row['comment'].' <span style="color:#f00">Added By customer '.$row['username'].'</span></div>';
				}
				}
				
				?>
				</div>
				<!-- comment -->
			
			</div>
			
				
        <?php } ?>
		
<?php include_once'footer.php'?>