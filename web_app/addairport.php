<?php
	$airport_name = $_POST['name'];
	$city = $_POST['city_code'];
	$country = $_POST['country_code'];
	$code = $_POST['code'];
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$query = "INSERT INTO airports VALUES('$code', '$airport_name', '$country', '$city')";
	$res = mysqli_query($conn, $query);
	if($res){
		return "Successful";
	}
	else{
		return "Unsuccessful";
	}
?>