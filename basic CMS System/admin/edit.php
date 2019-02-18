<?php
 session_start();

 if(isset($_SESSION['user_name'])){
 	

?>
<?php
include "index.php";
include "../config/connect.php";
$edit_id = @$_GET['edit'];

$sql = "SELECT * FROM `posts` WHERE `post_id` = '$edit_id'";

$status = mysqli_query($con, $sql);

if ($status) {
	while ($data = mysqli_fetch_assoc($status)) {

		$id = $data['post_id'];
		$title = $data['post_title'];
		$date = $data['post_date'];
		$author = $data['post_author'];
		$image = $data['post_image'];
		$content = $data['post_content'];

		?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit</title>

</head>
<body>

 <div class="form">
		<form action="edit.php?edit_form=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
			<table align="center" width="1200px" style="margin-top: 50px;">
				<tr style="background: yellow;text-align: center;font-size: 20px;">
					<td colspan="2"><h1>Edit Post</h1></td>
				</tr>
				<tr>
					<td style="text-align: center;">Post Title:</td>
					<td><input type="text" name="title" placeholder="Enter title" value="<?php echo $title; ?>"></td>
				</tr>
				<tr>
					<td style="text-align: center;">Post author:</td>
					<td><input type="text" name="author" placeholder="author name" value="<?php echo $author; ?>"></td>
				</tr>
				<tr>
					<td style="text-align: center;">Post image:</td>
					<td style="padding-bottom: 10px; padding-top: 6px;"><input type="file" name="image" value="<?php echo $image; ?>">
						<image src="../images/<?php echo $image; ?>" width="60px" height="60px">
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">Post Title:</td>
					<td>
						<textarea name="content" cols="82" rows="20" placeholder="  Write Post">value="<?php echo $content; ?>"</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<center>
							<input type="submit" name="update" value="Update Now">
						</center>
					</td>
				</tr>
			<?php
}
}

?>
			</table>
		</form>
	</div>

</body>
</html>

<?php

if (isset($_POST['update'])) {

	$update_id = $_GET['edit_form'];
	$post_title = $_POST['title'];
	$post_date = date('y-m-d');
	$post_author = $_POST['author'];
	$post_content = $_POST['content'];
	$post_image = $_FILES['image']['name'];
	$post_image_type = $_FILES['image']['type'];
	$post_image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];
	move_uploaded_file($image_tmp, "../images/$post_image");
	$update_query = "UPDATE `posts` SET `post_title` = '$post_title',`post_date` = '$post_date', `post_author` = '$post_author', `post_image` = '$post_image', `post_content` = '$post_content' WHERE `post_id` = '$update_id'";

	$status = mysqli_query($con, $update_query);
	if ($status) {
		echo '<script>alert("Post has been Updated Successfully");</script>';
		echo '<script>windows.open("index.php","_self");</script>';
	} else {
		echo '<script>alert("not updated");</script>';
	}

}
}
?>