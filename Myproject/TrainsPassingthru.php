<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
	body{
			margin:0;
			background: lightblue;
	}
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
tr:nth-child(odd) {background-color: #aaffff}
</style>
</head>
<body>
<table>
<tr>
<th>Train No</th>
<th>Train Name</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "railway");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT train_no, train_name FROM trains, station WHERE station.st_name = trains.dst_st OR station.st_name = trains.src_st ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["train_no"]. "</td><td>" . $row["train_name"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>