import requests

url = "http://api.travelpayouts.com/data/planes.json?token=5f0f8efe1a448a3ce74a1cd92902f031"
url2 = "http://localhost:8096/addairplane.php"
data = requests.get(url)
data = data.json()
for airplane in data:
	try:
		print(airplane)
		if len(airplane['code']) > 0:
			x = requests.post(url2, data = airplane)
			print(f"Added airplane {airplane['name']}")
		else:
			print("airplane Code doesnt exist, cant add")
	except Exception as e:
		print("Error ", e)