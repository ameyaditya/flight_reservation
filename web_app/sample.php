<?php 
session_unset();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Step Up 2.0</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
	<link rel="manifest" href="images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
 

	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="back.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
	<!-- Montserrat for title -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

</head>
<body>
	<button class="btn btn-secondary btn-success" id="registerbtn" onclick="window.location.href='marathon-tickets'">Register Now</button>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a href="index" class="navbar-brand">Step Up 2.0</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a href="#" class="nav-link">Home<span class="sr-only">(current)</span></a>
				</li>
				<li>
					<a href="#aboutmarathon" class="nav-link">About Marathon</a>
				</li>
				<li>
					<a href="#mu-pricing" class="nav-link">Pricing</a>
				</li>
				<li>
					<a href="#eventgallery" class="nav-link">Event Gallery</a>
				</li>
				<!--
				<li>
					<a href="#" class="nav-link">Sponsors</a>
				</li>-->
			</ul>
		</div>
	</nav>
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="banner">
					<div class="bg">
					</div>
					<!--
					<h1 class="display-2" id="marathon-header-big">RNSIT Marathon</h1>
					<h1 class="display-4" id="marathon-header-small">RNSIT Marathon</h1>-->
				</div>

			</div>
			<div class="carousel-item">
				<div class="banner">
					<div class="bg2"></div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="quote-container container">
            <blockquote>
                <p>"Run, because we owe it to them.
Run, so that those roars, chirps, growls don't fade away to silence .
Tie those shoe laces tight and break the sweat, run it to save the wildlife.
A marathon is taking place at RNSIT on the 24th of March. 
So, Step-Up Bengaluru!</p>
            </blockquote>
        </div>
	<div class="counter">
		<div class="container">
			<div class="flex-container ">
				<div class="flex-item"><div class="cont"><div id="days"></div><h1>Days</h1></div></div>
				<div class="flex-item"><div class="cont"><div id="hours"></div><h1>Hours</h1></div></div>
				<div class="flex-item"><div class="cont"><div id="mins"></div><h1>Mins</h1></div></div>
				<div class="flex-item"><div class="cont"><div id="secs"></div><h1>Secs</h1></div></div>
			</div>
		</div>
	</div>
	<div class="container">
		<h2 class="mu-title" id="aboutmarathon">Step Up 2.0</h2>
		<p class="lead"><!--Run, because we owe it to them.
Run, so that those roars, chirps, growls don't fade away to silence .
Tie those shoe laces tight and break the sweat, run it to save the wildlife.
A marathon is taking place at RNSIT on the 24th of March. 
So, Step-Up Bengaluru! -->
Step-up Bengaluru is an annual marathon hosted by RNSIT. Every year, hundreds of runners of all age groups from all over the city gather to do what they do best: Run. And with Step-up, you always run for a cause. Both winners and finishers get a shiny medal and of course there's breakfast and refreshments for everyone. So wait no more, put on your running shoes, wake up that athletic spirit within you and Step-up, Bengaluru!

</p>
	</div>
	<div class="container-fluid events">
		<div class="row">
			<div class="col-md-3 event-item align-self-center">
				<div id="venue" class="events-icons"></div>
				RNS Institute of Technology
			</div>
			<div class="col-md-3 event-item align-self-center">
				<div id="date" class="events-icons"></div>
				March 24th, 2019<br>6:30 AM
			</div>
			<div class="col-md-3 event-item align-self-center">
				<div id="breakfast" class="events-icons"></div>
			Free Breakfast
			</div>
			<div class="col-md-3 event-item align-self-center">
				<div id="medals" class="events-icons"></div>
			Winner Medals
			</div>
		</div>
	</div>

		<section id="mu-pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-pricing-area">
							
							<div class="mu-title-area">
								<h2 class="mu-title">Pricing plans</h2>
								<p class="lead">Choose the plan that suits you the best and get ready to run!</p>
							</div>
							
							<div class="mu-pricing-conten">
								<div class="row">
									<!-- single price item -->
									<div class="col-md-6">
										<div class="mu-single-price">

											<div class="mu-single-price-head">
												<span class="mu-currency">Rs.</span>
												<span class="mu-rate">200</span>
												<span class="mu-time">/per head</span>
											</div>
											<h3 class="mu-price-title">BASIC</h3>
											<ul>
												<li>1 Marathon Ticket</li>
												<li>Breakfast</li>
												<li>Refreshments</li>
												<li>Finishers medal</li>
											</ul>
											
										</div>
									</div>
									<!-- / single price item -->

									<!-- single price item -->
									<div class="col-md-6">
										<div class="mu-single-price mu-popular-price">
											<span class="mu-price-tag">Popular</span>
											<div class="mu-single-price-head">
												<span class="mu-currency">Rs.</span>
												<span class="mu-rate">320</span>
												<span class="mu-time">/per head</span>
											</div>
											<h3 class="mu-price-title">STANDARD</h3>
											<ul>
												<li>1 Marathon Ticket</li>
												<li>Breakfast</li>
												<li>Refreshments</li>
												<li>Finishers medal</li>
												<li>Official T-Shirt</li>
											</ul>
										</div>
									</div>
									<!-- / single price item -->
				
							</div>
							<div class="container">
								<button class="btn btn-primary btn-lg btn-block btn-danger" onclick="window.location = 'marathon-tickets'">Buy Tickets</button>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Pricing -->
