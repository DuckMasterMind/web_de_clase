<html>
<body>
<?php
//Database is bbdd.novaservice.cat

$servername2 = "localhost";
$username2 = "admin";
$password2 = "novaadmin";
$dbname2 = "mysql";
 

session_start();

// Create connection
$conn = new mysqli($servername2, 
    $username2, $password2, $dbname2);
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}
        if (!isset($_POST['name'], $_POST['password'])) {

            // si no hay datos muestra error y re direccionar
            header('Location: login_failed_1.html');
        }
	echo "<h1>User already exists, choose another name!</h1>";
	$name = $_POST["name"];
	$password = $_POST["password"];
		$sql = "INSERT INTO `Usuarios`(`name`,`password`) VALUES ('$name','$password')";
			if(mysqli_query($conn, $sql)){

				echo"After check";
				header('Location: login.html');

	        	} else{
        	    		echo "ERROR: Hush! Sorry $sql. "
                		. mysqli_error($conn);
        		}

?>
<h1>Este usuario ya existe!</h1>
</body>
</html>
