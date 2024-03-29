<?php
	session_start();
	if(!isset($_SESSION['uid']))
		header('location: index.php');
	$p = $_GET['pids'];
	$pids = explode(",",$_GET['pids']);
	$price = $_GET['price'];
	$conn = mysqli_connect("localhost", "root", "", "flights2");
	$uid = $_SESSION['uid'];
	$inst_id = "";
	$type = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Finalise</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
	<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
	        <div class="container" id="form-container">
	        	<div id="login-msg" style="display: none; width: 100%; font-size: 1.0em; color:white; margin-bottom: 10px;"></div>
				<form>
					<div class="form-group form-eles">
						<label for="emailid">Email ID</label>
						<input type="text" class="form-control" id="emailid" aria-describedby="emailHelp" placeholder="Enter email ID" required>
					</div>
					<div class="form-group form-eles">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Enter Password" required>
					</div>
					<button type="button" class="btn btn-primary" id="login-submit-btn" onclick="loginuser()">Submit</button>
					<div id="signup-link" onclick="opensignup()">
						Don't have an Account? Sign Up.
					</div>
				</form>
			</div>
	      </div>
	      <div class="modal-footer">
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Sign Up</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="container" id="signup-container">
	        	<div id="signup-msg" style="display: none; width: 100%; font-size: 1.0em; color:white; margin-bottom: 10px;"></div>
				<form>
					<div class="form-row">
						<div class="form-group col-md-6">
		<!-- 					<label for="username">Username</label>
		 -->					<input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required>
						</div>
						<div class="form-group col-md-6">
		<!-- 					<label for="emailid">Email address</label>
		 -->					<input type="email" class="form-control" id="emailidsignup" aria-describedby="emailHelp" placeholder="Enter email ID" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
		<!-- 					<label for="pass1">Choose a Password</label>
		 -->					<input type="password" name="pass1" id="pass1" placeholder="Enter Password" class="form-control" required>
						</div>
						<div class="form-group col-md-6">
							<!-- <label for="pass2">Re-enter Password</label> -->
							<input type="password" name="pass2" id="pass2" placeholder="Re-enter Password" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<!-- <label for="Phone">Enter Phone Number</label> -->
						<input type="tel" name="phone" id="phone" placeholder="Enter Phone Number" min="6000000000" max="999999999" class="form-control" required>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<!-- <label for="address1">Address Line 1</label> -->
							<input type="text" name="address1" class="form-control" placeholder="Address Line 1" id="address1" required>
							<!-- <textarea class="form-control" id="address1" rows="3"></textarea> -->
						</div>
						<div class="form-group col-md-6">
							<!-- <label for="address2">Address Line 2</label> -->
							<input type="text" name="address2" class="form-control" placeholder="Address Line 2" id="address2" required>
							<!-- <textarea class="form-control" id="address2" rows="3"></textarea> -->
						</div>
					</div>
					<div class="form-row">
						
		      			<div class="form-group col-md-4">
							<!-- <label for="country">Enter Country</label> -->
							<!-- <input type="text" name="country" id="country" placeholder="Enter Country" class="form-control"> -->
							<select id="countries-list" class="form-control">
								<option selected>Select Country</option>
							</select>
						</div>
						<div class="form-group col-md-4">
							<select id="states-list" class="form-control">
								<option selected>Select State</option>
							</select>
						</div>
						<div class="form-group col-md-4">
							<select id="cities-list" class="form-control">
								<option selected>Select City</option>
							</select>
						</div>	
					</div>
					<button type="button" class="btn btn-primary" id="signup-submit-btn" onclick="registeruser()">Sign Up</button>
				</form>
			</div>
	      </div>
	    </div>
	  </div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="index.php">
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
	    <?php 
	    if(!isset($_SESSION['uid'])){ ?>
	    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" id="login-btn" data-toggle="modal" data-target="#loginmodal">Login</button>
	    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" id="signup-btn" data-toggle="modal" data-target="#signup-modal">Signup</button>
		<?php }else{ ?>
		<div class="dropdown">
		  <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <?php echo $_SESSION['uname']; ?>
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="userdropdown">
		    <a class="dropdown-item" href="#">profile</a>
		    <a class="dropdown-item" href="bookinghistory.php">Booking history</a>
		  </div>
		</div>
		<button class="btn btn-outline-primary my-2 my-sm-0" type="button" id="logout-btn" onclick="logout()">Logout</button>
		<?php } ?>
	  </div>
	</nav>
	<div class="container" id="main-main-box">
		<h1 class="display-4" id="summary-heading">
			Summary
		</h1>
		<div id="main-box" class="container">
			<h1 class="display-4" id="passenger-details-heading">Passenger details: </h1>
			<?php
				for($i = 0; $i < count($pids); $i++){
					$id = $pids[$i];
					$que = "SELECT *FROM passenger WHERE Passenger_ID = '$id'";
					$res = mysqli_fetch_assoc(mysqli_query($conn, $que));
					$inst_id = $res['Flight_inst_ID'];
					$type = $res['Type']; ?>
			<div class="container-fluid passenger-summary-box">
				<h1 class="passenger-summary-heading display-4">Passenger <?php echo ($i+1); ?></h1>
				<div class="row">
					<div class="col-1"></div>
					<div class="col-7">
						<span class="passenger-name-sex"><?php echo $res['Passenger_name']." (".$res['Sex'].")"; ?></span>
					</div>
					<div class="col-4">
						<span class="passenger-age"><?php echo "Age: ".$res['Age']; ?></span>
					</div>
				</div>
				<div class="row">
					<div class="col-1"></div>
					<div class="col-7">
						<span class="passenger-email"><?php echo $res['Email_ID']; ?></span>	
					</div>
					<div class="col-4">
						<span class="passenger-phone"><?php echo "Phone: ".$res['Phone']; ?></span>
					</div>
				</div>
				<div class="row">
				</div>
			</div>
			<?php
				}
			?>
			<?php
				$que = "SELECT ap.Name as airplane, i.departure, i.arrival, ar1.Name as dep_airname, c1.Name as dep_city, ar2.Name as arr_airname, c2.Name as arr_city
					from instances i, airplane ap, routes r, city c1, city c2, airports ar1, airports ar2
					WHERE i.Route_ID = r.Route_ID
					AND i.plane_ID = ap.Code
					AND r.departure_airport_code = ar1.Code
					AND ar1.City_code = c1.Code
					AND r.arrival_airport_code = ar2.Code
					AND ar2.City_code = c2.Code
					AND i.Instance_ID = '$inst_id'";
				$res = mysqli_fetch_assoc(mysqli_query($conn, $que));
			?>
			<h1 class="display-4" id="passenger-details-heading">Flight details: </h1>
			<div class="container-fluid passenger-summary-box">
				<div class="row">
					<div class="col-12" style="text-align: center; font-size: 1.2em; margin-bottom: 20px;">
						<?php echo $res['airplane'].", ".$type; ?>
					</div>					
				</div>
				<div class="row">
					<div class="col-2">
						Origin:
					</div>
					<div class="col-4">
						<span class="airport-name"><?php echo $res['dep_airname']; ?></span>
					</div>
					<div class="col-2">
						Destination: 
					</div>
					<div class="col-4">
						<span class="airport-name"><?php echo $res['arr_airname']; ?></span>
					</div>
				</div>
				<div class="row">
					<div class="col-2"></div>
					<div class="col-4">
						 <?php echo $res['dep_city']; ?>
					</div>
					<div class="col-2"></div>
					<div class="col-4">
						 <?php echo $res['arr_city']; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-2">Departure: </div>
					<div class="col-4">
						<?php echo $res['departure']; ?>
					</div>
					<div class="col-2">Arrival: </div>
					<div class="col-4">
						<?php echo $res['arrival']; ?>
					</div>
				</div>
			</div>
			<h1 class="display-4" id="passenger-details-heading">Billing details: </h1>
			<?php  
				$que = "SELECT U_name,u.email as email, Phone, Line1, Line2, City, State, Country FROM users u, contact_details WHERE Contact_ID = Contact_det AND User_ID = '$uid'";
				$res = mysqli_fetch_assoc(mysqli_query($conn, $que));
				$u_name = $res['U_name'];
				$uemail = $res['email'];
			?>
			<div class="container-fluid passenger-summary-box">
				<div class="row">
					<div class="col-12">
						<?php echo "Name: ".$res['U_name']; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<?php echo "Email ID: ".$res['email']; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<?php echo "Billing address: "; ?>
					</div>
					<div class="col-9">
						<?php echo $res['Line1']; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-3"></div>
					<div class="col-9">
						<?php echo $res['Line2']; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-3"></div>
					<div class="col-9">
						<?php echo $res['City'].", ".$res['State'].", ".$res['Country']; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<?php echo "Phone: ".$res['Phone']; ?>
					</div>
				</div>
			</div>
			<h1 class="display-4" id="final-price">Total: Rs.<?php echo $price; ?></h1>
		</div> 
		<button class="btn btn-primary" id="pay-amt" onclick="pay()">
			Confirm & Pay
		</button>
	</div>
	<form id="payment-form" method="post" action="transaction.php">
		<input type="hidden" name="price" value="<?php echo $price; ?>">
		<input type="hidden" name="pids" value="<?php echo $p; ?>">
		<input type="hidden" name="uname" value="<?php echo $u_name; ?>">
		<input type="hidden" name="uemail" value="<?php echo $uemail; ?>">
	</form>
</body>
</html>