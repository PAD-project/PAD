#!/bin/sh

docker-compose down
rm -rf ./database/data/
mkdir ./database/data
docker-compose build
docker-compose up