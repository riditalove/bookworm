<?php
	session_start();
   $conn = mysqli_connect("localhost","ridita","1234","shop_db");

	if(isset($_COOKIE['user_id']))
	   {
	   	            $passwords=$_COOKIE['user_id'];
					$user_email=$_COOKIE['user_email'];
	   	    setcookie("user_id",$passwords,time()-(60*60*24*7));
			setcookie("user_email",$user_email,time()-(60*60*24*7));  							
		    header("Location: ind.php");
	   }
	
	
	else{ header("Location: ind.php");}
?>