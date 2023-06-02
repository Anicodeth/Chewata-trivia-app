<!DOCTYPE html>
<html>
<head>	
    <title>Login</title>

	<link rel="stylesheet" type="text/css" href="../Style/style.css">

</head>
<body>
                
<?php

$con = mysqli_connect("localhost", "root", "", "chewata");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql = " INSERT INTO user(username, email, password) VALUES ('$username', '$email', '$password')";
    if ($con->query($sql) === TRUE) {
        echo "<h3>Successful. You can login now</h3>";
setcookie('email', $email, time() + (86400 * 30), "/");
        } else {
        echo "<h3>Error: " . $con->error."</h3>";}

}else if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "Select * from user where username = '$username' and password = '$password'";
    $results = $con -> query($sql);
    if ($results->num_rows == 0){
        echo "<h3>Username or password is wrong</h3>";
    }


    else{
        echo "<h3>Successful</h3>";

session_start();
$_SESSION['username'] = $username;
$row = mysqli_fetch_assoc($results);


$file = '../log/userlog.txt';
$content = $row['username']."  ".$row['email']."  ".$row['type']."  ".date("Y-m-d H:i:s")."\n";


$fileHandle = fopen($file, 'a');

    fwrite($fileHandle, $content);

    fclose($fileHandle);


    if($row['type'] == "A"){
        header('Location: ./adminpage.php');
       }
    else{      
        header('Location: ./gamepage.php');}

    }


}

?>
<br>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method = "POST" action = "./loginpage.php">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" required="">
                    <input type="email" name="email" placeholder="email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>



			<div class="login">
				<form  method = "POST" action = "./loginpage.php">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>
