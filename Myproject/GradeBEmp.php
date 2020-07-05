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
<th>Employee ID</th>
<th>Name</th>
<th>Department Name</th>
<th>Salary</th>
<th>Contact</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "railway");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM employee WHERE salary >= 30000 AND salary <45000";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["emp_id"]. "</td><td>" . $row["emp_name"] . "</td><td>". $row["dept_name"] ."</td><td>". $row["salary"]."</td><td>". $row["contact"]."</td><td>". "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>