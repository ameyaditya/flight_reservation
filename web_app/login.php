<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$user = $_POST['username'];
	$password = $_POST['password'];
	$que = "SELECT User_ID,Pass FROM users WHERE U_name = '$user' OR email = '$user'";
	$res1 = mysqli_query($conn, $que);
	$row = mysqli_fetch_assoc($res1);
	$pass = $row['Pass'];
	$res = password_verify($password, $pass);
	if($res){
		$_SESSION['uid'] = $row['User_ID'];
		$_SESSION['uname'] = $user;
		echo "true";
	}
	else{
		echo "false";
	}

?>
