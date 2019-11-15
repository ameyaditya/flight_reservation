<?php
	if(isset($_GET['rollno'])){
		$rollno = $_GET['rollno'];
		$data = file_get_contents('data.json');
		$data = json_decode($data, true);
		$flag = 0;
		//print_r($data);
		foreach ($data as $key => $value) {
			if($value['rollno'] == $rollno){
				$det = $value;
				$flag = 1;
				break;
			}
		}
		if($flag == 0){
			//echo "None";
		}
		else{
			print_r(json_encode($det));
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sample</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Goibiba</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#sub').click(function(){
			$('#det-box').html("<h3>getting Details...</h3>");
			$.ajax({
				url: 'getdetails.php',
				type: "post",
				data:{
					rollno: $("#rollno").val()
				},
				success: function(obj){
					if(obj != 'None'){
						var data = JSON.parse(obj);
						console.log(data);
						code = `
						<p>Roll No:     `+data['rollno']+`
						</p><p>Name:        `+data['name']+`
						</p><p>Mathematics: `+data['Mathematics']+`
						</p><p>English:	    `+data['English']+`
						</p><p>Science:	    `+data['Science']+`</p>
						`;
						$('#det-box').html(code);
					}
					else{
						$('#det-box').html("<h3>Data not found</h3>");	
					}
				}

			});
		});
		});
	</script>
</head>
<body>
	<div class="container">
		<h1>Get Details</h1>
		<form>
			<div class="form-group">
			<input type="number" name="rollno" class="fom-control" id="rollno" placeholder="Enter rollno">
			<button type="button" id="sub">Submit</button>
			</div>
		</form>
	</div>
	<div id="det-box">
		
	</div>
</body>
</html>