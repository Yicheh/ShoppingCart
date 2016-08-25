<?php 
  
    if(isset($_POST['submit'])){ 
        $totalprice;
		$product_name;
		$datetime = date ("Y-m-d/H:i:s"); 
        foreach($_POST['quantity'] as $key => $val) { 
			
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
				
            }else{ 
			//結帳
				$_SESSION['cart'][$key]['quantity']=$val; 
				
				$product_id=$key;
				$product_quantity=$_SESSION['cart'][$key]['quantity'];
				$price=$_SESSION['cart'][$key]['price'];
				
				$subtotal=$product_quantity*$price; 
				$totalprice+=$subtotal;
				$product_name=$product_name.$_SESSION['cart'][$key]['name']."數量：".$product_quantity."個 單價：".$price."元<br/>";

            } 
        } 
        $sql="INSERT INTO purchase_order(time,order_product,total_sum) VALUES ('".$datetime."','".$product_name."','".$totalprice."')";
		if (mysqli_query($con,$sql)){
			echo "SUCCESSFUL!!!";
			unset($_SESSION['cart']);
			echo "<script>alert('購買成功'); location.href = 'index.php?page=products2';</script>";
		}else{
			echo "Error:".$sql."<br/>".mysqli_error($con);
		}
		
		
		
    } 
  
?> 

<h1>View cart</h1> 
<a href="index.php?page=products2">Go back to products page</a> 
<form method="post" action="index.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM products WHERE id IN ("; 
				  
			foreach($_SESSION['cart'] as $id => $value) { 
				if($id != "" ){
					$sql.=$id.","; 
				}
			}
			  
			$sql=substr($sql, 0, -1).") ORDER BY name ASC"; 

			
			$query=mysqli_query($con,$sql); 
			$totalprice=0; 
			while($row=mysqli_fetch_array($query)){ 
				
				$subtotal=$_SESSION['cart'][$row['id']]['quantity']*$row['price']; 
				$totalprice+=$subtotal; 
			?> 
				<tr> 
					<td><?php echo $row['name'] ?></td> 
					<td><input type="text" name="quantity[<?php echo $row['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" /></td> 
					<td><?php echo $row['price'] ?>$</td> 
					<td><?php echo $_SESSION['cart'][$row['id']]['quantity']*$row['price'] ?>$</td>
				</tr> 
			<?php 
				  
			} 
        ?> 
                    <tr> 
                        <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 

	
	
</form> 
<br /> 
<p>To remove an item, set it's quantity to 0. </p>