<?php
// Dados do Servidor Local
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "descomplica";

// Dados do Servidor Web
$servername = "mysql.hostinger.com.br";
$username = "u637621653_agend";
$password = "icaro1010";
$dbname = "u637621653_agend";

// Dados do Usuario
$nome = isset($_POST['name']) ? $_POST['name'] : NULL;
$tel = isset($_POST['phone']) ? $_POST['phone'] : NULL;
$email = isset($_POST['email']) ? $_POST['email'] : NULL;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = $conn->query("SELECT * FROM contato WHERE email='".$email."'");
if(mysqli_num_rows($sql) > 0){
    echo 'Pessoa ja cadastrada no sistemas!!!';
    header("Location: index.html");
    exit();
}
else {

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO contato (nome, telefone, email)
VALUES ('".$nome."','".$tel."','".$email."')";
if ($conn->query($sql) === TRUE) {
    header("Location: contact.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>