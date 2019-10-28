function validatesignup(){
	var username = $("#username").val();
	var emailid = $('#emailidsignup').val();
	var pass1 = $('#pass1').val();
	var pass2 = $('#pass2').val();
	var address1 = $("#address1").val();
	var address2 = $("#address2").val();
	if(username == "" || emailid == "" || pass1 == "" || address2 == "" || address1 == ""){
		$("#signup-msg").text("Please fill all the fields");
		$("#signup-msg").css("display", "inline-block");
		$("#signup-msg").css("background-color", "red");
		return false;
	}
	if(pass1 != pass2){
		$("#signup-msg").text("Passwords dont match");
		$("#signup-msg").css("display", "inline-block");
		$("#signup-msg").css("background-color", "red");
		return false;
	}
	var country = $("#countries-list option:selected").val();
	var state = $("#states-list option:selected").val();
	var city = $("#cities-list option:selected").val();
	if(country == "Select Country"){
		$("#signup-msg").text("Select a country");
		$("#signup-msg").css("display", "inline-block");
		$("#signup-msg").css("background-color", "red");
		return false;
	}
	if(state == "Select State"){
		$("#signup-msg").text("Select a state");
		$("#signup-msg").css("display", "inline-block");
		$("#signup-msg").css("background-color", "red");
		return false;
	}
	if(city == "Select City"){
		$("#signup-msg").text("Select a city");
		$("#signup-msg").css("display", "inline-block");
		$("#signup-msg").css("background-color", "red");
		return false;
	}
	$("#signup-msg").css("display", "none");
	return true;
}
function registeruser(){
	var username = $("#username").val();
	var emailid = $('#emailidsignup').val();
	var pass = $('#pass1').val();
	var phone = $("#phone").val();
	var address1 = $("#address1").val();
	var address2 = $("#address2").val();
	var country = $("#countries-list option:selected").val();
	var state = $("#states-list option:selected").val();
	var city = $("#cities-list option:selected").val();
	if(validatesignup()){
		$.ajax({
			url:"../signup.php",
			data:{
				uname: username,
				email: emailid,
				password: pass,
				ph: phone,
				addr1: address1,
				addr2: address2,
				cntry: country,
				stat:state,
				cty: city
			},
			type: "post",
			success:function(obj){
				if(obj == "error"){
					$("#signup-msg").text("Username/Email ID already Exists.");
					$("#signup-msg").css("display", "inline-block");
					$("#signup-msg").css("background-color", "red");
				}
				else{
					$('#signup-modal').modal('hide');
					$('#successful-signup').text("Sign up successful.");
					$('#successful-signup').css("display", "inline-block");
					$("#signup-msg").css("display", "none");
				}
				// if (obj == '1') {
				// 	alert("Sign up successful.You can login now.");
				// 	$("#loginmodal").modal('show');
				// }
			},
			error:function(err){
				alert(err);
			}
		});
	}
}
function opensignup(){
	$("#loginmodal").modal('hide');
	$('#signup-modal').modal('show');
}
function validatelogin(){
	var email = $("#emailid").val();
	var pass = $("#password").val();
	if(email == ""){
		$("#login-msg").text("Enter a username");
		$("#login-msg").css("display", "inline-block");
		$("#login-msg").css("background-color", "red");
		return false;
	}
	if(pass == ""){
		$("#login-msg").text("Enter a password");
		$("#login-msg").css("display", "inline-block");
		$("#login-msg").css("background-color", "red");
		return false;
	}
	$("#login-msg").css("display", "none");
	return true;
}
function loginuser(){
	var email = $("#emailid").val();
	var pass = $("#password").val();
	if(validatelogin()){
		$.ajax({
			url: "login.php",
			type: "post",
			data:{
				username: email,
				password: pass
			},
			success: function(obj){
				console.log(obj);
				if(obj == "true"){
					$("#loginmodal").modal("hide");
					$('#successful-signup').text("Login Successful. Welcome");
					$('#successful-signup').css("display", "inline-block");
				}
				else{
					$("#loginmodal").modal("hide");
					$("#successful-signup").text("Username/password entered in wrong.");
					$("#successful-signup").css("background-color", "red");
					$('#successful-signup').css("display", "inline-block");
					
				}
			},
			error:function(err){
				alert(err);
			}
		});
	}
}
function validatequery(){
	var origin = $("#fromname option:selected").val();
	var destination = $("#destination-disp option:selected").val();
	if(origin == "select"){
		alert("Please select a origin city");
		return false;
	}
	if(destination == "select"){
		alert("Please select a destination city.");
		return false;
	}
	var dep_date = $("#")
}
function submittic(){
	if(validatequery()){
		$("#query-form").submit();
	}
}
function buyticket(id){
	// var id = this.id;
	var origin = $("#fromname option:selected").val();
	var destination = $("#destination-disp option:selected").val();
	var arrival = $("#arrial-date").val();
	var destination = $("#departure-date").val();
	var tclass = $("#tclass option:selected").val();
	var travellers = $("#nop").val();
	var inst_id = id;
	$("#instance").val(id);
	$("#buy-ticket").submit();
}

function makepayment(){
	var travellers = parseInt($("#nooftravellers").text().split(" ")[1]);
	var tclass = $("#travelclass").text().split(" ")[0];
	var instance_id = $("#instance-id").text();
	var price = $("totprice").text().split(" ")[1];
	var data = new Array();
	for (var i = 1; i <= travellers; i++) {
		var temp = new Array();
		temp.push($("#pname-"+i).val());
		temp.push($("#pemail-"+i).val());
		temp.push($("#pphone-"+i).val());
		temp.push($("#page-"+i).val());
		temp.push($("#sex-select-"+i+" option:selected").val());
		data.push(temp);
	}
	var pids = new Array();
		$.ajax({
		url: "loadpassengers.php",
		type: "post",
		data:{
			details: data,
			tcl: tclass,
			inst: instance_id
			},
		success:function(obj){
			console.log("obj"+obj);
			window.location.href = "makepayment.php?pids="+obj+"&price="+price;
		}
		});
	//console.log(pids);
	//
}
$(document).ready(function(){
	$("#successful-signup").css("display", "none");
	$("#signup-msg").css("display", "none");
	$("#fromname").on('change', function(){
		var origin = $("#fromname option:selected").val();
		if(origin != "select"){
			console.log("Entedddd");
			$.ajax({
			url:"getdestnames.php",
			type:"post",
			data:{
				org: origin
			},
			success:function(obj){
				var data = "<option selected>select</option>";
				var names = obj.split(",");
				for (var i = 0; i < names.length; i++) {
					data += "<option>"+names[i]+"</option>";
				}
				$("#destination-disp").html(data);
				$("#destination-disp").removeAttr("disabled");
			},
			error:function(err){
				console.log(err);
			}
			});
		}
	});
	if($("#fromname option:selected").val() == "select")
		$("#destination-disp").attr("disabled", "true");
});