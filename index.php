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
		<script type="text/javascript" src="assets/jquery.js"></script>
		<title>I'm A Pizza!</title>
	</head>
	<body>
		<img id="pizza" src="assets/pizza.jpg" />
		<div class="clicks"><p id="clicks"><?=$clicks?></p><p>&nbsp;Clicks!</p></div>
		<script>
			// Creates variable for number of clicks
			var clicks;

			// Inital value for clicks and update DOM
			$(document).ready(function(){
				$.get('click.php', function(data){
					clicks = Number(data);
					$('#clicks').html(data);
				});
			});

			// Add 1 to clicks, update DOM then POST to click.php for new click
			$('#pizza').click(function(){
				clicks++;
				$('#clicks').html(clicks);
				$.post('click.php', {click: null});
			});


			// Update DOM for clicks every 100ms
			setInterval(function(){
				$.get('click.php', function(data){
					$('#clicks').html(Math.max(clicks, Number(data)));
				});
			}, 100);
		</script>
	</body>
</html>