import helpers.database as database

def get_user_info(uid):
    (success, connection) = database.get_database()

    if not success:
        return [False, 500]

    cursor = connection.cursor()

    cursor.execute('SELECT * FROM `users` WHERE `id`=?', (uid,))
    row = cursor.fetchone()

    cursor.close()
    connection.close()

    # User does not exist
    if row == None:
        return [False, 401]

    (row_id, row_username, row_password, row_challenge) = row

    return [True, {
        'username': row_username,
        'user_id': row_id,
        'challenge_idx': row_challenge
    }]