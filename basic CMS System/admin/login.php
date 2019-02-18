<?php
	session_start();
	include("../config/connect.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Login</title>
	<style>
		.form {
			margin-top: 200px;
		
		}
		.form input{
			line-height: 2.5em;
			width: 300px;
		}
		.form input[type='submit']{
			padding: 4px;
			background: red;
			width: 100px;
			text-align: center;
		}
		
	</style>
</head>
<body>
	<div align="center" class="tel">
		<form action="login.php" method="POST" class="form">
			<h1>Admin Login</h1>
			<label for="name">Username:</label>
			<input type="text" name="user_name" placeholder="enter Name"><br><br>
			<label for="pass">password:</label>
			<input type="password" name="user_pass" placeholder="enter password"><br><br>
			<input type="submit" value="login" name="login">
		</form>
	</div>
</body>
</html>
<?php
	if(isset($_POST['login'])){
		$user_name = mysqli_real_escape_string($con, $_POST['user_name']);
		$user_pass = mysqli_real_escape_string($con, $_POST['user_pass']);

$sql = "SELECT * FROM`admin_login` WHERE `user_name` = '$user_name' AND `user_pass` = '$user_pass'";

		$status = mysqli_query($con, $sql);
	if($status){	
		
		if(mysqli_num_rows($status)>0){
			$_SESSION['user_name'] = $user_name;
			header("Location: index.php");
		}
         else{
         	echo "<script>alert('Username and pass is incorrect');</script>";
          } 
      } else{
         	echo "Failed to connect to MySQL: " . mysqli_connect_error();
          } 

	}

?>