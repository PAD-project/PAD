# Masters of Deception CTF
Masters of Deception is an open source CTF environment.

# Setting Up
Get started by cloning this project
```
$ git clone https://github.com/PAD-project/PAD.git
$ cd PAD
```

### Small sidenote for Unix (Linux/MacOS) users
This issue should not be present on most machines, but there may be a chance that the Database docker environment wont start because of insufficient permissions.
If this happens please make sure that there is a `data` folder inside the `database` folder owned by UID 1000. This should automatically be done if you run the `reset.sh` script though
and the data folder should be present when you clone the repository.

## Starting
After you have cloned and cd'd into the PAD folder you can simply start by executing docker-compose.
```
$ docker-compose up
```
This should handle everything for you. The website is now accessible on the URL `http://127.0.0.1:8080`. If you want to you can put a reverse proxy in front of this
url to add SSL and have everything accessible from port 443 or 80.

## Accessing the database
To get into the database you can go to `http://127.0.0.1:8079` and use the username `root` and password `ssd` to get access to all databases and tables.

## Resetting the entire thing
Screwed something up? Run either the `reset.bat` (Windows) or `reset.sh` (Unix) to reset the database back to it's default state.