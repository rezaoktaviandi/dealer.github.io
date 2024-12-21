from flask import Flask, request, render_template, redirect, url_for, flash

app = Flask(__name__)
app.secret_key = 'your_secret_key'

# Contoh data pengguna
users = {
    "user1": "password1",
    "user2": "password2"
}

@app.route('/')
def home():
    return render_template('login.html')

@app.route('/login', methods=['POST'])
def login():
    username = request.form['username']
    password = request.form['password']
    
    if username in users and users[username] == password:
        flash('Login successful!', 'success')
        return redirect(url_for('home'))
    else:
        flash('Invalid username or password, please try again.', 'danger')
        return redirect(url_for('home'))

if __name__ == '__main__':
    app.run(debug=True)


