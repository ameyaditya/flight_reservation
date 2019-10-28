<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$data = $_POST['details'];
	$tclass = $_POST['tcl'];
	$inst_id = $_POST['inst'];
	$uid = $_SESSION['uid'];
	$pids = array();
	foreach ($data as $key => $value) {
	$pname = $value[0];
	$pemail = $value[1];
	$pphone = $value[2];
	$page = $value[3];
	$psex = $value[4];	
	$que = "INSERT INTO passenger(Passenger_name, Type, User_ID, Flight_inst_ID, Email_ID, Phone, Age, Sex) VALUES('$pname', '$tclass', '$uid', '$inst_id', '$pemail', '$pphone', '$page', '$psex')";
	$res = mysqli_query($conn, $que);
	if($res){
		$pids[] = mysqli_insert_id($conn);
	}
	}
	echo join(",",$pids);
?>