<div class="container">
	<h1 class="mu-title" id="eventgallery">Rules & Regulations</h1>
	<div class="rules-box">
		<ol>
			<li>The registration fees are non-refundable and the passes are non-transferable.</li>
			<li>Any sort of wheeled vehicles such as scooters, motorcycles or bicycles are not permitted on the course.</li>
			<li>All runners are required to stay on the official course at all times. Leaving the course will result in disqualification.</li>
			<li>Spectators are requested to stay on the sidewalks and not cut across the course.</li>
			<li>All runners should conduct themselves in a sporting manner and respect the other runners and organizers.</li>
			<li>Runners are requested not to litter or leave behind bottles, food wrappers and any other waste on the route.</li>
			<li>The college or the organizers are not responsible for any personal items belonging to the runners.</li>
			<li>Headphones are permitted but the runners are advised to be aware of their surroundings for their own safety as well as the safety of others.</li>
		</ol>
	</div>
</div>





	<div class="container-fluid event-box" >
		<h1 class="mu-title" id="eventgallery">Event Gallery</h1>
		<div class="desk-event">
		<div class="row">
				<div class="col-sm-3 gallery" id="gallery1">
				</div>
				<div class="col-sm-3 gallery" id="gallery2">
					
				</div>
				<div class="col-sm-3 gallery" id="gallery3">
					
				</div>
				<div class="col-sm-3 gallery" id="gallery4">
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 gallery" id="gallery5">
				</div>
				<div class="col-sm-3 gallery" id="gallery6">
					
				</div>
				<div class="col-sm-3 gallery" id="gallery7">
					
				</div>
				<div class="col-sm-3 gallery" id="gallery8">
					
				</div>
			</div>
		</div>
		<div class="mobile-event">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active events-images">
			      <img class="d-block w-100" src="images/5.jpg" alt="First slide">
			    </div>
			    <div class="carousel-item events-images">
			      <img class="d-block w-100" src="images/6.jpg" alt="Second slide">
			    </div>
			    <div class="carousel-item events-images">
			      <img class="d-block w-100" src="images/3.jpg" alt="Third slide">
			    </div>
			    <div class="carousel-item events-images">
			      <img class="d-block w-100" src="images/4.jpg" alt="Third slide">
			    </div> 
			    <div class="carousel-item events-images">
			      <img class="d-block w-100" src="images/1.jpg" alt="Third slide">
			    </div>
			    <div class="carousel-item events-images">
			      <img class="d-block w-100" src="images/2.jpg" alt="Third slide">
			    </div>
			    <div class="carousel-item events-images">
			      <img class="d-block w-100" src="images/7.jpg" alt="Third slide">
			    </div>
			    <div class="carousel-item events-images">
			      <img class="d-block w-100" src="images/8.jpeg" alt="Third slide">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>
<div class="container video">
	<h1 class="mu-title">Previous Event Video</h1>
	<div class="embed-responsive embed-responsive-16by9">
	  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/6ct4cOujgL0?autoplay=1&loop=1&playlist=6ct4cOujgL0" allowfullscreen></iframe>
	</div>
</div>


	<!--
	<div class="container-fluid spn-box">
		<h1 class="display-4">Sponsors</h1>
		<div class="row">
			<div class="col-sm-4 sponsor">
				
			</div>
			<div class="col-sm-4 sponsor">
				
			</div>
			<div class="col-sm-4 sponsor">
				
			</div>
		</div>
	</div>
-->
<footer class="bottom-footer">
	<ul>
		<li class="nav-link"><a onclick="topFunction()" >Home</a></li>
		<li class="nav-link"><a href="#aboutmarathon">About Marathon</a></li>
		<li class="nav-link"><a href="#mu-pricing">Pricing</a></li>
		<li class="nav-link"><a href="#eventgallery">Events Gallery</a></li>
	</ul>
</footer>
</body>
</html>