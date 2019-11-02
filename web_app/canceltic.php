<?php
	$conn = mysqli_connect('localhost', 'root', '', 'flights2');
	$pid = $_POST['pid'];
	$que = "UPDATE passenger SET cancelled = 1 WHERE Passenger_ID = '$pid'";
	$res = mysqli_query($conn, $que);
	$que = "SELECT Flight_inst_ID, Type FROM passenger WHERE Passenger_ID = '$pid'";
	$res = mysqli_fetch_assoc(mysqli_query($conn, $que));
	$inst = $res['Flight_inst_ID'];
	$type = $res['Type'];
	$mode = array('Business' => 'bseats', "Economy" => "eseats", "First Class" => "fseats");
	$mtype = $mode[$type];
	$que = "UPDATE instances SET $mtype = $mtype + 1 WHERE Instance_ID = '$inst'";
	$res = mysqli_query($conn, $que);
	if($res)
		echo "success";
	else{
		echo "error";
	}
?>