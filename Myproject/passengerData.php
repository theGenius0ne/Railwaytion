<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
	body{
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
<th>Passenger ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>Gender</th>
<th>Contact</th>
<th>Seat</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "railway");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM passenger";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["p_id"]. "</td><td>" . $row["first_name"] . "</td><td>"
. $row["last_name"] ."</td><td>". $row["age"]."</td><td>". $row["gender"] . "</td><td>". $row["contact"]."</td><td>". $row["seat_no"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>