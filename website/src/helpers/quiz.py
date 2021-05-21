from helpers.database import get_database

# Convert a challenge ID to the correct flag
def get_challenge_flag(chlg_id):
    (success, connection) = get_database()

    if not success:
        return False

    cursor = connection.cursor()

    cursor.execute('SELECT * FROM `flags` WHERE `challenge`=?', (chlg_id,))
    row = cursor.fetchone()

    cursor.close()
    connection.close()

    if row == None:
        return False

    (_, row_flag) = row

    return row_flag

# Collect all quiz info using the challenge ID
def get_challenge_quiz(chlg_id):
    (success, connection) = get_database()

    if not success:
        return False

    cursor = connection.cursor()

    cursor.execute('SELECT * FROM `Quiz` WHERE `challenge`=?', (chlg_id,))
    row = cursor.fetchone()

    cursor.close()
    connection.close()

    if row == None:
        return False

    (row_challenge, row_outro, row_quiz_vraag, correct_antwoord, row_antwoorden) = row

    return {
        "challenge": row_challenge,
        "outro": row_outro,
        "quiz_vraag": row_quiz_vraag,
        "correct_antwoord": correct_antwoord,
        "antwoorden": row_antwoorden
    }

# Set the challenge the user is allowed to do
def update_user_challenge(uid, challenge):
    (success, connection) = get_database()

    if not success:
        return False

    cursor = connection.cursor()
    
    cursor.execute('UPDATE `users` SET `challenge`=? WHERE `id`=?', (challenge, uid,))
    
    # Ok mariadb thanks for wasting our time searching why our database kept crashing
    cursor.execute('COMMIT')

    cursor.close()
    connection.close()

    return True

