<?php
if(isset($_POST['score']) && isset($_POST['id_U'])) {
    $servername = "localhost";
    $username = "root";
    $password = "EverServer4321";
    $dbname = "typing";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $score = $_POST['score'];
    $id_usuario = $_POST['id_U'];

    $sql = "INSERT INTO Partidas (usuario_id, score) VALUES ('$id_usuario', '$score')";

    if ($conn->query($sql) === TRUE) {
        echo "Score salvo com sucesso!";
    } else {
        echo "Erro ao salvar o score: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Parâmetros não recebidos corretamente.";
}
?>