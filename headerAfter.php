<?php
ob_start();?>
<!DOCTYPE html>
<html>
<head>
<title>furnitures</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mattress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="js/simpleCart.min.js"> </script>
<script src="js/main.js"> </script>
</head>
<body>
<!--header-->
<div class="header">
	
	<div class="header-top">
		<div class="container">
			<div class="social">
				<ul>
					<li><a href="#"><i class="facebok"> </i></a></li>
					<li><a href="#"><i class="twiter"> </i></a></li>
					<li><a href="#"><i class="inst"> </i></a></li>
					<li><a href="#"><i class="goog"> </i></a></li>
						<div class="clearfix"></div>	
				</ul>
			</div>
			<div class="header-left">
				
			
			
				<div class="search-box">
					<div id="sb-search" class="sb-search">
						<form  method="get" action="searchpage.php">
							<input class="sb-search-input" placeholder="Enter your search term..." type="search"  id="search" name="a">
							<input class="sb-search-submit" type="submit" value="search" name="search">
							<span class="sb-icon-search"> </span>
						</form>
					</div>
				</div>
				
			
<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
					<!-- //search-scripts -->

				<div class="ca-r">
					<div class="cart box_1">
						<a href="checkout.php">
						<h3> <div class="total">
							<span class="simpleCart"><?php
							include_once 'cartclass.php';
							$c=new cart();
							$s=$c->getTotalPrice();
							if($row=mysqli_fetch_assoc($s)){
								echo $row['total'].' L.E';
							}
							
							
							
							?></span> </div>
							<img src="images/cart.png" alt=""/>
						<!--include_once'databaseclass.php';
							//$r=new database();
							//$s=$r->getData("SELECT COUNT(*)  FROM cart")->num_rows;
                           //echo $s;
?>-->
						<?php
							include_once 'cartclass.php';
							$c=new cart();
							$s=$c->getAll();
							if($row=mysqli_fetch_assoc($s)){
								echo $row['COUNT'];
							}
							
							
							
							?>
							
							</h3>
						</a>
						<p><a href="order.php" class="simpleCart_empty" style="color: rgba(255,207,207,1)">your order</a></p>

					</div>
				</div>
					
			</div>
			<div class="clearfix"> </div>
				
		</div>
		
	</div>
		</div>
	</div>

		<div class="container">
			<div class="head-top">
				<div class="logo">
					<h1><a href="index.php">Furnitures</a></h1>
				</div>
		  <div class=" h_menu4">
			<ul class="memenu skyblue">
					  
					 <li class="grid"><a class="color2" href="#">Departments</a>
					  	<div class="mepanel">
						<div class="row">
								<div class="col1">
								<div class="h_nav">
									<ul>
								<?php
									include_once'categoryClass.php';
									$cat=new category();
									$result=$cat->getAll();
									
									while($row=mysqli_fetch_assoc($result)){
									?>	
										<li><a href="products.php?catId=<?php echo $row['categoryID']?>"><?php echo $row['categoryName'] ?></a></li>
									
									<?php } ?>
									</ul>
									</div>								
							</div>
					 
				<li><a class="color4" href="specialdesign.php">special Designs</a></li>
				<li><a class="color4" href="logout.php">Logout</a></li>
				<li><a class="color4 confirm" href="unsubscribe.php">Unsubscribe</a></li>
				<li><a class="color4" href="contact.php">Contact</a></li>
				<li><a class="color4" href="profile.php">
					Hello:<?php
					if(isset($_SESSION['name'])){
					echo $_SESSION['name'];
					
					}
				
					?>
					</a></li>
					<?php
					
					
				      $img=$_SESSION['id'];
					  if (file_exists('uploades/'.$img.'.jpg')) {
  		echo'<li><img src="uploades/'.$img.'.jpg"  style="border-radius:50%;width: 50px;height: 50px;margin-top:-10px" class="pimg"></li>';

}else{
  		echo'<li><img src="uploades/avatar.jpg"  style="border-radius:50%;width: 50px;height: 50px;margin-top:-10px" class="pimg"/></li>';

}
					
					?>
						</div>
						</div>
			
		
			</div>
				
				<div class="clearfix"> </div>
		</div>
		</div>
	</div>
	<div class="banner">
		<div class="container">
			  <script src="js/responsiveslides.min.js"></script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
			<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider">
			    <li>
					
						<div class="banner-text">
							<h3>Lorem Ipsum is   </h3>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
						
						</div>
				
				</li>
				<li>
					
						<div class="banner-text">
							<h3>There are many  </h3>
						<p>Popular belief Contrary to , Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
												

						</div>
					
				</li>
				<li>
						<div class="banner-text">
							<h3>Sed ut perspiciatis</h3>
						<p>Lorem Ipsum is not simply random text. Contrary to popular belief, It has roots in a piece of classical Latin literature from 45 BC.</p>
								

						</div>
					
				</li>
			</ul>
		</div>

	</div>
	</div>
	
	
