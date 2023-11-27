<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "EverServer4321";
$dbname = "typing";

$user = $_POST['usuario'];
$pass = $_POST['senha'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Usuarios WHERE usuario ='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['senha'])) {
        $_SESSION['id_U'] = $row['id_U']; 
        header("Location: ../views/menu.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Senha incorreta!";
        $_SESSION['login_field'] = 'senha'; 
        header("Location: ../views/login.php"); 
        exit();
    }
} else {
    $_SESSION['login_error'] = "Usuário não encontrado!";
    $_SESSION['login_field'] = 'usuario'; 
    header("Location: ../views/login.php"); 
    exit();
}
$conn->close();
?>
