<?php
include("../config/connect.php");
 
 $delete_id = $_GET['delete'];
 $delete_query = "DELETE FROM `posts` WHERE `post_id` = '$delete_id'";

 $status = mysqli_query($con, $delete_query);

 if($status){
 header("Location: index.php?deleted="."post deleted Successfully");

 }
 else{
 	  header("Location: index.php?deleted="." not post deleted");
 }


?>