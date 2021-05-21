from flask import render_template, session, request, redirect
from secrets import token_hex
import hmac
from hashlib import sha512
import helpers.database as database

def init_app(app):

    def byts(str):
        return bytes(str, 'utf-8')

    @app.route('/register', methods=['GET'])
    def register_get():
        if 'uid' in session and session['uid'] != None:
            return redirect('/challenges')
        
        error = None

        # Show error on page if the session contains a 'login_error'
        if 'register_error' in session:
            error = session['register_error']
            session.pop('register_error')

        # CSRF protection
        session['csrf_token'] = token_hex(32)

        return render_template('register.html', error=error, csrf=session['csrf_token'])

    @app.route('/register', methods=['POST'])
    def register_post():
        # All fields must be provided
        if 'username' not in request.form or 'password' not in request.form or 'token' not in request.form:
            session['register_error'] = 'You must fill out all the fields'
            return redirect('/login')

        # CSRF check
        if request.form['token'] != session['csrf_token']:
            session['register_error'] = 'Session expired, please login again'
            return redirect('/login')
        
        (success, connection) = database.get_database()

        if not success:
            return 'Database error'

        cursor = connection.cursor()

        cursor.execute('SELECT username FROM `users` WHERE `username`=?', (request.form['username'],))
        row = cursor.fetchone()

        cursor.close()
        connection.close()

        # User already exists
        if row != None and row[0] == request.form['username']:
            session['register_error'] = 'Another user with that name already exists'
            return redirect('/register')

        # Create hashed password
        hasher = hmac.new(byts('2d44fd81827adbcc7897f5229b849e80'), byts(request.form['password']), sha512)
        
        username = request.form['username']
        password = hasher.hexdigest()
        
        # Create user
        cursor.execute('INSERT INTO `users`(`username`, `password`, `challenge`) VALUES (?, ?, 0)', (username, password,))
        cursor.execute('COMMIT')

        # User created successfully
        cursor.execute('SELECT last_insert_id()')

        session['uid'] = cursor.fetchone()[0]

        return redirect('/challenges')