<?php
	$aircode = $_POST['air_code'];
	$airname = $_POST['air_name'];
	$citycode = $_POST['city_code'];
	$cityname = $_POST['city_name'];
	$countrycode = $_POST['country_code'];
	$country_name = $_POST['country_name'];
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$query = "INSERT INTO country VALUES('$countrycode', '$country_name')";
	$res = mysqli_query($conn, $query);
	$query = "INSERT INTO city VALUES('$citycode', '$cityname', '$countrycode')";
	$res2 = mysqli_query($conn, $query);
	$query = "INSERT INTO airports VALUES('$aircode', '$airname', '$countrycode', '$citycode')";
	$res3 = mysqli_query($conn, $query);
	if($res && $res2 && $res3){
		echo "true";
	}else{
		echo "false";
	}
?>