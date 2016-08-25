<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']; 
              
        }else{ 
              
            $sql_s="SELECT * FROM products WHERE id={$id}"; 
            $query_s=mysqli_query($con,$sql_s);
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s);
                 
                $_SESSION['cart'][$row_s['id']]=array( 
						"name" => $row_s['name'],
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    ); 

            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 
  
?>

<h1 style="text-align:center;">韓吉大仔-零食本舖</h1> 
<?php 
    if(isset($message)){ 
        echo "<h2>$message</h2>"; 
    } 
	//取出product info
	$sql="SELECT * FROM products ORDER BY name ASC"; 
	$query=mysqli_query($con,$sql); 
	
?>
<div>
<?php
	while ($row=mysqli_fetch_array($query)) { 
?>
		<div class="product">
<?php	
		if($row['id'] != "" ){
			//select商品圖片sql
			$sql1="SELECT image FROM products WHERE id={$row['id']}";
			//==mysqli_query($con,$sql1);
			$sth = $con->query($sql1);
			if($result=mysqli_fetch_array($sth)){
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
			}
?> 

		<div class="price">$<?php echo $row['price'] ?></div>
		<div class="name"><?php echo $row['name'] ?></div>
		<div class="description"><?php echo $row['description'] ?></div>
		<a class="addCart" href="index.php?page=products2&action=add&id=<?php echo $row['id'] ?>">加入購物車</a>
	</div>
	<?php 
		}	  
	} 
	  
	?>
	
	<h1>購物車</h1> 
		<?php 
		if(isset($_SESSION['cart'])){ 
			$sql="SELECT * FROM products WHERE id IN ("; 
			
			foreach($_SESSION['cart'] as $id => $value) { 
				if($id != "" ){
					$sql.=$id.","; 
				}
			}
			
			$sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
			$query=mysqli_query($con,$sql);

			while($row=mysqli_fetch_array($query)){ 
				  
			?> 
				<p><?php echo $row['name'] ?></p> 
			<?php 
				  
			} 
		
		?> 
		<a href="index.php?page=cart">結帳</a> <hr /> 
		
		<?php 
		  
		}else{ 
			echo "<p>Your Cart is empty. Please add some products.</p>"; 
		} 

		?>
</div>