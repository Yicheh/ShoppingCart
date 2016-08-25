<?php 
  
  
	$con= new mysqli("localhost","tutorial","supersecretpassword","tutorials");
      
    // connect to mysql 
      
    //mysqli_connect($server, $user, $pass) or die("Sorry, can't connect to the mysql."); 
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($con,"SET NAMES utf8");
	
    // select the db 
      
    //mysqli_select_db($con) or die("Sorry, can't select the database."); 

    /*if(!$con)  {
        echo"数据库链接错误!";
    }else{
        echo"PHP7搭建:Windows7+PHP7+Apache2.4+MySQL5.5";
    }
    mysqli_close($dbc);*/
?>