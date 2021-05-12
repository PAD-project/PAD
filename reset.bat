@echo off
docker-compose down
cd database
rmdir /s /q data
mkdir data
cd ..
docker-compose build
docker-compose up