import requests
import pickle
import os
import json

try:
	os.mkdir("routesdata")
except:
	pass


# url = "http://api.travelpayouts.com/data/routes.json?token=5f0f8efe1a448a3ce74a1cd92902f031"
url2 = "http://localhost:8096/addroutes.php"
headers = {'Content-Type': 'application/json', 'Accept':'application/json'}
# data = requests.get(url)
# data = data.json()
# print(len(data))
# for i in range(0, len(data), 10000):
# 	with open(f"routesdata/{i}.pk", "wb") as f:
# 		pickle.dump(data[i:i+10000], f)
# ls = os.listdir('routesdata')
# for files in ls:
# 	with open(f"routesdata/{files}", "rb") as f:
# 		data = pickle.load(f)
# 	for route in data:
# 		x = requests.post(url2, data={"planes":['abc', 'def']})
# 		if len(x.text) > 3 and len(route['planes']) > 0:
# 			print(x.text)
# 			print(route)
# 	print(f"Done with {files}")
# # for airplane in data:
# # 	try:
# # 		print(airplane)
# # 		if len(airplane['code']) > 0:
# # 			x = requests.post(url2, data = airplane)
# # 			print(f"Added airplane {airplane['name']}")
# # 		else:
# # 			print("airplane Code doesnt exist, cant add")
# # 	except Exception as e:
# # 		print("Error ", e)
abc = {'planes': ['abd', 'def', 'cfg']}
x = requests.post(url2, data = json.dumps(abc), headers = headers)
print(abc, x.text)