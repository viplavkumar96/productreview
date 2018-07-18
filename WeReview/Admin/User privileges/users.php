<?php

include '../connect.php';

$sql = "select userid,username,emailid,dob from user";

$result = $conn->query($sql);

if($result->mysql_num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
        echo $row['userid'].$row['username'].$row['emailid'].$row['dob'];
    }

}
else
{
    echo "Error in fetching data";
}

?>