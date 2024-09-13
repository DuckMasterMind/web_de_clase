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
        // $cookie_name = "Nova_Cookie";
        // $cookie_mail = $_POST["mail"];
        // $cookie_password = $_POST["password"];
        // setcookie($cookie_name, $cookie_mail, $cookie_password, time() + (86400 * 30), "/");

        if (!isset($_POST['name'], $_POST['password'])) {

            // si no hay datos muestra error y re direccionar
        
            header('Location: login_failed_1.html');
        }
        #TESTING
        #TESTING FOR BANNED
        if ($stmt = $conn->prepare('SELECT id,password FROM Usuarios WHERE name = ?')) {

            // parámetros de enlace de la cadena s
        	echo "TEST2";
            $stmt->bind_param('s', $_POST['name']);
            $stmt->execute();
        }

        $stmt->store_result();
        if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
            if ($_POST['password'] === $password) {
                        echo 'Login was success';
                        session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['name'] = $_POST['name'];
                        $_SESSION['id'] = $id;
                        header('Location: inicio.php');
            } 
            else {
                echo 'Password is wrong';
                header('Location: login_fai_passwd.html');
            }
        }
        else {

            // usuario incorrecto
            echo'User does not exist';
            header('Location: login_fail.html');
        }
$stmt->close();
?>
</body>
</html>
