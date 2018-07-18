<?php

include '../connect.php';
$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);

$sql = "select username from admin where username = $username password = $password";

if(mysqli_query($conn,$sql))
    echo "Welcome admin";

else
    echo "Invalid username or/and password !! Try again";

?>

