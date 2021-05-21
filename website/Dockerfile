FROM ubuntu:20.04

RUN apt-get update -y && \
    apt-get install -y python3-pip python3-dev libmariadb-dev

COPY ./src/requirements.txt /app/requirements.txt

WORKDIR /app
RUN pip install -r requirements.txt

COPY ./src/ /app

ENTRYPOINT [ "python3" ]
CMD [ "app.py" ]