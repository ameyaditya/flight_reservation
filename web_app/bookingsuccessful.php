<!DOCTYPE html>
<html>
<head>
	<title>Successful</title>
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
	<div class="container" id="success-box">
		<div id="tick-mark">
			
		</div>
		<h1 class="display-4">Booking Successful</h1>
		<button class="btn btn-success">View Tickets</button><br>
		<button class="btn btn-primary">Home</button>
	</div>
</body>
</html>