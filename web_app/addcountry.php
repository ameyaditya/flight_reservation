<?php
	$name = $_POST['name'];
	$currency = $_POST['currency'];
	$code = $_POST['code'];
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$query = "INSERT INTO Country(Name, Currency, `Code`) VALUES('$name', '$currency', '$code')";
	mysqli_query($conn, $query);
?>