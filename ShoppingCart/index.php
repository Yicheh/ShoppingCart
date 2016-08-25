<?php 
	date_default_timezone_set('Asia/Taipei');
    session_start(); 
    require("includes/connection.php"); 
    if(isset($_GET['page'])){ 
          
        $pages=array("products", "cart"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="products2"; 
              
        } 
          
    }else{ 
          
        $_page="products2"; 
          
    } 
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="css/style.css" />
    <title>Shopping cart</title> 
  
</head> 
  
<body> 
    
    <div id="container"> 
  
        <div id="main"> 
            <?php require($_page.".php"); ?>
        </div><!--end main-->
          
        <div id="sidebar"> 
            
        </div><!--end sidebar-->
  
    </div><!--end container-->

</body> 
</html>