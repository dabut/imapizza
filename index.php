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
		<p id="clicks"><?=$clicks?></p><p>&nbsp;Clicks!</p>
		<script>
			$(document).ready(function(){
				$.get('click.php', function(data){
					var clicks =Number(data);
					$('#clicks').html(data);
				});
			});

			$('#pizza').click(function(){
				var clicks = Number($('#clicks').html()) + 1;
				$('#clicks').html(clicks);
				$.post('click.php', {click: null});
			});

			setInterval(function(){
				$.get('click.php', function(data){
					$('#clicks').html(max(clicks, Number(data)));
				});
			}, 100);
		</script>
	</body>
</html>