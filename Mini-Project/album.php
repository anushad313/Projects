<html>

<body bgcolor="pink">
<?php
   
   $dbh = mysqli_connect('localhost','root','','') or die(mysqli_error());
    mysqli_select_db($dbh,'music') or die(mysqli_error($dbh));
       
      $album_id=$_REQUEST['album_id'];
      $artist_id=$_REQUEST['artist_id'];	
      $album_name=$_REQUEST['album_name'];
      $censored_date=$_REQUEST['censored_date'];
      $genre_id=$_REQUEST['genre_id'];
      $no_of_songs=$_REQUEST['no_of_songs'];	
      $release_date=null;

$query = "INSERT INTO album VALUES ('$album_id','$artist_id','$album_name','$censored_date','$genre_id','$no_of_songs','release_date')";
$result = mysqli_query($dbh,$query) or  die(mysqli_error($dbh));

echo "data inserted sucessfully";

$var = mysqli_query($dbh,"SELECT  *  FROM album");

 echo "<table border size=1>";
 echo "<tr><th>  album_id</th> <th> artist_id</th> <th> album_name</th>  <th> censored_date </th> <th>  genre_id</th> <th> no_of_songs</th><th>release_date</th> </tr>";

while ($arr=mysqli_fetch_row($var))
{
 echo"<tr> <td> $arr[0] </td> <td> $arr[1]  </td> <td> $arr[2]  </td> <td> $arr[3]  </td>  <td> $arr[4]  </td>  <td> $arr[5]  </td> <td> $arr[6]  </td></tr>";

}
echo"</table>";
?>

<?php

$db_host="localhost";
$db_name="music";
$db_user="root";
$db_pass="";
$con = mysqli_connect("$db_host","$db_user","$db_pass") or die ("could not connect");
mysqli_select_db($dbh,'music') or die(mysqli_error($dbh));
$p0=mysqli_query($dbh,"call total_songs(@out)");
$rs=mysqli_query($dbh,'SELECT @out' );

while($row=mysqli_fetch_row($rs))
{
echo 'total number of songs is= '.$row[0];
}




mysqli_close($con);


?>

<h4><font color="cyan"><a href="albumdbs.html">click here to go back to the home page </a></font></h4
</body>
</html>