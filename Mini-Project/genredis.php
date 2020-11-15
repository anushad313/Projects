<html>
<body bgcolor="pink">
<?php
$dbh=mysqli_connect('localhost','root','','') or die(mysqli_error());
mysqli_select_db($dbh,'music') or die (mysqli_error($dbh));

$var=mysqli_query($dbh,"SELECT * from genre");
echo"<table border size=1>";
echo "<tr><th>  genre_id</th> <th> genre_name</th> <th> discription</th> </tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> </tr>";
}
echo"</table>";

?>
<h4><font color="cyan"><a href="genredbs.html">click here to go back to the home page </a></font></h4>
</body>
</html>