<?php
	include 'assets/config.php';

	$query = mysqli_query($db, "SELECT * FROM clicks");
	while ($row = mysqli_fetch_array($query)) {
		$clicks = $row['clicks'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="assets/style.css" />
		<script type="text/javacsript" src="assets/jquery.js"></script>
		<title>I'm A Pizza!</title>
	</head>
	<body>
		<img src="assets/pizza.jpg" />
		<p id="clicks"><?=$clicks?></p><p> Clicks!</p>
		<script>
			
		</script>
	</body>
</html>