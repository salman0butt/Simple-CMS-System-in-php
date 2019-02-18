<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <title>News Website</title>
	<link rel="stylesheet" href="css/style.css">
	<script>
		function myClock(){
			var time =new Date();
			hour = time.getHours();
			min = time.getMinutes();
			sec = time.getSeconds();
			if(hour<10){
				hour = "0"+hour;
			}
			if(min<10){
				min = "0"+min;
			}
			if(sec<10){
				sec = "0"+sec;
			}
			document.getElementById("clock").innerHTML = hour + ":" + min + ":" + sec;
			timer = setTimeout(function() {myClock();},500);
			}

			
	</script>
</head>
<body onload="myClock()">
	<div class="top-bar">
		<div style="margin-left: 150px;padding: 6px;font-size: 18px;font-weight: bold;color: #fff;"><span style="font-size: 20px;">Today is:</span> &nbsp; <?php echo date("l jS,F Y"); ?> <div id="clock" style="float: right;margin-right: 150px;font-size: 22px;border: 1px solid white; padding: 2px 5px;"></div></div>
	</div>
	<div class="container">
		<!-- this is header -->
		<div><?php include("includes/header.php"); ?></div>
		<!-- this is navigation area -->
		<div><?php include("includes/nav.php"); ?></div>
		<!-- this is post body section -->
		<div><?php include("includes/post_body.php"); ?></div>
		<!-- this is sidebar -->
		<div><?php include("includes/side_bar.php"); ?></div>
		<!-- this is footer -->
		<div><?php include("includes/footer.php"); ?></div>

	</div>
	
</body>
</html>