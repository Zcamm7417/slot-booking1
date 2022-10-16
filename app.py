import vonage, nexmo
from twilio.rest import Client
from flask import Flask, render_template, url_for, redirect, request, flash, session
from flask_bootstrap import Bootstrap
import pymysql, yaml, os
import pymysql.cursors
from config import *
from werkzeug.security import generate_password_hash, check_password_hash
# from flask_mail import Mail, Message

app = Flask(__name__)
Bootstrap(app)

#setting connection variables
passwordd = yaml.load(open('password.yaml'), Loader=yaml.Loader)
USERNAME = 'admin' 
PASSWORD = passwordd['my_password']
ENDPOINT = "slot-booking-db.c8a7xdiy73v8.us-east-1.rds.amazonaws.com"
PORT = 3306
REGION = "us-east-1f"
DBNAME = 'slot_schema'
SSL_CA = "rds-combined-ca-bundle.pem"
CURSORCLASS = pymysql.cursors.DictCursor
app.config['SECRET_KEY'] = os.urandom(24)

#definning connection
def start_rds_connection():
    try:
        connection = pymysql.connect(host=ENDPOINT,
                                     port=PORT,
                                     user=USERNAME,
                                     password=PASSWORD,
                                     db=DBNAME,
                                     cursorclass=CURSORCLASS,
                                     ssl_ca=SSL_CA)
        print('[+] RDS Connection Successful')
    except Exception as e:
        print(f'[+] RDS Connection Failed: {e}')
        connection = None

    return connection
#initiating connection
connection = start_rds_connection()

#creating routes
@app.route("/booking", methods=['POST', 'GET'])
def booking():
    if request.method == 'POST':
        form = request.form
        tableName = 'booking_table'
        datetime = form['datetime']
        sportName = form['sportName']
        email = form['email']
        username = form['username']
        session['name'] = form['username']
        session['email'] = email
        # session['phone'] = form['phone']
        booking = 'Booking'
        booked = 'booked'
        
        try:
            # flash("Email sent", "success")
            with connection.cursor() as cursor:
                sql = f"INSERT INTO `{tableName}` (`username`, `email`, `datetime`, `sportName`) VALUES (%s, %s, %s, %s)"
                cursor.execute(sql, (username, email, datetime, sportName))
            connection.commit()
            return render_template('success2.html', booking=booking, booked=booked)
        except Exception as e:
            flash(f'Error: {e}', 'danger')
    return render_template('booking.php')

#creating routes
@app.route("/success")
def success():
    login = '/login'
    return render_template('success.html', login=login)

@app.route("/register", methods=['POST', 'GET'])
def register():
    if request.method == 'POST':
        form = request.form
        tableName = 'register_table'
        firstName = form['firstName']
        lastName = form['lastName']
        email = form['email']
        phone = form['phone']
        username = form['username']
        gender = form['gender']
        password = form['password']
        confirmPassword = form['confirmPassword']
        password = generate_password_hash(password)
        confirmPassword = generate_password_hash(confirmPassword)
        question = form['question']
        answer = form['answer']
        registering = 'registering'
        registeration = 'Registeration'
        session['name'] = firstName + " " + lastName
        session['email'] = email
        session['phone'] = phone
        API_KEY = passwordd['api_key']
        try:
            with connection.cursor() as cursor:
                sql = f"INSERT INTO `{tableName}` (`firstName`, `lastName`, `password`, `confirmPassword`, `gender`, `email`, `username`, `question`, `answer`, `phone`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
                cursor.execute(sql, (firstName, lastName, password, confirmPassword, gender, email, username, question, answer, phone))
            client = nexmo.Sms(key=passwordd['key'], secret=passwordd['secret'])
            responseData =  client.send_message({
                'from': 'AllStarSport',
                'to': '+2348150593092', #this number can be change to the varaible phone if vonage is funded 
                'text': 'Good day ' + firstName + ' ' + lastName +'!! '+ 'You have successfully registered on All Star Sport. Thank for your patience in advance. Feel free to proceed to booking and cancel booking on occasion arise. Thank you!'})

            if responseData["messages"][0]["status"] == "0":
                print("Message sent successfully.")
            else:
                print(f"Message failed with error: {responseData['messages'][0]['error-text']}")
                os.exit()
            connection.commit()
            
            # sms messaging
            return render_template('success.html', registering=registering, registeration=registeration, API_KEY=API_KEY)
        except Exception as e:
            flash(f'Error: {e}', 'danger')
    return render_template('register.php')

@app.route("/", methods=['POST', 'GET'])
def login():
    if request.method == 'POST':
        form = request.form
        email = form['email']
        # password = form['password']
        try:
            with connection.cursor() as cursor:
                sql = cursor.execute("SELECT * FROM register_table WHERE email =%s", ([email]))
                if sql > 0:
                    data = cursor.fetchone()
                    if check_password_hash(data['password'], form['password']):
                        session['login'] = True
                        session['firstName'] = data['firstName']
                        session['lastName'] = data['lastName']
                        session['name'] = data['username']
                        session['email'] = data['email']
                        session['phone'] = data['phone']
                        flash('Welcome ' + session['firstName'] +'! You have been successfully logged in.', 'success')
                    else:
                        flash('Password does not match', 'danger')
                        return render_template('login.php')
                else:
                    # cursor.close()
                    flash('User not found', 'danger')
                    return render_template('login.php')
                # cursor.close()
                # connection.commit()
                return redirect('booking')
        except Exception as e:
            flash(f'Error: {e}', 'danger')
    return render_template('login.php')

@app.errorhandler(400)
def error(e):
    return "Page Error"

if __name__=="__main__":
    app.run(debug=True)
