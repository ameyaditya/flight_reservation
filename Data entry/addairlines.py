import requests

url = "http://api.travelpayouts.com/data/en/airlines.json?token=5f0f8efe1a448a3ce74a1cd92902f031"
url2 = "http://localhost:8096/addairlines.php"
data = requests.get(url)
data = data.json()
for airline in data:
	try:
		print(airline)
		if len(airline['code']) > 0:
			x = requests.post(url2, data = airline)
			print(f"Added airline {airline['name']}")
		else:
			print("airline Code doesnt exist, cant add")
	except Exception as e:
		print("Error ", e)