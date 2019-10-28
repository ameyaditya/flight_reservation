import requests

url = "http://api.travelpayouts.com/data/en/cities.json?token=5f0f8efe1a448a3ce74a1cd92902f031"
url2 = "http://localhost:8096/addcity.php"
data = requests.get(url)
data = data.json()
for City in data:
	try:
		print(City)
		if len(City['code']) > 0:
			x = requests.post(url2, data = City)
			print(f"Added City {City['name']}")
		else:
			print("City Code doesnt exist, cant add")
	except Exception as e:
		print("Error ", e)