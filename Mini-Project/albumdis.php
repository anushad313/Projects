<html>
<body bgcolor="pink" >
<?php
$dbh=mysqli_connect('localhost','root','') or die(mysqli_error());
mysqli_select_db($dbh,'music') or die (mysqli_error($dbh));

$var=mysqli_query($dbh,"SELECT * from album");
echo"<table border size=1>";
echo "<tr><th>  album_id</th> <th> artist_id</th> <th> album_name</th>  <th> censored_date </th><th> release_date </th> <th> genre_id</th> <th> no_of_songs</th> </tr>";

while ($arr=mysqli_fetch_row($var))
{

 echo"<tr> <td> $arr[0] </td> <td> $arr[1]  </td> <td> $arr[2]  </td> <td> $arr[3]  </td>  <td> $arr[4]  </td>  <td> $arr[5]  </td><td> $arr[6]  </td></tr>";	
 }
echo"</table>";

?>
<h4><font color="cyan"><a href="albumdbs.html">click here to go back to the home page </a></font></h4>
</body>
</html>