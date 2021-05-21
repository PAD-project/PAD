from helpers.userinfo import get_user_info 
from flask import session, request, Response
import json
from helpers.quiz import get_challenge_flag, get_challenge_quiz, update_user_challenge
import random

def init_app(app):

    # Route to request quiz information
    @app.route('/quiz', methods=['GET'])
    def quiz_get():
        # Check if logged in
        if 'uid' not in session:
            return '', 401

        (success, result) = get_user_info(session['uid'])
        if success == False:
            return '', result

        user_challenge = result['challenge_idx']
    
        request_challenge = request.args.get('id', type=int)
        request_flag = request.args.get('flag')
    
        # Always respond with JSON
        response = Response()
        response.headers['Content-Type'] = 'application/json'
        
        # Check if user has access to challenge
        if user_challenge < request_challenge:
            response.data = json.dumps({'succes': False, "error": "ERR_CHALLENGE_PERM_DENIED"})
            return response
        
        # Check flag
        server_flag = get_challenge_flag(request_challenge)
        if server_flag != request_flag:
            response.data = json.dumps({'succes': False, "error": "ERR_CHALLENGE_FLAG_INVALID"})
            return response
            
        quiz = get_challenge_quiz(request_challenge)
        
        # Quiz is not here!?
        if not quiz:
            response.status_code = 500
            return response
        
        answers = quiz['antwoorden'].split('|')
        answers.append(quiz['correct_antwoord'])

        # Randomize answer order
        random.shuffle(answers)
        del quiz['correct_antwoord']
        quiz['antwoorden'] = answers
        quiz['success'] = True
        
        response.data = json.dumps(quiz)
     
        return response

    # Route to submit quiz answers
    @app.route('/quiz', methods=['POST'])
    def quiz_post():
        # Check if logged in
        if 'uid' not in session:
            return '', 401

        (success, result) = get_user_info(session['uid'])
        if success == False:
            return '', result

        user_challenge = result['challenge_idx']

        request_challenge = request.args.get('id', type=int)
        request_flag = request.args.get('flag')
        request_answer = request.args.get('answer')


        # Always respond with JSON
        response = Response()
        response.headers['Content-Type'] = 'application/json'
        
        # Check if user has access to challenge
        if user_challenge < request_challenge:
            response.data = json.dumps({'succes': False, "error": "ERR_CHALLENGE_PERM_DENIED"})
            return response
            
        # Check flag
        server_flag = get_challenge_flag(request_challenge)
        if server_flag != request_flag:
            response.data = json.dumps({'succes': False, "error": "ERR_CHALLENGE_FLAG_INVALID"})
            return response
            
        quiz = get_challenge_quiz(request_challenge)

        # Quiz is not here!?
        if not quiz:
            response.status_code = 500
            return response
        
        if quiz['correct_antwoord'] != request_answer:
            response.data = json.dumps({'succes': False, "error": "ERR_ANSWER_INCORRECT"})
            return response

        # UPDATE user challenge counter if user has not finished it before
        if user_challenge < request_challenge + 1:
            update_user_challenge(session['uid'], request_challenge + 1)
    
        response.data = json.dumps({'success': True})
        return response