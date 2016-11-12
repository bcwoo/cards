<?php
	$dbh = mysqli_connect('localhost', 'root', '', 'cards');
	$query = "select * from card where card_id > 697 order by card_id asc;";
	$res = mysqli_query($dbh, $query);
	while ($row = mysqli_fetch_array($res)) {
                echo "$row[0]. ";
		echo "<a href=\"viewCardFront.php?id=" . $row[0] . "\">" . $row[1] . " " . $row[2] . " " . $row[3] . " - front</a><br/>";
		echo "$row[0]. ";
		echo "<a href=\"viewCardBack.php?id=" . $row[0] . "\">" . $row[1] . " " . $row[2] . " " . $row[3] . " - back</a><br/>";
	}
	

	mysqli_close($dbh);
?>