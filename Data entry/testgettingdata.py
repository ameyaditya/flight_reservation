import requests
url = "http://api.travelpayouts.com/v1/prices/direct"
data = {'currency':'usd', 'origin':'BLR', 'destination':'BOM', 'token': '5f0f8efe1a448a3ce74a1cd92902f031'}
x = requests.get(url, params = data);
print(x.json())