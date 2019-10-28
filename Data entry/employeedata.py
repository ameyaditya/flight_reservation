import names
import random
import datetime
import faker
import names
import json

f = faker.Faker()
data = []
job = {1:'Doctor', 2:'Nurse', 5:'Cleaner' ,3:'Receptionist', 4:'Attender'}
sex = ['male', 'female']
def getnumber():
	return random.randint(7777788888, 9999999999)
def getemail(name):
	num = random.randint(1, 100)
	em = f.email()
	em = em.split("@")[-1]
	return name+"."+str(num)+"@"+em
def getdate():
	y = random.randint(1970, 2000)
	m = random.randint(1, 12)
	d = random.randint(1, 28)
	return str(datetime.date(y, m, d))

def getsalary(i):
	n = random.randint(5000, 10000)*(6-i)
	return n
def getaddress():
	return f.address()
for i in range(50):
	n = (random.random()*100)%2
	name = names.get_full_name(sex[int(n)])
	gender = sex[int(n)]
	email = getemail(name.split()[0])
	phone = getnumber()
	n2 = random.randint(1, 5)
	dat = getdate()
	address = getaddress()
	sal = getsalary(n2)
	print(f"name: {name}, gender: {gender}, email:{email}, phone:{phone}, job:{n2}, date: {dat}, address:{address}, salary:{sal}")
	data.append({"name":name, "gender":gender, "email":email, "phone": str(phone), "cid":n2, "dob":dat, "address":address, "salary":sal})
with open("employee.json", "w") as f:
	json.dump(data, f)
