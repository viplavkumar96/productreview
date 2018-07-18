<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  .form {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
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
  background-image: url("images/home.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
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
<body background="../images/home.jpg">
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
        <li><a href="../search/search.php">Search</a></li>
        <li><form method="post" action = "write.php"><input type="submit" name = "logout" value = "logout"/></form></li>
        <?php
        if(!empty($_POST['logout']))
        {
            session_start();
            session_unset();
            //session_destroy();
            header("Location: http://localhost/WeReview/index.html");
        }
        ?>
      </ul>
    </div>
  </div>
</nav>

<div class="hero-image">
  <div class="hero-text">

<form method="post" action="write.php">
<div style="width: 400px;">
</div>
<div style="padding-bottom: 18px;font-size : 24px;">Product Review</div>
<div style="padding-bottom: 18px;">Category<br/>
<select id="radio" name="category" style="width : 450px;" class="form-control">
<!--<option>books</option>
<option>movies</option>-->
<option>gadgets</option>
</select>
</div>

<div style="padding-bottom: 18px;">Product Name<span style="color: red;"> *</span><br/>
<input type="text" id="product" name="product" style="width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Review<span style="color: red;"> *</span><br/>
<textarea id="data_8" name="review" style="width : 450px;" rows="9" class="form-control"></textarea>
</div>
<div style="padding-bottom: 18px;"><input name="skip_Submit" value="Submit" type="submit"/></div>
<div>

</form>
</div>
</div>
<?php
session_start();
if(isset($_SESSION['user'])){
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "WeReview";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$cat = $_POST['category'];
$prod = $_POST['product'];
$review = $_POST['review'];

if(empty($cat) || empty($prod) || empty($review)){
  echo "<br/><br/><br/>Enter the details";
}
else{
  $sql = "";
  $subcat = "";
    if($cat.preg_match("movies")){
    $sql = "select catid,mid from movies where mname like '%$prod%'"; 
    }
    else if($cat.preg_match("gadgets")){
      $sql = "select catid,gid from gadgets where gname like '%$prod%'"; 
      echo "RRRRRRRRRRRR";
        }
    else if($cat.preg_match("books")){
      $sql = "select catid,isbn from books where title like '%$prod%'"; 
   }
   $res = $conn->query($sql);
   if($rs = $res->fetch_assoc())
   {
    $user = $_SESSION['user'];
    $catid = $rs['catid'];
    if($cat.preg_match("movies"))
    $subcat = $rs['mid'];
    else if($cat.preg_match("gadgets"))
    $subcat = $rs['gid'];
    else if($cat.preg_match("books"))
    $subcat = $rs['isbn'];
    $sql1 = "INSERT INTO review (userid,subcatid,catid,content) VALUES('$user','$catid','$subcat','$review')";
    $a = $conn->query($sql1);
    if($a==TRUE) {
    echo "Successfully entered";
    if($cat.preg_match("movies"))
    header("Location:http://localhost/WeReview/search/movies.php?name=$prod");
    if($cat.preg_match("gadgets"))
    header("Location:http://localhost/WeReview/search/gadgets.php?name=$prod");
    if($cat.preg_match("books"))
    header("Location:http://localhost/WeReview/search/books.php?name=$prod");
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}

$conn->close();
}
else
{
    header("Location:http://localhost/WeReview/Signin/signin.php");
}
?>
</center>
</body>
</html>