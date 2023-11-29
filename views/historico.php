<?php
$servername = "localhost";
$username = "root";
$password = "EverServer4321";
$dbname = "typing";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql_partidas = "SELECT p.score, p.timestamp 
FROM Partidas p
INNER JOIN Usuarios u ON u.id_U = p.usuario_id
ORDER BY p.timestamp DESC";
$result_partidas = $conn->query($sql_partidas);

echo "<h2>Histórico de Partidas</h2>";
echo "<table border='1'>";
echo "<tr><th>Pontuação</th><th>Data da Partida</th></tr>";

if ($result_partidas->num_rows > 0) {
    while ($row = $result_partidas->fetch_assoc()) {
        echo "<tr><td>" . $row["score"] . "</td><td>" . $row["timestamp"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>Nenhuma partida encontrada.</td></tr>";
}

echo "</table>";


$sql_pontuacao_geral = "SELECT u.usuario, SUM(p.score) AS total_score 
                        FROM Usuarios u 
                        INNER JOIN Partidas p ON u.id_U = p.usuario_id 
                        GROUP BY u.usuario
                        ORDER BY total_score DESC";
$result_pontuacao_geral = $conn->query($sql_pontuacao_geral);

echo "<h2>Quadro de Pontuação Geral</h2>";
echo "<table border='1'>";
echo "<tr><th>Usuário</th><th>Pontuação Total</th></tr>";

if ($result_pontuacao_geral->num_rows > 0) {
    while ($row = $result_pontuacao_geral->fetch_assoc()) {
        echo "<tr><td>" . $row["usuario"] . "</td><td>" . $row["total_score"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>Nenhum resultado encontrado.</td></tr>";
}

echo "</table>";


$sql_pontuacao_ligas = "SELECT l.nome_liga, SUM(p.score) AS total_score 
                        FROM Ligas l 
                        INNER JOIN inscricoesligas il ON l.id_L = il.liga_id 
                        INNER JOIN Partidas p ON il.usuario_id = p.usuario_id 
                        GROUP BY l.nome_liga
                        ORDER BY total_score DESC";
$result_pontuacao_ligas = $conn->query($sql_pontuacao_ligas);

echo "<h2>Quadro de Pontuação das Ligas</h2>";
echo "<table border='1'>";
echo "<tr><th>Liga</th><th>Pontuação Total</th></tr>";

if ($result_pontuacao_ligas->num_rows > 0) {
    while ($row = $result_pontuacao_ligas->fetch_assoc()) {
        echo "<tr><td>" . $row["nome_liga"] . "</td><td>" . $row["total_score"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>Nenhum resultado encontrado.</td></tr>";
}

echo "</table>";
echo '<a href="menu.php">Voltar para o Menu</a>';
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pontuações</title>
    <link rel="stylesheet" href="../css/historico.css">
    <style>
    a {
    font-weight:bold;
    color:black;
    text-decoration: none;
    }
    </style>
</head>
<body>

</body>
</html>
