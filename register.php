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
                        <h3 style="font-weight:bold;">Welcome to All Star Sport</h3>
                        <p style="font-family: calibri; font-size:20px;">We provide customers possible time slots to book via Internet.</p>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsFfQJX9PQZvUeJLH5rhp1yJoCL44sKB5srQ&usqp=CAU" alt=""/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Disclaimer</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading"><b>Please Register</b></h3>
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
                                            <input type="text" name="firstName" required class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lastName" required class="form-control" placeholder="Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" required class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="confirmPassword" name="confirmPassword" required class="form-control"  placeholder="Confirm Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male">
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="email" required class="form-control" placeholder="Your Phone *" maxlength="14" minlength="13" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required name="username" class="form-control" placeholder="Username *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="question">
                                                <option class="hidden"  selected disabled>Please select your Security Question/ Optional</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number?</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="answer" class="form-control" placeholder="Enter Your Answer */ Optional" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister" name="register" value="Register"/>
                                        <!-- <button type="button" class="btnRegister"><a href="/">Login</a></button> -->
                                    </div>
                                </form>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="container">
	                            <div class="text-justify">
                                    <br><br> <h2 style="color:#234ca6; font-family:calibri"><b>Legal Disclaimer</b></h2><br>
                                    <span style="font-size: 17px; color:#3081bf; font-family:'Times New Roman', Times, serif">All Star Sport has made every attempt to ensure the accuracy and reliability of the information provided on this
website. However, the information is provided "as is" without warranty of any kind. No warranties, promises and/or representations of any kind, expressed or implied, are given as to the nature, standard, accuracy or otherwise of the information provided in this website nor to the suitability or otherwise of the information to your particular circumstances. We cannot and will not guarantee that this website is free from computer viruses or anything else that has destructive properties. We shall not be liable for any loss or damage of whatever nature (direct, indirect, consequential, or other) whether arising in contract, tort or otherwise, which may arise as a result of your use of (or inability to use) this website, or from your use of (or failure to use) the information on this site. This website provides links
to other websites owned by third parties. The content of such third party sites is not within our control, and
we cannot and will not take responsibility for the information or content thereon. Links to such third party
sites are not to be taken as an endorsement by All Star Sport of the third party site, or any products promoted, offered or sold on the third party site, nor that such sites are free from computer viruses or anything else that has destructive properties. We cannot and do not take responsibility for the collection or use of personal data from any third party site. In addition, we will not accept responsibility for the accuracy of third party advertisements.</span>
                                </div>
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
