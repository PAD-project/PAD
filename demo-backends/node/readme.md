# ExpressJS (Node) Demo Backend

## Setup

Zorg ervoor dat je in hetzelfde pad als de Docker file zit en voer vervolgens de volgende commando uit:
```
docker build -t node-backend-demo .
```

## Uitvoeren

Vervang \<port\> met een poort naar keuze (die je pc nog vrij heeft). Ga hiernaa met de browser naar http://localhost:\<port\>/ en probeer de paden "/pad1", "/pad2", "/pad3" en "/pad/vul hier iets in wat je zelf wilt"
```
docker run --rm -p <port>:80 node-backend-demo
```

Als je docker liever op de achtergrond wilt gebruik dan de --detach of -d tag
```
docker run --rm -d -p <port>:80 node-backend-demo
```
