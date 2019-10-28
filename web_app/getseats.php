<?php
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300);
	$conn = mysqli_connect('localhost', 'root', "", 'flights2');
	$planeid = $_GET['planeid'];
	$query = "SELECT Eseats, Bseats, Fseats FROM airplane WHERE `Code` = '$planeid'";
	$res = mysqli_query($conn, $query);
	$data = array();
	while($row = mysqli_fetch_assoc($res)){
		$data[$planeid] = $row;
	}
	print_r(json_encode($data))
?>