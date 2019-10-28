<?php
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300);
	$conn = mysqli_connect('localhost', 'root', "", 'flights2');
	$routeid = $_GET['route'];
	$query = "SELECT plane_ID FROM route_planes WHERE route_ID = '$routeid'";
	$res = mysqli_query($conn, $query);
	$rows = array();
	while($row = mysqli_fetch_assoc($res)){
		$rows[] = $row['plane_ID'];
	}
	print_r(json_encode($rows));
?>