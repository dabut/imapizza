<?php
	include 'assets/config.php';

	$query = mysqli_query($db, "SELECT * FROM clicks");
	while ($row = mysqli_fetch_array($query)) {
		$clicks = $row['clicks'];
	}

	if (isset($_POST['click'])) {
		$clicks++;
		mysqli_query($db, "UPDATE clicks SET clicks='$clicks'");
	}

	echo $clicks;
?>