# -*- coding: utf-8 -*-
"""
Created on Fri May 24 00:42:42 2019

@author: Junior
"""

import requests
from sqlalchemy import create_engine, MetaData

#
# Getting json data
#
url = 'https://raw.githubusercontent.com/ifpb/egressos/master/data/egressos.json'
response = requests.get(url)

if response.status_code != requests.codes.ok:
    exit("Something went wrong...")

data = response.json()

#
# Database insert
#

# Remember to change the user and password
engine = create_engine("mysql://user:password@localhost/egressos_db", echo = True)
conn = engine.connect()

metadata = MetaData()
metadata.reflect(bind=engine)

egressos = metadata.tables['egressos']

for d in data:
    conn.execute(egressos.insert(), d)

conn.close()
