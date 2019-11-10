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
					print(flase)
				end if;
			if true then
				refresh index.php
			else
				print(wrong username or password)
			end if;
		else
			print(Enter valid details)
		end if;
	end if;
			
			
		