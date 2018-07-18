<!DOCTYPE html>
<html>
<head>
  <title>
    Signin
  </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
    height: 100%;
    margin: 0;
}
.navbar {
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 15px !important;
      letter-spacing: 4px;
      opacity: 0.8;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
	  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
 
body, html {
    height: 100%;
    margin: 0;
}


.hero-image {
  background-image: url("../images/home.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.form {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
butn{
  color:black;
}
input {
  color:black;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
</style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../index.html">WeReview</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../Signup/signup.php">Signup</a></li>
        
        <li><a href="../search/search.php"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="hero-image">
  <div class="form">
    <h1>WeReview</h1>
    <form action = "signin.php" method="POST" name = "signin">
                  <table>
                    <tr><td>E-mail</td><td><input type = "text" name = "email"/></td></tr><tr></tr>
                    <tr><td>password</td><td><input type = "password" name = "password"/></td></tr><tr></tr>
                    <tr><td><input type = "submit" value="Signin" name = "butn"/></td></tr>
                  </table>                  
                </form>
<?php
include '../connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
if(empty($email) || empty($password)){
  die("Password and Email are mandatory");
}
$password = md5($password);

$sql = "select * from user where emailid like '$email' and password like '$password' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
    session_start();
    $_SESSION['user'] = $row['userid'];
    header("Location:http://localhost/WeReview/afterlogin/afterlogin.php");
    }
else{
    echo "Try again";
}
}
?>

  </div>

</body>
</html>


