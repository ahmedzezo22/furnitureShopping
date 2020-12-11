<?php
session_start();
 if(isset($_SESSION['name'])){
    include_once'headerAfter.php';
 }
 ?>
 <div class="container">
    	<table class="table table-hover">
					
					
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
	  <th scope="col">itemName</th>
	  <th scope="col">Qty</th>
      <th scope="col">price</th>
      <th scope="col">Total</th>
	  <th scope="col">status</th>
    </tr>
  </thead>
  <tbody>
	<form method="post">
    <?php
							
							include_once'databaseclass.php';
							$db=new database();
							$s=$db->getData("SELECT * FROM orders inner join items WHERE orders.itemID=items.itemID AND userID=".$_SESSION['id']." ");
							$x=0;
							while($row=mysqli_fetch_assoc($s)){?>
                                <tr>
      <th scope="row"><?php echo ++$x; ?></th>
      <td> <img src="uploades/i<?php echo $row['itemID'] ?>.jpg" style="width:100px; height: 50px"class="img-responsive" alt=""/>'</td>
      <td><?php echo $row['ItemName']?></td>
      <td><?php echo $row['qty'] ?></td>
	  <td><?php echo $row['price'] ?></td>
	   <td><?php echo $row['total'] ?></td>
    <td><?php echo '<input type="submit" name="confirm'.$row['itemID'].'" value="final confirm" class="btn btn-danger">';
    
    
    ?></td>
	   
  </tbody>
			<?php
			if(isset($_POST['confirm'.$row['itemID'].''])){
				
                                      $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
                                      //html PNG location prefix
                                      $PNG_WEB_DIR = 'temp/';
                                  
                                      include "QRcode/qrlib.php";    
                                      
                                      //ofcourse we need rights to create temp dir
                                      if (!file_exists($PNG_TEMP_DIR))
                                          mkdir($PNG_TEMP_DIR);
                                      
                                      
                                      $filename = $PNG_TEMP_DIR.'test.png';
                                     
                                      $errorCorrectionLevel = 'H';
                                       
                                      $matrixPointSize = 10;
                                       
               
                                     
                                              
                                          // user data
                                          $filename = $PNG_TEMP_DIR.'test'.md5($row['ItemName'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
                                          QRcode::png($row['ItemName'] .' with total '. $row['total'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);
														?><p class="alert alert-success">save your image</p><?php
                                          
                                       
                                          
                                      //display generated file
                                      echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" style="margin:auto;display:block"/><hr/>';  
                                      
                                    
												 $sd=$db->RunDml("DELETE  FROM orders WHERE id=".$row['id']."");
						
                                     if($sd=='ok'){
							$db->RunDml('insert into sales values("default",'.$row['itemID'].','.$row['total'].','.$_SESSION['id'].')');
							echo '<div class="alert alert-success">Your item confirmed successfully</div>';
							//header('REFRESH:20');
						}
                                          
                                      // benchmark
			}
			
                                     
							}
							
            ?>
		</table>
	</form>
 </div>
 