# ExpressJS (Node) Demo Backend

## Setup

Zorg ervoor dat je in hetzelfde pad als de Docker file zit en voer vervolgens de volgende commando uit:
```
docker build -t node-backend-demo .
```

## Uitvoeren

Vervang \<port\> met een poort naar keuze (die je pc nog vrij heeft)
```
docker run --rm -p <port>:80 node-backend-demo
```

Als je docker liever op de achtergrond wilt gebruik dan de --detach of -d tag
```
docker run --rm -d -p <port>:80 node-backend-demo
```