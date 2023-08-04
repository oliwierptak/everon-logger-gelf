#!/usr/bin/env bash

echo "---------------------"
echo 'Populating GRAYLOG'
echo "---------------------"

#mongo graylog --host=mongo:27017  --eval "db.dropDatabase();"
#mongo graylog --host=mongo:27017  --eval " db.dropAllUsers();"
mongoimport --db=graylog --collection=inputs --host=mongo:27017 --file=/graylog-config/graylog_import.json
#mongoimport --db=graylog --collection=inputs --host=mongo:27017 --file=/graylog-config/01-gelf-input.json


