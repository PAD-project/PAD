from flask import render_template, session, request, redirect
from secrets import token_hex
import hmac
from hashlib import sha512
import helpers.database as database

def init_app(app):

    def byts(str):
        return bytes(str, 'utf-8')

    @app.route('/login', methods=['GET'])
    def login_get():
        if 'uid' in session and session['uid'] != None:
            return redirect('/challenges')
        
        error = None

        # Show error on page if the session contains a 'login_error'
        if 'login_error' in session:
            error = session['login_error']
            session.pop('login_error')

        # CSRF protection
        session['csrf_token'] = token_hex(32)

        ref = None
        if request.args.get('ref'):
            ref = request.args.get('ref')

        return render_template('login.html', error=error, ref=ref, csrf=session['csrf_token'])

    @app.route('/login', methods=['POST'])
    def login_post():
        # All fields must be provided
        if 'username' not in request.form or 'password' not in request.form or 'token' not in request.form:
            session['login_error'] = 'You must fill out all the fields'
            return redirect('/login')

        # CSRF check
        if request.form['token'] != session['csrf_token']:
            session['login_error'] = 'Session expired, please login again'
            return redirect('/login')
        
        (success, connection) = database.get_database()

        if not success:
            return 'Database error'

        cursor = connection.cursor()

        cursor.execute('SELECT * FROM `users` WHERE `username`=?', (request.form['username'],))
        row = cursor.fetchone()

        cursor.close()
        connection.close()

        # User does not exist
        if row == None:
            session['login_error'] = 'Username or password incorrect'
            return redirect('/login')

        # Check password against hashed version
        hasher = hmac.new(byts('2d44fd81827adbcc7897f5229b849e80'), byts(request.form['password']), sha512)
        
        (row_uid, row_username, row_password, row_challenge) = row

        if row_username != request.form['username'] or row_password != hasher.hexdigest():
            session['login_error'] = 'Username or password incorrect'
            return redirect('/login')

        # User logged in successfully
        session['uid'] = row_uid

        ref = '/challenges'

        if 'ref' in request.form:
            ref = request.form['ref']

        return redirect(ref)