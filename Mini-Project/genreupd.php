<html>
<body bgcolor="pink" >
<?php
$dbh=mysqli_connect('localhost','root','','') or die(mysqli_error());
mysqli_select_db($dbh,'music') or die (mysqli_error($dbh));

$genre_name=$_REQUEST['genre_name'];
$description=$_REQUEST['description'];
$genre_id=$_REQUEST['genre_id'];






$query="update  genre set  genre_name='$genre_name',description='$description' where genre_id='$genre_id'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data updated successfully!!!!";

$var=mysqli_query($dbh,"SELECT * from genre");
echo"<table border size=1>";
   echo "<tr><th>  genre_id</th> <th> genre_name</th> <th> description</th> </tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td> </tr>";
}
echo"</table>";

?>
<h4><font color="cyan"><a href="genredbs.html">click here to go back to the home page </a></font></h4>
</body>
</html>