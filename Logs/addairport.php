<?php
	echo "string";
	$airport_name = $_GET['name'];
	$city = $_GET['city'];
	$country = $_GET['country'];
	$IATA = isset($_GET['IATA']) ? $_GET['IATA']: "null";
	if isset($_GET['ICAO']){
		$ICAO = $_GET['ICAO'];
	}
	else{
		$ICAO = "nan";
	}
	$conn = mysqli_connect("localhost", "root", "achar04081999", "flight");
	$query = "INSERT INTO airport(Name, City, Country, IATA_code, ICAO_code) VALUES('$airport_name', '$city', '$country', '$IATA', '$ICAO')";
	mysqli_query($conn, $query);

?>