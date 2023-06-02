<?php
session_start();
if (!$_SESSION['username']){
    header('Location: ./loginpage.php');
}
echo "Welcome Back, ".$_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../Style/admin.css">
</head>
<body>

 
<a href="logout.php" >Log Out</a>
</form>

<div class = "datatable">
    <h2>Question List</h2>
<table>
	<thead>
		<tr>
            <th>ID</th>
			<th>Question</th>
			<th>Answer A</th>
			<th>Answer B</th>
			<th>Answer C</th>
			<th>Answer D</th>
            <th>Answer KEY</th>
		</tr>
	</thead>
	<tbody>
		<?php
		 $conn = mysqli_connect("localhost", "root", "", "chewata");
        $query = "SELECT * FROM question";
        $result = $conn->query($query);
		if ($result) {
		  while ($row = mysqli_fetch_assoc($result)) {
		    echo "<tr>";
            echo "<td>{$row['q_id']}</td>";
		    echo "<td>{$row['sentence']}</td>";
		    echo "<td>{$row['answer_a']}</td>";
		    echo "<td>{$row['answer_b']}</td>";
		    echo "<td>{$row['answer_c']}</td>";
		    echo "<td>{$row['answer_d']}</td>";
            echo "<td>{$row['answer_key']}</td>";
		    echo "</tr>";
		  }
		}
		?>
	</tbody>
</table>
    </div>
	<form id = "insert" method="post">

	<h2>Insert Question</h2>

		<label>Sentence:</label>
		<input type="text" name="sentence" required>
		<br>
		<label>Answer A:</label>
		<input type="text" name="ans_a" required>
		<br>
		<label>Answer B:</label>
		<input type="text" name="ans_b" required>
		<br>
		<label>Answer C:</label>
		<input type="text" name="ans_c" required>
		<br>
        <label>Answer D:</label>
		<input type="text" name="ans_d" required>
		<br>
        <label>Answer Key:</label>
		<input type="text" name="ans_key" required>
		<br>
    
		<input class = "buttons" type="submit" name="insert" value="Insert Question">
	</form>


	<form id="delete" method="post">
    <h2>Delete Question</h2>
		<label>ID:</label>
		<input type="number" name="id" required>
		<br>
		<input class = "buttons" type="submit" name="delete" value="Delete Question">
	</form>

    <div class = "datatable">
        <h2>Users log data<h2>
    <?php
$file = '../log/userlog.txt';

// Check if the file exists
if (file_exists($file)) {
    // Open the file for reading
    $fileHandle = fopen($file, 'r');

    if ($fileHandle) {
        // Read and echo each line until the end of the file
        while (($line = fgets($fileHandle)) !== false) {
            echo $line."<br>";
        }

        // Close the file handle
        fclose($fileHandle);
    } else {
        echo 'Unable to open the file.';
    }
} else {
    echo 'File not found.';
}
?>
    </div>
 
</body>
</html>
<?php
 $conn = mysqli_connect("localhost", "root", "", "chewata");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insert'])) {

    $sentence =$_POST['sentence'];
    $ans_a = $_POST['ans_a'];
    $ans_b = $_POST['ans_b'];
    $ans_c = $_POST['ans_c'];
    $ans_d = $_POST['ans_d'];
    $ans_key = $_POST['ans_key'];


        $sql = "INSERT INTO question (sentence, answer_a, answer_b, answer_c,answer_d,answer_key) VALUES ('$sentence', '$ans_a', '$ans_b', '$ans_c', '$ans_d', '$ans_key')";
        if (mysqli_query($conn, $sql)){
             echo "<div class = 'result'>Successfully Inserted</div>";
            
        }
    
    else{
        echo "<div class = 'result'> Already exists</div>";
       }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
      $id = $_POST['id'];
      $sql = "DELETE FROM question WHERE q_id ='$id'";
      if (mysqli_query($conn, $sql)){
          echo "<div class = 'result'>Successfully Deleted</div>";
        
     }
    else{
     echo "<div class = 'result'>Question Not deleted</div>";
    }}

    ?>