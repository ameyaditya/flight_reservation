<?php
	$p = $_GET['pids'];
	$pids = $_GET['pids'];
	$pids = explode(".", $pids);
	$conn = mysqli_connect('localhost', 'root', '', 'flights2');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Boarding pass</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<script type="text/javascript" src="js/htmltocanvas.js"></script>
	<script type="text/javascript" src="js/bookinghistory.js"></script>
</head>
<body>
	<div class="container" id="alltickets">
		<h1 class="display-4" style="margin-top: 20px; margin-bottom: 20px; text-align: center; font-size: 1.8em;">Booking details</h1>
	<?php
		foreach ($pids as $key => $value) {
			$res1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *FROM passenger WHERE Passenger_ID = '$value'"));
			$inst = $res1['Flight_inst_ID'];
			$res2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT a.Name AS airline_name, ap.Name AS airplane, ar1.Name AS dep, ar2.Name AS arr, c1.Name As dep_city, c2.Name AS arr_city, i.departure AS departure  FROM instances i, routes r, airplane ap, airlines a, airports ar1, airports ar2, city c2, city c1  WHERE i.Route_ID = r.Route_ID AND i.plane_ID = ap.Code AND r.airline_code = a.Code AND r.departure_airport_code = ar1.Code AND ar1.City_code = c1.Code AND r.arrival_airport_code = ar2.Code AND ar2.City_code = c2.Code AND i.Instance_ID = '$inst'"));
			//print_r($res2);
	?>
	<div class="container-fluid" style="padding: 0px 150px; margin-top: 30px;">
		<div class="container pass-container" id="ticket">
			<div class="row boarding-pass-row">
				<div class="col-9" style="border-right: 3px #d5d5d5 dotted;">
					<div class="spacing-div">
						<h1 class="display-4 pass-head"><?php echo $res2['airline_name']; ?></h1>
					</div>
					<div class="container-fluid pass-details">
						<div class="sp-2">
							<h1 class="display-4 pass-details-h"><?php echo $res1['Type']; ?> Class</h1>
							<div class="row pass-details-head">
								
								<div class="col-6">
									<div class="row">
										<div class="col-2">
											NAME: 
										</div>
										<div class="col-8">
											<span class="pass-name"><?php echo $res1['Passenger_name']; ?></span>
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="row">
										<div class="col-2">
											FLIGHT: 
										</div>
										<div class="col-8">
											<span class="pass-flight"><?php echo $res2['airplane']."-".$inst; ?></span>	
										</div>
									</div>
								</div>
							</div>
							<div class="row pass-details-head">
								<div class="col-6">
									<div class="row">
										<div class="col-2">
											FROM:
										</div>
										<div class="col-8">
											<span class="pass-airport"><?php echo $res2['dep']; ?></span>, &nbsp;<span class="pass-city"><?php echo $res2['dep_city']; ?></span>	
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="row">
										<div class="col-2">
											DATE: 
										</div>
										<div class="col-8">
											<span class="pass-date"><?php
												$datetime = explode(" ", $res2['departure']);
												$date = $datetime[0];
												$time = $datetime[1];
												$date = join("-",array_reverse(explode("-", $date)));
												$times = explode(":", $time);
												$time = $times[0].":".$times[1];
												echo $date.", ".$time;
											?></span>	
										</div>
									</div>
								</div>
							</div>
							<div class="row pass-details-head">
								<div class="col-6">
									<div class="row">
										<div class="col-2">
											TO: 
										</div>
										<div class="col-8">
											<span class="pass-airport"><?php echo $res2['arr']; ?></span>,<span class="pass-city"><?php echo $res2['arr_city']; ?></span>
										</div>
									</div>
									
								</div>
								<div class="col-6">
									<div class="row">
										<div class="col-2">
											SEAT: 
										</div>
										<div class="col-8">
											<span class="pass-seat"><?php echo $res1['Seat_no'].$res1['Type'][0]; ?></span>&nbsp; &nbsp;<span class="pass-zone">ZONE <?php echo $res1['Type'][0]; ?></span>	
										</div>
									</div>
								</div>
							</div>
							<div class="row pass-details-head">
								<div class="lower-foot">
									<h1 class="display-4 footer-data">Gate Closes 15mins before departure</h1>
								</div>
							</div>
						</div>
					</div>
					<div class="spacing-div">
						
					</div>
				</div>
				<div class="col-3">
					<div class="spacing-div">
						
					</div>
					<div class="sp-2 qr-sp">
						<?php 
						$d = $inst."_".$p;
						$var = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=$d"; ?>
						<div class="qr-code">
							<img src="<?php echo $var; ?>">
						</div>
					</div>
					<div class="spacing-div">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	?>
</div>
<div class="container" style="text-align: center;">
	<button  class="btn btn-primary" style="width: 80%; margin-top: 50px;" onclick="print(<?php echo count($pids); ?>)">Download PDF</button>
</div>
</body>
</html>