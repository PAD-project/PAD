import mariadb

def get_database():
    try:
        connection = mariadb.connect(
            user="root",
            password="ssd",
            host="db",
            port=3306,
            database="super_geheime_intel"
        )

        return [True, connection]
    except mariadb.Error as err:
        return [False, err]