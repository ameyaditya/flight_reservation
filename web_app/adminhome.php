<?php
	session_start();
	if(!isset($_SESSION['admin'])){
		header("Location: admin.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin HomePage</title>
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
<body>

	<div class="modal fade" id="airportmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Add Airport</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="container-fluid">
	        	<form>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <input type="text" class="form-control" id="airport_code" placeholder="Airport Code">
				    </div>
				    <div class="form-group col-md-6">
				      <input type="text" class="form-control" id="airport_name" placeholder="Airport_name">
				    </div>
				  </div>
				  <div class="form-row">
					  <div class="form-group col-md-6">
					   
					    <input type="text" class="form-control" id="citycode" placeholder="City Code">
					  </div>
					  <div class="form-group col-md-6">
					   
					    <input type="text" class="form-control" id="cityname" placeholder="City Name">
					  </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				     
				      <input type="text" class="form-control" id="country_code" placeholder="Country Code">
				    </div>
				    <div class="form-group col-md-6">
				     
				      <input type="text" id="country_name" class="form-control" placeholder="Country Name" >
				    </div>
			      </div>
				  <button type="button" class="btn btn-primary" style="width: 100%;" onclick="submitairport()">Submit</button>
				</form>
	        </div>
	      </div>
	      <div class="modal-footer">
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
	      <!-- <li class="nav-item active">
	        <a class="nav-link">ADMIN HOME</a>
	      </li> -->
	    </ul>
		<button class="btn btn-outline-primary my-2 my-sm-0" type="button" id="logout-btn" onclick="logoutadmin()">Logout</button>
	  </div>
	</nav>
	<div id="message-box-admin" style="width: 100%; color: red; font-size: 1.0em;<?php echo 'display: none;'; ?>">
		
	</div>
	<h1 class="display-4" id="admin-home">Admin Home</h1>
<div class="container-fluid">
	<div class="row" id="data-row">
		<div class="col-3">
			<div class="element-col" data-target="airportmodal" data-toggle="modal" onclick="openmodal('airportmodal')">
				<h1 class="display-4">Add Airport</h1>
			</div>
		</div>
		<div class="col-3">
			<div class="element-col">
				<h1 class="display-4">Add Airline</h1>
			</div>
		</div>
		<div class="col-3">
			<div class="element-col">
				<h1 class="display-4">Add Airplane</h1>
			</div>
		</div>
		<div class="col-3">
			<div class="element-col">
				<h1 class="display-4">Add Route</h1>
			</div>
		</div>
	</div>
</div>
</body>
</html>