<html>

<body bgcolor="pink">
<?php
   
   $dbh = mysqli_connect('localhost','root','','') or die(mysqli_error());
    mysqli_select_db($dbh,'music') or die(mysqli_error($dbh));
      $artist_id=$_REQUEST['artist_id'];
       $artist_name=$_REQUEST['artist_name'];
      $address=$_REQUEST['address'];
       $phn_no=$_REQUEST['phn_no'];
   $gender=$_REQUEST['gender'];

$query = "INSERT INTO artist VALUES ('$artist_id','$artist_name','$address','$phn_no',' $gender')";
$result = mysqli_query($dbh,$query) or  die(mysqli_error($dbh));

echo "data inserted sucessfully";

$var = mysqli_query($dbh,"SELECT * FROM artist");

 echo "<table border size=1>";
 echo "<tr><th> artist_id</th> <th>  artist_name</th> <th>  address</th> <th>  phn_no </th> <th> gender</th> </tr>";

while ($arr=mysqli_fetch_row($var))
{
 echo"<tr> <td> $arr[0] </td> <td> $arr[1]  </td> <td> $arr[2]  </td> <td> $arr[3]  </td> <td> $arr[4] </td> </tr>";

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

<h4><font color="cyan"><a href="artistdbs.html">click here to go back to the home page </a></font></h4>
</body>
</html>