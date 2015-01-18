<?php
$textbook = mysql_real_escape_string($_POST['textbookname']);
$coursename = mysql_real_escape_string($_POST['coursename']);
$professor = mysql_real_escape_string($_POST['professor']);
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


//$sql = "SELECT ISBN FROM book";
//$result = $conn->query($sql);

if (TRUE) {
	//$sql = "UPDATE review SET courseName = $coursename, ProfessorName = $professor, UsefulnessRating = $usefulness, ValueRating = $value, ClarityRating = $clarity, Need= $switch1, Comment = $comment WHERE ($result==$isbn);" }
	//else {
	$sql = "INSERT INTO book (TextbookName, ISBN, CourseName, ProfessorName)
	VALUES ($textbook, $isbn, $coursename, $professor)";
	$sql = "INSERT INTO review (ISBN, UsefulnessRating, ValueRating, ClarityRating, Need, Comment)
	VALUES ($textbook, $isbn, $usefulness, $value, $clarity, $need, $comment)";
}


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>