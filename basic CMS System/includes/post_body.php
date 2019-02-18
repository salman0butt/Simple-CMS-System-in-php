 <style>
 	.post-body a{
 		text-decoration: none;
 	}

 </style>

<section class="post-body">
<?php 
	include("config/connect.php");
	$sql = "SELECT * FROM `posts` ORDER BY rand() LIMIT 0,3";
	$status = mysqli_query($con, $sql);
	if($status) {
		while($data = mysqli_fetch_assoc($status)){
			$id = $data['post_id'];
			$title = $data['post_title'];
			$date = $data['post_date'];
			$author = $data['post_author'];
			$image = $data['post_image'];
			$content = substr($data['post_content'],0,200);
	
 ?>		

	<div style="padding: 5px 6px">
		<a href="page.php?id=<?php echo $id; ?>"><h1 style="font-size: 35px;"><?php echo $title; ?></h1>
		</a>
		<p>Published on: &nbsp;&nbsp;<b><?php echo $date; ?></b></p>
		<p style="text-align: right;margin-right: 50px;">Posted By: &nbsp;&nbsp;<b><?php echo "$author"; ?></b>
		</p>
		<center>
			<img src="images/<?php echo $image; ?>" alt="image" width="700px" height="400px">
		</center>
		<p style="text-align: justify;margin: 2px 3px;padding: 2px 3px;font-size: 19px;"><?php echo $content; ?>&emsp;</p>
		<p align="right"><a href="page.php?id=<?php echo $id; ?>">Read More</a></p>

	</div>
<?php 
		}
	}
 ?>
</section>