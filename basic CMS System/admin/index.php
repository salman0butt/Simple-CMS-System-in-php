<?php
 session_start();

 if(isset($_SESSION['user_name'])){
 	

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin panel</title>
	<link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
	<aside>
		<center> 
			<h1>Welcome <span><?php echo $_SESSION['user_name']; ?></span></h1>
			    <h1>Dashboard</h1><br>
					<a href="index.php?view=view" class="button">View Posts</a>
					<a href="insert_post.php?insert=insert" class="button">Insert Posts</a>
					<a href="logout.php" class="button">Logout</a>
		</center>
	</aside>
	<header>
		<h1><a href="index.php" style="text-decoration: none;">Welcome to Admin pannel!</a></h1>
	</header>
	<h1 style="text-align:center;">Welome To admin area</h1>>

	<?php
	if (isset($_GET['insert'])) {
		include("insert_post.php");
	}

	?>
		<h1 style="text-align: center;font-size: 34px;">
		<?php if (isset($_GET['deleted'])) {
	    echo $_GET['deleted'];
}
?>
	</h1>


<?php
include "../config/connect.php";

if (isset($_GET["view"])) {
	echo '<table width="1370" align="center" border="3" class="table">
		<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Image</th>
		<th>Content</th>
		<th>Date</th>
		<th>Author</th>
		<th>Edit</th>
		<th>Delete</th>
	    </tr>';

	$sql = "SELECT * FROM posts ORDER BY 1 DESC";
	$status = mysqli_query($con, $sql);
	$i = 1;
	if ($status) {
		while ($data = mysqli_fetch_assoc($status)) {

			$id = $data['post_id'];
			$title = $data['post_title'];
			$date = $data['post_date'];
			$author = $data['post_author'];
			$image = $data['post_image'];
			$content = substr($data['post_content'], 0, 100);

			?>


	<tr align="center">
		<td><?php echo $i++; ?></td>
		<td><?php echo $title; ?></td>
		<td> <image src="../images/<?php echo $image; ?>" width="60px" height="60px"> </td>
		<td><?php echo $content; ?></td>
		<td><?php echo $date; ?></td>
		<td><?php echo $author; ?></td>
		<td><a href="edit.php?edit=<?php echo $id; ?> ">edit</a></td>
		<td><a href="delete.php?delete=<?php echo $id; ?>">Delete</a></td>

	</tr>
<?php
}

	}
}

?>

</table>


</body>
</html>
<?php
 }
 else{
 	header("Location: login.php");
 }
?>