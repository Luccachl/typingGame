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

$usuario_id = isset($_GET['id_U']) ? $_GET['id_U'] : '';

// Criar Nova Liga
$nome_liga = "";
$senha_liga = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['criar_liga'])) {
    $nome_liga = verifica_campo($_POST["nome_liga"]);
    $senha_liga = verifica_campo($_POST["senha_liga"]);

    if (!empty($usuario_id)) {
        $insert_query = "INSERT INTO Ligas (nome_liga, senha, lider_id) VALUES ('$nome_liga', '$senha_liga', '$usuario_id')";

        if (mysqli_query($conn, $insert_query)) {
            echo "Liga criada com sucesso!<br>";
            $nome_liga = "";
            $senha_liga = "";
        } else {
            echo "Erro ao criar a liga: " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "ID do líder da liga não especificado.<br>";
    }
}

// Entrar em uma Liga Existente
$liga_id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entrar_liga'])) {
    $liga_id = $_POST['liga_id']; // ID da liga selecionada para entrar

    if (!empty($usuario_id) && !empty($liga_id)) {
        // Verificar se o usuário já está inscrito na liga
        $verificar_query = "SELECT COUNT(*) AS inscricao FROM InscricoesLigas WHERE usuario_id = '$usuario_id' AND liga_id = '$liga_id'";
        $verificar_result = mysqli_query($conn, $verificar_query);

        if ($verificar_result) {
            $row = mysqli_fetch_assoc($verificar_result);
            $inscricao = $row['inscricao'];
            mysqli_free_result($verificar_result);

            if ($inscricao > 0) {
                echo "Você já está inscrito nesta liga.<br>";
            } else {
                $insert_query = "INSERT INTO InscricoesLigas (usuario_id, liga_id) VALUES ('$usuario_id', '$liga_id')";

                if (mysqli_query($conn, $insert_query)) {
                    echo "Você entrou na liga com ID $liga_id<br>";
                } else {
                    echo "Erro ao entrar na liga: " . mysqli_error($conn) . "<br>";
                }
            }
        } else {
            echo "Erro ao verificar inscrição: " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "ID do usuário ou da liga não especificado.<br>";
    }
}
$verificar_inscricao = "SELECT * FROM InscricoesLigas WHERE usuario_id = '$usuario_id'";
$resultado_verificar_inscricao = mysqli_query($conn, $verificar_inscricao);

if ($resultado_verificar_inscricao && mysqli_num_rows($resultado_verificar_inscricao) > 0) {

  $scoreboard_query = "SELECT Usuarios.usuario, SUM(Partidas.score) AS score_total
                    FROM InscricoesLigas 
                    INNER JOIN Usuarios ON InscricoesLigas.usuario_id = Usuarios.id_U
                    INNER JOIN Partidas ON InscricoesLigas.usuario_id = Partidas.usuario_id
                    INNER JOIN Ligas ON InscricoesLigas.liga_id = Ligas.id_L
                    WHERE Ligas.id_L = '$liga_id'
                    GROUP BY Usuarios.usuario";

$scoreboard_result = mysqli_query($conn, $scoreboard_query);
 
}

      ?>

<!DOCTYPE html>
<html>
<head>
    <title>Ligas</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/ligas.css">
    <style>
      a {
            font-weight:bold;
            color:black;
            text-decoration: none;
            
        }
    </style>
</head>
<body>
    <h2>Criar Nova Liga</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_U=<?php echo $usuario_id; ?>">
        Nome da Liga: <input type="text" name="nome_liga" value="<?php echo $nome_liga; ?>"><br><br>
        Senha da Liga: <input type="password" name="senha_liga" value="<?php echo $senha_liga; ?>"><br><br>
        <input type="submit" name="criar_liga" value="Criar Liga">
    </form>

    <h2>Ligas Disponíveis</h2>
    <table border="1">
        <tr>
            <th>Nome da Liga</th>
            <th></th>
        </tr>
        <?php
        

        $ligas_query = "SELECT * FROM Ligas";
        $result = mysqli_query($conn, $ligas_query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";

                echo "<td>" . $row["nome_liga"] . "</td>";
                echo "<td>
                        <form method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."?id_U=".$usuario_id."'>
                            <input type='hidden' name='liga_id' value='".$row["id_L"]."'>
                            <input type='submit' name='entrar_liga' value='Entrar na Liga'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhuma liga encontrada.</td></tr>";
        }
        ?>
    </table>

    <h2>Scoreboard da Liga</h2>
    <table border="1">
        <tr>
            <th>Usuário</th>
            <th>Score</th>
        </tr>
        <?php
        if ($scoreboard_result && mysqli_num_rows($scoreboard_result) > 0) {
            while ($row = mysqli_fetch_assoc($scoreboard_result)) {
                echo "<tr>";
                echo "<td>" . $row["usuario"] . "</td>";
                echo "<td>" . $row["score_total"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Nenhum jogador na liga.</td></tr>";
        }
        ?>
    </table>
    <a href="menu.php">Voltar para o Menu</a>
</body>
</html>
