<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
	body{margin:0;
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
<th>PNR No</th>
<th>FirstName</th>
<th>Last Name</th>
<th>Age</th>
<th>Gender</th>
<th>Contact</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "railway");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT ticket.pnr_no, passenger.first_name, passenger.last_name,age,passenger.gender,passenger.contact 
FROM passenger NATURAL JOIN ticket WHERE ticket.status = 'CNFRM'";
$result = $conn->query($sql);
if ($result-> num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["pnr_no"]. "</td><td>" . $row["first_name"] . "</td><td>". $row["last_name"] ."</td><td>". $row["age"]."</td><td>". $row["gender"]. "</td><td>" .$row["contact"]."</td><td>". "</td></tr>";
}
echo "</table>";
} else 
{ echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>