<?php
	session_start();
	$conn = mysqli_connect('localhost', 'root', "", 'flights2');
	$query = "SELECT DISTINCT(c.Name) FROM city c, airports a, routes r WHERE r.departure_airport_code = a.Code AND a.City_code = c.Code";
	$res = mysqli_query($conn, $query);
	$arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$arr[] = $row['Name'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Goibiba</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/city_state.js"></script>
</head>
<body style="background-color: #f5f5f5;">

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

	<div id="successful-signup">
		Successful
	</div>
	<div class="container-fluid" id="form-container">
		<div class="black-overlay">
			
		</div>
		<div id="home-wallpaper">
			<h1 class="display-4" id="booking-heading">Flight Ticket Booking</h1>

			<div class="container" id="initial-submit-form">
				<div class="container-fluid" id="heading-initial-form">
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
				<form method="post" action="planedetails.php" id="query-form">
				  <div class="row no-gutters">
				    <div class="col mr-1">
				      <!-- <input type="text" class="form-control" placeholder="From" list="fromname"> -->
				      <select id="fromname" class="custom-select" name="origin">
				      	<option>select</option>
				      	<?php
				      		foreach ($arr as $key => $value) {
				      			echo "<option>".$value."</option>";
				      		}
				      	?>
				      </select>
				    </div>
				    <div class="col mr-1">
				      <!-- <input type="text" class="form-control" placeholder="To"> -->
				      <select class="custom-select" name="destination" id="destination-disp">
				      	<option>select</option>
				      	<?php
				      		foreach ($arr as $key => $value) {
				      			echo "<option>".$value."</option>";
				      		}
				      	?>
				      </select>
				    </div>
				    <div class="col mr-1">
				      <input type="date" name="departure" id="departure-date" class="form-control" placeholder="Departure Date">
				    </div>
				    <!-- <div class="col mr-1"> -->
				      <input type="hidden" name="arrival" id="arrival-date" class="form-control" placeholder="Return Date">
				    <!-- </div> -->
				    <div class="col mr-1">
				    	<select class="form-control" name="tclass" id="tclass">
						  <option>Travel Class</option>
						  <option>Economy</option>
						  <option>Business</option>
						  <option>First Class</option>
						</select>
				    </div>
				    <div class="col mr-1">
			    		<input type="number" min="1" max="9" class="form-control" placeholder="Travellers" id="travellers" value="0" name="travellers">
				    </div>
				  </div>
					<div class="row">
				    	<button class="btn btn-primary" type="button" id="initial-submit-btn" onclick="submittic()">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="second-block">
		<h1 class="display-4" id="second-block-head">How to Book?</h1>
		<div class="container">
			<ul class="list-group list-group-flush">
			  <li class="list-group-item">Login into our portal</li>
			  <li class="list-group-item">Enter Origin and Destination</li>
			  <li class="list-group-item">Choose Departure Date</li>
			  <li class="list-group-item">Choose travel class and number of Passengers</li>
			  <li class="list-group-item">Choose a flight feasible for you</li>
			  <li class="list-group-item">Enter the details and make the payment</li>
			  <li class="list-group-item">Enjoy your hastle free travel</li>
			</ul>
		</div>
	</div>
</body>
</html>