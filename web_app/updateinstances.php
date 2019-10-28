<?php
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 4500);
	$conn = mysqli_connect('localhost', 'root', "", 'flights2');
	$data = file_get_contents("../Data entry/instances.json");
	$data = json_decode($data);
	foreach ($data as $key => $value) {
		$value = json_decode(json_encode($value), true);
		$route = $value['routeid'];
		$plane = $value['planeid'];
		$ecost = $value['ecost'];
		$bcost = $value['bcost'];
		$fcost = $value['fcost'];
		$eseats = $value['eseats'];
		$bseats = $value['bseats'];
		$fseats = $value['fseats'];
 		$dep = $value['departure'];
		$arr = $value['arrival'];
		$query = "INSERT INTO instances(Route_ID, plane_ID, eseats, bseats, fseats, ecost, bcost, fcost, departure, arrival) VALUES('$route', '$plane','$eseats', '$bseats', '$fseats', '$ecost', '$bcost', '$fcost', '$dep', '$arr')";
		mysqli_query($conn, $query);
		print_r($value['routeid']);
	}
	// $query = "SELECT plane_ID FROM route_planes WHERE route_ID = '$routeid'";
	// $res = mysqli_query($conn, $query);
	// $rows = array();
	// while($row = mysqli_fetch_assoc($res)){
	// 	$rows[] = $row['plane_ID'];
	// }
	// print_r(json_encode($rows));
?>