<html>

<body bgcolor="pink">
<?php
   
   $dbh = mysqli_connect('localhost','root','','') or die(mysqli_error());
    mysqli_select_db($dbh,'music') or die(mysqli_error($dbh));
       
      $track_id=$_REQUEST['track_id'];
      $album_id=$_REQUEST['album_id'];
	
       $track_name=$_REQUEST['track_name'];
      $lyric=$_REQUEST['lyric'];
	

$query = "INSERT INTO track VALUES ('$track_id','$album_id','$track_name','$lyric')";
$result = mysqli_query($dbh,$query) or  die(mysqli_error($dbh));

echo "data inserted sucessfully";

$var = mysqli_query($dbh,"SELECT * FROM track");

 echo "<table border size=1>";
 echo "<tr><th>  track_id</th> <th> album_id</th> <th> track_name</th> <th> lyric</th> </tr>";

while ($arr=mysqli_fetch_row($var))
{
 echo"<tr> <td> $arr[0] </td> <td> $arr[1]  </td> <td> $arr[2]  </td> <td> $arr[3]  </td>   </tr>";

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

<h4><font color="cyan"><a href="trackdbs.html">click here to go back to the home page </a></font></h4
</body>
</html>