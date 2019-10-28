import json
import requests

# url = "http://localhost:8096/addairport.php"
# with open("airports.json", "r") as f:
# 	data = json.load(f)
# # ab = data['00AK']
# # params = {'name':ab['name'], 'city':ab['city'], 'country':ab['country'], 'ICAO': ab['icao']}
# # requests.post(url, data=params)
# count = 0
# x = list(data.keys())
# print(len(x))
# # for key, value in data.items():
# # 	count += 1
# # 	if count %5000 == 0:
# # 		print(f"{count} data loaded")
# # 	try:
# # 		params = {'name':value['name'], 'city':value['city'], 'country':value['country']}
# # 		if len(value['iata']) == 3:
# # 			params['IATA'] = value['iata']
# # 		if len(value['icao']) == 4:
# # 			params['ICAO'] = value['icao']
# # 		x = requests.post(url, data = params)
# # 	except:
# # 		pass

url = "http://api.travelpayouts.com/data/en/airports.json?token=5f0f8efe1a448a3ce74a1cd92902f031"
url2 = "http://localhost:8096/addairport.php"
data = requests.get(url)
data = data.json()
count = 0
for airport in data:
	count += 1
	if count % 1000 == 0:
		print(f"Added {count} airports")
	try:
		if airport['flightable'] == True:
			params = {'name': airport['name'], 'city':airport['city_code'], 'country':airport['country_code'], 'IATA':airport['code']}
			x = requests.post(url2, data = airport)
			print(f"Added {airport['name']}, ", end=" ")
		else:
			print(f"\nRejected {airport['name']}\n")
	except Exception as e:
		print("\n\nException occured", e)
		pass