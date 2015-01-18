<?php
$textbook = mysql_real_escape_string($_POST['textbookname']);
$username = mysql_real_escape_string($_POST['coursename']);
$password = mysql_real_escape_string($_POST['professor']);
$isbn = mysql_real_escape_string($_POST['isbn']);
$usefulness = mysql_real_escape_string($_POST['response-rate1']);
$value = mysql_real_escape_string($_POST['response-rate2']);
$clarity = mysql_real_escape_string($_POST['response-rate3']);
$need = mysql_real_escape_string($_POST['switch1']);
$comment = mysql_real_escape_string($_POST['textarea']);


// Create connection
$conn = new mysqli("localhost", "root", "zHfApkXelg");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT ISBN FROM book";
$result = $conn->query($sql);

if ($result == $isbn) {
	$sql = "UPDATE review SET courseName='coursename', ProfessorName= 'professor', UsefulnessRating= 'response-rate1', ValueRating= 'response-rate2', ClarityRating='response-rate3', Need='switch1', Comment='textarea' WHERE ($result==$isbn);" }
	else {
	$sql = "INSERT INTO book (TextbookName, ISBN, CourseName, ProfessorName)
	VALUES ('textbookname', 'isbn', 'coursename', 'professor')";
	$sql = "INSERT INTO review (ISBN, UsefulnessRating, ValueRating, ClarityRating, Need, Comment)
	VALUES ('textbookname', 'isbn', 'response-rate1', 'response-rate2', 'response-rate3', 'switch1', 'textarea')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>