import routes.api as api
import routes.login as login
import routes.register as register
import routes.challenges as challenges
import routes.quiz as quiz

def init_app(app):
    api.init_app(app)
    login.init_app(app)
    register.init_app(app)
    challenges.init_app(app)
    quiz.init_app(app)