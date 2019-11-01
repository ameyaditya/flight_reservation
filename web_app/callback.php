<?php
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'flights2');
	$status = $_POST['STATUS'];
	$respcode = $_POST['RESPCODE'];
	$respmsg = $_POST['RESPMSG'];
	$gateway = $_POST['GATEWAYNAME'];
	$payment_mode = $_POST['PAYMENTMODE'];
	$oid = $_POST['ORDERID'];
	//print_r($_POST);
	$paymentmethods = array("CC" => "Credit Card", "DC" => "Debit Card", "NB" => "Net Banking", "UPI" => "UPI", "PPI" => "Paytm wallet", "PAYTMCC" => "Postpaid");
	$mode = $paymentmethods[$payment_mode];
	$que = "UPDATE transaction SET respcode = '$respcode', respmsg = '$respmsg', gateway = '$gateway', payment_mode = '$mode', status = '$status'";
	$res = mysqli_query($conn, $que);
	if($status == "TXN_SUCCESS" && $respcode == '01'){
		$pids = explode("_", explode("0_0_", $oid)[1]);
		$oneid = $pids[0];
		$que = "SELECT *FROM passenger WHERE Passenger_ID='$oneid'";
		$res = mysqli_fetch_assoc(mysqli_query($conn, $que));
		$type = $res['Type'];
		$fid = $res['Flight_inst_ID'];
		$uid = $_SESSION['uid'];
		$seattype = array("Business" => "bseats", "Economy" => "eseats", "First Class" => "fseats");
		switch ($type) {
			case 'Business':
				$seats_left = mysqli_fetch_assoc(mysqli_query($conn, "SELECT bseats FROM instances WHERE Instance_ID = '$fid'"))['bseats'];
				break;
			case 'Economy':
				$seats_left = mysqli_fetch_assoc(mysqli_query($conn, "SELECT eseats FROM instances WHERE Instance_ID = '$fid'"))['eseats'];
				break;
			case 'First Class':
				$seats_left = mysqli_fetch_assoc(mysqli_query($conn, "SELECT fseats FROM instances WHERE Instance_ID = '$fid'"))['fseats'];
				break;
			default:
				$seats_left = 0;
				break;
		}
		$seats_left = (int)$seats_left;
		if(count($pids) > $seats_left){
			echo "No seats available";
			echo "Initiating refund";
		}
		else{
			$s = $seattype[$type];
			$se = count($pids);
			echo "\n","$se";
			foreach ($pids as $key => $value) {
				$que = "UPDATE passenger SET confirmed = '1' WHERE Passenger_ID = '$value'";
				mysqli_query($conn, $que);
			}
			$que = "UPDATE instances SET $s = $s - $se WHERE Instance_ID = '$fid'";
			mysqli_query($conn, $que);
			$seat = 1;
			$counter = 0;
			echo "$fid";
			$seats_res = mysqli_query($conn, "SELECT Seat_no FROM passenger WHERE Type = '$type' AND Flight_inst_ID = '$fid' AND confirmed = '1' AND cancelled = '0'");
			$taken_seats = array();
			if(mysqli_num_rows($seats_res) > 0){
				while($seats = mysqli_fetch_assoc($seats_res)){
					$taken_seats[] = (string)$seats['Seat_no'];
				}
			}
			else{
				echo "not taken";
			}
			print_r($taken_seats);
			while($counter < count($pids)){
				if(in_array($seat, $taken_seats)){
					$seat += 1;
				}
				else{
					$selected_pass = $pids[$counter];
					$que = "UPDATE passenger SET Seat_no = '$seat' WHERE Passenger_ID = '$selected_pass'";
					mysqli_query($conn, $que);
					$taken_seats[] = $seat;
					$counter += 1;
					$seat += 1;
					echo "Seats alloted";
					header("Location: bookingsuccessful.php");
				}
			}
		}
	}
?>