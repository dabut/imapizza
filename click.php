<?php
	// Include configuration file, with $db as a mysqli connection
	include 'assets/config.php';

	// Set number of clicks from db
	$query = mysqli_query($db, "SELECT * FROM clicks");
	while ($row = mysqli_fetch_array($query)) {
		$clicks = $row['clicks'];
	}

	// If click has been posted, update with new click
	if (isset($_POST['click'])) {
		$clicks++;
		mysqli_query($db, "UPDATE clicks SET clicks='$clicks'");
	}

	// Return number of clicks
	echo $clicks;
?>