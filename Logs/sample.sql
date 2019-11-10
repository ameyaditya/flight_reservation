Pseudocode Login:
	username := input()
	password := input()
	if(submit.click()) then
		if (validate(username, password) then
			make ajax call to login.php
				select userID, pass from users where U_name = username
				if(password_verify(password, pass) then
					session['uid'] := userID
					session['uname'] := username
					print(true)
				else
					print(false)
				end if;
			if true then
				refresh page
			else
				print("wrong username or password")
			end if;
		else
			print("Enter valid details")
		end if;
	end if;
			
Pseudocode Signup:
	details := array()
	details[username] := input()
	details[email_id] := input()
	details[password] := input()
	details[re-enter_password] := input()
	details[phone] := input()
	details[address] := input()
	if(submit.click()) then
		if(validate(details)) then
			if(details[password] = details[re-enter_password]) then
				make ajax call to signup.php
					insert details into users
					if(success(insert)) then
						print(true)
					else
						print(false)
					end if;
				if true then
					print('Sign Up succesful')
					close(signup-box)
					open(login-box)
				end if;
			else
				print("passwords don't match")
			end if;
		else
			print("Enter valid details")
		end if;

Pseudocode Get_flight_details:
	details := array()
	details[origin] := input()
	details[destination] := input()
	details[date_of_departure] := input()
	details[travel_class] := input()
	details[travelers] := input()
	if(validate(details)) then 
		make ajax call to getplanedetails.php
			res:= call procedure(flight_data)
			if(success(procedure)) then
				return res
			else
				return "No flights available"
			end if;
		load_details(retuen_obj)
	else
		print("Enter valid details")
	end if;

Pseudocode Book_tickets:
	passenger_details := array()
	passenger_details := input()
	if(confim.click()) then
		redirect(payment_gateway, callback = callback.php)
	on(callback)
		insert response into transactions
		if(response_code = '01') then
			if(seats_available(flught_id) >= travelers) then
				assign_seats(id = flight_id, details = passenger_details)
				reduce_seats(id = flight_id, seats = travelers)
				redirect(bookingsuccessful.php)
			else
				print("No seats available, already alloted")
				initiate_refund(id = transaction_id)
				redirect(bookingfail.php)
			end if;
		else
			print("Transaction unsuccessful")
			redirect(bookingfail.php)
		end if;
		
		