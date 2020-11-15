<html>
<body bgcolor="pink">
<?php
$dbh=mysqli_connect('localhost','root','','') or die(mysqli_error());
mysqli_select_db($dbh,'music') or die (mysqli_error($dbh));

$genre_id=$_REQUEST['genre_id'];

$result1=mysqli_query($dbh,"select genre_id from genre where genre_id='$genre_id'");
$row1=mysqli_fetch_array($result1);

if($row1!=0)
{

$query="delete from genre where genre_id='$genre_id'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data deleted successfully!!!!";

$var=mysqli_query($dbh,"SELECT * from genre");
echo"<table border size=1>";
 echo "<tr><th>  genre_id</th> <th> genre_name</th> <th> discription</th> </tr>";

while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td>  </tr>";
}
echo"</table>";
}
else{
echo"invalid genre_id !!";
}

?>
<h4><font color="crimson"><a href="genredbs.html">click here to go back to the home page </a></font></h4>
</body>
</html>