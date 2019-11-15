from faker import Faker
import json
import random
f = Faker()

data = []
for i in range(100):
	sample = dict()
	sample['rollno'] = i+1
	sample['name'] = f.name()
	sample['Mathematics'] = random.randint(70, 100)
	sample['Science'] = random.randint(80, 100)
	sample['English'] = random.randint(80, 100)
	data.append(sample)
	print(sample)
with open('data.json', 'w') as f:
	json.dump(data, f)