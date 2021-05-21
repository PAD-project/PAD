from flask import Flask, render_template, session

# Import smart routes
import routes.routes as routes

app = Flask(__name__, static_url_path="/assets/", static_folder="./static/", template_folder="./render/")
app.secret_key = 'swag'

routes.init_app(app)

@app.route('/')
def root():
    return render_template('index.html')

@app.route('/contact')
def contact():
    return render_template('contact.html')

@app.route('/whatwedo')
def whatwedo():
    return render_template('whatwedo.html')

@app.route('/challenges')
def challenges_list():
    return render_template('challenges.html')

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=80)