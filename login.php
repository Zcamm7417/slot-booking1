<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Registration Form</title>
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
                        <h3>Welcome to All Star Sport</h3>
                        <p>We provide customers possible time slots to book via Internet.<br><b>Register if you do not have account</b></p>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsFfQJX9PQZvUeJLH5rhp1yJoCL44sKB5srQ&usqp=CAU" alt=""/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Welcome</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Login</a>
                            </li>
                        </ul>
                         <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="container">
	                            <div class="row text-center">
                                    <br><br> <h2 style="color:#234ca6; font-family:calibri;"><br>OH, HEY THERE!</h2><br>
                                    <h4 style="color:#3081bf; font-family:'Times New Roman', Times, serif"><br> Welcome to ALL STAR SPORT. IT'S GREAT TO MEET YOU!</h4>
                                    <span style="font-size: 21px; color:#234ca6; font-family:'Times New Roman', Times, serif">We promise to provide you with all available slots in all kinds of sport and keep you up-to-date with your bookings.</span>
                                    <span style="font-size: 21px; color:#3081bf; font-family:'Times New Roman', Times, serif">With about 15 sports to book, we're sure there's something to suite your need. <br> Come see for yourself..</span>
                                    <center style="text-indent: 110px;"><small>Copyright &copy; 2022 All Star Sport - All right Reserved!</small></center>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading"><b>Please Login</b></h3>
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
                                            <input type="email" name="email" required class="form-control" placeholder="Email *" value="{{ session['email'] }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" required class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister" name="login" value="Login"/>
                                        <span style="text-align: center;"><a href="/register" class="btnRegister"> Register</a></span>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
<script> 
var password = document.getElementById("password"), confirmPassword = document.getElementById("confirmPassword");

function validatePassword(){
  if(password.value != confirmPassword.value) {
    confirmPassword.setCustomValidity("Passwords Don't Match");
  } else {
    confirmPassword.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirmPassword.onkeyup = validatePassword;
</script>

</body>
</html>
