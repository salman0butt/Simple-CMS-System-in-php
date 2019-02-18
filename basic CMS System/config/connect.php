<?php 
	$con = mysqli_connect("localhost", "root", "", "news_website");
	if(mysqli_error($con)){
		die(mysqli_connect_errno($con));
	}
	
 ?>