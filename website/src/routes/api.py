from flask import session, Response
from json import dumps as jdumps
from helpers.userinfo import get_user_info

def init_app(app):

    @app.route('/api/me')
    def api_me():
        # Check if logged in
        if 'uid' not in session:
            return '', 401

        (success, result) = get_user_info(session['uid'])
        if not success:
            return '', result

        # Respond with json data
        response = Response(jdumps(result))
        response.headers['Content-Type'] = 'application/json'
        response.status_code = 200

        return response

    @app.route('/api/logout', methods=['POST'])
    def api_logout():
        # Clear all session data
        session.clear()

        return ''