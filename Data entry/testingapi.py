import requests

url = "http://api.travelpayouts.com/data/en/airports.json?token=5f0f8efe1a448a3ce74a1cd92902f031"
querystring = {"origin":"BLR","destination":"BOM"}
headers = {'X-Access-Token': '5f0f8efe1a448a3ce74a1cd92902f031'}
response = requests.request("GET", url, headers=headers, params=querystring)
