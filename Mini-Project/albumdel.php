<html>
<body bgcolor="pink" >
<?php
$dbh=mysqli_connect('localhost','root','','') or die(mysqli_error());
mysqli_select_db($dbh,'music') or die (mysqli_error($dbh));

$album_id=$_REQUEST['album_id'];

$result1=mysqli_query($dbh,"select album_id from album where album_id='$album_id'");
$row1=mysqli_fetch_array($result1);

if($row1!=0)
{
$query="delete from album where album_id='$album_id'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data deleted successfully!!!!";


$var=mysqli_query($dbh,"SELECT * from album");
echo"<table border size=1>";
 echo "<tr><th>  album_id</th> <th> artist_id</th> <th> album_name</th><th> censored_date</th> <th> genre_id </th> <th> no_of_songs</th> <th>release_date</th> </tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> <td>$arr[3]</td> <td>$arr[4]</td><td>$arr[5]</td> <td>$arr[6]</td></tr>";
}
echo"</table>";
}
else{
echo"invalid album_id !!";
}
?>
<h4><font color="cyan"><a href="albumdbs.html">click here to go back to the home page </a></font></h4>
</body>
</html>