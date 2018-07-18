<?php

include '../connect.php';

$sql = "SHOW TABLES";

$result = mysqli_query($conn,$sql);

while($table = mysql_fetch_array($result))
{
    echo $table[0];
}