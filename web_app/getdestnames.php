<?php
	$conn = mysqli_connect('localhost', 'root', "", 'flights2');
	$ori = $_POST['org'];
	$query = "SELECT DISTINCT(c.Name) FROM city c, airports a, routes r WHERE r.arrival_airport_code = a.Code AND a.City_code = c.Code AND r.departure_airport_code IN (SELECT DISTINCT(a2.Code) FROM city ci2, airports a2 WHERE ci2.Code = a2.City_code AND ci2.Name = '$ori' )";
	$res = mysqli_query($conn, $query);
	$arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$arr[] = $row['Name'];
	}
	echo join(",", $arr);
?>