<?php
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300);
	$conn = mysqli_connect('localhost', 'root', "", 'flights2');
	$query = "SELECT route_ID FROM route_planes GROUP BY route_ID";
	$res = mysqli_query($conn, $query);
	$data = array();
	while($row = mysqli_fetch_assoc($res)){
		$id = $row['route_ID'];
		$query2 = "SELECT plane_ID FROM route_planes WHERE route_ID = '$id'";
		$res1 = mysqli_query($conn, $query2);
		$sub_data = array();
		while($row2 = mysqli_fetch_assoc($res1)){
			$sub_data[] = $row2['plane_ID'];
		}
		$data[$id] = $sub_data;
	}
	$data = json_encode($data);
	print_r($data);
?>