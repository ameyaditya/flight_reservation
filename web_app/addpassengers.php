<?php 
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$origin = $_POST['origin'];
	$destination = $_POST['destination'];
	$dep_date = $_POST['departure'];
	$arr_date = $_POST['arrival'];
	$tclass  = $_POST['tclass'];
	$travellers = $_POST['travellers'];
	$id = $_POST['instance'];
	$costvar = "";
	switch ($tclass) {
		case 'Economy':
			$costvar = "ecost";
			break;
		case 'Business':
			$costvar = "bcost";
			break;
		case 'First Class':
			$costvar = 'fcost';
			break;
		default:
			$costvar = 'None';
			break;
	}
	$cost = mysqli_fetch_array(mysqli_query($conn, "SELECT $costvar FROM instances WHERE instance_ID = '$id'"))[$costvar];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add passengers</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/index.js"></script>
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

	<div class="container-fluid">
		<h1 class="display-4">
			Add Passengers
		</h1>

		<div class="row">
			<div class="col-8">
				<?php
					for($i = 1; $i <= $travellers; $i++){
				 ?>
			<div class="container" id="passenger-box">
				<h1 class="display-4 pass-heading">Add Passenger <?php echo $i; ?> details</h1>
				<form>
					<div class="form-row pass-row">
						<div class="col">
							<input type="text" id="pname-<?php echo $i; ?>" placeholder="Enter Passenger Name" class="form-control" name="pname">
						</div>
						<div class="col">
							<input type="email" id="pemail-<?php echo $i; ?>" aria-describedby="emailHelp" placeholder="Enter Passenger email ID" class="form-control" name="pemail">
						</div>
					</div>
					<div class="form-row pass-row">
						<div class="col">
								<input type="tel" id="pphone-<?php echo $i; ?>" placeholder="Enter Passenger Phone Number" class="form-control" name="pphone">				
						</div>
						<div class="col">
								<input type="number" id="page-<?php echo $i; ?>" class="form-control" name="page" placeholder="Age" min="5"max="120">				
						</div>
						<div id="instance-id" style="display: none;"><?php echo $id; ?></div>
						<div class="col">
								<select class="form-control" id="sex-select-<?php echo $i; ?>">
									<option>Select Sex</option>
									<option>Male</option>
									<option>Female</option>
									<option>Other</option>
								</select>				
						</div>
					</div>
				</form>
			</div>
			<?php } ?>
			</div>
			<div class="col-4">
					<div id="fare-box">
						<h1>Fare Summary</h1>
						<span id="nooftravellers">Adults: <?php echo $travellers; ?></span>, 
						<span id="travelclass"><?php echo $tclass; ?> class</span><br><br>
						<div class="container-fluid">
							<div class="row">
								<div class="col-9">
									Base Fare:
								</div>
								<div class="col-3">
									Rs. <?php echo $cost*$travellers; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-9">
									Fees and surcharges
								</div>
								<div class="col-3">
									Rs. <?php echo number_format((float)(($cost/11)*$travellers), 2, '.', ''); ?>
								</div>
							</div>
							<div class="row">
								<h1 id="totprice">Total <?php echo ($cost*$travellers)+number_format((float)(($cost/11)*$travellers), 2, '.', ''); ?></h1>
							</div>
						</div>
						<button class="btn btn-primary" style="width: 100%; margin-top: 30px; margin-bottom: 100px;" onclick="makepayment()">Submit</button>
					</div>
			</div>
		</div>

	</div>
</body>
</html>