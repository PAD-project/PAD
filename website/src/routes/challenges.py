from flask import render_template, session, send_from_directory, request, Response
from helpers.userinfo import get_user_info

def init_app(app):

    def show_error(message):
        return render_template('status/challenge_error.html', error=message)

    def enforce_challenge_access(challenge_id):
        # Check if logged in
        if 'uid' not in session:
            return [False, show_error('You must be logged in to start this challenge')]

        # Check if user has access to challenge
        (success, result) = get_user_info(session['uid'])
        if not success:
            if result == 401:
                return [False, show_error('You must be logged in to start this challenge')]
            else:
                return [False, show_error('An unexpected error has occured (%s)' % (result,))]

        if result['challenge_idx'] < challenge_id:
            return [False, show_error('You must finish challenge %s first before you can start this one' % (challenge_id,))]

        return [True, '']

    # Inspect Element Challenge
    @app.route('/challenges/inspectelement')
    def inspect_element_challenge():
        (success, error) = enforce_challenge_access(0)
        if not success:
            return error

        return render_template('challenges/inspectelement.html')

    # Static file serving for the Mucho Dinero challenge
    @app.route('/challenges/muchodinero/FuegoBanks/<path:filename>')
    def mucho_dinero_challenge_static(filename):
        return send_from_directory(app.root_path + '/render/challenges/FuegoBanks/', filename)

    # Mucho Dinero Challenge
    @app.route('/challenges/muchodinero', methods=['GET', 'POST'])
    def mucho_dinero_challenge():
        (success, error) = enforce_challenge_access(1)
        if not success:
            return error

        challenge_complete = False
        incorrect = False
        status = 200

        if request.method == 'POST':
            username = request.form['username']
            password = request.form['password']

            challenge_complete = (username == 'SP09_4008_5874_2391' and password == 'quatrocientos_quatro')
            incorrect = not challenge_complete

            if incorrect:
                status = 403

        return render_template('challenges/muchodinero.html', challenge_complete=challenge_complete, incorrect=incorrect), status

    # Bruteforce Challenge
    @app.route('/challenges/bruteforce', methods=['GET', 'POST'])
    def bruteforce_challenge():
        (success, error) = enforce_challenge_access(2)
        if not success:
            return error, 401

        challenge_complete = False
        incorrect = False
        status = 200

        if request.method == 'POST':
            username = request.form['username']
            password = request.form['password']

            challenge_complete = (username == 'admin' and password == 'gameover')
            incorrect = not challenge_complete

            if incorrect:
                status = 403

        return render_template('challenges/bruteforce.html', challenge_complete=challenge_complete, incorrect=incorrect, session=request.cookies.get('session')), status

    # Dont be Lazy Challenge
    @app.route('/challenges/dontbelazy', methods=['GET', 'POST'])
    def dontbelazy_challenge():
        (success, error) = enforce_challenge_access(3)
        if not success:
            return error, 401

        challenge_complete = False
        incorrect = False
        status = 200

        if request.method == 'POST':
            username = request.form['username']
            password = request.form['password']

            challenge_complete = (username == 'admin' and password == 'abcd')
            incorrect = not challenge_complete

            if incorrect:
                status = 403

        return render_template('challenges/dontbelazy.html', challenge_complete=challenge_complete, incorrect=incorrect, session=request.cookies.get('session')), status