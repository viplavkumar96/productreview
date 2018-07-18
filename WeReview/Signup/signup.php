<!DOCTYPE html>
<html>
<head>
  <title>
    Signup
  </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
butn{
  color:black;
}
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
tr {
  height:30px;
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
        <li><a href="../Signin/signin.php">Signin</a></li>
        <li><a href="../search/search.php"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="hero-image">
  <div class="form">
    <h1>WeReview</h1>
    <form action = "signup.php" method="POST" name = "signup">
                  <table>
                    <tr><td>E-mail</td><td><input type = "text" name = "emailid"></td></tr><br/><tr></tr>
                    <tr><td>Name</td><td><input type = "text" name = "name"></td></tr><br/><tr></tr>
                    <tr><td>Password</td><td><input type = "password" name = "password"></td></tr><br/><tr></tr>
                    <tr><td>Re-enter password</td><td><input type = "password" name = "reenter"></td></tr><tr></tr>
                    <tr><td></td><td><input type = "submit" value="Signup" name = "butn"></td></tr>
                  </table>                  
                </form>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "WeReview";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$emailid = $_POST["emailid"];
$name = $_POST["name"];
$password = $_POST["password"];
$repass = $_POST["reenter"];
if(empty($emailid) || empty($name) || empty($password)){
  echo "Enter the details";
}
else{
    $password = md5($password);
    $repass = md5($repass);
$sql = "INSERT INTO user(name,password,emailid)
VALUES ('$name','$password','$emailid')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>
 </div>
</div>

</body>
</html>


