<?php
	$conn = mysqli_connect('localhost', 'root', "", 'flights2');
	$query = "SELECT DISTINCT(c.Name) FROM city c, airports a, routes r WHERE r.departure_airport_code = a.Code AND a.City_code = c.Code";
	$res = mysqli_query($conn, $query);
	$arr2 = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$arr2[] = $row['Name'];
	}
	$origin = $_POST['origin'];

	$query = "SELECT DISTINCT(c.Name) FROM city c, airports a, routes r WHERE r.arrival_airport_code = a.Code AND a.City_code = c.Code AND r.departure_airport_code IN (SELECT DISTINCT(a2.Code) FROM city ci2, airports a2 WHERE ci2.Code = a2.City_code AND ci2.Name = '$origin' )";
	$res = mysqli_query($conn, $query);
	$arr3 = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$arr3[] = $row['Name'];
	}

	$destination = $_POST['destination'];
	$dep = $_POST['departure'];
	$arr = $_POST['arrival'];
	$tclass = $_POST['tclass'];
	$travellers = $_POST['travellers'];
	$costvar = "";
	switch ($tclass) {
		case 'Economy':
			$costvar = 'ecost';
			break;
		case 'Business':
			$costvar = 'bcost';
			break;
		case 'First Class':
			$costvar = 'fcost';
			break;
		default:
			$costvar = 'none';
			break;
	}
	//print_r($origin." ".$destination." ".$dep." ".$arr." ".$tclass." ".$travellers);
	$origin_code = mysqli_query($conn, "SELECT code from city WHERE Name = '$origin'");
	$destination_code = mysqli_query($conn, "SELECT Code FROM city WHERE Name = '$destination'");
	$origin_code = mysqli_fetch_array($origin_code)[0];
	$destination_code = mysqli_fetch_array($destination_code)[0];
	//print_r("\n".$origin_code." ".$destination_code);
	if($tclass == 'Economy'){
		$que = "SELECT *
FROM instances i, routes r, airplane ap
WHERE i.Route_ID = r.Route_ID
AND i.plane_ID = ap.Code 
AND r.departure_airport_code = '$origin_code' 
AND r.arrival_airport_code = '$destination_code'
AND ap.Eseats > 0
AND ap.Eseats >= '$travellers'
AND departure LIKE '$dep%'
ORDER BY i.ecost";
		$res = mysqli_query($conn, $que);
	}
	if($tclass == "Business"){
		$res = mysqli_query($conn, "SELECT *
FROM instances i, routes r, airplane ap
WHERE i.Route_ID = r.Route_ID
AND i.plane_ID = ap.Code 
AND r.departure_airport_code = '$origin_code' 
AND r.arrival_airport_code = '$destination_code'
AND ap.Bseats > 0
AND ap.Bseats >= '$travellers'
AND departure LIKE '$dep%'
ORDER BY i.bcost");
	}
	if($tclass == "First Class"){
		$res = mysqli_query($conn, "SELECT *
FROM instances i, routes r, airplane ap
WHERE i.Route_ID = r.Route_ID
AND i.plane_ID = ap.Code 
AND r.departure_airport_code = '$origin_code' 
AND r.arrival_airport_code = '$destination_code'
AND ap.Fseats > 0
AND ap.Fseats >= '$travellers'
AND departure LIKE '$dep%'
ORDER BY i.fcost");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Plane Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/index.js"></script>
	<style type="text/css">
	#flight-data-row{
		margin-top: 30px;
		margin-bottom: 10px;
		//box-shadow: 5px 10px rgba(0, 0, 0, 0.1);
		border-radius: 5px;
		padding: 15px;
		background-color: #f5f5f5;
	}
	#flight-data-row div{
		//margin: 10px 10px;
	}
	#flight-data-row div div{
		//margin: 10px 10px;
		padding: 5px;
		text-align: center;
		color: black;
	}
	#cost-span{
		font-size: 1.4em;
	}
	.name-span{
		font-size: 0.8em;
		font-weight: 500;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">
	    <img src="img/plane logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
	    Goibiba
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Flight</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">How to Book</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">About us</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Contact Us</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Offers</a>
	      </li>
	    </ul>
	    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" id="login-btn" data-toggle="modal" data-target="#loginmodal">Login</button>
	    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" id="signup-btn" data-toggle="modal" data-target="#signup-modal">Signup</button>
	  </div>
	</nav>
	<div id="hidden-form" style="display: none;">
		<form action="addpassengers.php" method="post" id="hidden-form-form">
			<input type="hidden" name="ori" id="ori">
			<input type="hidden" name="des" id="des">
			<input type="hidden" name="depdat" id="depdat">
			<input type="hidden" name="tcla" id="tcla">
			<input type="hidden" name="trav" id="trav">
			<input type="hidden" name="instance" id="instance">
			<button type="submit">Submit</button>
		</form>
	</div>
	<div class="container-fluid">
		<div id="home-wallpaper2">
			<div class="container-fluid" id="initial-submit-form2">
				<div class="container-fluid" id="heading-initial-form2">
					<div class="row">
						<!-- <div class="col-1"></div> -->
						<div class="col-2" style="text-align: center;">
							Origin
						</div>
						<div class="col-3" style="text-align: center; padding-left: 22px">
							Destination
						</div>
						<div class="col-2" style="text-align: center;">
							Departure Date
						</div>
						<!-- <div class="col-2" style="text-align: center;">
							Return Date
						</div> -->
						<div class="col-3" style="text-align: center; padding-right: 40px;">
							Travel class
						</div>
						<div class="col-2" style="text-align: center; padding-right: 45px;">
							Travellers
						</div>
						<!-- <div class="col-1"></div> -->
					</div>
				</div>
				
				<form method="post" action="planedetails.php" id="query-form-2">
				  <div class="row no-gutters">
				    <div class="col mr-1">
				      <!-- <input type="text" class="form-control" placeholder="From" list="fromname"> -->
				      <select id="fromname" class="custom-select" name="origin">
				      	<option>select</option>
				      	<?php
				      		foreach ($arr2 as $key => $value) {
				      			if($value == $origin)
				      				echo "<option selected>".$value."</option>";
				      			else
				      				echo "<option>".$value."</option>";
				      		}
				      	?>
				      </select>
				    </div>
				    <div class="col mr-1">
				      <!-- <input type="text" class="form-control" placeholder="To"> -->
				      <select class="custom-select" name="destination" id="destination-disp-2">
				      	<option>select</option>
				      	<?php
				      		foreach ($arr3 as $key => $value) {
				      			if($value == $destination)
				      				echo "<option selected>".$value."</option>";
				      			else
				      				echo "<option>".$value."</option>";
				      		}
				      	?>
				      </select>
				    </div>
				    <div class="col mr-1">
				      <input type="date" name="departure" id="departure-date-2" class="form-control" placeholder="Departure Date" value="<?php echo $dep; ?>">
				    </div>
				    <!-- <div class="col mr-1"> -->
				      <input type="hidden" name="arrival" id="arrival-date" class="form-control" value="<?php echo $arr; ?>" placeholder="Return Date">
				    <!-- </div> -->
				    <div class="col mr-1">
				    	<select class="form-control" id="tclass-2" name="tclass">
                            <?php 
                                if($tclass == "Economy")
                                    echo "<option selected>Economy</option>";
                                else{
                            ?>
                          <option>Economy</option>
                            <?php }
                                if($tclass == "Business")
                                    echo "<option selected>Business</option>";
                                else{
                             ?>
                          <option>Business</option>
                            <?php }
                                if($tclass == "First Class")
                                    echo "<option selected>First Class</option>";
                                else{
                                    ?>
                          <option>First Class</option>
                            <?php } ?>
                        </select>
				    </div>
				    <div class="col mr-1">
			    		<input type="number" min="1" max="9" class="form-control" placeholder="Travellers" id="travellers-2" value="<?php echo $travellers; ?>" name="travellers">
				    </div>
				  </div>
					<div class="row" style="display: none;">
				    	<button class="btn btn-primary" type="button" id="initial-submit-btn" onclick="submittic()">Submit</button>
					</div>
				</form>

			</div>
		</div>
	</div>




	<div class="container">
		<h1 class="display-4" style="text-align: center;">
			Flight Data
		</h1>
		<div id="flight-data">
			<?php 
			if(mysqli_num_rows($res) > 0){
			while($row = mysqli_fetch_assoc($res)){ ?>
			<div id="flight-data-row">
				<div class="row">
					<div class="col-3">
						<span class="">
							<?php 
								$res_dep = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Name FROM city WHERE `Code` = '".$row['departure_airport_code']."'"))['Name'];

								echo $res_dep; ?>
						</span><br>
						<span class="name-span">
							<?php 
								$res_dep = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Name FROM airports WHERE `City_code` = '".$row['departure_airport_code']."'"))['Name'];

								echo $res_dep; ?>
						</span>
					</div>
					<div class="col-3">
						<?php
							$dep = $row['departure'];
							$arr = $row['arrival'];
							$dep = strtotime($dep);
							$arr = strtotime($arr);
							$mins = ($arr - $dep)/60;
							echo "<b>".intdiv($mins, 60)."h   ".($mins % 60)."m</b>";

						?>
					</div>
					<div class="col-3">
						<span class="">
							<?php 
								$res_dep = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Name FROM city WHERE `Code` = '".$row['arrival_airport_code']."'"))['Name'];

								echo $res_dep; ?>
						</span><br>
						<span class="name-span">
							<?php 
								$res_dep = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Name FROM airports WHERE `City_code` = '".$row['arrival_airport_code']."'"))['Name'];

								echo $res_dep; ?>
						</span>
					</div>
					<div class="col-3">
						<span id="cost-span">
							<?php echo "Rs.".$row[$costvar]; ?>
						</span>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<?php echo explode(" ", $row['departure'])[1]; ?>
					</div>
					<div class="col-3">
						<?php echo $row['Name']."-".$row['Instance_ID']; ?>
					</div>
					<div class="col-3">
						<?php echo explode(" ", $row['arrival'])[1]; ?>
					</div>
					<div class="col-3">
						<button class="btn btn-primary" id="<?php echo $row['Instance_ID']; ?>" onclick="buyticket(this.id)">Book Ticket</button>
					</div>
				</div>
			</div>
			<?php }} else{ ?>
			<div id="no-data">
				<h1 class="display-4"  style="font-size: 1.5em; text-align: center; margin-top: 20px;">
					No Flight available for these these dates from <?php echo $origin; ?> to <?php echo $destination; ?>.
				</h1>
			</div>
		<?php } ?>
		</div>
	</div>
</body>
</html>