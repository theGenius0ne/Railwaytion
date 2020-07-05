<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','railway');

// get the post records
$p_id = $_POST['ID'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Age = $_POST['Age'];
$Gender = $_POST['Gender'];
$Contact = $_POST['Contact'];
$Seat = $_POST['Seat'];


// database insert SQL code
$sql = "INSERT INTO `passenger` (`p_id`, `first_name`, `last_name`, `age`, `gender`,`contact`,`seat_no`) VALUES ('$p_id', '$FirstName', '$LastName', '$Age', '$Gender','$Contact','$Seat')";

// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Passenger Records Inserted";
}
?>