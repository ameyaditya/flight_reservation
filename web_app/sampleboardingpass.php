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
	<div class="container" style="padding: 0px 150px;">
		<div class="container pass-container" id="ticket">
			<div class="row boarding-pass-row">
				<div class="col-9" style="border-right: 3px #d5d5d5 dotted;">
					<div class="spacing-div">
						<h1 class="display-4 pass-head">British airlines</h1>
					</div>
					<div class="container-fluid pass-details">
						<div class="sp-2">
							<h1 class="display-4 pass-details-h">Economy Class</h1>
							<div class="row pass-details-head">
								
								<div class="col-6">
									<div class="row">
										<div class="col-2">
											NAME: 
										</div>
										<div class="col-8">
											<span class="pass-name">Amey Aditya Achar</span>
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="row">
										<div class="col-2">
											FLIGHT: 
										</div>
										<div class="col-8">
											<span class="pass-flight">Boeign - 767</span>	
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
											<span class="pass-airport">Kempegowda International Airport</span>, &nbsp;<span class="pass-city">Bengaluru</span>	
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="row">
										<div class="col-2">
											DATE: 
										</div>
										<div class="col-8">
											<span class="pass-date">10-10-2019, 11:30</span>	
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
											<span class="pass-airport">Kempegowda International Airport</span>,<span class="pass-city">Bengaluru</span>
										</div>
									</div>
									
								</div>
								<div class="col-6">
									<div class="row">
										<div class="col-2">
											SEAT: 
										</div>
										<div class="col-8">
											<span class="pass-seat">39B</span>&nbsp; &nbsp;<span class="pass-zone">ZONE A</span>	
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
						<div class="qr-code">
							
						</div>
					</div>
					<div class="spacing-div">
						
					</div>
				</div>
			</div>
		</div>
	</div>
		<div id="editor"></div>

	<button id="cmd" onclick="abc()">Click</button>
	<a href="javascript:print()" class="button">Run Code</a>
</body>
</html>