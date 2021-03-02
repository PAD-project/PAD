# Apache WSGI (Python) Backend

### Ik snap er echt helemaal niks van en Google geeft nutteloze oplossingen
### Het werkt ook trouwens eigenlijk niet, je moet handmatig naar de src/ folder gaan om de WSGI uit te voeren
### Maar mocht je het toch willen proberen:
&nbsp;

## Setup

Zorg ervoor dat je in hetzelfde pad als de Docker file zit en voer vervolgens de volgende commando uit:
```
docker build -t wsgi-backend-demo .
```

## Uitvoeren

Vervang \<port\> met een poort naar keuze (die je pc nog vrij heeft). Ga hiernaa met de browser naar http://localhost:<port\>/
```
docker run --rm -p <port>:80 wsgi-backend-demo
```

Als je docker liever op de achtergrond wilt gebruik dan de --detach of -d tag
```
docker run --rm -d -p <port>:80 wsgi-backend-demo
```
