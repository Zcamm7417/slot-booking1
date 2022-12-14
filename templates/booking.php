<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Booking Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    .register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}    
</style>
</head>
<body>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>All Star Sport</h3>
                        <p style="font-family: Time-new-roman; font-size:20px;">The bad news is time flies. The good news is you're the pilot.</p>
                        <!-- <p style="font-family: Time-new-roman; font-size:20px;">The good news is you're the pilot.</p> -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsFfQJX9PQZvUeJLH5rhp1yJoCL44sKB5srQ&usqp=CAU" alt=""/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Map</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading"><b>Booking Details</b></h3>
                                {% with messages = get_flashed_messages(with_categories=true) %}
                                    {% if messages %}
                                        <ul>
                                        {% for category, message in messages %}
                                        <li class="alert alert-{{ category }}">{{ message }}</li>
                                        {% endfor %}
                                        </ul>
                                    {% endif %}
                                {% endwith %}
                                <form method="post" action="">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <input type="text" class="form-control" name="username" required placeholder="Username *" value="{{ session['name'] }}"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" required placeholder="Email *" value="{{ session['email'] }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="datetime-local" class="form-control" name="datetime" required placeholder="date/time *" value=""/>
                                        </div>
                                    <div class="form-group">
                                    <div class="col-md-14 selectContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                        <select name="sportName" required class="form-control">
                                            <option class="hidden" selected disabled>Select Sport</option>
                                            <option>American Football</option>
                                            <option>Archery</option>
                                            <option >Athletics</option>
                                            <option >Badminton</option>
                                            <option >Baseball</option>
                                            <option >Basketball</option>
                                            <option >Bowls</option>
                                            <option >Boxing</option>
                                            <option >Canoeing</option>
                                            <option>Cycling</option>
                                            <option >Rugby League</option>
                                            <option >Table Tennis</option>
                                            <option >Taekwondo</option>
                                            <option >Volleyball</option>
                                            <option >Horse Racing</option>
                                            <option >Fencing</option>
                                            <option >Snooker</option>
                                            <option >Shooting</option>
                                        </select>
                                        </div>
                                    </div>
                                    </div>
                                    <input type="submit" class="btnRegister"  value="Book Now"/>
                                </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- <center><iframe
                                    width="700"
                                    height="435"
                                    style="border:0px"
                                    loading="lazy"
                                    allowfullscreen
                                    referrerpolicy="no-referrer-when-downgrade"
                                    src="https://www.google.com/maps/embed/v1/place?key=API_KEY
                                    &q=sport+arena+in+dubai">
                                </iframe></center> -->
                                <center><iframe
                                 src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d231108.5586615957!2d55.17319857656411!3d25.167072635020283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1ssport%20arena%20in%20dubai!5e0!3m2!1sen!2sng!4v1665873148941!5m2!1sen!2sng" 
                                 width="100%" 
                                 height="450" 
                                 style="border:0; border-radius:10px; padding-left:50px;"
                                 allowfullscreen="" 
                                 loading="lazy" 
                                 referrerpolicy="no-referrer-when-downgrade">
                                </iframe></center>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</body>
</html>
