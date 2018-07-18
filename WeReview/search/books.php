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
  
  review{
		display:inline-block;
		border:2px dash;
		
  
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
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WeReview</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="search.php">Search</a></li>
        <li><form method="post" action = "books.php"><input type="submit" name = "logout" value = "logout"/></form></li>
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
<center>
<div style="padding:50px 50px"></style>
<div class = "review">
<h1><center>BOOKS REVIEW</center></h1>
<table style="text-align:center">
<?php
include '../connect.php';
echo $name;
$sql = "select * from books where title like '%$name%'";
if($result = $conn->query($sql))
    if($row = $result->fetch_assoc()){
        echo "<img src = '".$row['image']."' height = 200px width = 200px/><br/><br/>";
        echo "Title:".$row['title']."<br/><br/>";
        echo "Author:".$row['author']."<br/><br/>";
        echo "Genre:<br/>".$row['genre']."<br/><br/>";
        echo "Ratings:".$row['rating']."<br/><br/>";
        echo "Summary:".$row['summary']."<br/><br/>";
        echo "Crtitics Review:<br/>".$row['critics1']."<br/><br/>";
        echo "Our Review:<br/>".$row['review']."<br/><br/>";
        $sql = "select content from books join review on review.subcatid=books.isbn where title like '%$name%'";
        if($rs = $conn->query($sql))
        {
            if($data = $rs->fetch_assoc())
            {
                //OK
            }
        }
    }
else{
    die("Try again");
}
?>
</table>
</div>








</center>

</body>
</html>