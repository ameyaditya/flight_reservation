<?php
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300);
	$conn = mysqli_connect('localhost', 'root', "", 'flights2');
	$query = "SELECT *FROM airplane";
	$res = mysqli_query($conn, $query);
	$rows = array();
	while($row = mysqli_fetch_assoc($res)){
		$rows[$row['Code']] = $row;
	}
	print_r(json_encode($rows));
?>