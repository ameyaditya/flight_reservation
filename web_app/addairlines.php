<?php
	$name = $_POST['name'];
	$code = $_POST['code'];
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$query = "INSERT INTO airlines VALUES('$code', '$name')";
	mysqli_query($conn, $query);
?>