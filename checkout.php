<?php
session_start();
if(isset($_SESSION['id'])){
	include_once'headerAfter.php';
}else{
	include_once'header.php';
}
?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Checkout</h2>
		</div>
	</div>
	<!-- grow -->
<div class="container">
	<div class="check">	 
			 <h1>Your Shopping Bag</h1>
		 <div class="col-md-9 cart-items">
			
				
			 <!--<div class="cart-header">
				 <!--<div class="close1"> </div>
				 <!--<div class="cart-sec simpleCart_shelfItem">
						<!--<div class="cart-item cyc">-->
						<form  method="post">
							<table class="table table-hover">
					
					
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
	  <th scope="col">itemName</th>
	  <th scope="col">Qty</th>
      <th scope="col">price</th>
      <th scope="col">Total</th>
	  <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
	<?php
							
							include_once'databaseclass.php';
							$db=new database();
							$s=$db->getData("SELECT * FROM cart inner join items WHERE cart.itemID=items.itemID AND userID=".$_SESSION['id']." ");
							$x=0;
							while($row=mysqli_fetch_assoc($s)){
							
							?>
    <tr>
      <th scope="row"><?php echo ++$x; ?></th>
      <td> <img src="uploades/i<?php echo $row['itemID'] ?>.jpg" style="width:100px; height: 50px"class="img-responsive" alt=""/>'</td>
      <td><?php echo $row['ItemName']?></td>
      <td><?php echo $row['qty'] ?></td>
	  <td><?php echo $row['price'] ?></td>
	   <td><?php echo $row['total'] ?></td>
	   
	<td>
		
		<input type="submit" value="delete"  name="de<?php echo $row['id'] ?>" class="btn btn-danger">
		<input type="submit" value="confirm"  name="co<?php echo $row['id'] ?>" class="btn btn-success">

	   	  
		</td>
	</tr>


						<?php
							
					if(isset($_POST['de'.$row['id'].''])){
						//include_once'databaseclass.php';
						//$db=new database();
						$sd=$db->RunDml("DELETE  FROM cart WHERE id=".$row['id']."");
						if($sd=='ok'){
							header('REFRESH:1');
						}
					}
							
					if(isset($_POST['co'.$row['id'].''])){
						//include_once'databaseclass.php';
						//$db=new database();
						$sdd=$db->RunDml("insert into orders values('default',".$row['qty'].",".$row['price'].",".$row['total'].",".$row['itemID'].",".$_SESSION['id'].",'0')");
						if($sdd=='ok'){
							$sd=$db->RunDml("DELETE  FROM cart WHERE id=".$row['id']."");
							echo '<div class="alert alert-success">check your order to finally confirm your order</div>';
							header('REFRESH:5');
						}else{
							echo 'no';
						}
					}
					
 	}
					?>
					</form>
							</table>
							
							
						
			<script>
				$("table").each(function(){
    var count = $(this).children().length;
    if(count === 0){
        $(this).hide();
    }   
});
			</script>
							
					
						



			