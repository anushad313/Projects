<html>
<body bgcolor="pink" >
<?php
$dbh=mysqli_connect('localhost','root','','') or die(mysqli_error());
mysqli_select_db($dbh,'music') or die (mysqli_error($dbh));

$song_id=$_REQUEST['song_id'];

$result1=mysqli_query($dbh,"select song_id from song where song_id='$song_id'");
$row1=mysqli_fetch_array($result1);

if($row1!=0)
{

$query="delete from song where song_id='$song_id'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data deleted successfully!!!!";

$var=mysqli_query($dbh,"SELECT * from song");
echo"<table border size=1>";
  echo "<tr><th>  song_id</th> <th>language</th> <th> rating</th>  <th> album_id</th>  </tr>";

while ($arr=mysqli_fetch_row($var))
{
	 echo"<tr> <td> $arr[0] </td> <td> $arr[1]  </td> <td> $arr[2]  </td> <td> $arr[3]  </td>  </tr>";
}
echo"</table>";
}
else{
echo"invalid song_id !!";
}
?>
<h4><font color="cyan"><a href="songdbs.html">click here to go back to the home page </a></font></h4>
</body>
</html>