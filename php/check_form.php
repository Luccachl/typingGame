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

  if(empty($_POST["nome"])){
    $erro_nome = "Nome é obrigatório.";
    $erro = true;
  }
  else{
    $nome = verifica_campo($_POST["nome"]);
    if (is_numeric($nome)) {
      $erro_nome = "Nome inválido.";
      $erro = true;
    }
  }

  if(empty($_POST["email"])){
    $erro_email = "Email é obrigatório.";
    $erro = true;
  }
  else{
    $email = verifica_campo($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erro_email = "Email inválido.";
      $erro = true;
    }
  }

  if(empty($_POST["user"])){
    $erro_user = "Usuário é obrigatório.";
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

  if(empty($_POST["senhaconf"])){
    $erro_senhaconf = "Confirmação de senha é obrigatória.";
    $erro = true;
  }
  else{
    $senhaconf = verifica_campo($_POST["senhaconf"]);
  }
  
  /*if ($senha !== $senhaconf) {
    $erro_senhaconf = "As senhas não coincidem.";
    $erro = true;
  
  }*/
 
  $user_check_query = "SELECT * FROM Usuarios WHERE usuario='$user' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user_record = mysqli_fetch_assoc($result);

  if ($user_record) {
      $erro_user = "Este nome de usuário já está em uso.";
      $erro = true;
  }else if ($senha !== $senhaconf) {
    $erro_senhaconf = "As senhas não coincidem.";
    $erro = true;
  }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erro_email = "Email inválido.";
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
