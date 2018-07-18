<html>
    <head>
        <title>
            Search
        </title>
    </head>
    <body>
        <style>
        .form {
  text-align: center;
  position: relative;
  float: center;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
        }
  .hero-image {
  background-image: url("../images/home.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  color:white;

}
body,html {
    height: 100%;
    margin: 0;

}
td {
    color:white;
}
</style>
        <div class = "hero-image"><center>
        <form action = "search.php" method = "get"><h1>Search</h1>
                <table><tr><td></td><td></td><td></td><td></td><td><a style = "color:white" href ="../index.html">Back to HomePage</a></td></tr>
                        <tr><td></td><td><input type = "hidden" name = "category" value = "movies"/><br/>
                        <input type = "hidden" name = "category" value = "gadgets"/><br/>
                        <input type = "hidden" name = "category" value = "books"/>
                        </td></tr><tr></tr>
                        <tr><td>Product</td><td><input type = "text" name = "name"></td></tr><tr></tr>
                        <tr><td></td><td><input type = "submit" value="Browse"/></td></tr>
                      </table>  
        </form>
        <?php

include '../connect.php';
$desc = $_GET['category'];
$search = $_GET['name'];
if(empty($desc)){
    die("Please select a Category");
}
else{
     if($desc.preg_match("books")){
        if(empty($search))
        {
            $sql = "select * from books";
        }
        else
        $sql = "select * from books where title like '%$search%'";
        if($result = $conn->query($sql))
        {
            while($row = $result->fetch_assoc())
            {
                echo $row['title'];
                echo "<a href = 'books.php?name=".$row['title']."'><img src ='".$row['image']."' height = 100px width = 100px/></a>";
                
            }
        }
        else
        {
            echo "Not Results found!!";
        }
    }
if($desc.preg_match("gadgets")){
    if(empty($search))
    {
        $sql = "select * from gadgets";
    }
    else
        $sql = "select * from gadgets where gname like '%$search%'";
    if($result = $conn->query($sql))
    {
        echo "<table>";
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>";
            echo $row['gname'];
            echo "</td>";
            echo "<td><a = href = 'gadgets.php?name=".$row['gname']."'><img src ='".$row['image']."'height = 100px width = 100px/></a></td></tr>";
            
        }
        echo "";
    }
    else
    {
        echo "Not Results found!!";
    }
}
else if($desc.preg_match("movies")){
    if(empty($search))
    {
        $sql = "select * from movies";
    }
    else
    $sql = "select image,mname from movies where mname like '%$search%'";
    if($result = $conn->query($sql))
    {
        while($row = $result->fetch_assoc())
        {
            echo $row['mnane'];
                echo "<a href = 'books.php?name=".$row['mname']."'><img src ='".$row['image']."' height = 100px width = 100px/></a>";
        }
    }
    else
    {
        echo "Not Results found!!";
    }
}
}
?>
        </center>
        </div>
    </body>
</html>

