<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="css/style.css" />
	
    <title>View Order</title> 
  
</head> 
  
<body> 
    <h1>View Order</h1> 
    <div> 
  
        <table id="view">
			<tr> 
				<th>訂單編號</th> 
				<th>訂單成立時間</th> 
				<th>訂購商品(價錢;數量)</th> 
				<th>總金額</th> 
			</tr> 
			<?php 
				require("includes/connection.php");
				
				$sql="SELECT * FROM `purchase_order` ORDER BY order_id"; 
				$query=mysqli_query($con,$sql); 

				while ($row=mysqli_fetch_array($query)) { 
					if($row['order_id'] != "" ){

			?> 
			<tr>
				<th>00<?php echo $row['order_id'] ?></th>
				<th><?php echo $row['time'] ?></th>
				<th><?php echo $row['order_product'] ?></th>
				<th><?php echo $row['total_sum'] ?></th>
			</tr>
			<?php 
					}	  
				} 
				  
			?>
			
		</table>
          
  
    </div>

</body> 
</html>
