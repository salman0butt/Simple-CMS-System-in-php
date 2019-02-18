<aside class="side-bar">
		<form align="center">
			<h1>Subscribe Via Email</h1>
			<label for="newsletter">Enter Your Email:</label><br><br>
			<input type="text" name="newsletter" placeholder="Enail Address.."><br><br>
			<input type="submit" value="submit" name="submit"><br>
		</form><br>
		<div class="social" align="center">
			<h1>Follow Us</h1>
			<a href=""><img src="images/facebook.png" alt=""></a>
			<a href=""><img src="images/google-plus.png" alt=""></a>
			<a href=""><img src="images/instagram.png" alt=""></a>
			<a href=""><img src="images/pinterest.png" alt=""></a>
			<a href=""><img src="images/twitter.png" alt=""></a>
		</div>
		<div class="side-bar2">
			<h1>Recent Posts</h1>
			<?php
include "config/connect.php";
$sql = "SELECT * FROM `posts` ORDER BY `post_id` DESC LIMIT 0,4";
$status = mysqli_query($con, $sql) or die(mysqli_error($sql));
if ($status) {
	while ($data = mysqli_fetch_assoc($status)) {
		$post_id = $data['post_id'];
		$title = $data['post_title'];
		$image = $data['post_image'];

		?>
			<div align="center">
				<a href="page.php?id=<?php echo $post_id ?>"> <img src="images/<?php echo $image; ?>" alt="image" width="100px" height="100px">
							<h3><?php echo $title; ?></h3></a>
			</div>
		<?php
}
}
?>
		</div>


</aside>