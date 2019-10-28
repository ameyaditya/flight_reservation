import requests
import datetime
import json
import random

now = datetime.datetime.now()
url = "http://localhost:8096/getallroutes.php"
url2 = "http://localhost:8096/getplaneid.php"
url3 = "http://localhost:8096/getseats.php"
url4 = "http://localhost:8096/updateinstances.php"

count = 0
x = requests.get(url)
final_data = []
data = x.json()
print("Get routes data")
x2 = requests.get('http://localhost:8096/getallrouteplanes.php')
data2 = x2.json()
print("Get plane routes data")
x3 = requests.get('http://localhost:8096/getairplanes.php')
data4 = x3.json()
print("Get airplanes data")
date = [(datetime.datetime.now()).replace(hour = 0, minute = 0, second = 0, microsecond = 0)]
while len(date) <= 3:
	date.append(date[-1] + datetime.timedelta(days = 1))
date = date[1:]
print(date)
for eachdate in date:
	for route in data:
		rnum = int(random.random()*100000)
		if (rnum % 4) != 0:
			# params = {'route':route['Route_ID']}
			# planes_nums = requests.get(url2, params = params)
			try:
				planes_nums = data2[route['Route_ID']]
				for eachplane in planes_nums:
					randnum2 = int(random.random()*100000)
					if (randnum2 % 23) != 0:
						randnum4 = random.randint(1, 10)
						for i in range(randnum4):
							# params2 = {'planeid': eachplane}
							# data3 = requests.get(url3, params = params2)
							try:
								data3 = data4[eachplane]
								cost = random.randint(3000, 12000)
								if int(data3['Eseats']) > 0:
									ecost = cost
								else:
									ecost = 0
								if int(data3['Bseats']) > 0:
									bcost = int(ecost * 1.30)
								else:
									bcost = 0
								if int(data3['Fseats']) > 0:
									fcost = int(ecost * 2.10)
								else:
									fcost = 0
								departure_datetime = eachdate + datetime.timedelta(hours=random.randrange(24), minutes = random.randrange(60))
								arrival_datetime = departure_datetime + datetime.timedelta(hours=random.randrange(3, 12), minutes = random.randrange(60))
								print(f"Route_ID = {route['Route_ID']}, Plane_ID = {eachplane}, eseats ={data3['Eseats']}, fseats = {data3['Fseats']}, bseats = {data3['Bseats']} ecost = {ecost}, bcost = {bcost}, fcost = {fcost}, departure = {departure_datetime}, arrival = {arrival_datetime}")
								final_data.append({'routeid':route['Route_ID'], 'planeid':eachplane, 'eseats': data3['Eseats'], 'bseats':data3['Bseats'], 'fseats':data3['Fseats'], 'ecost':ecost, 'bcost':bcost, 'fcost':fcost, 'departure':str(departure_datetime), 'arrival':str(arrival_datetime)})
								count += 1
							except Exception as e:
								print(e)
								pass
			except:
				pass
with open("instances.json", "w") as f:
	json.dump(final_data, f)
print(f"Total no of rows{count}")
# {'routeid': '54', 'planeid': '142', 'eseats': '127', 'bseats': '0', 'fseats': '26', 'departure': datetime.datetime(2019, 10, 24, 15, 30), 'arrival': datetime.datetime(2019, 10, 24, 21, 54)}




