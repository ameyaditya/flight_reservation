<?php
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300);
	$conn = mysqli_connect('localhost', 'root', "", 'flights2');
	$data = file_get_contents('http://api.travelpayouts.com/data/routes.json?token=5f0f8efe1a448a3ce74a1cd92902f031');
	$obj = json_decode($data);
	foreach ($obj as $key => $value) {
		$data = json_decode(json_encode($value), true);
		$airline = $data['airline_iata'];
		$dep = $data['departure_airport_iata'];
		$arr = $data['arrival_airport_iata'];
		$transfers = $data['transfers'];
		$planes = $data['planes'];
		$query = "INSERT INTO routes(airline_code, departure_airport_code, arrival_airport_code, transfers) VALUES('$airline', '$dep', '$arr', '$transfers')";
		$res = mysqli_query($conn, $query);
		if($res){
			$que2 = "SELECT max(Route_ID) as D FROM routes";
			$res2 = mysqli_query($conn, $que2);
			$num = mysqli_fetch_assoc($res2)['D'];
			foreach ($planes as $key2 => $value2) {
				$que3 = "INSERT INTO route_planes VALUES('$num', '$value2')";
				$res3 = mysqli_query($conn, $que3);
			}
			print_r("Done with route planes");
		}
		print_r("Done with routes");
	}
	// $code = $_POST['code'];
	// $conn = mysqli_connect("localhost", "root", "", "flights2");
	// $query = "INSERT INTO airplane VALUES('$code', '$name')";
	// mysqli_query($conn, $query);
?>