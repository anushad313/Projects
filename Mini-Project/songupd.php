<html>
<body bgcolor="pink" >
<?php
$dbh=mysqli_connect('localhost','root','','') or die(mysqli_error());
mysqli_select_db($dbh,'music') or die (mysqli_error($dbh));

$language=$_REQUEST['language'];
$rating=$_REQUEST['rating'];
$song_id=$_REQUEST['song_id'];






$query="update  song set  language='$language',rating='$rating' where song_id='$song_id'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data updated successfully!!!!";

$var=mysqli_query($dbh,"SELECT * from song");
echo"<table border size=1>";
   echo "<tr><th>  song_id</th> <th>language</th> <th> rating</th>  <th> album_id</th>  </tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td> $arr[0] </td> <td> $arr[1]  </td> <td> $arr[2]  </td> <td> $arr[3]  </td>  </tr>";
}
echo"</table>";

?>
<h4><font color="cyan"><a href="songdbs.html">click here to go back to the home page </a></font></h4>
</body>
</html>