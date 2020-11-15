<html>
<body bgcolor="pink" >
<?php
$dbh=mysqli_connect('localhost','root','','') or die(mysqli_error());
mysqli_select_db($dbh,'music') or die (mysqli_error($dbh));

$artist_name=$_REQUEST['artist_name'];
$address=$_REQUEST['address'];

$phn_no=$_REQUEST['phn_no'];

$artist_id=$_REQUEST['artist_id'];





$query="update  artist set  artist_name='$artist_name',address='$address',phn_no='$phn_no' where artist_id='$artist_id'";
$result=mysqli_query($dbh,$query) or die(mysqli_error($dbh));
echo "data updated successfully!!!!";

$var=mysqli_query($dbh,"SELECT * from artist");
echo"<table border size=1>";
  echo "<tr><th>  artist_id</th> <th>  artist_name</th> <th>  address</th> <th>  phn_no </th> <th> gender</th> </tr>";
while ($arr=mysqli_fetch_row($var))
{
	echo"<tr> <td>$arr[0]</td> <td>$arr[1]</td> <td>$arr[2]</td><td>$arr[3]</td> <td>$arr[4]</td> </tr>";
}
echo"</table>";

?>
<h4><font color="cyan"><a href="artistdbs.html">click here to go back to the home page </a></font></h4>
</body>
</html>