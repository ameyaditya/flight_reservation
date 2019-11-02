<?php session_start();
	if(!isset($_SESSION['uid']))
		header('location: index.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking History</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/bookinghistory.js"></script>
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
	<div class="container">
		<h1 class="display-4" id="bkhead">
			Booking History
		</h1>
		<div class="container" id="history-booking">
			<div class="row history-det">
				<div class="col-4">
					Flight Name
				</div>
				<div class="col-4">
					Booking Date
				</div>
				<div class="col-4">
					Price
				</div>
			</div>
			<?php 
				$conn = mysqli_connect('localhost', 'root', '', 'flights2');
				$uid = $_SESSION['uid'];
				$que = "SELECT *FROM transaction WHERE user_id = '$uid' AND respcode = '01' ORDER BY `date` DESC";
				$res = mysqli_query($conn, $que);
				if(mysqli_num_rows($res) > 0){
					while ($row = mysqli_fetch_assoc($res)) {
						$oid = $row['order_id'];
						$pids = explode("0_0_", $oid);
						$pids = $pids[1];
						$pids = explode("_", $pids);
						$onepid = $pids[0];
						$onedata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *FROM passenger WHERE Passenger_ID = '$onepid'"));
						if($onedata['confirmed'] == '1'){
							$instid = $onedata['Flight_inst_ID'];
							$que = "SELECT ap.Name AS plane, ai.Name AS airname FROM routes r, airplane ap, instances i, airlines ai WHERE i.Route_ID = r.Route_ID AND i.plane_ID = ap.Code AND r.airline_code = ai.Code AND i.Instance_ID = '$instid'";
							$res_data = mysqli_fetch_assoc(mysqli_query($conn, $que));

			?>
				<div class="row history-box">
					<div class="col-8">
						<div class="row history-row">
							<div class="col-6">
								<?php echo $res_data['airname'].", ".$res_data['plane']."-".$instid; ?>
								
							</div>
							<div class="col-6">
								<?php
									$disp_date = $row['date'];
									$disp_date = explode("-", explode(" ", $disp_date)[0]);
									for ($i=count($disp_date)-1; $i >= 0 ; $i--) { 
									 	echo $disp_date[$i];
									 	if($i != 0)
									 		echo "-";
									 } 
								?>
							</div>
						</div>
						<div class="row history-row">
							<div class="col-6">
								<button class="btn btn-primary" style="width: 100%;" onclick="download_pass(<?php echo join(".", $pids); ?>)">Download Boarding passes</button>
							</div>
							<div class="col-6">
								<button class="btn btn-primary" onclick="cancel_tic(<?php echo "'".join(".", $pids)."'"; ?>)" style="width: 100%;" <?php if($onedata['cancelled'] == '1') echo "disabled"; ?>>Cancel Tickets</button>
							</div>
						</div>
					</div>
					<div class="col-4 history-cost">
						<h1>Rs. <?php echo $row['amount']; ?></h1>
					</div>
				</div>



			<?php
						}
					}
				}else{
					echo "No data show";
				}
			?>
		</div>
	</div>
</body>
</html>