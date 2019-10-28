<?php
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$phone = $_POST['ph'];
	$addr1 = $_POST['addr1'];
	$addr2 = $_POST['addr2'];
	$state = $_POST['stat'];
	$country = $_POST['cntry'];
	$city = $_POST['cty'];
	$que = "SELECT *FROM users WHERE email = '$email' OR U_name = '$uname' OR email = '$uname' OR U_name = '$email'";
	$res = mysqli_query($conn, $que);
	if(mysqli_num_rows($res) > 0){
		echo "error";
	}
	else{
		$que = "INSERT INTO contact_details(Email, Phone, Line1, Line2, City, State, Country) VALUES('$email', '$phone', '$addr1', '$addr2', '$city', '$state', '$country')";
		$res = mysqli_query($conn, $que);
		$d = false;
		if($res){
			$d = true;
		}
		else{
			$d = false;
		}
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$num = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(Contact_ID) AS max FROM contact_details"))['max'];
		$que = "INSERT INTO users(U_name, email, Pass, Contact_det) VALUES ('$uname', '$email', '$pass', '$num')";
		$res = mysqli_query($conn, $que);
		if($res){
			echo "true";
		}
		else{
			echo "false";
		}
	}
?>