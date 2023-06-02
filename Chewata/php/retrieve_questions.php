<?php
$conn = new mysqli('localhost','root','','chewata');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM question order by RAND() LIMIT 10";

$result = $conn->query($sql);

$questions = array();

while($row = mysqli_fetch_assoc($result)){
   array_push($questions, $row);

}

$conn->close();

$questions_json = json_encode($questions);

header('Content-Type: application/json');
echo $questions_json;



?>