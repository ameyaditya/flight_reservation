<?php
	$rollno = $_POST['rollno'];
	sleep(2);
	$data = file_get_contents('data.json');
	$data = json_decode($data, true);
	$flag = 0;
	//print_r($data);
	foreach ($data as $key => $value) {
		if($value['rollno'] == $rollno){
			$det = $value;
			$flag = 1;
			break;
		}
	}
	if($flag == 0){
		echo "None";
	}
	else{
		print_r(json_encode($det));
	}
?>