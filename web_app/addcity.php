<?php
	$name = $_POST['name'];
	$code = $_POST['code'];
	$ccode = $_POST['country_code'];
	$timezone = $_POST['time_zone'];
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$query = "INSERT INTO City VALUES('$code', '$name', '$ccode', '$timezone')";
	mysqli_query($conn, $query);
?>