FROM node
COPY src/ /opt/src
WORKDIR /opt/src

# Installeer alle dependencies (in dit geval express) voor de Node applicatie
RUN npm install

CMD [ "node", "." ]