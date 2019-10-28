import requests 
from bs4 import BeautifulSoup
URL = "https://www.goibibo.com/flights/air-BLR-BOM-20191101--1-0-0-E-D/"
r = requests.get(URL) 

soup = BeautifulSoup(r.content, 'html5lib') 
table = soup.findAll('div', attrs = {'class':'fltHpyResults'})
print(soup.prettify())
