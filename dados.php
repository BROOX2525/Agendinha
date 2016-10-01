<?php
// Dados do Servidor Local
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "descomplica";

// Dados do Servidor Web
$servername = "192.95.43.212:3306";
$username = "gama";
$password = "t!m305";
$dbname = "descomplica";

// Dados do Usuario
$nome = isset($_GET['nome']) ? $_GET['nome'] : NULL;
$email = isset($_GET['email']) ? $_GET['email'] : NULL;
//Get IP connection
$ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');
	//End IP Connection
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = $conn->query("SELECT * FROM pessoas WHERE email='".$email."'");
if(mysqli_num_rows($sql) > 0){
    echo 'Pessoa ja cadastrada no sistemas!!!';
    header("Location: cadastrado.php");
    exit();
}
else {

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO pessoas (nome, email, data_cad, ip)
VALUES ('".$nome."','".$email."',NOW(),'".$ip."')";
if ($conn->query($sql) === TRUE) {
    header("Location: livro.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>