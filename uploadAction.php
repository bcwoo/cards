<?php
	$year = $_POST["year"];
	$brand = $_POST["brand"];
	$name = $_POST["name"];

	$dbh = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($dbh, 'cards');

	$fp = fopen($_FILES['jpg_front']['tmp_name'], "r");
	$content1 = fread($fp, $_FILES['jpg_front']['size']);
	fclose($fp);

	$content1 = base64_encode($content1);

	$fp2 = fopen($_FILES['jpg_back']['tmp_name'], "r");
	$content2 = fread($fp2, $_FILES['jpg_back']['size']);
	fclose($fp2);

	$content2 = base64_encode($content2);
	$query = "insert into card(year, brand, name, jpg_front, jpg_back) values ('$year','$brand','$name','$content1','$content2');";
	$res = mysqli_query($dbh, $query);

	if ($res) {
		echo "Card uploaded.<br/><br/>";
	} else {
		echo "Card upload failure.<br/><br/>";
	}
	mysqli_close($dbh);
	include('upload.php');
?>