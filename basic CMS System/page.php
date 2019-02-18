<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>News Website</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
    function myClock() {
        var time = new Date();
        hour = time.getHours();
        min = time.getMinutes();
        sec = time.getSeconds();
        if (hour < 10) {
            hour = "0" + hour;
        }
        if (min < 10) {
            min = "0" + min;
        }
        if (sec < 10) {
            sec = "0" + sec;
        }
        document.getElementById("clock").innerHTML = hour + ":" + min + ":" + sec;
        timer = setTimeout(function() { myClock(); }, 500);
    }
    </script>
</head>

<body onload="myClock()">
    <div class="top-bar">
        <div style="margin-left: 150px;padding: 6px;font-size: 18px;font-weight: bold;color: #fff;"><span style="font-size: 20px;">Today is:</span> &nbsp;
            <?php echo date("l jS,F Y"); ?>
            <div id="clock" style="float: right;margin-right: 150px;font-size: 22px;border: 1px solid white; padding: 2px 5px;"></div>
        </div>
    </div>
    <div class="container">
        <!-- this is header -->
        <div>
            <?php include("includes/header.php") ;?>
        </div>
        <!-- this is navigation area -->
        <div>
            <?php include("includes/nav.php") ;?>
        </div>
        <section class="post-body">
            <?php
include("config/connect.php");
if (isset($_GET['id'])) {
	$page_id = $_GET['id'];
	$sql = "SELECT * FROM `posts` WHERE `post_id`=$page_id";
	$status = mysqli_query($con, $sql);
	if ($status) {
		while ($data = mysqli_fetch_assoc($status)) {
			$title = $data['post_title'];
			$date = $data['post_date'];
			$author = $data['post_author'];
			$image = $data['post_image'];
			$content = $data['post_content'];


			?>
                <div style="padding: 10px">
                    <h1 style="font-size: 35px;"><?php echo $title; ?></h1>
                    <p>Published on: &nbsp;&nbsp;<b><?php echo $date; ?></b></p>
                    <p style="text-align: right;margin-right: 50px;">Posted By: &nbsp;&nbsp;<b><?php echo "$author"; ?></b>
                    </p>
                    <center>
                        <img src="images/<?php echo $image; ?>" alt="image" width="700px">
                    </center>
                    <p style="text-align: justify;margin: 2px 3px;padding: 2px 3px;font-size: 19px;">
                        <?php echo $content; ?>&emsp;</p>
                </div>
                <?php
		}
	}
}
?>
        </section>
        <!-- sidebar -->
        <div>
            <?php include "includes/side_bar.php";?>
        </div>
        <div>
            <?php include "includes/footer.php";?>
        </div>
    </div>
</body>

</html>