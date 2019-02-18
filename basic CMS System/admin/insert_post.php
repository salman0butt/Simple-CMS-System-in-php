<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Insert new Post</title>
	<link rel="stylesheet" href="">
	<style>
	border {
		font-weight: bold;
	}
	input[type=text] {
		width: 100%;
		margin: 8px 0;
		line-height: 1em;
		padding: 12px 20px;
		box-sizing: border-box;
	}
	input[type='submit']{
		padding: 12px 20px;
		background: #D6CFCF;
	}
	.success {
		color: green;
		font-size: 40px;
		text-align: center;
	}
	</style>
</head>
<body>
	<div class="form">
		<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
			<table align="center" width="700px" style="margin-top: 50px;">
				<tr style="background: yellow;text-align: center;font-size: 20px;">
					<td colspan="2"><h1>Insert New Post</h1></td>
				</tr>
				<tr>
					<td style="text-align: center;">Post Title:</td>
					<td><input type="text" name="title" placeholder="Enter title"></td>
				</tr>
				<tr>
					<td style="text-align: center;">Post author:</td>
					<td><input type="text" name="author" placeholder="author name"></td>
				</tr>
				<tr>
					<td style="text-align: center;">Post image:</td>
					<td style="padding-bottom: 10px; padding-top: 6px;"><input type="file" name="image"></td>
				</tr>
				<tr>
					<td style="text-align: center;">Post Title:</td>
					<td>
						<textarea name="content" cols="82" rows="20" placeholder="  Write Post"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<center>
							<input type="submit" name="submit" value="Publish Now">
						</center>
					</td>
				</tr>
			</table>
		</form>
	</div><br>
	<div class="success">
		<?php if (isset($_GET['success'])) {
	echo $_GET['success'];

}
?>
	 </div>
</body>
</html>
<?php
include "../config/connect.php";
if (isset($_POST['submit'])) {
	$date = date('y-m-d');
	$title = $_POST['title'];
	$author = $_POST['author'];
	$content = $_POST['content'];
	$image_name = $_FILES['image']['name'];
	$image_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];

	if ($title == "" or $author == "" or $content == "") {
		echo "<script>alert('Any field sis missing')</script>";
		exit();
	}

	if ($image_type == "image/jpeg" or $image_type == "image/jpg" or $image_type == "image/png" or $image_type == "image/gif") {
		if ($image_size < 50000000 and $image_size > 2000) {
			$suc = move_uploaded_file($image_tmp, "../images/$image_name");
			if ($suc) {
				$sql = "INSERT INTO `posts`(`post_title`, `post_date`, `post_author`, `post_image`, `post_content`) VALUES ('$title', '$date', '$author', '$image_name', '$content')";
				$status = mysqli_query($con, $sql) or die(mysqli_error($con));
				if ($status) {
					$msg = "The Post is Published";
					header("Location: index.php?success=" . $msg);
				}
			} else {
				echo "<script>alert('image size is larger');</script>";
			}
		} else {
			echo "<script>alert('inavlid image type');</script>";
		}

	}

}

?>