<?php
$servername = "localhost";
$username = "root";
$password = "EverServer4321";
$dbname = "typing";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function verifica_campo($texto){
  $texto = trim($texto);
  $texto = stripslashes($texto);
  $texto = htmlspecialchars($texto);
  return $texto;
}

$nome = "";
$email = "";
$user = "";
$senha = "";
$senhaconf = "";

$erro = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty($_POST["nome_liga"])){
    $erro_user = "Nome da liga é obrigatório.";
    $erro = true;
  }
  else{
    $user = verifica_campo($_POST["user"]);
  }

  if(empty($_POST["senha"])){
    $erro_senha = "Senha é obrigatória.";
    $erro = true;
  }
  else{
    $senha = verifica_campo($_POST["senha"]);
  }

 
  
 
  $user_check_query = "SELECT * FROM Liga WHERE usuario='$user' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user_record = mysqli_fetch_assoc($result);

  if ($user_record) {
      $erro_user = "Este nome de Liga já está em uso.";
      $erro = true;

  }else{
        $passwordHash = password_hash($senha, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO Usuarios (usuario, senha, nome, email) VALUES ('$user', '$passwordHash', '$nome', '$email')";

        if (mysqli_query($conn, $insert_query)) {
       
            echo "Registro inserido com sucesso!";
        
            $nome = "";
            $email = "";
            $user = "";
            $senha = "";
            $senhaconf = "";

        } else {
         
            echo "Erro ao inserir registro: " . mysqli_error($conn);
        }
  }
}

$conn->close();

?>
