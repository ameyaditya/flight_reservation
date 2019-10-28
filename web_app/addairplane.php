<?php
	$name = $_POST['name'];
	$code = $_POST['code'];
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$query = "INSERT INTO airplane VALUES('$code', '$name')";
	mysqli_query($conn, $query);
?>