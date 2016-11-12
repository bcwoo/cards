<?php
	$dbh = mysqli_connect('localhost', 'root', '', 'cards');
	$query = "select * from card where card_id = " . $_GET['id'] . ";";
	$res = mysqli_query($dbh, $query);
	$row = mysqli_fetch_array($res);
	if ($res) {
		//echo $row[3];
		//echo $row[4];
		header("Content-Type: image/jpeg");
		$image = imagejpeg(imagecreatefromstring(base64_decode($row[5])));
		
	}

?>