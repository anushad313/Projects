<html>

<body bgcolor="pink">
<?php
   
   $dbh = mysqli_connect('localhost','root','','') or die(mysqli_error());
    mysqli_select_db($dbh,'music') or die(mysqli_error($dbh));
      $genre_id=$_REQUEST['genre_id'];
       $genre_name=$_REQUEST['genre_name'];
      $description=$_REQUEST['description'];

$query = "INSERT INTO genre VALUES ('$genre_id','$genre_name','$description')";
$result = mysqli_query($dbh,$query) or  die(mysqli_error($dbh));

echo "data inserted sucessfully";

$var = mysqli_query($dbh,"SELECT * FROM genre");

 echo "<table border size=1>";
 echo "<tr><th>  genre_id</th> <th> genre_name</th> <th> description</th> </tr>";

while ($arr=mysqli_fetch_row($var))
{
 echo"<tr> <td> $arr[0] </td> <td> $arr[1]  </td> <td> $arr[2]  </td>  </tr>";

}
echo"</table>";

$db_host="localhost";
$db_name="music";
$db_user="root";
$db_pass="";

$con = mysqli_connect("$db_host","$db_user","$db_pass") or die ("couldnot connect");

mysqli_select_db($dbh,'music') or die(mysqli_error($dbh));

mysqli_close($con); 


?>

<h4><font color="cyan"><a href="albumdbs.html">click here to go back to the home page </a></font></h4
</body>
</html>