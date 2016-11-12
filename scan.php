<?php
	$dir = "C:/Users/Bryan/Documents/cards/";
	$directoryContents = scandir($dir);

	for ($i = 2; $i < sizeof($directoryContents) - 1; $i+=2) {
		if ($directoryContents[$i] != "uploaded") {
			$cardName = str_replace(" - back", "", $directoryContents[$i]);
			$cardName = str_replace(" - front", "", $cardName); //in case unordered
			$frontPath = $dir . $directoryContents[$i + 1];
			$backPath = $dir . $directoryContents[$i];
			$backFile = base64_encode(file_get_contents($backPath));
			$frontFile = base64_encode(file_get_contents($frontPath));
			uploadCard($cardName, $frontFile, $backFile);
		}
	}

	function uploadCard($imgName, $frontFile, $backFile) {
		$dbh = mysqli_connect("localhost", "root", "", "cards");
		$lbPos = strpos($imgName, "#");
		$length = $lbPos - 1;
		$yearAndBrand = substr($imgName, 0, $length);
		$firstSpacePos = strpos($yearAndBrand, " ");
		$year = substr($yearAndBrand, 0, $firstSpacePos);
		$length = sizeof($yearAndBrand) - 4;
		$brand = substr($yearAndBrand, $firstSpacePos + 1);
		$name = str_replace(".jpg", "", substr($imgName, $lbPos));
		echo "$year $brand $name<br/>";
		$insert = "insert into card(year, brand, name, jpg_front, jpg_back) values ('$year','$brand','$name','$frontFile','$backFile');";
		mysqli_query($dbh, $insert);
		mysqli_close($dbh);
	}
?>