<html>
<body bgcolor="pink" >
<?php
$dbh=mysqli_connect('localhost','root','','') or die(mysqli_error());
mysqli_select_db($dbh,'music') or die (mysqli_error($dbh));

$track_name=$_REQUEST['track_name'];
$lyric=$_REQUEST['lyric'];
$track_id=$_REQUEST['track_id'];






$query="update  track set  track_name='$track_name',lyric='$lyric' where track_id='$track_id'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data updated successfully!!!!";

$var=mysqli_query($dbh,"SELECT * from track");
echo"<table border size=1>";
   echo "<tr><th>  track_id</th> <th> album_id</th> <th> track_name</th> <th> lyric</th> </tr>";

while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td>  </tr>";
}
echo"</table>";

?>
<h4><font color="cyan"><a href="trackdbs.html">click here to go back to the home page </a></font></h4>
</body>
</html>