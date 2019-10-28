import requests

url = "http://api.travelpayouts.com/data/en/countries.json?token=5f0f8efe1a448a3ce74a1cd92902f031"
url2 = "http://localhost:8096/addcountry.php"
data = requests.get(url)
data = data.json()
for country in data:
	try:
		print(country)
		if len(country['code']) > 0:
			x = requests.post(url2, data = country)
			print(f"Added Country {country['name']}")
		else:
			print("Country Code doesnt exist, cant add")
	except Exception as e:
		print("Error ", e)